<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Agoenxz21\Datatables\Datatable;
use App\Database\Migrations\Metodebayar;
use App\Models\MetodebayarModel;
use App\Models\PemesananModel;
use CodeIgniter\Exceptions\PageNotFoundException;
class MetodebayarController extends BaseController
{
    public function index()
    {
        return view('metodebayar/table');
    }
    public function all(){
        $pm = new MetodebayarModel();
        $pm ->select('id, metode, aktif');

        return (new Datatable($pm))
            ->setFieldFilter(['id','metode', 'aktif'])
            ->draw();
    }
    public function show($id){
        $r = (new MetodebayarModel())->where('id',$id)->first();
        if($r == null)throw PageNotFoundException::forPageNotFound();

        return $this->response->setJSON($r);
}
public function store(){
    $pm = new MetodebayarModel();

    $id = $pm->insert([
        'tahun_ajaran' =>$this->request->getVar('tahun_ajaran'),
        'tgl_mulai' =>$this->request->getVar('tgl_mulai'),
        'tgl_selesai' =>$this->request->getVar('tgl_selesai'),
        'status_aktif' =>$this->request->getVar('status_aktif'),
    ]);
    return $this->response->setJSON(['id' => $id])
                ->setStatusCode(intval($id) > 0 ? 200 : 406);
}
public function update(){
    $pm = new MetodebayarModel();
    $id = (int)$this->request->getVar('id');

    if($pm->find($id) == null)
        throw PageNotFoundException::forPageNotFound();

    $hasil = $pm ->update($id, [
        'tahun_ajaran' =>$this->request->getVar('tahun_ajaran'),
        'tgl_mulai' =>$this->request->getVar('tgl_mulai'),
        'tgl_selesai' =>$this->request->getVar('tgl_selesai'),
        'status_aktif' =>$this->request->getVar('status_aktif'),
    ]);
    return $this->response->setJSON(['result' =>$hasil]);
}
public function delete(){
    $pm = new MetodebayarModel();
    $id = $this->request->getVar('id');
    $hasil = $pm->delete($id);
    return $this->response->setJSON(['result' => $hasil]);
}
}