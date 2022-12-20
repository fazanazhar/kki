<?php 
namespace App\Controllers;
use App\Models\Crud_masterdatapelanggan;
use CodeIgniter\Controller;
 
class Crud_masterpelanggan extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Master Data Customer'
        ];
         $crud_masterdatapelanggan = new Crud_masterdatapelanggan();;
        $data['masterdatas'] = $crud_masterdatapelanggan->orderBy('mp_id', 'DESC')->findAll();
        return view('crud_masterpelanggan/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Master Data - Add Data'
        ];
        return view('crud_masterpelanggan/add', $data);
    }
  
    // insert data into database
    public function store() {
         $crud_masterdatapelanggan = new Crud_masterdatapelanggan();;
        $data = [
            'mp_nama' => $this->request->getVar('mp_nama'),
            'mp_kategori'  => $this->request->getVar('mp_kategori'),
        ];
        $crud_masterdatapelanggan->insert($data);
        return $this->response->redirect(site_url('masterdatapelanggan'));
    }
 
    // // view single user
    public function singleUser($mp_id = null){
         $crud_masterdatapelanggan = new Crud_masterdatapelanggan();;
        $data['master_barang_obj'] = $crud_masterdatapelanggan->where('mp_id', $mp_id)->first();
        return view('crud_masterpelanggan/edit1', $data);
    }
 
    // update user data
    public function update(){
         $crud_masterdatapelanggan = new Crud_masterdatapelanggan();;
        $mp_id = $this->request->getVar('mp_id');
        $data = [
            'mp_nama' => $this->request->getVar('mp_nama'),
            'mp_kategori'  => $this->request->getVar('mp_kategori'),
        ];
        $crud_masterdatapelanggan->update($mp_id, $data);
        return $this->response->redirect(site_url('masterdatapelanggan'));
    }
  
    // delete user
    public function masterdelete($mp_id = null){
         $crud_masterdatapelanggan = new Crud_masterdatapelanggan();;
        $data['master_pelanggan'] = $crud_masterdatapelanggan->where('mp_id', $mp_id)->delete($mp_id);
        return $this->response->redirect(site_url('/masterdatapelanggan'));
    }    
}