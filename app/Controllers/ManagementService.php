<?php

namespace App\Controllers;

use App\Models\VisaTypeModel;
use App\Models\VisaRequirementModel;

class ManagementService extends BaseController
{
    public function index()
    {
        helper('url');
        $visaModel = new VisaTypeModel();
        $reqModel = new VisaRequirementModel();

        // 1. Ambil Semua Jenis Visa
        $visas = $visaModel->findAll();

        // 2. Ambil Semua Requirement (Opsional, untuk tab requirements)
        // Kita join dengan visa_types agar tahu requirement ini milik visa apa
        $requirements = $reqModel->select('visa_requirements.*, visa_types.name as visa_name')
            ->join('visa_types', 'visa_types.id = visa_requirements.visa_type_id')
            ->orderBy('visa_requirements.visa_type_id', 'ASC')
            ->findAll();

        $data = [
            'visas' => $visas,
            'requirements' => $requirements
        ];

        return view('dashboard/managementservice', $data);
    }
    public function update()
    {
        $visaModel = new VisaTypeModel();

        $id = $this->request->getPost('id');

        $data = [
            'price' => $this->request->getPost('price'),
            'duration_days' => $this->request->getPost('duration'),
            'description' => $this->request->getPost('description'),
            // Checkbox tidak mengirim value jika unchecked, jadi kita pakai trik ini:
            'is_active' => $this->request->getPost('is_active') ? 1 : 0
        ];

        $visaModel->update($id, $data);

        return redirect()->to('/dashboard/managementservice')->with('success', 'Data Visa berhasil diperbarui!');
    }
}
