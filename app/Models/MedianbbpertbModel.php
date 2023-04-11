<?php

namespace App\Models;

use CodeIgniter\Model;

class MedianbbpertbModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'medianbbpertb';
    protected $primaryKey       = 'medianbbpertb_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'medianbbpertb_tb',
        'medianbbpertb_l',
        'medianbbpertb_t',
        'medianbbpertb_plus1l',
        'medianbbpertb_plus1p',
        'medianbbpertb_min1l',
        'medianbbpertb_min1p',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'medianbbpertb_tb' => 'required',
        'medianbbpertb_l' => 'required',
        'medianbbpertb_t' => 'required',
        'medianbbpertb_plus1l' => 'required',
        'medianbbpertb_plus1p' => 'required',
        'medianbbpertb_min1l' => 'required',
        'medianbbpertb_min1p' => 'required',
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

    public function findMedian($tb)
    {
        $this->where('medianbbpertb_tb', $tb);
        return $this->first();
    }
}
