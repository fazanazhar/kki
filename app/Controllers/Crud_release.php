<?php 
namespace App\Controllers;
use App\Models\M_release;
use CodeIgniter\Controller;
 
class Crud_release extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Release Data'
        ];
        $master_dataModel = new M_release();
        $data['releasedatas'] = $master_dataModel->orderBy('R_No', 'DESC')->findAll();
        return view('crud_release/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Release Data - QC'
        ];
        return view('crud_release/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_release();
        $data = [
            'R_PIC' => $this->request->getVar('R_PIC'),
            'R_Datetime'  => $this->request->getVar('R_Datetime'),
            'R_KodeBatch'  => $this->request->getVar('R_KodeBatch'),            
            'R_NamaProduk'  => $this->request->getVar('R_NamaProduk'),            
            'R_QTY'  => $this->request->getVar('R_QTY'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('release'));
    }
 
    // // view single user
    public function singleUser($release_id = null){
        $master_dataModel = new M_release();
        $data['release_barang_obj'] = $master_dataModel->where('R_No', $release_id)->first();
        return view('crud_release/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_release();
        $release_id = $this->request->getVar('R_No');
        $data = [
            'R_PIC' => $this->request->getVar('R_PIC'),
            'R_Datetime'  => $this->request->getVar('R_Datetime'),
            'R_KodeBatch'  => $this->request->getVar('R_KodeBatch'),            
            'R_NamaProduk'  => $this->request->getVar('R_NamaProduk'),            
            'R_QTY'  => $this->request->getVar('R_QTY'),
        ];
        $master_dataModel->update($release_id, $data);
        return $this->response->redirect(site_url('release'));
    }
  
    // delete user
    // public function masterdelete($No = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('No', $No)->delete($No);
    //     return $this->response->redirect(site_url('/release'));
    // } 
    
    public function updateadmin(){
        $master_dataModel = new M_release();
        $release_id = $this->request->getVar('R_No');
        $data = [
            'R_KodeBatch'  => $this->request->getVar('R_KodeBatch'),            
            'R_NamaProduk'  => $this->request->getVar('R_NamaProduk'),            
            'R_QTY'  => $this->request->getVar('R_QTY'),
        ];
        $master_dataModel->update($release_id, $data);
        return $this->response->redirect(site_url('release'));
    }
}