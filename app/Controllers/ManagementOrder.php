<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\ApplicationDocumentModel;

class ManagementOrder extends BaseController
{
    public function index()
    {
        helper('url');
        $appModel = new ApplicationModel();
        $orders = $appModel->select('applications.*, users.full_name, users.email, visa_types.name as visa_name, visa_types.code as visa_code')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id')
            ->orderBy('applications.created_at', 'DESC')
            ->findAll();
        return view('dashboard/managementorder', ['orders' => $orders]);
    }

    public function detail($id)
    {
        $appModel = new ApplicationModel();
        $docModel = new ApplicationDocumentModel();

        // 1. Ambil Data Aplikasi + User + Visa
        $application = $appModel->select('applications.*, users.full_name, users.email, users.phone_number, visa_types.name as visa_name, visa_types.price')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id')
            ->where('applications.id', $id)
            ->first();

        if (!$application) {
            return redirect()->to('/dashboard/managementorder')->with('error', 'Data tidak ditemukan');
        }

        // 2. Ambil Dokumen yang diupload
        $documents = $docModel->select('application_documents.*, visa_requirements.document_name')
            ->join('visa_requirements', 'visa_requirements.id = application_documents.requirement_id')
            ->where('application_documents.application_id', $id)
            ->findAll();

        $data = [
            'app' => $application,
            'documents' => $documents
        ];

        return view('dashboard/order_detail', $data);
    }

    public function process()
    {
        $appModel = new ApplicationModel();

        $id = $this->request->getPost('application_id');
        $action = $this->request->getPost('action'); // 'approve' atau 'reject'

        if ($action === 'approve') {
            $status = 'approved';
            $msg = 'Permohonan berhasil disetujui!';
        } else {
            $status = 'rejected';
            $msg = 'Permohonan ditolak.';
        }

        $appModel->update($id, ['status' => $status]);

        return redirect()->to('/dashboard/managementorder')->with('success', $msg);
    }
}
