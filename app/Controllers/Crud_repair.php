<?php 
namespace App\Controllers;
use App\Models\M_repair;
use CodeIgniter\Controller;
 
class Crud_repair extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Repair Data'
        ];
        $master_dataModel = new M_repair();
        $data['repairdatas'] = $master_dataModel->orderBy('RPR_No', 'DESC')->findAll();
        return view('crud_repair/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Repair Data - QC'
        ];
        return view('crud_repair/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_repair();
        $data = [
            'RPR_PIC' => $this->request->getVar('RPR_PIC'),
            'RPR_Datetime'  => $this->request->getVar('RPR_Datetime'),
            'R_KodeKontainer'  => $this->request->getVar('R_KodeKontainer'),            
            'RPR_KodeBatch'  => $this->request->getVar('RPR_KodeBatch'),            
            'RPR_NamaProduk'  => $this->request->getVar('RPR_NamaProduk'),            
            'RPR_QTY'  => $this->request->getVar('RPR_QTY'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('repair'));
    }
 
    // // view single user
    public function singleUser($repair_id = null){
        $master_dataModel = new M_repair();
        $data['repair_barang_obj'] = $master_dataModel->where('RPR_No', $repair_id)->first();
        return view('crud_repair/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_repair();
        $repair_id = $this->request->getVar('RPR_No');
        $data = [
            'RPR_PIC' => $this->request->getVar('RPR_PIC'),
            'RPR_Datetime'  => $this->request->getVar('RPR_Datetime'),
            'R_KodeKontainer'  => $this->request->getVar('R_KodeKontainer'),            
            'RPR_KodeBatch'  => $this->request->getVar('RPR_KodeBatch'),            
            'RPR_NamaProduk'  => $this->request->getVar('RPR_NamaProduk'),            
            'RPR_QTY'  => $this->request->getVar('RPR_QTY'),
        ];
        $master_dataModel->update($repair_id, $data);
        return $this->response->redirect(site_url('repair'));
    }
  
    public function updateadmin(){
        $master_dataModel = new M_repair();
        $repair_id = $this->request->getVar('RPR_No');
        $data = [

            'R_KodeKontainer'  => $this->request->getVar('R_KodeKontainer'),            
            'RPR_KodeBatch'  => $this->request->getVar('RPR_KodeBatch'),            
            'RPR_NamaProduk'  => $this->request->getVar('RPR_NamaProduk'),            
            'RPR_QTY'  => $this->request->getVar('RPR_QTY'),
        ];
        $master_dataModel->update($repair_id, $data);
        return $this->response->redirect(site_url('repair'));
    }
    // delete user
    // public function masterdelete($No = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('No', $No)->delete($No);
    //     return $this->response->redirect(site_url('/repair'));
    // }    
}