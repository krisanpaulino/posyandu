<?php

use App\Models\PetugasModel;

function petugas()
{
    $model = new PetugasModel();
    $petugas = $model->findPetugas(session('petugas')->petugas_id);
    return $petugas;
}

function bulan()
{
    $bulan = [
        [
            'nama' => 'Januari',
            'angka' => '1'
        ],
        [
            'nama' => 'Februari',
            'angka' => '2'
        ],
        [
            'nama' => 'Maret',
            'angka' => '3'
        ],
        [
            'nama' => 'April',
            'angka' => '4'
        ],
        [
            'nama' => 'Mei',
            'angka' => '5'
        ],
        [
            'nama' => 'Juni',
            'angka' => '6'
        ],
        [
            'nama' => 'Juli',
            'angka' => '7'
        ],
        [
            'nama' => 'Agustus',
            'angka' => '8'
        ],
        [
            'nama' => 'September',
            'angka' => '9'
        ],
        [
            'nama' => 'Oktober',
            'angka' => '10'
        ],
        [
            'nama' => 'November',
            'angka' => '11'
        ],
        [
            'nama' => 'Desember',
            'angka' => '12'
        ],
    ];
    return $bulan;
}
