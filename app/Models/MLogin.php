<?php

namespace App\Models;

use CodeIgniter\Model;

class MLogin extends Model
{
    protected $table = 'auth_token';
    protected $allowedFields = ['pegawai_id', 'auth_key', 'role'];
}