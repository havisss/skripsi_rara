<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields    = [
        'full_name',
        'email',
        'password_hash',
        'phone_number',
        'nationality',
        'passport_number'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    /**
     * FUNGSI SPESIAL: Ambil User + Info Visa Terakhirnya
     * Kita menggunakan "Subquery" (Query di dalam Query) untuk mengintip data terakhir
     */
    public function getClientsWithVisaStatus()
    {
        return $this->select('users.*') // Ambil semua data dasar user

            // 1. Hitung berapa kali dia pernah order
            ->select('(SELECT COUNT(*) FROM applications WHERE applications.user_id = users.id) as total_orders')

            // 2. Ambil tanggal expired dari order PALING BARU (Latest)
            ->select('(SELECT expiry_date FROM applications WHERE applications.user_id = users.id ORDER BY created_at DESC LIMIT 1) as last_expiry')

            // 3. Ambil status proses dari order PALING BARU
            ->select('(SELECT status FROM applications WHERE applications.user_id = users.id ORDER BY created_at DESC LIMIT 1) as last_status')

            // 4. Ambil Kode Visa (misal: B211A) dari order PALING BARU
            // Ini agak panjang karena harus JOIN ke tabel visa_types di dalam subquery
            ->select('(SELECT visa_types.code FROM applications 
                       JOIN visa_types ON visa_types.id = applications.visa_type_id 
                       WHERE applications.user_id = users.id 
                       ORDER BY applications.created_at DESC LIMIT 1) as last_visa_code')

            // Urutkan user dari yang paling baru mendaftar
            ->orderBy('created_at', 'DESC')

            ->findAll();
    }
}
