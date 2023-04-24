<?php

namespace App\Models;

use CodeIgniter\Model;

class MedianpbModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'medianpb';
    protected $primaryKey       = 'medianpb_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'medianpb_umur',
        'medianpb_l',
        'medianpb_p',
        'medianpb_plus1l',
        'medianpb_plus1p',
        'medianpb_min1l',
        'medianpb_min1p',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'medianpb_umur' => 'required',
        'medianpb_l' => 'required',
        'medianpb_p' => 'required',
        'medianpb_plus1l' => 'required',
        'medianpb_plus1p' => 'required',
        'medianpb_min1l' => 'required',
        'medianpb_min1p' => 'required',
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
        $this->where('medianpb_umur', $umur);
        return $this->first();
    }
}
