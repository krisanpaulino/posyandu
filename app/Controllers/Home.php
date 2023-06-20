<?php

namespace App\Controllers;

use App\Models\BalitaModel;
use App\Models\HasilukurModel;
use App\Models\PeriodeModel;

class Home extends BaseController
{
    public function index()
    {
        // if (session()->has('user')) {
        //     return redirect()->to(session()->get('user')->user_type);
        // }

        $data['title'] = 'Posyandu';


        return view('frontend/dashboard', $data);
        // return redirect('auth');
    }
    public function admin()
    {
        $model = new PeriodeModel();
        $periode = $model->findBuka();
        if (empty($periode)) {
            $model->where('periode_status', 'selesai');
            $model->orderBy('periode_id', 'desc');
            $periode = $model->first();
        }

        $model = new BalitaModel();
        $jumlah_balita = $model->findJumlahBalita();
        $model = new HasilukurModel();
        $status_gizi = $model->findJumlah($periode->periode_id);
        $data['jumlah_balita'] = $jumlah_balita;
        $data['periode'] = $periode;
        $data['status_gizi'] = $status_gizi;
        $data['title'] = 'Dashboard';

        return view('dashboards/admin', $data);
    }
    public function petugas()
    {
        helper('user');

        $model = new PeriodeModel();
        $periode = $model->findBuka();
        if (empty($periode)) {
            $model->where('periode_status', 'selesai');
            $model->orderBy('periode_id', 'desc');
            $periode = $model->first();
        }

        $model = new BalitaModel();
        $jumlah_balita = $model->findJumlahBalita(session('petugas')->posyandu_id);
        $model = new HasilukurModel();
        $status_gizi = $model->findJumlah($periode->periode_id, session('petugas')->posyandu_id);
        // dd($status_gizi);
        $data['jumlah_balita'] = $jumlah_balita;
        $data['periode'] = $periode;
        $data['status_gizi'] = $status_gizi;
        $data['title'] = 'Dashboard';

        return view('dashboards/petugas', $data);
    }

    public function orangtua()
    {
        $data['title'] = 'Posyandu';
        return view('dashboard/umum', $data);
    }
}
