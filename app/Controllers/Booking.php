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
        $userModel = new UserModel(); // Tambahkan ini

        // 1. Ambil pilihan dari URL (misal: ?service=voa)
        $selectedCode = $this->request->getGet('service') ?? 'voa';

        // 2. Cari Data Visa berdasarkan kode di database
        $selectedVisa = $visaModel->where('code', $selectedCode)->first();

        // Jika kode ngawur/tidak ketemu, default ke VOA (ID 1)
        if (!$selectedVisa) {
            $selectedVisa = $visaModel->find(1);
        }

        // 3. Ambil semua jenis visa untuk dropdown
        $allVisas = $visaModel->where('is_active', 1)->findAll();

        // 4. Ambil syarat dokumen KHUSUS untuk visa yang dipilih
        $requirements = $reqModel->where('visa_type_id', $selectedVisa['id'])->findAll();

        // --- TAMBAHAN BARU ---
        // 5. Ambil Data User yang sedang Login untuk Auto-fill form
        $userId = session()->get('id');
        $userData = $userModel->find($userId);

        $data = [
            'selected_visa' => $selectedVisa,
            'all_visas'     => $allVisas,
            'requirements'  => $requirements,
            'user'          => $userData // Kirim data user ke view
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
        return view('success_view', ['invoice' => $invoiceNumber]);
    }
}
