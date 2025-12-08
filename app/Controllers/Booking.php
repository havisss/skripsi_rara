<?php

namespace App\Controllers;

use App\Models\VisaTypeModel;
use App\Models\VisaRequirementModel;
use App\Models\UserModel; // Load User Model
use App\Models\ApplicationModel;
use App\Models\ApplicationDocumentModel;

class Booking extends BaseController
{
    public function index()
    {
        $visaModel = new VisaTypeModel();
        $reqModel = new VisaRequirementModel();
        $userModel = new UserModel();

        // 1. Get selected service code from URL
        $selectedCode = $this->request->getGet('service') ?? 'voa';

        // 2. Try to find the specific visa
        $selectedVisa = $visaModel->where('code', $selectedCode)->first();

        // --- SAFETY FIX START ---
        // If not found, try to find ANY visa in the database
        if (!$selectedVisa) {
            $selectedVisa = $visaModel->first();
        }

        // If the database is completely empty, stop here to avoid the error
        if (!$selectedVisa) {
            return "ERROR: Table 'visa_types' is empty. Please add data in phpMyAdmin.";
        }
        // --- SAFETY FIX END ---

        // 3. Get all visas for the dropdown
        $allVisas = $visaModel->where('is_active', 1)->findAll();

        // 4. Get requirements for the selected visa
        $requirements = $reqModel->where('visa_type_id', $selectedVisa['id'])->findAll();

        // 5. Get User Data for auto-fill
        $userId = session()->get('id');
        $userData = ($userId) ? $userModel->find($userId) : null;

        $data = [
            'selected_visa' => $selectedVisa,
            'all_visas'     => $allVisas,
            'requirements'  => $requirements,
            'user'          => $userData
        ];

        return view('booking_view', $data);
    }

    public function submit()
    {
        // Pastikan user login (walaupun sudah di filter route, ini double check)
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $appModel = new ApplicationModel();
        $docModel = new ApplicationDocumentModel();

        // --- PERUBAHAN UTAMA DI SINI ---

        // 1. AMBIL ID USER DARI SESSION (BUKAN DARI INPUT FORM)
        $userId = session()->get('id');

        // 2. BUAT DATA APLIKASI (BOOKING)
        $visaTypeId = $this->request->getPost('visa_type_id') ?? 1;
        $invoiceNumber = 'INV-' . strtoupper(uniqid());

        $appData = [
            'invoice_number' => $invoiceNumber,
            'user_id' => $userId, // Langsung pakai ID dari session
            'visa_type_id' => $visaTypeId,
            'status' => 'payment_pending',
            'payment_status' => 'unpaid',
            'submission_date' => date('Y-m-d H:i:s')
        ];

        $applicationId = $appModel->insert($appData);

        // 3. PROSES UPLOAD FILE
        $files = $this->request->getFiles();

        foreach ($files as $key => $file) {
            // Kita hanya memproses input yang namanya diawali "doc_"
            if (strpos($key, 'doc_') === 0) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Ambil ID Requirement dari nama input
                    $requirementId = str_replace('doc_', '', $key);

                    // Generate nama file random
                    $newName = $file->getRandomName();

                    // Pindahkan file
                    $file->move(ROOTPATH . 'public/uploads/documents', $newName);

                    // Simpan path file ke database
                    $docModel->insert([
                        'application_id' => $applicationId,
                        'requirement_id' => $requirementId,
                        'file_path' => 'uploads/documents/' . $newName,
                        'verification_status' => 'pending'
                    ]);
                }
            }
        }

        // 4. Redirect ke Halaman Sukses
        return redirect()->to('/booking/success/' . $invoiceNumber);
    }

    public function success($invoiceNumber)
    {
        $appModel = new ApplicationModel();

        // Ambil data transaksi berdasarkan Invoice Number
        // Kita join dengan tabel Users dan VisaTypes untuk dapat Nama & Harga
        $transaction = $appModel->select('applications.*, users.full_name, visa_types.name as visa_name, visa_types.price')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id')
            ->where('invoice_number', $invoiceNumber)
            ->first();

        if (!$transaction) {
            return redirect()->to('/')->with('error', 'Invoice tidak ditemukan');
        }

        // --- SETUP PESAN WHATSAPP ---
        $adminPhone = '6285655569842'; // Ganti dengan nomor WhatsApp Admin Anda (format 62...)

        $message = "Halo Admin Bali Fantastic, saya ingin konfirmasi pembayaran.\n\n";
        $message .= "No Invoice: *" . $transaction['invoice_number'] . "*\n";
        $message .= "Nama: " . $transaction['full_name'] . "\n";
        $message .= "Layanan: " . $transaction['visa_name'] . "\n";
        $message .= "Total Tagihan: *Rp " . number_format($transaction['price'], 0, ',', '.') . "*\n\n";
        $message .= "Mohon diproses, Terima kasih.";

        $waLink = "https://wa.me/" . $adminPhone . "?text=" . urlencode($message);

        $data = [
            'trx' => $transaction,
            'waLink' => $waLink
        ];

        return view('success_view', $data);
    }
}