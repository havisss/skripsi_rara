<?php

namespace App\Controllers;

use App\Models\VisaTypeModel;
use App\Models\VisaRequirementModel; // 1. Tambahkan ini

class Persyaratan extends BaseController
{
    public function index()
    {
        $visaModel = new VisaTypeModel();

        $data = [
            'visas' => $visaModel->where('is_active', 1)->findAll(),
            'title' => 'Informasi & Regulasi Visa'
        ];

        return view('landing/persyaratan', $data);
    }

    public function detail($id)
    {
        $visaModel = new VisaTypeModel();
        $reqModel = new VisaRequirementModel(); // 2. Load Model Syarat

        $visa = $visaModel->find($id);

        if (!$visa) {
            return redirect()->to('/persyaratan');
        }

        // 3. Ambil persyaratan dokumen berdasarkan ID visa
        $requirements = $reqModel->where('visa_type_id', $id)->findAll();

        $data = [
            'visa' => $visa,
            'requirements' => $requirements, // 4. Kirim ke View
            'title' => $visa['name'] . ' - Detail Regulasi'
        ];

        return view('landing/persyaratan_detail', $data);
    }
}
