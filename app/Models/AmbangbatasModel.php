<?php

namespace App\Models;

use CodeIgniter\Model;

class AmbangbatasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ambangbatas';
    protected $primaryKey       = 'ambangbatas_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ambangbatas_index',
        'ambangbatas_status',
        'ambangbatas_skormin',
        'ambangbatas_skormax',
        'ambangbatas_bobotkriteria',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'ambangbatas_index' => 'required',
        'ambangbatas_status' => 'required',
        'ambangbatas_skormin' => 'required',
        'ambangbatas_skormax' => 'required',
        'ambangbatas_bobotkriteria' => 'required',
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

    public function bySkor($index, $skor)
    {
        $this->where('ambangbatas_index', $index);
        $this->where('ambangbatas_skormin <=', $skor, true);
        $this->where('ambangbatas_skormax >=', $skor, true);
        return $this->first();
    }
    public function byIndex($index)
    {
        $this->where('ambangbatas_index', $index);
        return $this->findAll();
    }
}
