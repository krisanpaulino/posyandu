<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AmbangbatasModel;
use App\Models\KriteriaModel;

class Master extends BaseController
{
    public function ambangbatas()
    {
        $model = new AmbangbatasModel();
        $ambangbatas = $model->findAll();

        $data = [
            'title' => 'Master Ambang Batas',
            'ambangbatas' => $ambangbatas
        ];

        return view('master/ambang-batas', $data);
    }
    public function store_ambangbatas()
    {
        $data = $this->request->getPost();
        $model = new AmbangbatasModel();
        if ($model->insert($data)) {
            return redirect()->to(previous_url())
                ->with('success', 'Data berhasil disimpan!');
        }
        return redirect()->to(previous_url())
            ->with('danger', 'Data gagal disimpan!')
            ->with('errors', $model->errors())
            ->withInput();
    }

    public function delete_ambangbatas()
    {
        $ambangbatas_id = $this->request->getPost('ambangbatas_id');
        $model = new AmbangbatasModel();
        $model->where('ambangbatas_id', $ambangbatas_id);
        $model->delete($ambangbatas_id);

        return redirect()->to(previous_url())
            ->with('success', 'Data berhasil dihapus!');
    }

    public function update_ambangbatas()
    {
        $ambangbatas_id = $this->request->getPost('ambangbatas_id');
        $data = $this->request->getPost();
        $model = new AmbangbatasModel();
        $model->where('ambangbatas_id', $ambangbatas_id);
        $model->update($ambangbatas_id, $data);

        return redirect()->to(previous_url())
            ->with('success', 'Data berhasil diupdate!');
    }

    public function kriteria()
    {
        $model = new KriteriaModel();
        $kriteria = $model->findAll();

        $data = [
            'title' => 'Kriteria',
            'kriteria' => $kriteria
        ];

        return view('master/kriteria', $data);
    }

    public function store_kriteria()
    {
        $data = $this->request->getPost();
        $model = new KriteriaModel();

        if ($model->insert($data)) {
            return redirect()->to(previous_url())
                ->with('success', 'Data berhasil disimpan!');
        }
        return redirect()->to(previous_url())
            ->with('danger', 'Data gagal disimpan!')
            ->with('errors', $model->errors())
            ->withInput();
    }

    public function udpate_kriteria()
    {
        $kriteria_id = $this->request->getPost('kriteria_id');
        $data = $this->request->getPost();
        $model = new KriteriaModel();
        $model->where('kriteria_id', $kriteria_id);
        $model->udpate($kriteria_id, $data);

        return redirect()->to(previous_url())
            ->with('success', 'Data berhasil diupdate!');
    }

    public function delete_kriteria()
    {
        $kriteria_id = $this->request->getPost('kriteria_id');
        $model = new KriteriaModel();
        $model->where('kriteria_id', $kriteria_id);
        $model->delete($kriteria_id);

        return redirect()->to(previous_url())
            ->with('success', 'Data berhasil dihapus!');
    }
}
