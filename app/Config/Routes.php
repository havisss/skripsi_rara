<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Hapus salah satu baris route '/' agar tidak bentrok. 
// Jika ingin halaman awal langsung ke Dashboard, gunakan yang ini:
$routes->get('/', 'Home::index');

// --- TAMBAHKAN KODE DI BAWAH INI ---

// Route utama Dashboard
$routes->get('/dashboard', 'Dashboard::index');

// Route untuk menu-menu di sidebar
$routes->get('/dashboard/managementorder', 'ManagementOrder::index');
$routes->get('/dashboard/data', 'Data::index');
$routes->get('/dashboard/managementservice', 'ManagementService::index');

// Route untuk Logout (sesuai link di sidebar view Anda)
$routes->get('/logout', 'Dashboard::logout');