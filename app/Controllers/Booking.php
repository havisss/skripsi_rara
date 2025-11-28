<?php

namespace App\Controllers;

class Booking extends BaseController
{
    public function index()
    {
        // Menangkap parameter 'service' dari URL agar form otomatis memilih layanan yang diklik
        $data = [
            'selected_service' => $this->request->getGet('service') ?? 'voa'
        ];

        return view('booking_view', $data);
    }

    public function submit()
    {
        // Disini nanti logika validasi file (PDF/JPG max 2MB)
        // dan penyimpanan ke database akan dibuat.
        dd($this->request->getPost(), $this->request->getFiles());
    }
}
