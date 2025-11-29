<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationModel extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'id';
    protected $allowedFields = ['invoice_number', 'user_id', 'visa_type_id', 'status', 'payment_status', 'submission_date'];

    // --- UBAH JADI FALSE ---
    // Biarkan database MySQL yang mengisi jam otomatis, CI tidak perlu ikut campur.
    protected $useTimestamps = false;
}
