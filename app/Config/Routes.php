<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Hapus salah satu baris route '/' agar tidak bentrok. 
// Jika ingin halaman awal langsung ke Dashboard, gunakan yang ini:
$routes->get('/', 'Home::index');



// Route untuk menampilkan halaman formulir
$routes->get('/booking', 'Booking::index');
// Route untuk memproses data form (Nantinya)
$routes->post('/booking/submit', 'Booking::submit');

$routes->get('/booking/success/(:segment)', 'Booking::success/$1');



$routes->group('admin', function($routes) {
    
    // 1. Tampilkan Halaman Login (GET)
    // Mengarah ke Controller LoginAdmin, fungsi index
    $routes->get('login', 'LoginAdmin::index');
    
    // 2. Proses Cek Password (POST)
    // Mengarah ke Controller LoginAdmin, fungsi auth
    $routes->post('auth', 'LoginAdmin::auth');
    
    // 3. Logout
    $routes->get('logout', 'LoginAdmin::logout');
    
});





// --- TAMBAHKAN KODE DI BAWAH INI ---

// Route utama Dashboard
$routes->get('/dashboard', 'Dashboard::index');

// Route untuk menu-menu di sidebar
$routes->get('/dashboard/managementorder', 'ManagementOrder::index');
$routes->get('/dashboard/data', 'Data::index');
$routes->get('/dashboard/managementservice', 'ManagementService::index');
$routes->get('/dashboard/managementorder/detail/(:num)', 'ManagementOrder::detail/$1');

// 2. Proses Approval / Rejection (Action tombol)
$routes->post('/dashboard/managementorder/process', 'ManagementOrder::process');

$routes->get('/dashboard/transaksi', 'transaksi::index');
// Route untuk Logout (sesuai link di sidebar view Anda)
$routes->get('/logout', 'Dashboard::logout');

// Proses Update Data Visa
$routes->post('/dashboard/managementservice/update', 'ManagementService::update');