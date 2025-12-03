<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\VisaRequirementModel;
use App\Models\ApplicationDocumentModel;
use App\Models\UserModel;

class MyProfile extends BaseController
{
    // Fungsi AJAX Sidebar
    public function fetchSidebar()
    {
        if (!session()->get('isLoggedIn')) {
            return "Session expired. Silakan login ulang.";
        }

        $userId = session()->get('id');
        $db = \Config\Database::connect();

        // 1. Ambil DATA USER TERBARU (untuk Form Edit Profil)
        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        // 2. Ambil SEMUA Riwayat Order (Bukan cuma satu)
        $builder = $db->table('applications');
        $builder->select('applications.*, visa_types.name as visa_name, visa_types.code as visa_code');
        $builder->join('visa_types', 'visa_types.id = applications.visa_type_id', 'left');
        $builder->where('applications.user_id', $userId);
        $builder->orderBy('applications.created_at', 'DESC'); 
        
        // Ambil hasil sebagai array of array
        $allApps = $builder->get()->getResultArray();

        // Pisahkan: Aplikasi Paling Baru (Aktif) vs Sisanya (History)
        $latestApp = null;
        $historyApps = [];

        if (!empty($allApps)) {
            $latestApp = $allApps[0]; // Yang paling atas
            // Jika ada lebih dari 1, sisanya masuk history
            if (count($allApps) > 1) {
                $historyApps = array_slice($allApps, 1);
            }
        }

        // 3. Cek Dokumen Kurang (Hanya untuk Latest App)
        $missingDocs = [];
        $uploadedDocsCount = 0;

        if ($latestApp) {
            $visaTypeId = $latestApp['visa_type_id'];
            $appId = $latestApp['id'];

            $reqModel = new VisaRequirementModel();
            $requirements = $reqModel->where('visa_type_id', $visaTypeId)->findAll();

            $docModel = new ApplicationDocumentModel();
            $rawDocs = $docModel->where('application_id', $appId)->findAll();
            $uploadedDocsCount = count($rawDocs);
            
            // Re-map dokumen
            $uploadedMap = [];
            foreach($rawDocs as $d) $uploadedMap[$d['requirement_id']] = true;

            foreach ($requirements as $req) {
                if ($req['is_mandatory'] == 1 && !isset($uploadedMap[$req['id']])) {
                    $missingDocs[] = $req['document_name'];
                }
            }
        }

        $data = [
            'user' => $userData, // Kirim data lengkap user
            'latest_app' => $latestApp,
            'history_apps' => $historyApps,
            'missing_docs' => $missingDocs,
            'uploaded_docs_count' => $uploadedDocsCount
        ];

        return view('landing/profile_sidebar_view', $data);
    }

    // Fungsi Update Profil (POST)
    public function update()
    {
        if (!session()->get('isLoggedIn')) return redirect()->to('/');

        $userModel = new UserModel();
        $id = session()->get('id');

        // Aturan Validasi
        $rules = [
            'full_name'    => 'required|min_length[3]',
            'phone_number' => 'required|min_length[8]',
        ];

        // Jika user isi password, validasi panjangnya
        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/')->with('error', 'Gagal update: Periksa inputan Anda.');
        }

        // Siapkan Data Update
        $dataUpdate = [
            'full_name' => $this->request->getPost('full_name'),
            'phone_number' => $this->request->getPost('phone_number'),
        ];

        // Cek ganti password
        $newPass = $this->request->getPost('password');
        if (!empty($newPass)) {
            $dataUpdate['password_hash'] = password_hash($newPass, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $dataUpdate);

        // Update Session Name jika berubah
        session()->set('name', $dataUpdate['full_name']);

        // Redirect balik ke Landing Page
        // Kita pakai trik 'tujuan=profile' (opsional) atau alert JS biasa
        return redirect()->to('/')->with('success', 'Profil berhasil diperbarui!');
    }
}