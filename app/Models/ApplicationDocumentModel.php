<?php

namespace App\Models;

use CodeIgniter\Model;

class ApplicationDocumentModel extends Model
{
    protected $table = 'application_documents';
    protected $primaryKey = 'id';
    protected $allowedFields = ['application_id', 'requirement_id', 'file_path', 'verification_status'];

    // --- UBAH JADI FALSE ---
    protected $useTimestamps = false;
}
