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
    public function save()
    {
        $visaModel = new VisaTypeModel();

        // 1. Handle Upload Gambar
        $fileGambar = $this->request->getFile('image');
        $namaGambar = 'default.jpg'; // Default jika tidak upload

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            // Pindahkan ke folder public/uploads/visa
            $fileGambar->move(ROOTPATH . 'public/uploads/visa', $namaGambar);
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'code' => $this->request->getPost('code'),
            'price' => $this->request->getPost('price'),
            'duration_days' => $this->request->getPost('duration'),
            'description' => $this->request->getPost('description'),
            'regulation_content' => $this->request->getPost('regulation_content'), // Data Baru
            'image_url' => $namaGambar, // Data Baru
            'is_active' => 1
        ];

        $visaModel->insert($data);

        return redirect()->to('/dashboard/managementservice')->with('success', 'Layanan Visa berhasil ditambahkan!');
    }

    public function update()
    {
        $visaModel = new VisaTypeModel();
        $id = $this->request->getPost('id');

        // Ambil data lama untuk cek gambar lama
        $oldData = $visaModel->find($id);

        // 1. Handle Upload Gambar Baru
        $fileGambar = $this->request->getFile('image');
        $namaGambar = $oldData['image_url']; // Default pakai yang lama

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            // Generate nama baru
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move(ROOTPATH . 'public/uploads/visa', $namaGambar);

            // Hapus gambar lama jika bukan default.jpg
            if ($oldData['image_url'] != 'default.jpg' && file_exists(ROOTPATH . 'public/uploads/visa/' . $oldData['image_url'])) {
                unlink(ROOTPATH . 'public/uploads/visa/' . $oldData['image_url']);
            }
        }

        $data = [
            'price' => $this->request->getPost('price'),
            'duration_days' => $this->request->getPost('duration'),
            'description' => $this->request->getPost('description'),
            'regulation_content' => $this->request->getPost('regulation_content'), // Update konten
            'image_url' => $namaGambar, // Update gambar
            'is_active' => $this->request->getPost('is_active') ? 1 : 0
        ];

        $visaModel->update($id, $data);

        return redirect()->to('/dashboard/managementservice')->with('success', 'Data Visa berhasil diperbarui!');
    }

    public function delete($id)
    {
        $visaModel = new VisaTypeModel();

        // Hapus data berdasarkan ID
        $visaModel->delete($id);

        return redirect()->to('/dashboard/managementservice')->with('success', 'Layanan Visa berhasil dihapus.');
    }
    // --- FUNGSI TAMBAH PERSYARATAN ---
    public function saveRequirement()
    {
        $reqModel = new VisaRequirementModel();

        $data = [
            'visa_type_id' => $this->request->getPost('visa_type_id'),
            'document_name' => $this->request->getPost('document_name'),
            'file_type' => $this->request->getPost('file_type'),
            // Checkbox: jika dicentang nilainya 1, jika tidak 0
            'is_mandatory' => $this->request->getPost('is_mandatory') ? 1 : 0
        ];

        $reqModel->insert($data);
        return redirect()->to('/dashboard/managementservice')->with('success', 'Persyaratan baru berhasil ditambahkan.');
    }

    // --- FUNGSI UPDATE PERSYARATAN ---
    public function updateRequirement()
    {
        $reqModel = new VisaRequirementModel();
        $id = $this->request->getPost('id');

        $data = [
            'visa_type_id' => $this->request->getPost('visa_type_id'),
            'document_name' => $this->request->getPost('document_name'),
            'file_type' => $this->request->getPost('file_type'),
            'is_mandatory' => $this->request->getPost('is_mandatory') ? 1 : 0
        ];

        $reqModel->update($id, $data);
        return redirect()->to('/dashboard/managementservice')->with('success', 'Persyaratan berhasil diperbarui.');
    }

    // --- FUNGSI HAPUS PERSYARATAN ---
    public function deleteRequirement($id)
    {
        $reqModel = new VisaRequirementModel();
        $reqModel->delete($id);
        return redirect()->to('/dashboard/managementservice')->with('success', 'Persyaratan berhasil dihapus.');
    }
}
