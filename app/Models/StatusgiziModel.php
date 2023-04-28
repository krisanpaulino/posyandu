<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusgiziModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'statusgizi';
    protected $primaryKey       = 'statusgizi_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'statusgizi_nama',
        'statusgizi_min',
        'statusgizi_max',
        'statusgizi_penyebab',
        'statusgizi_pencegahan',
        'statusgizi_pengobatan',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'statusgizi_nama' => 'required',
        'statusgizi_min' => 'required',
        'statusgizi_max' => 'required',
        'statusgizi_penyebab' => 'required',
        'statusgizi_pencegahan' => 'required',
        'statusgizi_pengobatan' => 'required',
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

    public function bySkor($skor)
    {
        $this->where('statusgizi_min <=', $skor, true);
        $this->where('statusgizi_max >=', $skor, true);
        return $this->first();
    }
}
