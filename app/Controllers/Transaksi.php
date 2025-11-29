<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderModel; // Kita pakai OrderModel karena data uang ada di tabel order

class Transaksi extends BaseController
{
    public function index()
    {
        $orderModel = new OrderModel();

        // 1. Ambil semua data order (sekarang sudah ada harganya)
        $orders = $orderModel->getOrdersLengkap();

        // 2. HITUNG DUIT (Statistik)
        // Kita siapkan wadah nol dulu
        $totalRevenue = 0;
        $confirmedCount = 0;
        $pendingRevenue = 0;
        $pendingCount = 0;

        // Kita cek satu per satu order untuk dijumlahkan
        foreach ($orders as $order) {
            $harga = $order['visa_price'] ?? 0; // Ambil harga (kalau kosong anggap 0)

            if ($order['payment_status'] == 'paid') {
                // Kalau statusnya LUNAS -> Masuk ke Revenue
                $totalRevenue += $harga;
                $confirmedCount++;
            } else {
                // Kalau statusnya BELUM LUNAS -> Masuk ke Pending
                $pendingRevenue += $harga;
                $pendingCount++;
            }
        }

        // 3. Bungkus data untuk dikirim ke View
        $data = [
            'title' => 'Transaksi & Keuangan',
            'orders' => $orders, // Daftar semua transaksi untuk tabel
            'stats' => [         // Hasil hitungan tadi
                'revenue' => $totalRevenue,
                'confirmed_count' => $confirmedCount,
                'pending_revenue' => $pendingRevenue,
                'pending_count' => $pendingCount
            ]
        ];

        return view('dashboard/transaksi', $data);
    }
}