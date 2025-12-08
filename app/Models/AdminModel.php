<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admins'; // Nama tabel di database
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; // Kita gunakan array agar mudah
    protected $allowedFields    = ['name', 'email', 'password_hash', 'role'];

    // Dates
    protected $useTimestamps = false;
}