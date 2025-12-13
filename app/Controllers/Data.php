<?php

namespace App\Controllers;

use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Data extends BaseController
{
    public function index()
    {
        helper('url');
        $userModel = new UserModel();

        // 1. AMBIL DATA MENTAH DARI MODEL (Solusi Error SQL 'Unknown Column')
        // Kita tidak filter di SQL, tapi ambil semua dulu.
        $clients = $userModel->getClientsWithVisaStatus();

        // 2. HITUNG STATISTIK (Untuk Kartu Header)
        $stat_total = count($clients);
        $stat_active = 0;
        $stat_returning = 0;
        $stat_expiring = 0;

        // 3. FILTERING DI PHP (Aman & Cepat)
        $filteredClients = [];

        // Ambil input filter dari URL
        $keyword = $this->request->getGet('keyword');
        $nationality = $this->request->getGet('nationality');
        $statusFilter = $this->request->getGet('status');
        $sort = $this->request->getGet('sort');

        foreach ($clients as $client) {
            // Hitung statistik
            if (($client['last_status'] ?? '') == 'approved') $stat_active++;
            if (($client['total_orders'] ?? 0) > 1) $stat_returning++;

            // --- LOGIKA FILTER ---
            $match = true;

            // Filter Keyword (Pencarian)
            if ($keyword) {
                $haystack = strtolower(($client['full_name'] ?? '') . ($client['email'] ?? '') . ($client['phone_number'] ?? ''));
                if (!str_contains($haystack, strtolower($keyword))) {
                    $match = false;
                }
            }

            // Filter Negara
            if ($nationality && ($client['nationality'] ?? '') != $nationality) {
                $match = false;
            }

            // Filter Status
            if ($statusFilter) {
                $s = $client['last_status'] ?? '';
                if ($statusFilter == 'active' && $s != 'approved') $match = false;
                if ($statusFilter == 'pending' && !in_array($s, ['payment_pending', 'upload_pending', 'verification_process'])) $match = false;
            }

            // Jika lolos filter, masukkan ke array baru
            if ($match) {
                $filteredClients[] = $client;
            }
        }

        // 4. SORTING
        usort($filteredClients, function ($a, $b) use ($sort) {
            if ($sort == 'oldest') return strtotime($a['created_at']) - strtotime($b['created_at']);
            if ($sort == 'name_asc') return strcmp($a['full_name'], $b['full_name']);
            // Default: Newest
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        // 5. PAGINATION MANUAL (SOLUSI ERROR VIEW 'UNDEFINED PAGER')
        // Kita buat pager sendiri karena datanya berupa Array, bukan Database Object
        $pager = \Config\Services::pager();
        $page = (int) ($this->request->getGet('page_clients') ?? 1); // Halaman ke berapa?
        $perPage = 10; // Jumlah data per halaman
        $total = count($filteredClients);

        // Potong array (Slice) untuk ditampilkan di halaman ini saja
        $pagedData = array_slice($filteredClients, ($page - 1) * $perPage, $perPage);

        // Bikin link pagination-nya
        $pager->makeLinks($page, $perPage, $total, 'default_full', 0, 'clients');

        // 6. KIRIM KE VIEW
        $data = [
            'clients' => $pagedData, // Data yang sudah dipotong
            'pager' => $pager,       // INI YANG TADI HILANG (Object Pager)

            // Data statistik & filter
            'stat_total' => $stat_total,
            'stat_active' => $stat_active,
            'stat_returning' => $stat_returning,
            'stat_expiring' => $stat_expiring,
            'filters' => [
                'keyword' => $keyword,
                'nationality' => $nationality,
                'status' => $statusFilter,
                'sort' => $sort
            ]
        ];

        return view('dashboard/data', $data);
    }

    // --- FUNGSI TAMBAH KLIEN ---
    public function add()
    {
        $userModel = new UserModel();
        if ($userModel->where('email', $this->request->getPost('email'))->first()) {
            return redirect()->to('/dashboard/data')->with('error', 'Email sudah terdaftar!');
        }
        $userModel->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone_number' => $this->request->getPost('phone_number'),
            'nationality' => $this->request->getPost('nationality'),
            'passport_number' => $this->request->getPost('passport_number'),
            'password_hash' => password_hash('123456', PASSWORD_DEFAULT)
        ]);
        return redirect()->to('/dashboard/data')->with('success', 'Klien berhasil ditambahkan.');
    }

    // --- FUNGSI EXPORT (UBAH KE CSV BIAR GAK ERROR COMPOSER) ---
    public function export()
    {
        $userModel = new UserModel();

        // 1. AMBIL & FILTER DATA (Sama persis seperti di Index agar sinkron)
        $clients = $userModel->getClientsWithVisaStatus();
        $filteredClients = [];

        $keyword = $this->request->getGet('keyword');
        $nationality = $this->request->getGet('nationality');
        $statusFilter = $this->request->getGet('status');

        foreach ($clients as $client) {
            $match = true;
            if ($keyword) {
                $haystack = strtolower(($client['full_name'] ?? '') . ($client['email'] ?? '') . ($client['phone_number'] ?? ''));
                if (!str_contains($haystack, strtolower($keyword))) $match = false;
            }
            if ($nationality && ($client['nationality'] ?? '') != $nationality) $match = false;
            if ($statusFilter) {
                $s = $client['last_status'] ?? '';
                if ($statusFilter == 'active' && $s != 'approved') $match = false;
                if ($statusFilter == 'pending' && !in_array($s, ['payment_pending', 'upload_pending', 'verification_process'])) $match = false;
            }
            if ($match) $filteredClients[] = $client;
        }

        // --- 2. MULAI MEMBUAT EXCEL CANTIK ---
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul Laporan di Baris 1
        $sheet->setCellValue('A1', 'LAPORAN DATA KLIEN - BALI FANTASTIC VISAS');
        $sheet->mergeCells('A1:I1'); // Gabungkan sel dari A sampai I
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Header Tabel di Baris 3
        $headers = ['No', 'Nama Lengkap', 'Email', 'No WhatsApp', 'Negara', 'No. Paspor', 'Total Order', 'Visa Terakhir', 'Status Terakhir'];
        $col = 'A';
        $rowHeader = 3;

        foreach ($headers as $h) {
            $cell = $col . $rowHeader;
            $sheet->setCellValue($cell, $h);
            $col++;
        }

        // --- STYLING HEADER (Warna Biru, Teks Putih, Bold) ---
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['argb' => Color::COLOR_WHITE],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF4472C4'], // Warna Biru Keren
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $sheet->getStyle('A3:I3')->applyFromArray($headerStyle);
        $sheet->getRowDimension(3)->setRowHeight(25); // Tinggi baris header

        // --- 3. ISI DATA ---
        $rowNum = 4;
        $no = 1;

        foreach ($filteredClients as $c) {
            $sheet->setCellValue('A' . $rowNum, $no++);
            $sheet->setCellValue('B' . $rowNum, $c['full_name']);
            $sheet->setCellValue('C' . $rowNum, $c['email']);
            $sheet->setCellValue('D' . $rowNum, $c['phone_number']);
            $sheet->setCellValue('E' . $rowNum, $c['nationality']);
            $sheet->setCellValue('F' . $rowNum, $c['passport_number']);
            $sheet->setCellValue('G' . $rowNum, $c['total_orders']);
            $sheet->setCellValue('H' . $rowNum, $c['last_visa_code'] ?? '-');

            // Format Status
            $rawStatus = $c['last_status'] ?? '-';
            $statusText = strtoupper(str_replace('_', ' ', $rawStatus));
            $sheet->setCellValue('I' . $rowNum, $statusText);

            // Styling Baris (Warna Status)
            $statusCell = 'I' . $rowNum;
            $sheet->getStyle($statusCell)->getFont()->setBold(true);

            if ($rawStatus == 'approved') {
                $sheet->getStyle($statusCell)->getFont()->getColor()->setARGB('FF008000'); // Hijau Tua
            } elseif ($rawStatus == 'rejected' || $rawStatus == 'expired') {
                $sheet->getStyle($statusCell)->getFont()->getColor()->setARGB('FFFF0000'); // Merah
            } elseif (in_array($rawStatus, ['payment_pending', 'upload_pending'])) {
                $sheet->getStyle($statusCell)->getFont()->getColor()->setARGB('FFD4A017'); // Emas/Kuning Gelap
            }

            // Styling Alignment Tengah untuk beberapa kolom
            $sheet->getStyle('A' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('G' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('H' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle('I' . $rowNum)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            $rowNum++;
        }

        // --- 4. FINISHING TOUCHES (Rapi-rapi) ---

        // Auto Width (Lebar kolom otomatis menyesuaikan isi)
        foreach (range('A', 'I') as $colID) {
            $sheet->getColumnDimension($colID)->setAutoSize(true);
        }

        // Border untuk seluruh tabel data
        $lastRow = $rowNum - 1;
        $styleTableBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FFCCCCCC'], // Abu-abu tipis
                ],
            ],
        ];
        $sheet->getStyle('A4:I' . $lastRow)->applyFromArray($styleTableBorder);

        // --- 5. DOWNLOAD FILE ---
        $filename = 'Laporan_Klien_VIP_' . date('Y-m-d_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
    // --- FITUR BARU: AMBIL HISTORY VIA AJAX ---
    public function getHistory($userId)
    {
        $appModel = new \App\Models\ApplicationModel();

        // Ambil semua order milik user tersebut
        $history = $appModel->select('applications.*, visa_types.name as visa_name, visa_types.price')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id', 'left')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return $this->response->setJSON($history);
    }
}
