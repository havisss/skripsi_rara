<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\LoginAdminModel; // Kita pakai model yang sama dengan Login

class Dashboard extends BaseController
{
    public function index()
    {
        // 1. Cek apakah sudah login? (Opsional, untuk keamanan ganda)
        if (!session()->get('is_admin_logged_in')) {
            return redirect()->to('/admin/login');
        }

        $appModel = new ApplicationModel();
        $adminModel = new LoginAdminModel(); // Load model admin
        
        // --- AMBIL DATA ADMIN DARI SESSION & DB ---
        $session = session();
        $adminId = $session->get('admin_id'); // Mengambil ID dari session LoginAdmin.php
        
        // Default values
        $userName = 'Administrator';
        $userImage = 'default-avatar.png'; // Pastikan file ini ada di assets/img/

        if ($adminId) {
            // Kita query lagi ke DB untuk memastikan nama & data selalu update
            // meskipun session belum expired
            $adminData = $adminModel->find($adminId);
            
            if ($adminData) {
                $userName = $adminData['name']; // Ambil kolom 'name' dari tabel admins
                // $userImage = $adminData['image']; // Jika nanti tabel admins punya kolom image
            }
        }

        // --- STATISTIK LAINNYA (SAMA SEPERTI SEBELUMNYA) ---
        $pendingCount = $appModel->whereIn('status', ['payment_pending', 'upload_pending'])->countAllResults();
        $processCount = $appModel->whereIn('status', ['verification_process', 'submitted_immigration'])->countAllResults();
        $completedCount = $appModel->where('status', 'approved')->countAllResults();
        $rejectedCount = $appModel->where('status', 'rejected')->countAllResults();

        // Urgent Actions
        $urgentActions = $appModel->select('applications.*, users.full_name, users.email, visa_types.name as visa_name')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id')
            ->orderBy('applications.created_at', 'DESC')
            ->findAll(5);

        $recentActivities = $urgentActions;

        // Chart Data
        $db = \Config\Database::connect();
        $queryChart = $db->query("
            SELECT DATE_FORMAT(created_at, '%M') as month_name, COUNT(id) as total 
            FROM applications 
            WHERE created_at >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
            GROUP BY DATE_FORMAT(created_at, '%Y-%m')
            ORDER BY created_at ASC
        ");
        $chartData = $queryChart->getResultArray();

        // Visa Distribution
        $queryVisaDist = $db->query("
            SELECT visa_types.name, COUNT(applications.id) as total 
            FROM applications 
            JOIN visa_types ON visa_types.id = applications.visa_type_id
            GROUP BY visa_types.id
        ");
        $visaDistData = $queryVisaDist->getResultArray();
        $totalApps = array_sum(array_column($visaDistData, 'total'));

        $data = [
            'title' => 'Dashboard Admin - Bali Fantastic',
            
            // --- DATA USER DINAMIS ---
            'user_name' => $userName, 
            'user_image' => $userImage,
            // -------------------------

            'count_pending' => $pendingCount,
            'count_process' => $processCount,
            'count_completed' => $completedCount,
            'count_rejected' => $rejectedCount,
            'urgent_actions' => $urgentActions,
            'recent_activities' => $recentActivities,
            'chart_labels' => json_encode(array_column($chartData, 'month_name')),
            'chart_values' => json_encode(array_column($chartData, 'total')),
            'visa_dist' => $visaDistData,
            'total_apps' => $totalApps == 0 ? 1 : $totalApps
        ];

        return view('dashboard/dashboardadmin', $data);
    }
}