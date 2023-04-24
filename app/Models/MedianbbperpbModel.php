<?php

namespace App\Models;

use CodeIgniter\Model;

class MedianbbperpbModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'medianbbperpb';
    protected $primaryKey       = 'medianbbperpb_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'medianbbperpb_pb',
        'medianbbperpb_l',
        'medianbbperpb_t',
        'medianbbperpb_plus1l',
        'medianbbperpb_plus1p',
        'medianbbperpb_min1l',
        'medianbbperpb_min1p',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'medianbbperpb_pb' => 'required',
        'medianbbperpb_l' => 'required',
        'medianbbperpb_t' => 'required',
        'medianbbperpb_plus1l' => 'required',
        'medianbbperpb_plus1p' => 'required',
        'medianbbperpb_min1l' => 'required',
        'medianbbperpb_min1p' => 'required',
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
    public function findMedian($pb)
    {
        $this->where('medianbbperpb_pb', $pb);
        return $this->first();
    }
}
