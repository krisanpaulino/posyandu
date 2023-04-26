<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;
use App\Models\PeriodeModel;

class Periode extends BaseController
{
    public function index()
    {
        $model = new PeriodeModel();
        $periode = $model->findAll();
        $bulan = bulan();
        $data = [
            'title' => 'Periode',
            'periode' => $periode,
            'bulan' => $bulan
        ];
        return view('periode', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $model = new PeriodeModel();
        $data['periode_status'] = 'tutup';
        if ($model->insert($data)) {
            return redirect()->to(previous_url())->with('success', 'Periode berhasil ditambahkan');
        }
        return redirect()->to(previous_url())->with('danger', 'Periode gagal ditambahkan')
            ->with('errors', $model->errors())
            ->withInput();
    }
    public function delete()
    {
        $periode_id = $this->request->getPost('periode_id');
        $model = new PeriodeModel();
        $model->where('periode_id', $periode_id);
        $model->delete();
        return redirect()->to(previous_url())->with('success', 'Periode berhasil dihapus');
    }

    public function buka()
    {
        $periode_id = $this->request->getPost('periode_id');
        $model = new PeriodeModel();
        $model->where('periode_id', $periode_id);
        $model->update($periode_id, ['periode_status' => 'buka']);

        $model = new BalitaModel();
        $model->where('balita_umur <=', 60, true);
        $model->set('balita_umur', '`balita_umur` + 1', FALSE);
        $model->update();
        return redirect()->to(previous_url())->with('success', 'Periode berhasil dibuka!');
    }
    public function selesai()
    {
        $periode_id = $this->request->getPost('periode_id');
        $model = new PeriodeModel();
        $model->where('periode_id', $periode_id);
        $model->update($periode_id, ['periode_status' => 'selesai']);

        return redirect()->to(previous_url())->with('success', 'Periode berhasil ditutup!');
    }
}
