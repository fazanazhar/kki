<?php 
namespace App\Controllers;
use App\Models\M_rejectholding;
use CodeIgniter\Controller;
 
class Crud_reject extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Reject Data'
        ];
        $master_dataModel = new M_rejectholding();
        $data['rejectdatas'] = $master_dataModel->orderBy('RJT_No', 'DESC')->findAll();
        return view('crud_reject/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Reject Data'
        ];
        return view('crud_reject/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_rejectholding();
        $data = [
            'RJT_PIC' => $this->request->getVar('RJT_PIC'),
            'RJT_Datetime'  => $this->request->getVar('RJT_Datetime'),
            'RJT_KodeBatch'  => $this->request->getVar('RJT_KodeBatch'),            
            'RJT_NamaProduk'  => $this->request->getVar('RJT_NamaProduk'),            
            'RJT_QTY'  => $this->request->getVar('RJT_QTY'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('reject_holding'));
    }
 
    // // view single user
    public function singleUser($reject_id = null){
        $master_dataModel = new M_rejectholding();
        $data['reject_barang_obj'] = $master_dataModel->where('RJT_No', $reject_id)->first();
        return view('crud_reject/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_rejectholding();
        $reject_id = $this->request->getVar('D_No');
        $data = [
            'RJT_PIC' => $this->request->getVar('RJT_PIC'),
            'RJT_Datetime'  => $this->request->getVar('RJT_Datetime'),
            'RJT_KodeBatch'  => $this->request->getVar('RJT_KodeBatch'),            
            'RJT_NamaProduk'  => $this->request->getVar('RJT_NamaProduk'),            
            'RJT_QTY'  => $this->request->getVar('RJT_QTY'),
        ];
        $master_dataModel->update($reject_id, $data);
        return $this->response->redirect(site_url('reject_holding'));
    }
  
     public function updateadmin(){
        $master_dataModel = new M_rejectholding();
        $reject_id = $this->request->getVar('D_No');
        $data = [
            'RJT_KodeBatch'  => $this->request->getVar('RJT_KodeBatch'),            
            'P2_KodeKontainer'  => $this->request->getVar('P2_KodeKontainer'),            
            'RJT_NamaProduk'  => $this->request->getVar('RJT_NamaProduk'),            
            'RJT_QTY'  => $this->request->getVar('RJT_QTY'),
        ];
        $master_dataModel->update($reject_id, $data);
        return $this->response->redirect(site_url('reject_holding'));
    }
    // delete user
    // public function masterdelete($No = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('No', $No)->delete($No);
    //     return $this->response->redirect(site_url('/reject'));
    // }    
}