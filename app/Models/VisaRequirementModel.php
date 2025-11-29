<?php

namespace App\Models;

use CodeIgniter\Model;

class VisaRequirementModel extends Model
{
    protected $table = 'visa_requirements';
    protected $primaryKey = 'id';
    protected $allowedFields = ['visa_type_id', 'document_name', 'is_mandatory', 'file_type'];
}
