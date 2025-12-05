<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route Halaman Depan
$routes->get('/', 'Home::index');


// GROUP: ADMIN ROUTES

// Route untuk Halaman Persyaratan & Artikel
$routes->get('/persyaratan', 'Persyaratan::index');
$routes->get('/persyaratan/detail/(:num)', 'Persyaratan::detail/$1');


$routes->group('admin', function ($routes) {
    // 1. Tampilkan Halaman Login (GET)
    $routes->get('login', 'LoginAdmin::index');
    // 2. Proses Cek Password (POST)
    $routes->post('auth', 'LoginAdmin::auth');
    // 3. Logout
    $routes->get('logout', 'LoginAdmin::logout');
});

// GROUP: DASHBOARD (ADMIN AUTH REQUIRED)
$routes->group('dashboard', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('/', 'Dashboard::index'); // Mengakses /dashboard

    // Management Order
    $routes->get('managementorder', 'ManagementOrder::index');
    $routes->get('managementorder/detail/(:num)', 'ManagementOrder::detail/$1');
    $routes->post('managementorder/process', 'ManagementOrder::process');
    $routes->post('managementorder/create', 'ManagementOrder::create'); // Simpan Order Manual
    $routes->get('managementorder/export', 'ManagementOrder::export');  // Download CSV

    // Data Klien
    $routes->get('data', 'Data::index');
    $routes->post('data/add', 'Data::add');      // Proses Simpan Klien Baru
    $routes->get('data/export', 'Data::export');

    $routes->post('managementservice/req/save', 'ManagementService::saveRequirement');
    $routes->post('managementservice/req/update', 'ManagementService::updateRequirement');
    $routes->get('managementservice/req/delete/(:num)', 'ManagementService::deleteRequirement/$1');


    // Management Service (Visa)
    $routes->get('managementservice', 'ManagementService::index');
    $routes->post('managementservice/update', 'ManagementService::update');
    $routes->post('managementservice/save', 'ManagementService::save');
    $routes->get('managementservice/delete/(:num)', 'ManagementService::delete/$1');

    // Transaksi
    $routes->get('transaksi', 'Transaksi::index');
    $routes->post('transaksi/confirm', 'Transaksi::confirm');
});

// AUTH PUBLIC ROUTES
$routes->get('/login', 'Auth::index');           // Menampilkan halaman login
$routes->post('/login/auth', 'Auth::loginProcess'); // Proses validasi login
$routes->get('/register', 'Auth::register');            // Halaman form daftar
$routes->post('/register/process', 'Auth::registerProcess');
$routes->get('/logout', 'Auth::logout');


$routes->group('', ['filter' => 'auth'], function ($routes) {
    // ... route booking yang lama ...
    $routes->get('/booking', 'Booking::index');
    $routes->post('/booking/submit', 'Booking::submit');
    $routes->get('/booking/success/(:segment)', 'Booking::success/$1');

    // Route Sidebar & Profil
    $routes->get('/myprofile/fetch', 'MyProfile::fetchSidebar');

    // [BARU] Route untuk Proses Update Profil
    $routes->post('/myprofile/update', 'MyProfile::update');
});
