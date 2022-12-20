<?php 
namespace App\Controllers;
use App\Models\M_sunsan;
use CodeIgniter\Controller;
 
class Crud_sunsan extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Sun San Data'
        ];
        $master_dataModel = new M_sunsan();
        $master = $master_dataModel->findAll();
        $data['sunsandatas'] = $master_dataModel->orderBy('S_No', 'DESC')->findAll();
        return view('crud_sunsan/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Sun San Data - QC'
        ];
        return view('crud_sunsan/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_sunsan();
        $data = [
            'S_Datetime' => $this->request->getVar('S_Datetime'),
            'S_KodeBatch'  => $this->request->getVar('S_KodeBatch'),
            'S_NamaProduk'  => $this->request->getVar('S_NamaProduk'),            
            'S_QTY'  => $this->request->getVar('S_QTY'),            
            'S_PIC'  => $this->request->getVar('S_PIC'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('sunsan'));
    }
 
    // // view single user
    public function singleUser($sunsan_id = null){
        $master_dataModel = new M_sunsan();
        $data['sunsan_barang_obj'] = $master_dataModel->where('S_No', $sunsan_id)->first();
        return view('crud_sunsan/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_sunsan();
        $sunsan_id = $this->request->getVar('S_No');
        $data = [
            'S_Datetime' => $this->request->getVar('S_Datetime'),
            'S_KodeBatch'  => $this->request->getVar('S_KodeBatch'),
            'S_NamaProduk'  => $this->request->getVar('S_NamaProduk'),            
            'S_QTY'  => $this->request->getVar('S_QTY'),            
            'S_PIC'  => $this->request->getVar('S_PIC'),
        ];
        $master_dataModel->update($sunsan_id, $data);
        return $this->response->redirect(site_url('sunsan'));
    }
  
    // delete user
    // public function masterdelete($master_id = null){
    //     $crud_masterdata = new Crud_masterdata();
    //     $data['master_barang'] = $crud_masterdata->where('master_id', $master_id)->delete($master_id);
    //     return $this->response->redirect(site_url('/sunsan'));
    // }   
    
    public function updateadmin(){
        $master_dataModel = new M_sunsan();
        $sunsan_id = $this->request->getVar('S_No');
        $data = [
            'S_Kontainer' => $this->request->getVar('S_Kontainer'),
            'S_KodeBatch'  => $this->request->getVar('S_KodeBatch'),
            'S_NamaProduk'  => $this->request->getVar('S_NamaProduk'),            
            'S_QTY'  => $this->request->getVar('S_QTY'),
        ];
        $master_dataModel->update($sunsan_id, $data);
        return $this->response->redirect(site_url('sunsan'));
    }
}