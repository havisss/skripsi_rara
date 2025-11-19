<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Data yang akan dikirim ke view
        $data = [
            'title' => 'Dashboard Admin - Pengurusan Visa',
            'user_name' => 'ROBERT WILLIAM',
            'user_image' => 'user-profile.jpg',
            
            // Stats data
            'stats' => [
                'customers' => [
                    'count' => '36,159',
                    'label' => 'Customers',
                    'change' => '↑ 12% Since Last Month',
                    'icon' => 'fas fa-users'
                ],
                'orders' => [
                    'count' => '3,159',
                    'label' => 'Orders',
                    'change' => '↓ 8% Since Last Month',
                    'icon' => 'fas fa-file-alt'
                ],
                'revenue' => [
                    'count' => '$6,159',
                    'label' => 'Revenue',
                    'change' => '↑ 18% Since Last Month',
                    'icon' => 'fas fa-dollar-sign'
                ]
            ],
            
            // Traffic sources
            'traffic_sources' => [
                ['domain' => 'google.com', 'percentage' => 65],
                ['domain' => 'facebook.com', 'percentage' => 53],
                ['domain' => 'instagram.com', 'percentage' => 60]
            ]
        ];
        
        return view('dashboard/landingadmin', $data);
    }
    
    public function profile()
    {
        $data = [
            'title' => 'Profile - Pengurusan Visa'
        ];
        return view('dashboard/profile', $data);
    }
    
    public function folders()
    {
        $data = [
            'title' => 'Folders - Pengurusan Visa'
        ];
        return view('dashboard/folders', $data);
    }
    
    public function notification()
    {
        $data = [
            'title' => 'Notification - Pengurusan Visa'
        ];
        return view('dashboard/notification', $data);
    }
    
    public function messages()
    {
        $data = [
            'title' => 'Messages - Pengurusan Visa'
        ];
        return view('dashboard/messages', $data);
    }
    
    public function help()
    {
        $data = [
            'title' => 'Help Center - Pengurusan Visa'
        ];
        return view('dashboard/help', $data);
    }
    
    public function settings()
    {
        $data = [
            'title' => 'Settings - Pengurusan Visa'
        ];
        return view('dashboard/settings', $data);
    }
    
    public function logout()
    {
        // Clear session
        session()->destroy();
        
        // Redirect to login page
        return redirect()->to('/login')->with('success', 'Anda berhasil logout');
    }
}