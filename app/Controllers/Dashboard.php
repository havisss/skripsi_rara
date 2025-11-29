<?php

namespace App\Controllers;

use App\Models\ApplicationModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $appModel = new ApplicationModel();
        $userModel = new UserModel();

        // 1. Hitung Statistik Real
        $pendingCount = $appModel->where('status', 'payment_pending')->orWhere('status', 'upload_pending')->countAllResults();
        $processCount = $appModel->where('status', 'verification_process')->orWhere('status', 'submitted_immigration')->countAllResults();
        $completedCount = $appModel->where('status', 'approved')->countAllResults();
        $rejectedCount = $appModel->where('status', 'rejected')->countAllResults();

        // 2. Ambil "Urgent Actions" (Data terbaru yang masuk)
        $urgentActions = $appModel->select('applications.*, users.full_name, visa_types.name as visa_name')
            ->join('users', 'users.id = applications.user_id')
            ->join('visa_types', 'visa_types.id = applications.visa_type_id')
            ->orderBy('applications.created_at', 'DESC')
            ->findAll(5); // Ambil 5 teratas

        $data = [
            'title' => 'Dashboard Admin - Pengurusan Visa',
            'user_name' => 'ADMINISTRATOR', // Bisa ambil dari session
            'user_image' => 'default.jpg',

            // Kirim data real ke view
            'count_pending' => $pendingCount,
            'count_process' => $processCount,
            'count_completed' => $completedCount,
            'count_rejected' => $rejectedCount,
            'urgent_actions' => $urgentActions
        ];

        return view('dashboard/dashboardadmin', $data);
    }

    // ... method lain (profile, settings, dll) biarkan tetap ada ...
}
