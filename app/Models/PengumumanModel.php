<?php

namespace App\Models;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengumuman';
    protected $primaryKey       = 'pengumuman_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pengumuman_judul', 'pengumuman_isi', 'pengumuman_tgl', 'posyandu_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'pengumuman_judul' => 'required',
        'pengumuman_isi' => 'required',
        'pengumuman_tgl' => 'required',
        'posyandu_id' => 'required',
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

    public function findPengumuman($posyandu_id)
    {
        $this->where('posyandu_id', $posyandu_id);
        $this->orderBy('pengumuman_id', 'desc');
        $this->limit(5);
        return $this->find();
    }
}
