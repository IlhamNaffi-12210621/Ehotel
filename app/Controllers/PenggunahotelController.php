<?php

namespace App\Controllers;

use Agoenxz21\Datatables\Datatable;
use App\Controllers\BaseController;
use App\Models\PenggunahotelModel;
use CodeIgniter\Email\Email;
use Config\Email as ConfigEmail;

class PenggunahotelController extends BaseController
{
        public function login()
        {
            $password      = $this->request->getPost('sandi');
            $pengguna   = (new PenggunahotelModel())->where('email, $email')->first();
            
            if($pengguna == null){
                return $this->response->setJSON(['message'=>'Email tidak terdaftar'])
                ->setStatusCode(404);
            }
            
            $cekPassword = password_verify($password, $pengguna['sandi']);
            if($cekPassword == false){
                return $this->response->setJSON(['message'=>'Email dan sandi tidak cocok'])
                ->setStatusCode(403);
            }
            
            $this->session->set('pengguna', $pengguna);
            return $this->response->setJSON(['message'=>"Selamat datang {$pengguna['nama']}"])
            ->setStatusCode(200);
        }
        
        public function viewlogin(){
            return view('login');
        }
        
        public function lupaPassword()
        {       
            $email         = $this->request->getPost('email');
            $pengguna   = (new PenggunahotelModel())->where('email, $_email')->first();
            
            if($pengguna == null){
                return $this->response->setJSON(['message'=>'Email tidak terdaftar'])
                ->setStatusCode(404);
            }

            $sandibaru         = substr( md5( date('Y-m-dH:i:s')),5,5 );
            $pengguna['sandi'] = password_hash($sandibaru, PASSWORD_BCRYPT);
            $r                 = (new PenggunahotelModel())->update($pengguna['id'], $pengguna);

            if($r == false){
                return $this->response->setJSON(['message'=>'Email tidak terdaftar'])
                            ->setStatusCode(520);
            }

            $email = new Email(new ConfigEmail());
            $email->setFrom('naffiilham@gmail.com', 'Sistem Ehotel');
            $email->setTo($pengguna['email']);
            $email->setSubject('Reset sandi pengguna');
            $email->setMessage("Hallo {$pengguna['nama']} telah meminta reset baru. Reset baru kamu adalah <b>$sandibaru</b>");
            $r = $email->send();

            if($r == true){
                    return $this->response->setJSON(['message'=>"Sandi baru sudah di kirim ke alamat email $email"])
                                ->setStatusCode(200);
            }else{
                    return $this->response->setJSON(['message'=>"Sandi baru sudah di kirim ke alamat email $email"])
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

        public function index(){
            return view('Pengguna/table');
        }

        public function all(){
            $pm = new PenggunahotelModel();
            $pm->select('id, nama, gender, email');

            return (new Datateble( $pm ))
                    ->setFieldFilter(['nama', 'email', 'gender'])
                    ->draw();
        }
}