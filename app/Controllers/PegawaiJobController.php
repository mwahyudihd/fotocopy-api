<?php

namespace App\Controllers;

use App\Models\MPegawai;

class PegawaiJobController extends RestfulController
{
    public function ubah($id)
    {
        $models = new MPegawai();
        $pegawai_set = $models->find($id);
        $data = [
            'id_pegawai' => $id,
            'nama_pegawai' => $pegawai_set['nama_pegawai'],
            'jobdesk' => $this->request->getVar('jobdesk'),
            'no_tlp' => $pegawai_set['no_tlp'], 
            'gender' => $pegawai_set['gender'],
            'gaji' => $this->request->getVar('gaji'),
            'email' => $pegawai_set['email'],
            'password' => $pegawai_set['password'],
        ];

        $model = new MPegawai();
        $model->update($id, $data);
        $pegawai = $model->find($id);

        return $this->responseHasil(200, true, $pegawai);
    }
}