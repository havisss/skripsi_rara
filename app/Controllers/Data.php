<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel; // <--- Panggil Model User yang baru dibuat

class Data extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        // 1. Ambil Data Klien lengkap dengan status visanya
        $clients = $userModel->getClientsWithVisaStatus();

        // 2. Hitung Statistik untuk Kartu di Atas (Counter)
        $totalClients = count($clients);
        $activeClients = 0;
        $expiringSoon = 0;
        $returningClients = 0; // Nanti logika ini bisa dikembangkan

        foreach ($clients as $client) {
            // Logika Active: Status Approved DAN Belum Expired
            if ($client['last_status'] == 'approved' && $client['last_expiry'] > date('Y-m-d')) {
                $activeClients++;
            }

            // Logika Expiring Soon: Expired dalam 30 hari ke depan
            if ($client['last_expiry']) {
                $expiryDate = new \DateTime($client['last_expiry']);
                $today = new \DateTime();
                $diff = $today->diff($expiryDate)->days;

                // Jika visa masih berlaku TAPI sisa hari < 30
                if ($diff <= 30 && $expiryDate > $today && $client['last_status'] == 'approved') {
                    $expiringSoon++;
                }
            }

            // Logika Returning: Jika total order > 1
            if ($client['total_orders'] > 1) {
                $returningClients++;
            }
        }

        // 3. Siapkan bungkusan data
        $data = [
            'title' => 'Database Klien (CRM)',
            'clients' => $clients,
            'stats' => [
                'total' => $totalClients,
                'active' => $activeClients,
                'expiring' => $expiringSoon,
                'returning' => $returningClients
            ]
        ];

        // 4. Kirim ke View (Pastikan folder dashboard benar)
        return view('dashboard/data', $data);
    }
}
