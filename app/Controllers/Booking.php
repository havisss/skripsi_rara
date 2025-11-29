<?php

namespace App\Controllers;

use App\Models\VisaTypeModel;
use App\Models\VisaRequirementModel;
use App\Models\UserModel;
use App\Models\ApplicationModel;
use App\Models\ApplicationDocumentModel;

class Booking extends BaseController
{
    public function index()
    {
        $visaModel = new VisaTypeModel();
        $reqModel = new VisaRequirementModel();

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

        $data = [
            'selected_visa' => $selectedVisa,
            'all_visas'     => $allVisas,
            'requirements'  => $requirements
        ];

        return view('booking_view', $data);
    }

    public function submit()
    {
        $userModel = new UserModel();
        $appModel = new ApplicationModel();
        $docModel = new ApplicationDocumentModel();

        // 1. DATA USER
        $email = $this->request->getPost('email');
        $fullname = $this->request->getPost('fullname');
        $phone = $this->request->getPost('phone');

        // Cek apakah user sudah terdaftar berdasarkan email?
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
            // Jika user baru, simpan ke database
            $userData = [
                'full_name' => $fullname,
                'email' => $email,
                'phone_number' => $phone,
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT), // Default password sementara
            ];
            $userId = $userModel->insert($userData);
        } else {
            // Jika user lama, ambil ID-nya
            $userId = $user['id'];
        }

        // 2. BUAT DATA APLIKASI (BOOKING)
        $visaTypeId = $this->request->getPost('visa_type_id') ?? 1;
        $invoiceNumber = 'INV-' . strtoupper(uniqid());
        $appData = [
            'invoice_number' => $invoiceNumber,
            'user_id' => $userId,
            'visa_type_id' => $visaTypeId,
            'status' => 'payment_pending',
            'payment_status' => 'unpaid',
            'submission_date' => date('Y-m-d H:i:s')
        ];

        $applicationId = $appModel->insert($appData);

        // 3. PROSES UPLOAD FILE
        $files = $this->request->getFiles();

        foreach ($files as $key => $file) {
            // Kita hanya memproses input yang namanya diawali "doc_" (hasil looping di view tadi)
            if (strpos($key, 'doc_') === 0) {
                if ($file->isValid() && !$file->hasMoved()) {
                    // Ambil ID Requirement dari nama input (contoh: doc_3 => ambil angka 3)
                    $requirementId = str_replace('doc_', '', $key);

                    // Generate nama file random agar tidak bentrok
                    $newName = $file->getRandomName();

                    // Pindahkan file ke folder public/uploads/documents
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
