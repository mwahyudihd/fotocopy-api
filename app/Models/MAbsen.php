<?php

namespace App\Models;

use CodeIgniter\Model;

class MAbsen extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $allowedFields = ['uid', 'nama', 'tgl_submit','lokasi', 'kordinat'];
}