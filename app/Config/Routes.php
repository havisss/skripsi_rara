<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Hapus salah satu baris route '/' agar tidak bentrok. 
// Jika ingin halaman awal langsung ke Dashboard, gunakan yang ini:
$routes->get('/', 'Home::index');

// Route untuk Halaman Persyaratan & Artikel
$routes->get('/persyaratan', 'Persyaratan::index');
$routes->get('/persyaratan/detail/(:num)', 'Persyaratan::detail/$1');


$routes->group('admin', function ($routes) {

    // 1. Tampilkan Halaman Login (GET)
    // Mengarah ke Controller LoginAdmin, fungsi index
    $routes->get('login', 'LoginAdmin::index');

    // 2. Proses Cek Password (POST)
    // Mengarah ke Controller LoginAdmin, fungsi auth
    $routes->post('auth', 'LoginAdmin::auth');

    // 3. Logout
    $routes->get('logout', 'LoginAdmin::logout');
});

$routes->group('dashboard', ['filter' => 'adminAuth'], function ($routes) {

    // Semua route di dalam sini otomatis dicek login-nya

    $routes->get('/', 'Dashboard::index'); // Mengakses /dashboard

    $routes->get('managementorder', 'ManagementOrder::index');
    $routes->get('managementorder/detail/(:num)', 'ManagementOrder::detail/$1');
    $routes->post('managementorder/process', 'ManagementOrder::process');
    $routes->get('data', 'Data::index');
    $routes->get('managementservice', 'ManagementService::index');
    $routes->post('managementservice/update', 'ManagementService::update');
    $routes->post('managementorder/process', 'ManagementOrder::process');
    $routes->get('transaksi', 'Transaksi::index');
    $routes->post('transaksi/confirm', 'Transaksi::confirm'); // Untuk tombol konfirmasi
    $routes->post('/managementservice/update', 'ManagementService::update');

    // --- TAMBAHAN BARU ---
    // Simpan Visa Baru
    $routes->post('managementservice/save', 'ManagementService::save');
    // Hapus Visa
    $routes->get('managementservice/delete/(:num)', 'ManagementService::delete/$1');
    $routes->post('managementorder/create', 'ManagementOrder::create'); // Simpan Order Manual
    $routes->get('managementorder/export', 'ManagementOrder::export');  // Download CSV
    $routes->post('data/add', 'Data::add');      // Proses Simpan Klien Baru
    $routes->get('data/export', 'Data::export');
    $routes->post('managementservice/req/save', 'ManagementService::saveRequirement');
    $routes->post('managementservice/req/update', 'ManagementService::updateRequirement');
    $routes->get('managementservice/req/delete/(:num)', 'ManagementService::deleteRequirement/$1');
});

$routes->get('/logout', 'LoginAdmin::logout');


$routes->get('/login', 'Auth::index');           // Menampilkan halaman login
$routes->post('/login/auth', 'Auth::loginProcess'); // Proses validasi login
$routes->get('/register', 'Auth::register');            // Halaman form daftar
$routes->post('/register/process', 'Auth::registerProcess');
// Update route logout agar mengarah ke Controller Auth
$routes->get('/logout', 'Auth::logout');



$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/booking', 'Booking::index');
    // Route untuk memproses data form (Nantinya)
    $routes->post('/booking/submit', 'Booking::submit');
    $routes->get('/booking/success/(:segment)', 'Booking::success/$1');
});






$routes->group('admin', function ($routes) {

    // 1. Tampilkan Halaman Login (GET)
    // Mengarah ke Controller LoginAdmin, fungsi index
    $routes->get('login', 'LoginAdmin::index');

    // 2. Proses Cek Password (POST)
    // Mengarah ke Controller LoginAdmin, fungsi auth
    $routes->post('auth', 'LoginAdmin::auth');

    // 3. Logout
    $routes->get('logout', 'LoginAdmin::logout');
});
