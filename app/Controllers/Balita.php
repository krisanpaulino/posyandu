<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;

class Balita extends BaseController
{
    public function index()
    {
        $model = new BalitaModel();
        if (session('user')->user_type == 'admin') {
            $bayi = $model->findBalita();
        } else {
            $bayi = $model->byPosyandu(session('petugas')->posyandu_id);
        }
        $data = [
            'title' => 'Data Bayi',
            'bayi' => $bayi
        ];

        return view('bayi/index', $data);
    }
    public function store()
    {
        $data = $this->request->getPost();
        $model = new BalitaModel();

        if ($model->insert($data)) {
            return redirect()->to(previous_url())
                ->with('success', 'Data balita berhasil ditambahkan!');
        }

        return redirect()->to(previous_url())
            ->with('danger', 'Periksa kembali data balita')
            ->with('errors', $model->errors())
            ->withInput();
    }
}
