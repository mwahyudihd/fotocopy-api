<?php

namespace App\Controllers;

use App\Models\MJasa;

class JasaController extends RestfulController
{
    public function create()
    {
        $random_kode = strtoupper(bin2hex(random_bytes(4)));
        $data = [
            'kode_jasa' => $random_kode,
            'nama_jasa' => $this->request->getVar('nama_jasa'),
            'harga' => $this->request->getVar('harga'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai')            
        ];

        $model = new MJasa();
        $model->insert($data);
        $jasa = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $jasa);
    }

    public function list()
    {
        $model = new MJasa();
        $jasa = $model->findAll();
        return $this->responseHasil(200, true, $jasa);
    }

    public function detail($id)
    {
        $model = new MJasa();
        $jasa = $model->find($id);
        return $this->responseHasil(200, true, $jasa);
    }

    public function ubah($id)
    {
        $data = [
            'nama_jasa' => $this->request->getVar('nama_jasa'),
            'harga' => $this->request->getVar('harga'),
            'nama_pegawai' => $this->request->getVar('nama_pegawai')
        ];

        $model = new MJasa();
        $model->update($id, $data);
        $jasa = $model->find($id);

        return $this->responseHasil(200, true, $jasa);
    }

    public function hapus($id)
    {
        $model = new MJasa();
        $jasa = $model->delete($id);

        return $this->responseHasil(200, true, $jasa);
    }
}