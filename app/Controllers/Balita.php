<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;
use App\Models\PosyanduModel;

class Balita extends BaseController
{
    public function index()
    {
        $model = new BalitaModel();
        if (session('user')->user_type == 'admin') {
            $balita = $model->findBalita();
            $model = new PosyanduModel();
            $posyandu = $model->findAll();
            $data['posyandu'] = $posyandu;
        } else {
            $balita = $model->byPosyandu(session('petugas')->posyandu_id);
        }
        $data['title'] = 'Data Balita';
        $data['balita'] = $balita;

        return view('balita/index', $data);
    }
    public function store()
    {
        $data = $this->request->getPost();
        $model = new BalitaModel();
        $data['balita_tgllahir'] = date('Y-m-d', strtotime($data['balita_tgllahir']));
        if (session('user')->user_type == 'petugas')
            $data['posyandu_id'] = session('petugas')->posyandu_id;
        if ($model->insert($data)) {
            return redirect()->to(previous_url())
                ->with('success', 'Data balita berhasil ditambahkan!');
        }

        return redirect()->to(previous_url())
            ->with('danger', 'Periksa kembali data balita')
            ->with('errors', $model->errors())
            ->withInput();
    }

    public function detail($balita_id)
    {
        $model = new BalitaModel();
        $balita = $model->find($balita_id);
        $data = [
            'title' => 'Detail Balita',
            'balita' => $balita
        ];
        if (session('user')->user_type == 'admin') {
            $model = new PosyanduModel();
            $posyandu = $model->findAll();
            $data['posyandu'] = $posyandu;
        }



        return view('balita/detail', $data);
    }

    public function update()
    {
        $data = $this->request->getPost();
        $balita_id = $this->request->getPost('balita_id');

        $model = new BalitaModel();
        $model->where('balita_id', $balita_id);
        if ($model->update($balita_id, $data)) {
            return redirect()->to(previous_url())->with('success', 'Data berhasil diupdate');
        }
        return redirect()->to(previous_url())
            ->with('danger', 'Gagal diubah')
            ->with('errors', $model->errors())
            ->withInput();
    }
    public function delete()
    {
        $balita_id = $this->request->getPost('balita_id');
        $model = new BalitaModel();
        $model->where('balita_id', $balita_id);
        $model->delete();
        return redirect()->to(previous_url())->with('success', 'Data dihapus!');
    }
}
