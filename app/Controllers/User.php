<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetugasModel;
use App\Models\PosyanduModel;
use App\Models\UserModel;
use DateTime;

class User extends BaseController
{
    public function admin()
    {
        $model = new UserModel();
        $data['title'] = 'Data Admin';
        $data['users'] = $model->findAdmins();

        return view('pengguna/admin', $data);
    }

    public function storeAdmin()
    {
        $data = $this->request->getPost();
        $data['user_type'] = 'admin';
        $model = new UserModel();
        if ($model->insert($data)) {
            return redirect()->back();
        } else {
            // dd($model->errors()['password_confirmation']);
            return redirect()->back()
                ->with('errors', $model->errors())
                ->withInput();
        }
    }

    public function deleteAdmin()
    {
        $model = new UserModel();
        $user_id = $this->request->getPost('user_id');
        $model->delete($user_id);
        return redirect()->to('admin/admin');
    }

    public function petugas()
    {
        $model = new PetugasModel();
        $pmodel = new PosyanduModel();
        $data = [
            'title' => 'Data Petugas',
            'petugas' => $model->findPetugas(),
            'posyandu' => $pmodel->findAll()
        ];
        return view('pengguna/petugas', $data);
    }

    public function storePetugas()
    {
        $user =  [
            'user_email' => $this->request->getPost('user_email'),
            'user_password' => $this->request->getPost('user_password'),
            'password_confirmation' => $this->request->getPost('password_confirmation'),
            'user_type' => 'petugas'
        ];
        // dd($user);
        $file = $this->request->getFile('file');
        $umodel = new UserModel();

        //simpan dulu data user
        if ($user_id = $umodel->insert($user, true)) {
            // dd($user_id);
            $tgllahir = (string)$this->request->getPost('petugas_tgllahir');
            $date = new DateTime($tgllahir);

            $data = [
                'petugas_nama' => $this->request->getPost('petugas_nama'),
                'petugas_jk' => $this->request->getPost('petugas_jk'),
                'petugas_tempatlahir' => $this->request->getPost('petugas_tempatlahir'),
                'petugas_tgllahir' => date('Y-m-d', strtotime($date->format('Y-m-d'))),
                'petugas_alamat' => $this->request->getPost('petugas_alamat'),
                'petugas_hp' => $this->request->getPost('petugas_hp'),
                'posyandu_id' => $this->request->getPost('posyandu_id'),
                'user_id' => $user_id
            ];

            $pmodel = new PetugasModel();
            $data['petugas_foto'] = 'default.jpg';
            $file = $this->request->getFile('file');

            if (!empty($file) && $file->isValid()) {
                $filename = 'petugas_' . $user_id . '.' . $file->getExtension();
                $path = './assets/images/profil';
                if ($file->move($path, $filename, true)) {
                    $data['petugas_foto'] = $filename;
                }
            }

            if ($pmodel->insert($data)) {
                return redirect()->to(previous_url())->with('success', 'Data Petugas Ditambahkan !');
            }
            return redirect()->to(previous_url())->with('danger', 'Data Petugas Gagal Ditambahkan !')
                ->with('errors', $pmodel->errors())
                ->withInput();
        } else {
            dd($umodel->errors());
        }
    }

    public function detailPetugas($petugas_id)
    {
        $model = new PetugasModel();
        $petugas = $model->findPetugas($petugas_id);
        $model = new PosyanduModel();
        $data = [
            'title' => 'Detail Petugas',
            'petugas' => $petugas,
            'posyandu' => $model->findAll()
        ];

        return view('pengguna/petugas-detail', $data);
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

        if (!empty($file) && $file->isValid()) {
            $filename = 'petugas_' . $petugas->user_id . '.' . $file->getExtension();
            $path = './assets/images/profil';
            if ($file->move($path, $filename, true)) {
                $data['petugas_foto'] = $filename;
            }
        }
        // dd($data);
        $model->where('petugas_id', $petugas_id);
        $model->update($petugas_id, $data);
        return redirect()->to(previous_url())->with('success', 'Data berhasil diubah');
    }
    public function deletePetugas()
    {
        $model = new UserModel();
        $user_id = $this->request->getPost('user_id');
        $model->delete($user_id);
        return redirect()->to('admin/petugas');
    }
}
