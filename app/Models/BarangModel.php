<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $useTimestamps = true;
    protected $returnType = 'object';


    protected $allowedFields = [
        'kd_barang',
        'nama_brg',
        'gambar',
        'jenis_paket_brg',
        'stok',
        'deskripsi'
    ];
}
