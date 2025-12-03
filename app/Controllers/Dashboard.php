<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $appModel = new ApplicationModel();

        // --- 1. Statistik Kartu Utama ---
        $pendingCount = $appModel->whereIn('status', ['payment_pending', 'upload_pending'])->countAllResults();
        $processCount = $appModel->whereIn('status', ['verification_process', 'submitted_immigration'])->countAllResults();
        $completedCount = $appModel->where('status', 'approved')->countAllResults();
        $rejectedCount = $appModel->where('status', 'rejected')->countAllResults();

        // --- 2. Urgent Actions (5 Teratas) ---
        $urgentActions = $appModel->select('applications.*, users.full_name, users.email, visa_types.name as visa_name')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id')
            ->orderBy('applications.created_at', 'DESC')
            ->findAll(5);

        // --- 3. Recent Activity (Kita samakan dengan Urgent Actions tapi format beda) ---
        // Idealnya ini diambil dari tabel logs, tapi sementara kita pakai data aplikasi terbaru
        $recentActivities = $urgentActions;

        // --- 4. Statistik Grafik Bulanan (6 Bulan Terakhir) ---
        $db = \Config\Database::connect();
        $queryChart = $db->query("
            SELECT DATE_FORMAT(created_at, '%M') as month_name, COUNT(id) as total 
            FROM applications 
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY created_at ASC
        ");
        $chartData = $queryChart->getResultArray();

        // --- 5. Statistik Distribusi Visa ---
        $queryVisaDist = $db->query("
            SELECT visa_types.name, COUNT(applications.id) as total 
            FROM applications 
            JOIN visa_types ON visa_types.id = applications.visa_type_id
            GROUP BY visa_types.id
        ");
        $visaDistData = $queryVisaDist->getResultArray();

        // Hitung total untuk persentase
        $totalApps = array_sum(array_column($visaDistData, 'total'));

        $data = [
            'title' => 'Dashboard Admin - Bali Fantastic',
            'user_name' => 'ADMINISTRATOR',
            'user_image' => 'default.jpg',

            'count_pending' => $pendingCount,
            'count_process' => $processCount,
            'count_completed' => $completedCount,
            'count_rejected' => $rejectedCount,

            'urgent_actions' => $urgentActions,
            'recent_activities' => $recentActivities,

            // Data untuk JS Chart
            'chart_labels' => json_encode(array_column($chartData, 'month_name')),
            'chart_values' => json_encode(array_column($chartData, 'total')),

            'visa_dist' => $visaDistData,
            'total_apps' => $totalApps == 0 ? 1 : $totalApps // Hindari division by zero
        ];

        return view('dashboard/dashboardadmin', $data);
    }
}
