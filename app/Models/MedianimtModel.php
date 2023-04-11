<?php

namespace App\Models;

use CodeIgniter\Model;

class MedianimtModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'medianimt';
    protected $primaryKey       = 'medianimt_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'medianimt_umur',
        'medianimt_l',
        'medianimt_p',
        'medianimt_plus1l',
        'medianimt_plus1p',
        'medianimt_min1l',
        'medianimt_min1p',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'medianimt_umur' => 'required',
        'medianimt_l' => 'required',
        'medianimt_p' => 'required',
        'medianimt_plus1l' => 'required',
        'medianimt_plus1p' => 'required',
        'medianimt_min1l' => 'required',
        'medianimt_min1p' => 'required',
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

    public function findMedian($umur)
    {
        $this->where('medianimt_umur', $umur);
        return $this->first();
    }
}
