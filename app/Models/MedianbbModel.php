<?php

namespace App\Models;

use CodeIgniter\Model;

class MedianbbModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'medianbb';
    protected $primaryKey       = 'medianbb_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['mediabb_umur', 'medianbb_l', 'medianbb_p', 'medianbb_plus1l', 'medianbb_min1l', 'medianbb_plus1p', 'medianbb_min1p'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'medianbb_umur' => 'required',
        'medianbb_l' => 'required',
        'medianbb_p' => 'required'
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
        $this->where('medianbb_umur', $umur);
        return $this->first();
    }
}
