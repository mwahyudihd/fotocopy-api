<?php

namespace App\Controllers;

use App\Models\MAbsen;

class AbsensiController extends RestfulController
{
    public function create()
    {
        $data = [
            'uid' => $this->request->getVar('uid'),
            'nama' => $this->request->getVar('nama'),
            'lokasi' => $this->request->getVar('lokasi'),
            'kordinat' => $this->request->getVar('kordinat')
        ];

        $model = new MAbsen();
        $model->insert($data);
        $absen = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $absen);
    }

    public function list()
    {
        $model = new MAbsen();
        $absen = $model->findAll();
        return $this->responseHasil(200, true, $absen);
    }

    public function detail($uid)
    {
        $model = new MAbsen();
        $absen = $model->where('uid', $uid)->find();
        
        return $this->responseHasil(200, true, $absen);
    }

    public function ubah($id)
    {
        $data = [
            'uid' => $this->request->getVar('uid'),
            'nama' => $this->request->getVar('nama'),
            'tgl_submit' => $this->request->getVar('tgl_submit'),
            'lokasi' => $this->request->getVar('lokasi'),
            'kordinat' => $this->request->getVar('kordinat')
        ];
        
        $model = new MAbsen();
        $model->update($id, $data);
        $absen = $model->find($id);

        return $this->responseHasil(200, true, $absen);
    }

    public function hapus($id)
    {
        $model = new MAbsen();
        $absen = $model->delete($id);

        return $this->responseHasil(200, true, $absen);
    }
}