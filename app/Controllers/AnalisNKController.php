<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuratModel;
use App\Models\UserModel;

class AnalisNKController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "analis_nk") {
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
        return view('analisnk/dashboard', $data);
    }

    public function liatNaskah()
    {
        $this->modelsurat = new SuratModel;
        $data = $this->modelsurat->getSurat()->getResult();
        $data = array(
            'title' => 'List Naskah Kerjasama',
            'content' => $data
            );
        return view('analisnk/liatnaskah', $data);
    }

    public function viewPDFNaskah($id = null)
	{
        $suratModel = new SuratModel();
        $data['surat'] = $suratModel->where('id_surat', $id)->first();
        return view('analisnk/viewpdfnaskah', $data);
    }

    public function profile()
    {
        return view('analisnk/profile');
    }
}
