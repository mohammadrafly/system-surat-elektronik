<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SuratModel;

class UserController extends BaseController
{
    public function loginView()
    {
        return view('login');
    }
    public function login()
    {
        $admin = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataAdmin = $admin->where([
            'username' => $username,
        ])->first();
        if ($dataAdmin) {
            if (password_verify($password, $dataAdmin['password'])) {
                session()->set([
                    'username' => $dataAdmin['username'],
                    'password' => $dataAdmin['password'],
                    'id' => $dataAdmin['id'],
                    'name' => $dataAdmin['name'],
                    'phone_no' => $dataAdmin['phone_no'],
                    'created_at' => $dataAdmin['created_at'],
                    'isLoggedIn' => TRUE,
                    'role' => $dataAdmin['role'],
                ]);
                if($dataAdmin['role'] == "superadmin"){
                    return redirect()->to(base_url('superadmin'));
                }elseif($dataAdmin['role'] == "user"){
                    return redirect()->to(base_url('user'));
                }elseif($dataAdmin['role'] == "analis_nk"){
                    return redirect()->to(base_url('analis/nk'));
                }elseif($dataAdmin['role'] == "analis_sk"){
                    return redirect()->to(base_url('analis/sk'));
                }
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
