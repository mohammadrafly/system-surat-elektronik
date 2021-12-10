<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuratModel;
use App\Models\UserModel;

class RegularUserController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "user") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        $this->modelsurat = new SuratModel;
        $this->modeluser = new UserModel;
        $data = $this->modelsurat->where('updated_at', 'DESC')->getSurat()->getResult();
        $data = array(
            'id_surat' => $this->modelsurat->allSurat(),
            'id' => $this->modeluser->allUser(),
            'content' => $data
            );
        return view("user/dashboard", $data);
    }
    public function profile()
    {
        return view('user/profile');
    }
    public function kirimSurat()
    {
        return view('user/surat');
    }
    public function kirimSuratProses()
    {
        $default    = 1;
		$file       = $this->request->getFile('file_surat');
		$randomName = $file->getRandomName();
        if ($file->isValid() && ! $file->hasMoved())
        {
            $file->move('uploads',$randomName);
            session()->setFlashData('message','Berhasil upload');
        }else{
            session()->setFlashData('message','Gagal upload');
        }

        $file2      = $this->request->getFile('draft_naskah');
        $randomName2= $file2->getRandomName();
        if ($file2->isValid() && ! $file2->hasMoved())
        {
            $file2->move('uploads',$randomName2);
            session()->setFlashData('message','Berhasil upload');
        }else{
            session()->setFlashData('message','Gagal upload');
        }
		//insert data surat
        $surat = new SuratModel();
        $surat->insert([
            //mengambil id sesuai session login
            'id_user' => session()->get('id'),
            'file_surat' => $randomName,
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_status_kerjasama' => $this->request->getVar('id_status_kerjasama'),
            'id_dnk' => $this->request->getVar('id_dnk'),
            'draft_naskah' => $randomName2,
            'id_status' => $default,
            'isi_surat' => $this->request->getVar('isi_surat')
        ]);
		return redirect()->to(base_url("/user/surat"));
    }
}

