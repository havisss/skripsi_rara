<?php

namespace App\Controllers;

use App\Models\ApplicationModel;

class Transaksi extends BaseController
{
    public function index()
    {
        helper('url');
        $appModel = new ApplicationModel();

        // Ambil data aplikasi JOIN users dan visa_types
        // Fokus pada status pembayaran dan invoice
        $transactions = $appModel->select('applications.*, users.full_name, users.email, visa_types.name as visa_name, visa_types.price')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id')
            ->orderBy('applications.created_at', 'DESC')
            ->findAll();

        // Hitung total pendapatan (yang statusnya sudah 'paid')
        $totalRevenue = 0;
        foreach ($transactions as $t) {
            if ($t['payment_status'] == 'paid') {
                $totalRevenue += $t['price'];
            }
        }

        $data = [
            'transactions' => $transactions,
            'totalRevenue' => $totalRevenue
        ];

        return view('dashboard/transaksi', $data);
    }

    public function confirm()
    {
        $appModel = new ApplicationModel();
        $id = $this->request->getPost('id');

        // Update status pembayaran jadi PAID
        // Dan update status aplikasi jadi 'upload_pending' (jika sebelumnya payment_pending)
        // Agar user bisa lanjut upload berkas

        $appModel->update($id, [
            'payment_status' => 'paid',
            'status' => 'upload_pending'
        ]);

        return redirect()->to('/dashboard/transaksi')->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }
}
