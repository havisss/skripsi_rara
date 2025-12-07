<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationModel extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'id';
    
    // --- TAMBAHKAN 'visa_file_path' DAN 'admin_note' DI SINI ---
    protected $allowedFields = [
        'invoice_number', 
        'user_id', 
        'visa_type_id', 
        'status', 
        'payment_status', 
        'submission_date',
        'approval_date',     // Tambahan
        'expiry_date',       // Tambahan
        'visa_file_path',    // <--- INI KUNCI UTAMANYA BOS
        'admin_note'         // <--- INI JUGA
    ];

    protected $useTimestamps = false;
}