<?php

namespace App\Controllers;
use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PenggunahotelModel;
use App\Models\PenggunanModel;
use CodeIgniter\Email\Email;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Email as ConfigEmail;


use function PHPUnit\Framework\returnSelf;

class PenggunahotelController extends BaseController
{

    public function login(){
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('sandi');

        $pengguna = (new PenggunahotelModel())->where('email', $email)->first();

        if($pengguna == null){
            return $this->response->setJSON(['message'=>'Email tidak terdaftar'])
                        ->setStatusCode(404);
        }

        $cekPaswword = password_verify($password, $pengguna['sandi']);
        if($cekPaswword == false){
            return $this->response->setJSON(['message'=>'Email dan Passowrd tidak cocok'])
                        ->setStatusCode(403);
        }

        $this->session->set('penggunahotel', $pengguna);
        return $this->response->setJSON(['message'=>"Selamat datang {$pengguna['nama_depan']}"])
                    ->setStatusCode(200);
    }

    public function viewLogin(){
        return view('login');
    }

    public function lupaPassword(){
        $_email = $this->request->getPost('email');
        $password = $this->request->getPost('sandi');

        $pengguna = (new PenggunahotelModel())->where('email', $_email)->first();

        if($pengguna == null){
            return $this->response->setJSON(['message'=>'Email tidak terdaftar'])
                        ->setStatusCode(404);
        }

        $sandibaru =substr( md5( date('Y-m-dH:i:s')),5,5 );
        $pengguna['sandi'] = password_hash($sandibaru,PASSWORD_BCRYPT);
        $r = (new PenggunahotelModel())->update($pengguna['id'], $pengguna);

        if($r == false ){
            return $this->response->setJSON(['message'=>'Gagal merubah sandi'])
                        ->setStatusCode(502);
        }

        $email = new Email(new ConfigEmail());
        $email->setFrom('syarifihsan17@gmail.com', 'Sistem Arsip Digital');
        $email->setTo($pengguna['email']);
        $email->setSubject('Resest sandi penggunahotel');
        $email->setMessage("Halo {$pengguna['nama_depan']} telah meminta reset baru. Reset baru kamu adalah <b>$sandibaru</b>");
        $r = $email->send();

        if($r == true){
            return $this->response->setJSON(['message'=>"Sandi baru sudah dikirim ke alamat email $_email"])
                                  ->setStatusCode(200);
        }else{
            return $this->response->setJSON(['message'=>"Maaf ada kesalahan pengiriman email $_email"])
                                 ->setStatusCode(500);
        }
    }

    public function viewLupaPassword(){
        return view('lupa_password');
    }

    public function logout(){
        $this->session->destroy();
        return redirect()->to('login');
    }
    
    public function index()
    {
        return view('Penggunahotel/table');       
    }
    public function all(){
        $mm = new PenggunahotelModel();
        $mm->select(['id', 'nama_depan', 'gender', 'alamat']);
        
        return (new Datatable ($mm))
                ->setFieldFilter(['nama_depan', 'gender' , 'alamat'])
                ->draw();
    }
    public function show($id){
        $r = (new PenggunahotelModel())->where('id', $id)->first();
        if ($r == null) throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
    }
    public function store(){
        $mm = new PenggunahotelModel();

        $id =  $mm -> insert([
            'nama_depan'       => $this->request->getVar('nama_depan'),
            'gender'    => $this->request->getVar('gender'),
            'alamat'  => $this->request->getVar('alamat'),
        ]);
        return $this->response->setJSON(['id' => $id])
        ->setStatusCode(intval($id)> 0 ? 200 : 406);  
    }
    public function update(){
        $mm = new PenggunahotelModel();
        $id = (int)$this->request->getVar('id');
        
        if($mm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();
        
        $hasil = $mm->update($id,[
            'nama_depan'       => $this->request->getVar('nama_depan'),
            'gender'    => $this->request->getVar('gender'),
            'alamat'  => $this->request->getVar('alamat'),
        ]);
        return $this->response->setJSON(['result'=>$hasil]);
    }
    public function delete(){
        $mm = new PenggunahotelModel();
        $id = $this->request->getVar('id');
        $hasil = $mm->delete($id);
        return $this->response->setJSON(['result' => $hasil]);
    }    
}