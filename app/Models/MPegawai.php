<?php

namespace App\Models;

use CodeIgniter\Model;

class MPegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['id_pegawai', 'nama_pegawai', 'jobdesk', 'no_tlp', 'gender', 'gaji', 'email', 'password'];
}