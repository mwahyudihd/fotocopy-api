<?php

namespace App\Models;

use CodeIgniter\Model;

class MProduk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'kode_produk';
    protected $allowedFields = [ 'kode_produk', 'nama', 'harga', 'stok' ];
}