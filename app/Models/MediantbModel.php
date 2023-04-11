<?php

namespace App\Models;

use CodeIgniter\Model;

class MediantbModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mediantb';
    protected $primaryKey       = 'mediantb_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'mediantb_umur',
        'mediantb_l',
        'mediantb_p',
        'mediantb_plus1l',
        'mediantb_plus1p',
        'mediantb_min1l',
        'mediantb_min1p',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'mediantb_umur' => 'required',
        'mediantb_l' => 'required',
        'mediantb_p' => 'required',
        'mediantb_plus1l' => 'required',
        'mediantb_plus1p' => 'required',
        'mediantb_min1l' => 'required',
        'mediantb_min1p' => 'required',
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
        $this->where('mediantb_umur', $umur);
        return $this->first();
    }
}
