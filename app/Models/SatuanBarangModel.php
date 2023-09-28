<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanBarangModel extends Model
{
    protected $table = 'satuanbarang';
    protected $primaryKey = 'id_satuan_brg';
    protected $useTimestamps = true;
    protected $returnType = 'object';


    protected $allowedFields = [
        'kd_barang',
        'gambar',
        'nama_brg',
        'jenis_brg',
        'satuan_brg',
        'stok'
    ];
}
