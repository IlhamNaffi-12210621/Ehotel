<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Models\TamuModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class TamuController extends BaseController

{
    public function index()
    {
        return view('Tamu/table');
    }
    public function all(){
        $pm = new TamuModel();
        $pm ->select('id, nama_depan, nama_belakang, gender, alamat, kota, negara_id, nohp, email');

        return (new Datatable($pm))
            ->setFieldFilter(['id', 'nama_depan', 'nama_belakang', 'gender', 'alamat', 'kota', 'negara_id', 'nohp', 'email'])
            ->draw();
    }
    public function show($id){
        $r = (new TamuModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new TamuModel();

    $id = $pm->insert([
        'nama_depan'             => $this->request->getVar('nama_depan'),
        'nama_belakang'             => $this->request->getVar('nama_belakang'),
        'gender'         => $this->request->getVar('gender'),
        'alamat'             => $this->request->getVar('alamat'),
        'kota'        => $this->request->getVar('kota'),
        'negara_id'        => $this->request->getVar('negara_id'),
        'nohp'        => $this->request->getVar('nohp'),
        'email'        => $this->request->getVar('email'),
    ]);
    return $this->response->setJSON(['id' => $id])
    ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new TamuModel();
    $id = (int)$this->request->getVar('id');
    
    if($pm->find($id) == null)
    throw PageNotFoundException::forPageNotFound();
    
    $hasil = $pm ->update($id, [
        'nama_depan'             => $this->request->getVar('nama_depan'),
        'nama_belakang'             => $this->request->getVar('nama_belakang'),
        'gender'         => $this->request->getVar('gender'),
        'alamat'             => $this->request->getVar('alamat'),
        'kota'        => $this->request->getVar('kota'),
        'negara_id'        => $this->request->getVar('negara_id'),
        'nohp'        => $this->request->getVar('nohp'),
        'email'        => $this->request->getVar('email'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new TamuModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}