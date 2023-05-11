<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;
use App\Models\HasilukurModel;
use App\Models\MedianbbModel;
use App\Models\MedianbbperpbModel;
use App\Models\MedianbbpertbModel;
use App\Models\MedianimtModel;
use App\Models\MedianpbModel;
use App\Models\MediantbModel;
use App\Models\PeriodeModel;

class Periksa extends BaseController
{
    public function index()
    {
        $model = new PeriodeModel();
        $periode = $model->findBuka();

        if ($periode != null) {
            $model = new BalitaModel();
            $posyandu_id = petugas()->posyandu_id;

            $belum_periksa = $model->belumPeriksa($periode->periode_id, $posyandu_id);
            $sudah_periksa = $model->sudahPeriksa($periode->periode_id, $posyandu_id);
            $data = [
                'title' => 'Daftar Balita',
                'belum_periksa' => $belum_periksa,
                'sudah_periksa' => $sudah_periksa,
            ];
            return view('periksa/index', $data);
        }
        $data = [
            'title' => '',
        ];
        return view('periksa/no-periode', $data);
    }

    public function periksa($balita_id)
    {
        $model = new BalitaModel();
        $balita = $model->find($balita_id);

        $model = new PeriodeModel();
        $periode = $model->findBuka();

        $data = [
            'title' => 'Periksa Balita',
            'balita' => $balita,
            'periode' => $periode
        ];

        return view('periksa/form-ukur', $data);
    }

