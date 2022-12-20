<?php 
namespace App\Controllers;
use App\Models\M_disc;
use CodeIgniter\Controller;
 
class Crud_discmp extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'DiscMP Data'
        ];
        $master_dataModel = new M_disc();
        $data['discmpdatas'] = $master_dataModel->orderBy('DMP_No', 'DESC')->findAll();
        return view('crud_discmp/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'DisMP Data - QC'
        ];
        return view('crud_discmp/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_disc();
        $data = [
            'DMP_Datetime' => $this->request->getVar('DMP_Datetime'),
            'DMP_KodeBatch'  => $this->request->getVar('DMP_KodeBatch'),
            'DMP_NamaProduk'  => $this->request->getVar('DMP_NamaProduk'),            
            'DMP_QTY'  => $this->request->getVar('DMP_QTY'),            
            'DMP_PIC'  => $this->request->getVar('DMP_PIC'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('discmp'));
    }
 
    // // view single user
    public function singleUser($discmp_id = null){
        $master_dataModel = new M_disc();
        $data['discmp_barang_obj'] = $master_dataModel->where('DMP_No', $discmp_id)->first();
        return view('crud_discmp/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_disc();
        $discmp_id = $this->request->getVar('DMP_No');
        $data = [
            'DMP_Datetime' => $this->request->getVar('DMP_Datetime'),
            'DMP_KodeBatch'  => $this->request->getVar('DMP_KodeBatch'),
            'DMP_NamaProduk'  => $this->request->getVar('DMP_NamaProduk'),            
            'DMP_QTY'  => $this->request->getVar('DMP_QTY'),            
            'DMP_PIC'  => $this->request->getVar('DMP_PIC'),
        ];
        $master_dataModel->update($discmp_id, $data);
        return $this->response->redirect(site_url('discmp'));
    }
  
    // delete user
    // public function masterdelete($master_id = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('master_id', $master_id)->delete($master_id);
    //     return $this->response->redirect(site_url('/discmp'));
    // }    

     public function updateadmin(){
        $master_dataModel = new M_disc();
        $discmp_id = $this->request->getVar('DMP_No');
        $data = [
            'DMP_Kontainer' => $this->request->getVar('DMP_Kontainer'),
            'DMP_KodeBatch'  => $this->request->getVar('DMP_KodeBatch'),
            'DMP_NamaProduk'  => $this->request->getVar('DMP_NamaProduk'),            
            'DMP_QTY'  => $this->request->getVar('DMP_QTY'),
        ];
        $master_dataModel->update($discmp_id, $data);
        return $this->response->redirect(site_url('discmp'));
    }
}