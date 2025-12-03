<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginAdminModel extends Model
{
    protected $table            = 'admins'; // Terhubung ke tabel admins
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'email', 'password_hash',];
    protected $useTimestamps    = true; // Mengaktifkan created_at otomatis
}