    public function store()
    {
        $model = new PeriodeModel();
        $periode = $model->findBuka();

        //Dapatkan Data Balita
        $model = new BalitaModel();
        $balita = $model->find($this->request->getPost('balita_id'));
        // dd($balita);
        $jk = strtolower($balita->balita_jk);
        //Dapatkan Hasil Ukur dari Form
        $data = $this->request->getPost();
        $data['periode_id'] = $periode->periode_id;
        $data['hasilukur_umur'] = $balita->umur;
        $data['hasilukur_tgl'] = date('Y-m-d');

        //Hitung BMI
        $bmi = $data['hasilukur_bb'] / pow(($data['hasilukur_pbtb'] / 100), 2);
        $data['hasilukur_bmi'] = $bmi;

        /* Hitung Z-Score BB/U */
        //Ambil Median BB/U
        $model = new MedianbbModel();
        $medianbb = $model->findMedian($balita->balita_umur);

        //Hitung z-score
        if ($data['hasilukur_bb'] < $medianbb['medianbb_' . $jk]) {
            $skor = ($data['hasilukur_bb'] - $medianbb['medianbb_' . $jk]) / ($medianbb['medianbb_' . $jk] - $medianbb['medianbb_min1' . $jk]);
        } else {
            $skor = ($data['hasilukur_bb'] - $medianbb['medianbb_' . $jk]) / ($medianbb['medianbb_plus1' . $jk] - $medianbb['medianbb_' . $jk]);
        }
        $data['hasilukur_c1'] = $skor;
        //DAPATKAN BOBOT
        $data['hasilukur_c1bobot'] = getambang('BB/U', $data['hasilukur_c1'])->ambangbatas_bobotkriteria;

        /* Hitung Z-Score TB/U */
        if ($data['hasilukur_posisi'] == 'L') {
            $model = new MediantbModel();
            $field = 'mediantb_';
        } else {
            $model = new MedianpbModel();
            $field = 'medianpb_';
        }
        $mediantb = $model->findMedian($balita->balita_umur);
        // dd($mediantb);
        if ($data['hasilukur_pbtb'] < $mediantb[$field . $jk]) {
            $skor = ($data['hasilukur_pbtb'] - $mediantb[$field . $jk]) / ($mediantb[$field . $jk] - $mediantb[$field . 'min1' . $jk]);
        } else {
            $skor = ($data['hasilukur_pbtb'] - $mediantb[$field . $jk]) / ($mediantb[$field . 'plus1' . $jk] - $mediantb[$field . $jk]);
        }
        $data['hasilukur_c2'] = $skor;
        // dd($skor);
        dd(getambang('TB/U', $data['hasilukur_c2']));
        //DAPATKAN BOBOT
        $data['hasilukur_c2bobot'] = getambang('TB/U', $data['hasilukur_c2'])->ambangbatas_bobotkriteria;

        /* Hitung Z-Score BB/TB */
        if ($data['hasilukur_posisi'] == 'L') {
            $model = new MedianbbpertbModel();
            $field = 'medianbbpertb_';
        } else {
            $model = new MedianbbperpbModel();
            $field = 'medianbbperpb_';
        }
        $medianbbpertb = $model->findMedian(konversiTB($data['hasilukur_pbtb']));
        // dd(konversiTB($data['hasilukur_pbtb']));
        if ($data['hasilukur_bb'] < $medianbbpertb[$field . $jk]) {
            $skor = ($data['hasilukur_bb'] - $medianbbpertb[$field . $jk]) / ($medianbbpertb[$field . $jk] - $medianbbpertb[$field . 'min1' . $jk]);
        } else {
            $skor = ($data['hasilukur_bb'] - $medianbbpertb[$field . $jk]) / ($medianbbpertb[$field . 'plus1' . $jk] - $medianbbpertb[$field . $jk]);
        }
        $data['hasilukur_c3'] = $skor;
        //DAPATKAN BOBOT
        $data['hasilukur_c3bobot'] = getambang('BB/TB', $data['hasilukur_c3'])->ambangbatas_bobotkriteria;

        /* Hitung Z-Score IMT/U */
        $model = new MedianimtModel();
        $medianimt = $model->findMedian($balita->balita_umur, $data['hasilukur_posisi']);
        // dd($median)
        if ($bmi < $medianimt['medianimt_' . $jk]) {
            $data['hasilukur_c4'] = ($bmi - $medianimt['medianimt_' . $jk]) / ($medianimt['medianimt_' . $jk] - $medianimt['medianimt_min1' . $jk]);
            // dd('here');
        } else {
            $data['hasilukur_c4'] = ($bmi - $medianimt['medianimt_' . $jk]) / ($medianimt['medianimt_plus1' . $jk] - $medianimt['medianimt_' . $jk]);
        }
        // dd($skorimt);
        // dd(($bmi - $medianimt['medianimt_' . $jk]) / ($medianimt['medianimt_plus1' . $jk] - $medianimt['medianimt_' . $jk]));
        // $data['hasilukur_c4'] = $skor;
        //DAPATKAN BOBOT
        $data['hasilukur_c4bobot'] = getambang('IMT/U', $data['hasilukur_c4'])->ambangbatas_bobotkriteria;

        // dd($data);
        $model = new HasilukurModel();
        if ($hasilukur_id = $model->insert($data, true)) {
            return redirect()->to(session('user')->user_type . '/periksa/detail/' . $data['balita_id'])
                ->with('success', 'Data berhasil direkam!');
        }
        return redirect()->to(previous_url())
            ->with('danger', 'Data gagal direkam. Periksa kembali!')
            ->withInput()
            ->with('errors', $model->errors());
    }

    public function detail($balita_id, $periode_id = null)
    {
        $model = new PeriodeModel();
        if ($periode_id == null)
            $periode = $model->findBuka();
        else
            $periode = $model->find($periode_id);
        // dd($periode);
        $model = new HasilukurModel();
        $detail = $model->findDetail($balita_id, $periode->periode_id);

        $model = new BalitaModel();
        $balita = $model->findBalita($balita_id);

        $data = [
            'title' => 'Detail Ukur Balita',
            'periode' => $periode,
            'balita' => $balita,
            'detail' => $detail
        ];
        // dd($detail);

        return view('hasilukur/detail', $data);
    }
}
