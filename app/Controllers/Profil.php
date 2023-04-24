<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetugasModel;
use App\Models\UserModel;

class Profil extends BaseController
{
    public function petugas()
    {
        $petugas = petugas();
        $model = new UserModel();
        $user = $model->find($petugas->user_id);
        $data = [
            'title' => 'Profil',
            'petugas' => $petugas,
            'user' => $user
        ];

        return view('profil/petugas', $data);
    }

    public function updatePetugas()
    {
        $petugas_id = $this->request->getPost('petugas_id');
        $data = $this->request->getPost();
        $file = $this->request->getFile('file');
        $tgllahir = $this->request->getPost('petugas_tgllahir');
        // dd($tgllahir);
        // $date = new DateTime($tgllahir);
        $date = strtotime($data['petugas_tgllahir']);
        // dd(date('Y-m-d', strtotime($tgllahir)));
        $data['petugas_tgllahir'] = date('Y-m-d', strtotime($tgllahir));
        // dd($data);
        $model = new PetugasModel();
        $petugas = $model->find($petugas_id);

        // dd($file->isValid());
        if (!empty($file) && $file->isValid()) {
            $filename = 'petugas_' . $petugas->user_id . '.' . $file->getExtension();
            $path = './assets/images/profil';
            if ($file->move($path, $filename, true)) {
                $data['petugas_foto'] = $filename;
            }
        }
        $model->where('petugas_id', $petugas_id);
        $model->update($petugas_id, $data);
        return redirect()->to(previous_url())->with('success', 'Data berhasil diubah');
    }

    public function updateUser()
    {
        $data = $this->request->getPost();
        $model = new UserModel();
        $model->where('user_id', $data['user_id']);

        if ($model->update($data['user_id'], $data)) {
            return redirect()->to(previous_url())
                ->with('success', 'Data Login berhasil di-update');
        }
        return redirect()->to(previous_url())
            ->with('danger', 'GAGAL!')
            ->with('errors', $model->errors())
            ->withInput();
    }
}
