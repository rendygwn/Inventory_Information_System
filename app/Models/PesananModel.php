<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table            = 'pesan';
    protected $primaryKey       = 'id_pesan';
    protected $returnType       = 'object';
    protected $allowedFields    = ['kd_pesan', 'tgl_pesan', 'qty', 'id_konsumen', 'kd_konsumen', 'nama', 'id_barang', 'kd_barang', 'nama_brg'];
    protected $useTimestamp    = true;
    protected $useSoftDeletes    = false;

    function getAll()
    {
        $builder = $this->db->table('pesan');
        $builder->join('konsumen', 'konsumen.id_konsumen = pesan.id_konsumen')
            ->join('barang', 'barang.id_barang= pesan.id_barang');
        $query = $builder->get();
        return $query->getResult();
    }
}
