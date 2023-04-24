<?php

use App\Models\AmbangbatasModel;
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
function konversiBulan($angka)
{
    $bulan = '';
    switch ($angka) {
        case '1':
            $bulan = 'Januari';
            break;
        case '2':
            $bulan = 'Februari';
            break;
        case '3':
            $bulan = 'Maret';
            break;
        case '4':
            $bulan = 'April';
            break;
        case '5':
            $bulan = 'Mei';
            break;
        case '6':
            $bulan = 'Juni';
            break;
        case '7':
            $bulan = 'Juli';
            break;
        case '8':
            $bulan = 'Agustus';
            break;
        case '9':
            $bulan = 'September';
            break;
        case '10':
            $bulan = 'Oktober';
            break;
        case '11':
            $bulan = 'November';
            break;
        case '12':
            $bulan = 'Desember';
            break;

        default:
            # code...
            break;
    }
    return $bulan;
}

function getStatus($index, $skor)
{
    $model = new AmbangbatasModel();
    $result = $model->bySkor($index, $skor);
    return $result->ambangbatas_status;
}
function getambang($index, $skor)
{
    $model = new AmbangbatasModel();
    $result = $model->bySkor($index, $skor);
    return $result;
}
