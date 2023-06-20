<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Pdfgenerator;
use App\Models\BalitaModel;
use App\Models\HasilukurModel;
use App\Models\PeriodeModel;
use App\Models\PosyanduModel;
use App\Models\UserModel;

use function PHPSTORM_META\type;

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
        $model = new PeriodeModel();
        $data['periode'] = $model->findUrutan();
        return view('balita/index', $data);
    }
    public function store()
    {
        $data = $this->request->getPost();
        if ($data['balita_umur'] > 59)
            return redirect()->to(previous_url())->with('danger', 'Umur balita maksimal 59 bulan!')->withInput();
        $model = new BalitaModel();
        $data['balita_tgllahir'] = date('Y-m-d', strtotime($data['balita_tgllahir']));
        if (session('user')->user_type == 'petugas')
            $data['posyandu_id'] = session('petugas')->posyandu_id;
        if ($id = $model->insert($data, true)) {
            $username = $id . date('d') . date('m') . date('y');
            $model = new UserModel();
            $user = [
                'user_email' => $username,
                'user_type' => 'orangtua',
                'user_password' => '12345',
                'password_confirmation' => '12345'
            ];
            $uid = $model->insert($user, true);
            $model = new BalitaModel();
            $model->where('balita_id', $id);
            $model->update($id, ['user_id' => $uid]);

            return redirect()->to(session('user')->user_type . '/balita/' . $id)
                ->with('success', 'Data balita berhasil ditambahkan!');
        }

        return redirect()->to(previous_url())
            ->with('danger', 'Periksa kembali data balita')
            ->with('errors', $model->errors())
            ->withInput();
    }

    public function buatAkun()
    {
        $id = $this->request->getPost('balita_id');
        $username = $id . date('d') . date('m') . date('y');
        $model = new UserModel();
        $user = [
            'user_email' => $username,
            'user_type' => 'orangtua',
            'user_password' => '12345',
            'password_confirmation' => '12345'
        ];
        $uid = $model->insert($user, true);
        $model = new BalitaModel();
        $model->where('balita_id', $id);
        $model->update($id, ['user_id' => $uid]);
        return redirect()->to(previous_url())
            ->with('success', 'Sukses Buat Akun!')
            ->withInput();
    }

    public function detail($balita_id)
    {
        $model = new BalitaModel();
        $balita = $model->findBalita($balita_id);
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
        $data['balita_tgllahir'] = date('Y-m-d', strtotime($data['balita_tgllahir']));

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

    function laporanBalita()
    {
        helper('user');
        $posyandu_id = null;
        if (session('user')->user_type == 'operator') {
            $posyandu_id = petugas()->posyandu_id;
        } elseif (session('user')->user_type == 'admin') {
            $posyandu_id = $this->request->getPost('posyandu_id');
        }
        $periode_id = $this->request->getPost('periode_id');
        $model = new PeriodeModel();
        $model->where('periode_id', $periode_id);
        $periode = $model->first();
        if ($posyandu_id != null) {
            $model = new PosyanduModel();
            $posyandu = $model->find($posyandu_id)->posyandu_nama;
        } else {
            $posyandu = 'Semua';
        }
        $model = new BalitaModel();
        $balita = $model->findCetak($periode_id, $posyandu_id);

        $data = [
            'title_pdf' => 'Laporan Hasil Posyandu',
            'periode' => $periode,
            'posyandu' => $posyandu,
            'balita' => $balita,
        ];
        // dd($data);
        $pdf = new Pdfgenerator();

        // title dari pdf

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_balita';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = view('pdf-balita', $data);

        // run dompdf
        $pdf->generate($html, $file_pdf, $paper, $orientation);
    }
}
