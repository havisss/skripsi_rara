<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model // <--- Nama Class harus sama dengan Nama File
{
    // Kita kasih tau CI4: "Halo OrderModel, tolong urus tabel 'applications' ya"
    protected $table            = 'applications'; 
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields    = [
        'invoice_number', 
        'user_id', 
        'visa_type_id', 
        'status', 
        'payment_status', 
        'submission_date', 
        'approval_date', 
        'expiry_date'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; 

    // Fungsi untuk mengambil data Order lengkap dengan nama user & visanya
    public function getOrdersLengkap()
    {
        return $this->select('
                applications.*, 
                users.full_name, 
                users.email, 
                users.id as client_id,
                visa_types.name as visa_name, 
                visa_types.code as visa_code,
                visa_types.price as visa_price,
            ')
            // Gabungkan dengan tabel Users untuk dapat nama orangnya
            ->join('users', 'users.id = applications.user_id', 'left')
            
            // Gabungkan dengan tabel Visa Types untuk dapat nama visanya
            ->join('visa_types', 'visa_types.id = applications.visa_type_id', 'left')
            
            // Urutkan order terbaru di atas
            ->orderBy('applications.created_at', 'DESC')
            
            ->findAll();

        
    }
}