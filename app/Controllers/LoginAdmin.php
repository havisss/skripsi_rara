<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginAdminModel; // Panggil model yang baru kita buat

class LoginAdmin extends BaseController
{
    public function index()
    {
        // 1. Cek apakah sudah login? Kalau sudah, tendang ke dashboard
        if (session()->get('is_admin_logged_in')) {
            return redirect()->to('/dashboard');
        }

        // 2. Tampilkan Halaman Login (sesuai lokasi file view kamu)
        return view('dashboard/loginadmin');
    }

    public function auth()
    {
        $session = session();
        $model   = new LoginAdminModel();

        // 1. Ambil data dari Form HTML
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // 2. Cari data admin berdasarkan Email
        $data = $model->where('email', $email)->first();

        if ($data) {
            // 3. Jika Email ditemukan, Cek Password-nya
            $pass = $data['password_hash'];
            
            // Gunakan password_verify untuk mengecek hash
            if (password_verify($password, $pass)) {
                
                // 4. PASSWORD BENAR: Buat Session (Tiket Masuk)
                $sessLogin = [
                    'is_admin_logged_in' => true,
                    'admin_id'           => $data['id'],
                    'admin_name'         => $data['name'],
                    'admin_email'        => $data['email'],
                ];
                $session->set($sessLogin);

                // Kirim pesan sukses & masuk dashboard
                return redirect()->to('/dashboard');
            
            } else {
                // Password Salah
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to('/admin/login');
            }
        } else {
            // Email Tidak Ditemukan
            $session->setFlashdata('error', 'Email tidak terdaftar.');
            return redirect()->to('/admin/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); // Hancurkan tiket masuk
        return redirect()->to('/admin/login');
    }
}