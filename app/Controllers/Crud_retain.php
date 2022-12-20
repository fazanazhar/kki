<?php 
namespace App\Controllers;
use App\Models\M_retain;
use CodeIgniter\Controller;
 
class Crud_retain extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Retain Data'
        ];
        $master_dataModel = new M_retain();
        $data['retaindatas'] = $master_dataModel->orderBy('RTN_No', 'DESC')->findAll();
        return view('crud_retain/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Retain Data'
        ];
        return view('crud_retain/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_retain();
        $data = [
            'RTN_PIC' => $this->request->getVar('RTN_PIC'),
            'RTN_Datetime'  => $this->request->getVar('RTN_Datetime'),
            'RTN_KodeBatch'  => $this->request->getVar('RTN_KodeBatch'),            
            'RTN_NamaProduk'  => $this->request->getVar('RTN_NamaProduk'),            
            'RTN_QTY'  => $this->request->getVar('RTN_QTY'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('retain'));
    }
 
    // // view single user
    public function singleUser($retain_id = null){
        $master_dataModel = new M_retain();
        $data['retain_barang_obj'] = $master_dataModel->where('RTN_No', $retain_id)->first();
        return view('crud_retain/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_retain();
        $retain_id = $this->request->getVar('R_No');
        $data = [
            'RTN_PIC' => $this->request->getVar('RTN_PIC'),
            'RTN_Datetime'  => $this->request->getVar('RTN_Datetime'),
            'RTN_KodeBatch'  => $this->request->getVar('RTN_KodeBatch'),            
            'RTN_NamaProduk'  => $this->request->getVar('RTN_NamaProduk'),            
            'RTN_QTY'  => $this->request->getVar('RTN_QTY'),
        ];
        $master_dataModel->update($retain_id, $data);
        return $this->response->redirect(site_url('retain'));
    }
  
    // delete user
    // public function masterdelete($No = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('No', $No)->delete($No);
    //     return $this->response->redirect(site_url('/retain'));
    // }    
     public function updateadmin(){
        $master_dataModel = new M_retain();
        $retain_id = $this->request->getVar('R_No');
        $data = [
            'RTN_KodeKontainer'  => $this->request->getVar('RTN_KodeKontainer'),
            'RTN_KodeBatch'  => $this->request->getVar('RTN_KodeBatch'),            
            'RTN_NamaProduk'  => $this->request->getVar('RTN_NamaProduk'),            
            'RTN_QTY'  => $this->request->getVar('RTN_QTY'),
        ];
        $master_dataModel->update($retain_id, $data);
        return $this->response->redirect(site_url('retain'));
    }
}