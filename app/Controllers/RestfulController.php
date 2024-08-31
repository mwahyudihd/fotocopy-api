<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class RestfulController extends ResourceController
{
    protected $format = 'json';

    protected function responseHasil($code, $status, $data)
    {
        return $this->respond($data);
    }
}