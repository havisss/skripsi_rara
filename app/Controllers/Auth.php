<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        // Jika sudah login, lempar ke dashboard atau booking sesuai role (default logic)
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }

        // --- [MODIFIKASI JONO START] ---
        // Menangkap parameter 'tujuan' dari URL (misal: /login?tujuan=landing)
        // Ini digunakan agar setelah login, user dikembalikan ke halaman depan untuk buka profil
        if ($this->request->getGet('tujuan')) {
            session()->set('redirect_url', $this->request->getGet('tujuan'));
        }
        // --- [MODIFIKASI JONO END] ---

        return view('auth/login');
    }

    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();

        // Ambil input
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        // Cari user berdasarkan email
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password_hash'];

            // Verifikasi password (hash vs plain)
            if (password_verify($password, $pass)) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['full_name'],
                    'email'    => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);

                // --- [MODIFIKASI JONO START] ---
                // Cek apakah ada instruksi redirect khusus di session?
                $redirectUrl = session()->get('redirect_url');

                if ($redirectUrl == 'landing') {
                    // Hapus session agar tidak tersimpan terus menerus
                    session()->remove('redirect_url');
                    
                    // Redirect ke Landing Page (Home) agar Sidebar Profil bisa dibuka
                    return redirect()->to('/'); 
                } else {
                    // Default behavior (Sesuai kode teman Bos: Lempar ke Booking)
                    return redirect()->to('/booking');
                }
                // --- [MODIFIKASI JONO END] ---

            } else {
                $session->setFlashdata('msg', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email tidak ditemukan.');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        // Jika sudah login, tidak perlu daftar lagi
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/booking');
        }

        // Load library validasi agar bisa menampilkan error di view
        helper(['form']);
        return view('auth/register');
    }

    public function registerProcess()
    {
        $rules = [
            'full_name'     => 'required|min_length[3]|max_length[100]',
            'email'         => 'required|min_length[6]|max_length[100]|valid_email|is_unique[users.email]',
            'phone_number'  => 'required|min_length[10]|max_length[20]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'full_name'     => $this->request->getVar('full_name'),
                'email'         => $this->request->getVar('email'),
                'phone_number'  => $this->request->getVar('phone_number'),
                // Hash password sebelum disimpan
                'password_hash' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

                // Field optional
                'nationality'   => $this->request->getVar('nationality'),
                'passport_number' => $this->request->getVar('passport_number'),
            ];

            $model->save($data);

            // Redirect ke login dengan pesan sukses
            session()->setFlashdata('msg', 'Registrasi Berhasil! Silakan Login.');
            return redirect()->to('/login');
        } else {
            // Jika validasi gagal, kembalikan ke form dengan pesan error
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}