<?php

namespace App\Models;

use CodeIgniter\Model;

class MJasa extends Model
{
    protected $table = 'jasa';
    protected $primaryKey = 'kode_jasa';
    protected $allowedFields = ['kode_jasa','nama_jasa', 'harga', 'nama_pegawai'];
}