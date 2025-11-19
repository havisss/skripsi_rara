<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Hapus salah satu baris route '/' agar tidak bentrok. 
// Jika ingin halaman awal langsung ke Dashboard, gunakan yang ini:
$routes->get('/', 'Dashboard::index');

// --- TAMBAHKAN KODE DI BAWAH INI ---

// Route utama Dashboard
$routes->get('/dashboard', 'Dashboard::index');

// Route untuk menu-menu di sidebar
$routes->get('/dashboard/profile', 'Dashboard::profile');
$routes->get('/dashboard/folders', 'Dashboard::folders');
$routes->get('/dashboard/notification', 'Dashboard::notification');
$routes->get('/dashboard/messages', 'Dashboard::messages');
$routes->get('/dashboard/help', 'Dashboard::help');
$routes->get('/dashboard/settings', 'Dashboard::settings');

// Route untuk Logout (sesuai link di sidebar view Anda)
$routes->get('/logout', 'Dashboard::logout');