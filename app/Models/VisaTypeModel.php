<?php

namespace App\Models;

use CodeIgniter\Model;

class VisaTypeModel extends Model
{
    protected $table = 'visa_types';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'code', 'price', 'duration_days', 'description', 'is_active'];
}
