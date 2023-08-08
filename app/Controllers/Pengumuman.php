<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengumumanModel;

class Pengumuman extends BaseController
{
    public function index()
    {
        $posyandu_id = petugas()->posyandu_id;
        $model = new PengumumanModel();
        $pengumuman = $model->findPengumuman($posyandu_id);
        $data = [
            'title' => 'Pengumuman',
            'pengumuman' => $pengumuman
        ];
        return view('pengumuman/index', $data);
    }
    public function tambah()
    {
        $pengumuman = new PengumumanModel();
        $data = [
            'pengumuman' => $pengumuman,
            'title' => 'Tambah Pengumuman',
            'action' => 'store'
        ];
        return view('pengumuman/form', $data);
    }
    public function store()
    {
        $posyandu_id = petugas()->posyandu_id;
        $data = $this->request->getPost();
        $data['posyandu_id'] = $posyandu_id;
        $data['pengumuman_tgl'] = date('Y-m-d H:i:s');
        $model = new PengumumanModel();
        if ($model->insert($data))
            return redirect()->to('petugas/pengumuman')->with('success', 'Pengumuman berhasil dibuat!!');
        return redirect()->to(previous_url())->with('errors', $model->errors())->with('danger', 'Gagal')->withInput();
    }
    public function edit($pengumuman_id)
    {
        $model = new PengumumanModel();
        $pengumuman = $model->find($pengumuman_id);
        $data = [
            'title' => 'Edit Pengumuman',
            'pengumuman' => $pengumuman,
            'action' => 'update'

        ];
        return view('pengumuman/form', $data);
    }

    public function update()
    {
        $pengumuman_id = $this->request->getPost('pengumuman_id');
        $data = $this->request->getPost();
        $model = new PengumumanModel();
        $model->update($pengumuman_id, $data);
        return redirect()->to('petugas/pengumuman')->with('success', 'Pengumuman berhasil diupdate!!');
    }

    public function delete()
    {
        $pengumuman_id = $this->request->getPost('pengumuman_id');
        $model = new PengumumanModel();
        $model->delete($pengumuman_id, true);
        return redirect()->to('petugas/pengumuman')->with('success', 'Pengumuman berhasil dihapus!!');
    }
}
