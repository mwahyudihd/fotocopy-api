<?php

namespace App\Controllers;

use App\Models\MLogin;
use App\Models\MUsers;

class LoginController extends RestfulController
{
    public function login()
    {
        $email = strtolower($this->request->getVar('email'));
        $password = $this->request->getVar('password');

        $model = new MUsers();
        $pegawai = $model->where(['email' => $email])->first();
        if(!$pegawai)
        {
            return $this->responseHasil(400, false, "Email tidak ditemukan");
        }
        if(!password_verify($password, $pegawai['password']))
        {
            return $this->responseHasil(400, false, "Password tidak valid");
        }
        
        if(strtolower($pegawai['jobdesk']) == 'admin'){
            $role_checked = 'admin';
        }else if(strtolower($pegawai['jobdesk']) == 'kasir'){
            $role_checked = 'casier';
        }
        else{
            $role_checked = 'member';
        }

        $login = new MLogin();
        $auth_key = $this->RandomString();
        $login->save([
            'pegawai_id' => $pegawai['id_pegawai'],
            'auth_key' => $auth_key,
            'role' => $role_checked,
        ]);
        $data = [
            'token' => $auth_key,
            'user' => [
                'id' => $pegawai['id_pegawai'],
                'email' => $pegawai['email']
            ],
            'role' => $role_checked,
        ];
        return $this->responseHasil(200, true, $data);
    }

    private function RandomString($length = 100)
    {
        $karakter = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang_karakter = strlen($karakter);
        $str = '';

        for($i = 0; $i < $length; $i++)
        {
            $str .= $karakter[rand(0, $panjang_karakter - 1)];
        }
        return $str;
    }
}