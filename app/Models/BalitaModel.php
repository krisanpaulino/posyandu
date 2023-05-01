<?php

namespace App\Models;

use CodeIgniter\Model;

class BalitaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'balita';
    protected $primaryKey       = 'balita_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'balita_nama',
        'balita_jk',
        'balita_umur',
        'balita_tgllahir',
        'balita_orangtua',
        'balita_alamat',
        'posyandu_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'balita_nama' => 'required',
        'balita_jk' => 'required',
        'balita_umur' => 'required',
        'balita_tgllahir' => 'required',
        'balita_orangtua' => 'required',
        'balita_alamat' => 'required',
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

    public function findBalita($balita_id = null)
    {
        $this->join('posyandu', 'posyandu.posyandu_id = balita.posyandu_id');
        if ($balita_id == null) {
            return $this->find();
        }
        return $this->find($balita_id);
    }

    public function byPosyandu($posyandu_id)
    {
        $this->join('posyandu', 'posyandu.posyandu_id = balita.posyandu_id');
        $this->where('balita.posyandu_id', $posyandu_id);
        return $this->find();
    }

    public function belumPeriksa($periode_id, $posyandu_id = null)
    {
        $this->where("NOT EXISTS (SELECT * FROM hasilukur WHERE periode_id = '$periode_id' AND hasilukur.balita_id = balita.balita_id)", null, false);
        $this->where('balita_umur <=', 60, true);
        if ($posyandu_id != null)
            $this->where('balita.posyandu_id', $posyandu_id);
        return $this->find();
    }
    public function sudahPeriksa($periode_id, $posyandu_id = null)
    {
        $this->where("EXISTS (SELECT * FROM hasilukur WHERE periode_id = '$periode_id' AND hasilukur.balita_id = balita.balita_id)", null, false);
        if ($posyandu_id != null)
            $this->where('balita.posyandu_id', $posyandu_id);
        return $this->find();
    }

    public function byNama($nama)
    {
        $this->like('balita_nama', '%' . $nama . '%');
        return $this->find();
    }
}
