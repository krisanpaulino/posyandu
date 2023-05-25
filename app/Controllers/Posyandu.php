<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetugasModel;
use App\Models\PosyanduModel;

class Posyandu extends BaseController
{
    public function index()
    {
        $model = new PosyanduModel();
        $posyandu = $model->findAll();
        $data = [
            'title' => 'Posyandu',
            'posyandu' => $posyandu
        ];

        return view('posyandu/index', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $model = new PosyanduModel();
        if ($model->insert($data)) {
            return redirect()->to(previous_url())->with('success', 'Data Posyandu Berhasil Ditambahkan');
        }
        return redirect()->to(previous_url())->with('danger', 'Gagal!')->with('errors', $model->errors())->withInput();
    }

    public function update()
    {
        $posyandu_id = $this->request->getPost('posyandu_id');
        $data['posyandu_nama'] =  $this->request->getPost('posyandu_nama');

        $model = new PosyanduModel();
        $model->where('posyandu_id', $posyandu_id);
        $model->update($posyandu_id, $data);

        return redirect()->to(previous_url())->with('success', 'Data Posyandu Berhasil Diupdate');
    }

    public function detail($posyandu_id)
    {
        $model = new PosyanduModel();
        $posyandu = $model->find($posyandu_id);

        $model = new PetugasModel();
        $petugas = $model->findByPos($posyandu_id);

        $data = [
            'title' => $posyandu->posyandu_nama,
            'posyandu' => $posyandu,
            'petugas' => $petugas
        ];

        return view('posyandu/detail', $data);
    }

    public function hapus()
    {
        $posyandu_id = $this->request->getPost('posyandu_id');
        $model = new PosyanduModel();
        $model->where('posyandu_id', $posyandu_id);
        $model->delete($posyandu_id);
        return redirect()->to(previous_url())->with('success', 'Data Posyandu Berhasil Dihapus');
    }
}
