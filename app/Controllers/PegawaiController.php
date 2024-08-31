<?php

namespace App\Controllers;

use App\Models\MPegawai;

class PegawaiController extends RestfulController
{
    public function create()
    {
        $random_uid = strtoupper(bin2hex(random_bytes(3.5)));
        $data = [
            'id_pegawai' => $random_uid,
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'jobdesk' => "Belum Ditentukan",
            'no_tlp' => "08", 
            'gender' => $this->request->getVar('gender'),
            'gaji' => 0,
            'email' => null,
            'password' => null
        ];

        $model = new MPegawai();
        $model->insert($data);
        $pegawai = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $pegawai);
    }

    public function list()
    {
        $model = new MPegawai();
        $pegawai = $model->findAll();
        return $this->responseHasil(200, true, $pegawai);
    }

    public function detail($id)
    {
        $model = new MPegawai();
        $pegawai = $model->find($id);
        return $this->responseHasil(200, true, $pegawai);
    }

    public function ubah($id)
    {
        $data = [
            'nama_pegawai' => $this->request->getVar('nama_pegawai'),
            'jobdesk' => $this->request->getVar('jobdesk'),
            'no_tlp' => $this->request->getVar('no_tlp'), 
            'gender' => $this->request->getVar('gender'),
            'gaji' => $this->request->getVar('gaji'),
            'email' => strtolower($this->request->getVar('email')),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];

        $model = new MPegawai();
        $model->update($id, $data);
        $pegawai = $model->find($id);

        return $this->responseHasil(200, true, $pegawai);
    }
    

    public function hapus($id)
    {
        $model = new MPegawai();
        $pegawai = $model->delete($id);

        return $this->responseHasil(200, true, $pegawai);
    }
}