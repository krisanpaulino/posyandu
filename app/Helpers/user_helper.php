<?php

use App\Models\PetugasModel;

function petugas()
{
    $model = new PetugasModel();
    $petugas = $model->findPetugas(session('petugas')->petugas_id);
    return $petugas;
}
