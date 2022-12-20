<?php 
namespace App\Controllers;
use App\Models\M_destroy;
use CodeIgniter\Controller;
 
class Crud_destroy extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Destroy Data'
        ];
        $master_dataModel = new M_destroy();
        $data['destroydatas'] = $master_dataModel->orderBy('D_No', 'DESC')->findAll();
        return view('crud_destroy/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Destroy Data'
        ];
        return view('crud_destroy/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_destroy();
        $data = [
            'D_PIC' => $this->request->getVar('D_PIC'),
            'D_Datetime'  => $this->request->getVar('D_Datetime'),
            'D_KodeBatch'  => $this->request->getVar('D_KodeBatch'),            
            'D_NamaProduk'  => $this->request->getVar('D_NamaProduk'),            
            'D_QTY'  => $this->request->getVar('D_QTY'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('destroy'));
    }
 
    // // view single user
    public function singleUser($destroy_id = null){
        $master_dataModel = new M_destroy();
        $data['destroy_barang_obj'] = $master_dataModel->where('D_No', $destroy_id)->first();
        return view('crud_destroy/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_destroy();
        $destroy_id = $this->request->getVar('D_No');
        $data = [
            'D_PIC' => $this->request->getVar('D_PIC'),
            'D_Datetime'  => $this->request->getVar('D_Datetime'),
            'D_KodeBatch'  => $this->request->getVar('D_KodeBatch'),            
            'D_NamaProduk'  => $this->request->getVar('D_NamaProduk'),            
            'D_QTY'  => $this->request->getVar('D_QTY'),
        ];
        $master_dataModel->update($destroy_id, $data);
        return $this->response->redirect(site_url('destroy'));
    }
  
    // delete user
    // public function masterdelete($No = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('No', $No)->delete($No);
    //     return $this->response->redirect(site_url('/destroy'));
    // }    
    public function updateadmin(){
        $master_dataModel = new M_destroy();
        $destroy_id = $this->request->getVar('D_No');
        $data = [
            'D_KodeBatch'  => $this->request->getVar('D_KodeBatch'),            
            'D_NamaProduk'  => $this->request->getVar('D_NamaProduk'),            
            'D_QTY'  => $this->request->getVar('D_QTY'),
        ];
        $master_dataModel->update($destroy_id, $data);
        return $this->response->redirect(site_url('destroy'));
    }
}