<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\VisaTypeModel;
use App\Models\ApplicationDocumentModel;
use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ManagementOrder extends BaseController
{
    public function index()
    {
        helper('url');
        $appModel = new ApplicationModel();
        $visaModel = new VisaTypeModel();
        $db = \Config\Database::connect();

        // 1. QUERY UTAMA
        $builder = $appModel->select('applications.*, users.full_name, users.email, visa_types.name as visa_name, visa_types.code as visa_code')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id', 'left');

        // 2. FILTERING
        $statusFilter = $this->request->getGet('status');
        if ($statusFilter && $statusFilter != 'all') {
            if ($statusFilter == 'pending_group') {
                $builder->whereIn('applications.status', ['payment_pending', 'upload_pending', 'verification_process']);
            } elseif ($statusFilter == 'action_needed') {
                $builder->whereIn('applications.status', ['revision_needed', 'rejected']);
            } elseif ($statusFilter == 'urgent') {
                $builder->where('applications.status', 'upload_pending');
            } else {
                $builder->where('applications.status', $statusFilter);
            }
        }

        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $builder->groupStart()
                ->like('users.full_name', $keyword)
                ->orLike('applications.invoice_number', $keyword)
                ->groupEnd();
        }

        $visa = $this->request->getGet('visa');
        if ($visa) {
            $builder->where('visa_types.code', $visa);
        }

        $date = $this->request->getGet('date');
        if ($date) {
            $builder->like('applications.created_at', $date);
        }

        $builder->orderBy('applications.created_at', 'DESC');

        // 3. AMBIL DATA
        $data['orders'] = $appModel->paginate(10, 'orders');
        $data['pager'] = $appModel->pager;
        $data['visa_types'] = $visaModel->findAll();

        // 4. STATISTIK COUNTER
        $data['count_all'] = $db->table('applications')->countAllResults();
        
        $data['count_pending'] = $db->table('applications')
            ->whereIn('status', ['payment_pending', 'upload_pending', 'verification_process'])
            ->countAllResults();

        $data['count_action'] = $db->table('applications')
            ->whereIn('status', ['revision_needed', 'rejected'])
            ->countAllResults();

        $data['count_urgent'] = $db->table('applications')
            ->where('status', 'upload_pending')
            ->countAllResults();

        $data['active_tab'] = $statusFilter ?? 'all';
        $data['filters'] = [
            'keyword' => $keyword,
            'visa' => $visa,
            'status' => $statusFilter,
            'date' => $date
        ];

        return view('dashboard/managementorder', $data);
    }

    // --- FITUR DETAIL ORDER (INI YANG TADI ERROR) ---
    public function detail($id)
    {
        $appModel = new ApplicationModel();
        $docModel = new ApplicationDocumentModel();
        
        // A. Ambil Data Lengkap (User + Visa)
        $order = $appModel->select('applications.*, users.full_name, users.email, users.phone_number, users.nationality, visa_types.name as visa_name, visa_types.price')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id', 'left')
            ->where('applications.id', $id)
            ->first();

        // Cek jika data tidak ditemukan
        if (!$order) {
            return redirect()->to('/dashboard/managementorder')->with('error', 'Data order tidak ditemukan!');
        }

        // B. Ambil Dokumen
        $documents = $docModel->select('application_documents.*, visa_requirements.document_name')
            ->join('visa_requirements', 'visa_requirements.id = application_documents.requirement_id')
            ->where('application_documents.application_id', $id)
            ->findAll();

        // C. Bungkus Data untuk View
        $data = [
            'order' => $order,        // <-- INI VARIABEL $order YANG DICARI VIEW
            'documents' => $documents // <-- INI VARIABEL $documents
        ];

        // Pastikan nama view ini SAMA PERSIS dengan nama file view Bos
        return view('dashboard/order_detail', $data);
    }

    // --- PROSES VERIFIKASI ---
    public function process()
    {
        $appModel = new ApplicationModel();
        
        $id = $this->request->getPost('id');
        $action = $this->request->getPost('action'); 
        $note = $this->request->getPost('admin_note'); 

        $status = 'pending';
        
        if ($action == 'approve') {
            $status = 'approved';
        } elseif ($action == 'revision') {
            $status = 'revision_needed';
        } elseif ($action == 'reject') {
            $status = 'rejected';
        }

        // Simpan ke Database
        $appModel->update($id, [
            'status' => $status,
            'admin_note' => $note 
        ]);

        $msg = ($action == 'approve') ? 'Visa berhasil disetujui!' : 'Status berhasil diperbarui.';
        return redirect()->to('/dashboard/managementorder/detail/' . $id)->with('success', $msg);
    }

    // --- CREATE MANUAL ---
    public function create()
    {
        $userModel = new UserModel();
        $appModel = new ApplicationModel();

        $email = $this->request->getPost('email');
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $userId = $user['id'];
        } else {
            $newUser = [
                'full_name' => $this->request->getPost('full_name'),
                'email' => $email,
                'phone_number' => $this->request->getPost('phone_number'),
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT),
                'nationality' => 'Unknown',
            ];
            $userId = $userModel->insert($newUser);
        }

        $data = [
            'invoice_number' => 'INV-' . strtoupper(uniqid()),
            'user_id' => $userId,
            'visa_type_id' => $this->request->getPost('visa_type_id'),
            'status' => 'payment_pending',
            'payment_status' => 'unpaid',
            'submission_date' => date('Y-m-d H:i:s')
        ];

        $appModel->insert($data);

        return redirect()->to('/dashboard/managementorder')->with('success', 'Order manual berhasil dibuat!');
    }

    // --- EXPORT EXCEL ---
    public function export()
    {
        $appModel = new ApplicationModel();

        $builder = $appModel->select('applications.*, users.full_name, users.email, users.phone_number, visa_types.name as visa_name')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id', 'left');

        // Filter Export Sama dengan Index
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $builder->groupStart()
                ->like('users.full_name', $keyword)
                ->orLike('applications.invoice_number', $keyword)
                ->groupEnd();
        }
        $visaFilter = $this->request->getGet('visa');
        if ($visaFilter) {
            $builder->where('visa_types.code', $visaFilter);
        }
        $statusFilter = $this->request->getGet('status');
        if ($statusFilter && $statusFilter != 'all') {
            $builder->where('applications.status', $statusFilter);
        }

        $data = $builder->orderBy('applications.created_at', 'DESC')->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = ['Invoice ID', 'Tanggal', 'Nama Klien', 'Email', 'No HP', 'Jenis Visa', 'Status Proses', 'Status Bayar'];
        $col = 'A';
        foreach ($headers as $h) {
            $sheet->setCellValue($col . '1', $h);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $col++;
        }

        $rowNum = 2;
        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rowNum, $row['invoice_number']);
            $sheet->setCellValue('B' . $rowNum, date('d/m/Y', strtotime($row['created_at'])));
            $sheet->setCellValue('C' . $rowNum, $row['full_name']);
            $sheet->setCellValue('D' . $rowNum, $row['email']);
            $sheet->setCellValue('E' . $rowNum, $row['phone_number']);
            $sheet->setCellValue('F' . $rowNum, $row['visa_name'] ?? '-');
            $sheet->setCellValue('G' . $rowNum, strtoupper(str_replace('_', ' ', $row['status'])));
            $sheet->setCellValue('H' . $rowNum, strtoupper($row['payment_status']));
            $rowNum++;
        }

        $filename = 'Laporan_Order_' . date('Y-m-d') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}