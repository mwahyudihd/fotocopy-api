<?php

namespace App\Controllers;

use App\Models\MPelanggan;

class PelangganController extends RestfulController
{
    public function create()
    {
        $random_num = mt_rand(100000, 999999);
        $data = [
            'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
            'jenis_pesanan' => $this->request->getVar('jenis_pesanan'),
            'alamat' => $this->request->getVar('alamat'),
            'status' => 'belum',
            'jumlah_unit' => $this->request->getVar('jumlah_unit'),
            'kode_unit' => $this->request->getVar('kode_unit'),
            'kategori' => $this->request->getVar('kategori'),
            'kode_pesanan' => $random_num,
            'harga_unit' => $this->request->getVar('harga_unit')
        ];

        $model = new MPelanggan();
        $model->insert($data);
        $pelanggan = $model->find($model->getInsertID());
        return $this->responseHasil(200, true, $pelanggan);
    }

    public function list()
    {
        $model = new MPelanggan();
        $pelanggan = $model->findAll();
        return $this->responseHasil(200, true, $pelanggan);
    }
    
    public function list_status($status)
    {
        $model = new MPelanggan();
        $pelanggan = $model->where('status', $status)->find();
        return $this->responseHasil(200, true, $pelanggan);
    }
    
    public function list_status_pdk($status)
    {
        $model = new MPelanggan();
        $pelanggan = $model->where('status', $status)->where('kategori', 'produk')->find();
        return $this->responseHasil(200, true, $pelanggan);
    }
    
    public function list_status_js($status)
    {
        $model = new MPelanggan();
        $pelanggan = $model->where('status', $status)->where('kategori', 'jasa')->find();
        return $this->responseHasil(200, true, $pelanggan);
    }
    
    public function ubah_status($id)
    {
        
        $status = $this->request->getVar('status');

        $data = [
            'status' => $status
        ];

        $model = new MPelanggan();
        $model->update($id, $data);
        $pelanggan = $model->find($id);
    
        return $this->responseHasil(200, true, $pelanggan);
    }



    public function detail($id)
    {
        $model = new MPelanggan();
        $pelanggan = $model->find($id);
        return $this->responseHasil(200, true, $pelanggan);
    }

    public function ubah($id)
    {
        $data = [
            'nama_pelanggan' => $this->request->getVar('nama_pelanggan'),
            'jenis_pesanan' => $this->request->getVar('jenis_pesanan'),
            'alamat' => $this->request->getVar('alamat'),
            'status' => $this->request->getVar('status'),
            'jumlah_unit' => $this->request->getVar('jumlah_unit'),
            'kode_unit' => $this->request->getVar('kode_unit'),
            'kategori' => $this->request->getVar('kategori'),
            'harga_unit' => $this->request->getVar('harga_unit')
        ];

        $model = new MPelanggan();
        $model->update($id, $data);
        $pelanggan = $model->find($id);

        return $this->responseHasil(200, true, $pelanggan);
    }

    public function hapus($id)
    {
        $model = new MPelanggan();
        $pelanggan = $model->delete($id);

        return $this->responseHasil(200, true, $pelanggan);
    }
}