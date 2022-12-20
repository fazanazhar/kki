<?php 
namespace App\Controllers;
use App\Models\M_marketplace;
use CodeIgniter\Controller;
 
class Crud_marketplace extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Marketplace Data'
        ];
        $master_dataModel = new M_marketplace();
        $data['marketplacedatas'] = $master_dataModel->orderBy('M_No', 'DESC')->findAll();
        return view('crud_marketplace/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Marketplace Data'
        ];
        return view('crud_marketplace/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_marketplace();
        $data = [
            'M_PIC' => $this->request->getVar('M_PIC'),
            'M_Datetime'  => $this->request->getVar('M_Datetime'),
            'M_KodeBatch'  => $this->request->getVar('M_KodeBatch'),            
            'M_NamaProduk'  => $this->request->getVar('M_NamaProduk'),            
            'M_QTY'  => $this->request->getVar('M_QTY'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('marketplace'));
    }
 
    // // view single user
    public function singleUser($marketplace_id = null){
        $master_dataModel = new M_marketplace();
        $data['marketplace_barang_obj'] = $master_dataModel->where('M_No', $marketplace_id)->first();
        return view('crud_marketplace/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_marketplace();
        $marketplace_id = $this->request->getVar('M_No');
        $data = [
            'M_PIC' => $this->request->getVar('M_PIC'),
            'M_Datetime'  => $this->request->getVar('M_Datetime'),
            'M_KodeBatch'  => $this->request->getVar('M_KodeBatch'),            
            'M_NamaProduk'  => $this->request->getVar('M_NamaProduk'),            
            'M_QTY'  => $this->request->getVar('M_QTY'),
        ];
        $master_dataModel->update($marketplace_id, $data);
        return $this->response->redirect(site_url('marketplace'));
    }
  
    // delete user
    // public function masterdelete($No = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('No', $No)->delete($No);
    //     return $this->response->redirect(site_url('/marketplace'));
    // }    
     public function updateadmin(){
        $master_dataModel = new M_marketplace();
        $marketplace_id = $this->request->getVar('M_No');
        $data = [
            'M_Kontainer'  => $this->request->getVar('M_Kontainer'),            
            'M_KodeBatch'  => $this->request->getVar('M_KodeBatch'),            
            'M_NamaProduk'  => $this->request->getVar('M_NamaProduk'),            
            'M_QTY'  => $this->request->getVar('M_QTY'),
        ];
        $master_dataModel->update($marketplace_id, $data);
        return $this->response->redirect(site_url('marketplace'));
    }
}