<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\VisaTypeModel;

class ManagementOrder extends BaseController
{
    public function index()
    {
        helper('url');
        $appModel = new ApplicationModel();
        $visaModel = new VisaTypeModel();
        $db = \Config\Database::connect(); // Load Database Helper

        // --- 1. SIAPKAN QUERY UNTUK TABEL UTAMA ---
        $builder = $appModel->select('applications.*, users.full_name, users.email, visa_types.name as visa_name, visa_types.code as visa_code')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id', 'left'); // Tambah 'left'

        // ... (LOGIKA FILTER LAINNYA BIARKAN TETAP SAMA SEPERTI SEBELUMNYA) ...

        // Filter Status dari URL (agar tabel berubah saat tab diklik)
        $statusFilter = $this->request->getGet('status');
        if ($statusFilter && $statusFilter != 'all') {
            if ($statusFilter == 'pending_group') {
                // Tab "Menunggu Verifikasi" mencakup 3 status
                $builder->whereIn('applications.status', ['payment_pending', 'upload_pending', 'verification_process']);
            } elseif ($statusFilter == 'action_needed') {
                // Tab "Perlu Tindakan"
                $builder->whereIn('applications.status', ['revision_needed', 'rejected']);
            } elseif ($statusFilter == 'urgent') {
                // Tab "Urgent" (Misal: yang sudah bayar tapi belum upload)
                $builder->where('applications.status', 'upload_pending');
            } else {
                $builder->where('applications.status', $statusFilter);
            }
        }

        $builder->orderBy('applications.created_at', 'DESC');

        $data['orders'] = $appModel->paginate(10, 'orders');
        $data['pager'] = $appModel->pager;
        $data['visa_types'] = $visaModel->findAll();

        // --- 2. HITUNG STATISTIK REALTIME (INI YANG PENTING) ---
        // Kita hitung terpisah agar angkanya tidak ikut terfilter

        // A. Total Semua Data
        $data['count_all'] = $db->table('applications')->countAllResults();

        // B. Menunggu Verifikasi (Pending Payment, Upload, atau Verifikasi)
        $data['count_pending'] = $db->table('applications')
            ->whereIn('status', ['payment_pending', 'upload_pending', 'verification_process'])
            ->countAllResults();

        // C. Perlu Tindakan (Revisi atau Ditolak)
        $data['count_action'] = $db->table('applications')
            ->whereIn('status', ['revision_needed', 'rejected'])
            ->countAllResults();

        // D. Urgent (Misal: Status Upload Pending)
        $data['count_urgent'] = $db->table('applications')
            ->where('status', 'upload_pending')
            ->countAllResults();

        // Simpan filter agar view tahu tab mana yang aktif
        $data['active_tab'] = $statusFilter ?? 'all';

        // Filter search bar dll
        $data['filters'] = [
            'keyword' => $this->request->getGet('keyword'),
            'visa' => $this->request->getGet('visa'),
            'status' => $statusFilter,
            'date' => $this->request->getGet('date')
        ];

        return view('dashboard/managementorder', $data);
    }
    // --- METHOD TAMBAH ORDER MANUAL ---
    public function create()
    {
        $userModel = new \App\Models\UserModel();
        $appModel = new \App\Models\ApplicationModel();

        // 1. Cek User: Apakah Email sudah ada?
        $email = $this->request->getPost('email');
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            $userId = $user['id'];
        } else {
            // Jika User Belum Ada, Buat User Baru Otomatis
            $newUser = [
                'full_name' => $this->request->getPost('full_name'),
                'email' => $email,
                'phone_number' => $this->request->getPost('phone_number'),
                'password_hash' => password_hash('123456', PASSWORD_DEFAULT), // Password default
                'nationality' => 'Unknown',
            ];
            $userId = $userModel->insert($newUser);
        }

        // 2. Buat Order (Application)
        $data = [
            'invoice_number' => 'INV-' . strtoupper(uniqid()),
            'user_id' => $userId,
            'visa_type_id' => $this->request->getPost('visa_type_id'),
            'status' => 'payment_pending', // Default status awal
            'payment_status' => 'unpaid',
            'submission_date' => date('Y-m-d H:i:s')
        ];

        $appModel->insert($data);

        return redirect()->to('/dashboard/managementorder')->with('success', 'Order manual berhasil dibuat!');
    }

    // --- METHOD EXPORT DATA (CSV) ---
    // Jangan lupa tambahkan ini di paling atas file (setelah namespace)
    // use PhpOffice\PhpSpreadsheet\Spreadsheet;
    // use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    // use PhpOffice\PhpSpreadsheet\Style\Alignment;

    public function export()
    {
        $appModel = new \App\Models\ApplicationModel();

        // --- 1. DEFINISI ULANG $BUILDER (Ini yang tadi kurang) ---
        $builder = $appModel->select('applications.*, users.full_name, users.email, users.phone_number, visa_types.name as visa_name')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id', 'left');

        // --- 2. TERAPKAN FILTER (Copy dari Index) ---
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

        // --- 3. AMBIL DATA ---
        $data = $builder->orderBy('applications.created_at', 'DESC')->findAll();

        // --- 4. EXPORT KE EXCEL (Pake Library yang sudah diinstall) ---
        // Pastikan Anda sudah menambahkan baris ini di PALING ATAS file controller:
        // use PhpOffice\PhpSpreadsheet\Spreadsheet;
        // use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Header
        $headers = ['Invoice ID', 'Tanggal', 'Nama Klien', 'Email', 'No HP', 'Jenis Visa', 'Status Proses', 'Status Bayar'];
        $col = 'A';
        foreach ($headers as $h) {
            $sheet->setCellValue($col . '1', $h);
            $sheet->getStyle($col . '1')->getFont()->setBold(true);
            $sheet->getColumnDimension($col)->setAutoSize(true);
            $col++;
        }

        // Isi Data
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

        // Download
        $filename = 'Laporan_Order_' . date('Y-m-d') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
