<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BalitaModel;
use App\Models\HasilukurModel;
use App\Models\MedianbbModel;
use App\Models\MedianbbpertbModel;
use App\Models\MedianimtModel;
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

        $data['hasilukur_tgl'] = date('Y-m-d');

        //Hitung BMI
        $bmi = $data['hasilukur_bb'] / pow(($data['hasilukur_pbtb'] / 100), 2);

        /* Hitung Z-Score BB/U */
        //Ambil Median BB/U
        $model = new MedianbbModel();
        $medianbb = $model->findMedian($balita->balita_umur);

        //Hitung z-score
        if ($data['hasilukur_bb'] < $medianbb) {
            $skor = ($data['hasilukur_bb'] - $medianbb['medianbb_' . $jk]) / ($medianbb['medianbb_' . $jk] - $medianbb['medianbb_min1' . $jk]);
        } else {
            $skor = ($data['hasilukur_bb'] - $medianbb['medianbb_' . $jk]) / ($medianbb['medianbb_min1' . $jk] - $medianbb['medianbb_' . $jk]);
        }
        $data['hasilukur_c1'] = $skor;

        /* Hitung Z-Score TB/U */
        $model = new MediantbModel();
        $mediantb = $model->findMedian($balita->balita_umur);
        if ($data['hasilukur_pbtb'] < $mediantb) {
            $skor = ($data['hasilukur_pbtb'] - $mediantb['mediantb_' . $jk]) / ($mediantb['mediantb_' . $jk] - $mediantb['mediantb_min1' . $jk]);
        } else {
            $skor = ($data['hasilukur_pbtb'] - $mediantb['mediantb_' . $jk]) / ($mediantb['mediantb_min1' . $jk] - $mediantb['mediantb_' . $jk]);
        }
        $data['hasilukur_c2'] = $skor;

        /* Hitung Z-Score BB/TB */
        $model = new MedianbbpertbModel();
        $medianbbpertb = $model->findMedian($data['hasilukur_pbtb']);
        if ($data['hasilukur_bb'] < $medianbbpertb) {
            $skor = ($data['hasilukur_bb'] - $medianbbpertb['medianbbpertb_' . $jk]) / ($medianbbpertb['medianbbpertb_' . $jk] - $medianbbpertb['medianbbpertb_min1' . $jk]);
        } else {
            $skor = ($data['hasilukur_bb'] - $medianbbpertb['medianbbpertb_' . $jk]) / ($medianbbpertb['medianbbpertb_min1' . $jk] - $medianbbpertb['medianbbpertb_' . $jk]);
        }
        $data['hasilukur_c3'] = $skor;

        /* Hitung Z-Score IMT/U */
        $model = new MedianimtModel();
        $medianimt = $model->findMedian($balita->balita_umur);
        if ($bmi < $medianimt) {
            $skor = ($bmi - $medianimt['medianimt_' . $jk]) / ($medianimt['medianimt_' . $jk] - $medianimt['medianimt_min1' . $jk]);
        } else {
            $skor = ($bmi - $medianimt['medianimt_' . $jk]) / ($medianimt['medianimt_min1' . $jk] - $medianimt['medianimt_' . $jk]);
        }
        $data['hasilukur_c4'] = $skor;

        $model = new HasilukurModel();
        if ($model->insert($data)) {
            return redirect()->to(previous_url())
                ->with('success', 'Data berhasil direkam!');
        }
        return redirect()->to(previous_url())
            ->with('danger', 'Data gagal direkam. Periksa kembali!')
            ->withInput()
            ->with('errors', $model->errors());
    }
}
