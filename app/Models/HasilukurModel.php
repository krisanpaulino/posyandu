<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilukurModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hasilukur';
    protected $primaryKey       = 'hasilukur_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'periode_id',
        'hasilukur_tgl',
        'hasilukur_posisi',
        'hasilukur_bb',
        'hasilukur_pbtb',
        'hasilukur_bmi',
        'hasilukur_c1',
        'hasilukur_c2',
        'hasilukur_c3',
        'hasilukur_c4',
        'hasilukur_c1bobot',
        'hasilukur_c2bobot',
        'hasilukur_c3bobot',
        'hasilukur_c4bobot',
        'hasilukur_skor',
        'hasilukur_status',
        'hasilukur_umur',
        'balita_id',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'periode_id' => 'required',
        'hasilukur_tgl' => 'required',
        'hasilukur_posisi' => 'required',
        'hasilukur_umur' => 'required',
        'hasilukur_bb' => 'required',
        'hasilukur_pbtb' => 'required',
        'hasilukur_bmi' => 'required',
        'hasilukur_c1' => 'required',
        'hasilukur_c2' => 'required',
        'hasilukur_c3' => 'required',
        'hasilukur_c4' => 'required',
        'hasilukur_c1bobot' => 'required',
        'hasilukur_c2bobot' => 'required',
        'hasilukur_c3bobot' => 'required',
        'hasilukur_c4bobot' => 'required',
        // 'hasilukur_skor' => 'required',
        // 'hasilukur_status' => 'required',
        'balita_id' => 'required',
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

    public function findDetail($balita_id, $periode_id)
    {
        $this->where('balita_id', $balita_id);
        $this->where('periode_id', $periode_id);
        $this->join('statusgizi', 'statusgizi.statusgizi_id = hasilukur.hasilukur_status', 'left');
        return $this->first();
    }

    public function findHasil($posyandu_id, $periode_id)
    {
        $this->join('balita', 'balita.balita_id = hasilukur.balita_id');
        $this->join('posyandu', 'balita.posyandu_id = posyandu.posyandu_id');
        $this->where('balita.posyandu_id', $posyandu_id);
        $this->where('hasilukur.periode_id', $periode_id);
        $this->join('statusgizi', 'statusgizi.statusgizi_id = hasilukur.hasilukur_status', 'left');
        return $this->find();
    }

    public function findMax($field, $posyandu_id, $periode_id)
    {
        $this->select($field . ' as bobot');
        $this->join('balita', 'balita.balita_id = hasilukur.balita_id');
        $this->where('balita.posyandu_id', $posyandu_id);
        $this->where('hasilukur.periode_id', $periode_id);
        $this->orderBy($field, 'desc');
        return $this->first()->bobot;
    }

    public function byBalita($balita_id)
    {
        $this->join('statusgizi', 'statusgizi.statusgizi_id = hasilukur.hasilukur_status', 'left');
        $this->join('periode', 'periode.periode_id = hasilukur.periode_id');
        $this->where('balita_id', $balita_id);
        $this->orderBy('hasilukur.periode_id', 'desc');
        return $this->find();
    }

    public function dataJumlah($posyandu_id, $periode_id)
    {
        $sql = "SELECT hasilukur.periode_id, 
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 0 AND a.hasilukur_umur <= 5 ) as _05l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 0 AND a.hasilukur_umur <= 5 ) as _05p,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 6 AND a.hasilukur_umur <= 11 ) as _611l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 6 AND a.hasilukur_umur <= 11 ) as _611P,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 12 AND a.hasilukur_umur <= 23 ) as _1223l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 12 AND a.hasilukur_umur <= 23 ) as _1223P,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 24 AND a.hasilukur_umur <= 59 ) as _2459l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 24 AND a.hasilukur_umur <= 59 ) as _2459P
FROM hasilukur JOIN balita b on b.balita_id = hasilukur.balita_id WHERE periode_id = $periode_id AND b.posyandu_id = $posyandu_id GROUP BY periode_id";
        $query = $this->db->query($sql);
        return $query->getRowArray();
    }

    public function dataGizi($posyandu_id, $periode_id, $status)
    {
        $sql = "SELECT hasilukur.periode_id, 
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 0 AND a.hasilukur_umur <= 5 ) as _05l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 0 AND a.hasilukur_umur <= 5 ) as _05p,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 6 AND a.hasilukur_umur <= 11 ) as _611l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 6 AND a.hasilukur_umur <= 11 ) as _611P,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 12 AND a.hasilukur_umur <= 23 ) as _1223l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 12 AND a.hasilukur_umur <= 23 ) as _1223P,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 24 AND a.hasilukur_umur <= 59 ) as _2459l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 24 AND a.hasilukur_umur <= 59 ) as _2459P
FROM hasilukur JOIN balita b on b.balita_id = hasilukur.balita_id WHERE periode_id = $periode_id AND b.posyandu_id = $posyandu_id AND hasilukur.hasilukur_status = $status GROUP BY periode_id";
        $query = $this->db->query($sql);
        return $query->getRowArray();
    }

    public function dataAmbang($posyandu_id, $periode_id, $c2)
    {
        $sql = "SELECT hasilukur.periode_id, 
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 0 AND a.hasilukur_umur <= 5 ) as _05l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 0 AND a.hasilukur_umur <= 5 ) as _05p,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 6 AND a.hasilukur_umur <= 11 ) as _611l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 6 AND a.hasilukur_umur <= 11 ) as _611P,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 12 AND a.hasilukur_umur <= 23 ) as _1223l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 12 AND a.hasilukur_umur <= 23 ) as _1223P,
(SELECT COUNT(*) FROM hasilukur a WHERE b.balita_jk = 'L' AND a.hasilukur_umur >= 24 AND a.hasilukur_umur <= 59 ) as _2459l,
(SELECT COUNT(*) FROM hasilukur a where b.balita_jk = 'P' AND a.hasilukur_umur >= 24 AND a.hasilukur_umur <= 59 ) as _2459P
FROM hasilukur JOIN balita b on b.balita_id = hasilukur.balita_id WHERE periode_id = $periode_id AND b.posyandu_id = $posyandu_id AND hasilukur.hasilukur_c2bobot = $c2 GROUP BY periode_id";
        $query = $this->db->query($sql);
        return $query->getRowArray();
    }
}
