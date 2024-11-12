<?php

namespace App\Models;

use CodeIgniter\Model;

class msjeModel extends Model
{
    protected $table = 'ms_je';
    protected $useTimestamps = true;
    protected $allowedFields = ['pertanyaan', 'jawaban', 'fraksi', 'kategori'];

    public function getvisiarray($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ms_visi');
        $builder->select('id_visi, visi');
        $array = ['id_visi' => $id];
        $builder->where($array);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getdata($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('ms_je');
        $builder->select('id, jawaban, status_pdf, location_file');
        $array = ['id' => $id];
        $builder->where($array);
        $query = $builder->get();

        return $query->getResultArray();
    }
}
