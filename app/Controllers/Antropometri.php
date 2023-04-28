<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;
use App\Models\HasilukurModel;
use App\Models\KriteriaModel;
use App\Models\PeriodeModel;
use App\Models\PosyanduModel;

class Antropometri extends BaseController
{
    public function index()
    {
        $model = new PeriodeModel();
        $periode = $model->findAll();

        $data = [
            'title' => 'Antropometri',
            'periode' => $periode
        ];
        return view('antropometri/index-' . session('user')->user_type, $data);
    }

    public function posyandu($periode_id)
    {
        $model = new PosyanduModel();
        $posyandu = $model->findAll();

        $model = new PeriodeModel();
        $periode = $model->find($periode_id);
        $data = [
            'title' => 'Antropometri Periode ' . konversiBulan($periode->periode_bulan) . ' ' . $periode->periode_tahun,
            'posyandu' => $posyandu,
            'periode' => $periode
        ];

        return view('antropometri/posyandu', $data);
    }

    public function detailPetugas($periode_id)
    {
        $posyandu_id = session('petugas')->posyandu_id;
        $model = new PosyanduModel();
        $posyandu = $model->find($posyandu_id);

        $model = new PeriodeModel();
        $periode = $model->find($periode_id);

        $model = new HasilukurModel();
        $hasilukur = $model->findHasil($posyandu_id, $periode_id);
        // dd($hasilukur);
        $data = [
            'title' => 'Hasil Ukur',
            'posyandu' => $posyandu,
            'periode' => $periode,
            'hasilukur' => $hasilukur
        ];

        return view('antropometri/detail', $data);
    }
    public function detailAdmin($periode_id, $posyandu_id)
    {
        $model = new PosyanduModel();
        $posyandu = $model->find($posyandu_id);

        $model = new PeriodeModel();
        $periode = $model->find($periode_id);

        $model = new HasilukurModel();
        $hasilukur = $model->findHasil($posyandu_id, $periode_id);
        // dd($hasilukur);
        $data = [
            'title' => 'Hasil Ukur',
            'posyandu' => $posyandu,
            'periode' => $periode,
            'hasilukur' => $hasilukur
        ];
        return view('antropometri/detail', $data);
    }

    public function hitung()
    {
        $periode_id = $this->request->getPost('periode_id');
        $posyandu_id = $this->request->getPost('posyandu_id');
        //Dapatkan max semua kategori
        $model = new HasilukurModel();
        $maxc1 = $model->findMax('hasilukur_c1bobot', $posyandu_id, $periode_id);
        $maxc2 = $model->findMax('hasilukur_c2bobot', $posyandu_id, $periode_id);
        $maxc3 = $model->findMax('hasilukur_c3bobot', $posyandu_id, $periode_id);
        $maxc4 = $model->findMax('hasilukur_c4bobot', $posyandu_id, $periode_id);
        // dd($maxc1);
        //Dapatkan semua hasil ukur
        $hasilukur = $model->findHasil($posyandu_id, $periode_id);
        // dd($hasilukur);
        $kmodel = new KriteriaModel(); //Model Kriteria
        foreach ($hasilukur as $i => $hasil) {
            $skor = 0;
            $skor += $hasil->hasilukur_c1bobot / $maxc1 * $kmodel->findKriteria('c1')->kriteria_bobot;
            $skor += $hasil->hasilukur_c2bobot / $maxc2 * $kmodel->findKriteria('c2')->kriteria_bobot;
            $skor += $hasil->hasilukur_c3bobot / $maxc3 * $kmodel->findKriteria('c3')->kriteria_bobot;
            $skor += $hasil->hasilukur_c4bobot / $maxc4 * $kmodel->findKriteria('c4')->kriteria_bobot;

            $data['hasilukur_skor'] = $skor;
            $data['hasilukur_status'] = statusSAW($skor)->statusgizi_id;

            $model->where('hasilukur_id', $hasil->hasilukur_id);
            $model->update($hasil->hasilukur_id, $data);
        }

        return redirect()->to(previous_url())->with('success', 'Berhasil dihitung');
    }
    public function detailUkur($periode_id, $balita_id)
    {
        $model = new PeriodeModel();
        $periode = $model->find($periode_id);
        // dd($periode);
        $model = new HasilukurModel();
        $detail = $model->findDetail($balita_id, $periode->periode_id);

        $model = new BalitaModel();
        $balita = $model->findBalita($balita_id);

        $model = new PosyanduModel();
        $posyandu = $model->find($balita->posyandu_id);
        $data = [
            'title' => 'Detail Ukur Balita',
            'periode' => $periode,
            'balita' => $balita,
            'detail' => $detail,
            'posyandu' => $posyandu
        ];
        // dd($detail);

        return view('antropometri/detail-ukur', $data);
    }
}
