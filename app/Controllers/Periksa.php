<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;

class Periksa extends BaseController
{
    public function index()
    {
        $model = new BalitaModel();
        $posyandu_id = petugas()->posyandu_id;
        $belum_periksa = $model->belumPeriksa($posyandu_id);
        $sudah_periksa = $model->sudahPeriksa($posyandu_id);
        $data = [
            'title' => 'Daftar Balita',
            'belum_periksa' => $belum_periksa,
            'sudah_periksa' => $sudah_periksa,
        ];
        return view('periksa/index', $data);
    }
}
