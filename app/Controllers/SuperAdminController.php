<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\SuratModel;
use App\Models\EmailModel;
use App\Config\Email;

class SuperAdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "superadmin") {
            echo 'Access denied';
            exit;
        }
    }
    public function surat()
    {   
        $this->modelsurat = new SuratModel();
        $surat = $this->modelsurat->where('id_surat', 'DESC')->findAll();
        $data =  $this->modelsurat->getSurat()->getResult();
        $data = array(
            'title' => 'Data Surat',
            'content' => $data,
            'id_surat' => $surat
            );
        echo view('superadmin/surat',$data);
    }
    public function index()
    {
        $this->modelsurat = new SuratModel;
        $this->modeluser = new UserModel;
        $data = $this->modelsurat->getSurat()->getResult();
        $data = array(
            'id_surat' => $this->modelsurat->allSurat(),
            'id' => $this->modeluser->allUser(),
            'content' => $data
            );
        return view('superadmin/dashboard', $data);
    }
    public function profile()
    {
        return view('superadmin/profile');
    }
    public function user()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view('superadmin/user', $data);
    }
    public function tambah()
    {
        return view('superadmin/tambah');   
    }
    public function tambahUser()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'phone_no' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'role' => [
                'rules' => 'required|min_length[4]|max_length[10]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 10 Karakter',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'is_unique' => 'Email sudah digunakan sebelumnya',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $user = new UserModel();
        $user->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name'),
            'phone_no' => $this->request->getVar('phone_no'),
            'role' => $this->request->getVar('role'),
            'email' => $this->request->getVar('email'),
        ]);
        session()->setFlashData('message','Berhasil menambah user');
        return redirect()->to('superadmin/user');
    }
    
    public function editStatus($id = null)
	{
        $suratModel = new SuratModel();
        $data['surat'] = $suratModel->where('id_surat', $id)->first();
        return view('superadmin/editsurat', $data);
    }

    public function updateStatus(){
        $userModel = new SuratModel();
        $id = $this->request->getVar('id_surat');
        $data = [
            'id_status' => $this->request->getVar('id_status')
        ];
        $userModel->update($id, $data);
        session()->setFlashData('diterima','surat telah diupdate!');
        return $this->response->redirect(site_url('superadmin/surat'));
    }

    public function viewPDF($id = null)
	{
        $suratModel = new SuratModel();
        $data['surat'] = $suratModel->where('id_surat', $id)->first();
        return view('superadmin/viewpdf', $data);
    }

    public function viewPDFNaskah($id = null)
	{
        $suratModel = new SuratModel();
        $data['surat'] = $suratModel->where('id_surat', $id)->first();
        return view('superadmin/viewpdfnaskah', $data);
    }

    public function delete($id = null){
        $suratModel = new SuratModel();
        $data['surat'] = $suratModel->where('id_surat', $id)->delete($id);
        session()->setFlashData('berhasil', 'Surat berhasil dihapus!');
        return $this->response->redirect(site_url('superadmin/surat'));
    }

    public function deleteUser($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        session()->setFlashData('berhasil', 'User berhasil dihapus!');
        return $this->response->redirect(site_url('superadmin/user'));
    }

    public function viewEdit($id = null)
	{
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->first();
        return view('superadmin/edituser', $data);
    }

    public function prosesEdit(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'phone_no' => $this->request->getVar('phone_no'),
            'role' => $this->request->getVar('role'),
            'email' => $this->request->getVar('email')
        ];
        $userModel->update($id, $data);
        session()->setFlashData('berhasil', 'User berhasil diupdate!');
        return $this->response->redirect(site_url('superadmin/user'));
    }

    function sendMail()
    { 
        $to = 'email-penerima';
        $subject = 'Account Activation';
        $message = view('email/email.html');
        
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setFrom('email-pengirim', 'Confirm Registration');
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send())
		{
            echo 'Email successfully sent';
        } 
		else 
		{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
    public function viewEmail()
    {
        return view('superadmin/email');
    }
}
