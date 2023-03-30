<?php

use App\Models\PetugasModel;

function petugas()
{
    $model = new PetugasModel();
    $petugas = $model->findPetugas(session('userdata')->petugas->petugas_id);
    return $petugas;
}
