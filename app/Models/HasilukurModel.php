<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilukurModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hasilukur';
    protected $primaryKey       = 'hasilukur_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'periode_id',
        'hasilukur_tgl',
        'hasilukur_posisi',
        'hasilukur_bb',
        'hasilukur_pbtb',
        'hasilukur_bmi',
        'hasilukur_c1',
        'hasilukur_c2',
        'hasilukur_c3',
        'hasilukur_c4',
        'hasilukur_skor',
        'hasilukur_status',
        'balita_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'periode_id' => 'required',
        'hasilukur_tgl' => 'required',
        'hasilukur_posisi' => 'required',
        'hasilukur_bb' => 'required',
        'hasilukur_pbtb' => 'required',
        'hasilukur_bmi' => 'required',
        'hasilukur_c1' => 'required',
        'hasilukur_c2' => 'required',
        'hasilukur_c3' => 'required',
        'hasilukur_c4' => 'required',
        'hasilukur_skor' => 'required',
        'hasilukur_status' => 'required',
        'balita_id' => 'required',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
