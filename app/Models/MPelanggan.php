<?php

namespace App\Models;

use CodeIgniter\Model;

class MPelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = [
        'nama_pelanggan', 
        'jenis_pesanan', 
        'alamat', 
        'status', 
        'jumlah_unit', 
        'kode_unit', 
        'kategori', 
        'kode_pesanan',
        'harga_unit'
    ];
}