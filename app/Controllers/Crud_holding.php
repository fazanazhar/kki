<?php 
namespace App\Controllers;
use App\Models\M_holding_temp;
use CodeIgniter\Controller;
 
class Crud_holding extends BaseController
{
    
    // users list
    public function index(){
        $data = [
            'title' => 'Holding Data'
        ];
        $master_dataModel = new M_holding_temp();
        $master = $master_dataModel->findAll();
        $data['holdingdatas'] = $master_dataModel->orderBy('H_No', 'DESC')->findAll();
        // dd($master_dataModel);
        return view('crud_holding/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Holding Data - QC'
        ];
        return view('crud_holding/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_holding_temp();
        $data = [
            'H_Datetime' => $this->request->getVar('H_Datetime'),
            'RQ1_KodeKontainer' => $this->request->getVar('RQ1_KodeKontainer'),
            'H_KodeBatch' => $this->request->getVar('H_KodeBatch'),
            'H_NamaProduk'  => $this->request->getVar('H_NamaProduk'),
            'H_QTY'  => $this->request->getVar('H_QTY'),
            'H_PIC'  => $this->request->getVar('H_PIC'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('holding'));
    }
 
    // // view single user
    public function singleUser($holding_id = null){
        $master_dataModel = new M_holding_temp();
        $data['holding_barang_obj'] = $master_dataModel->where('H_No', $holding_id)->first();
        return view('crud_holding/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_holding_temp();
        $holding_id = $this->request->getVar('H_No');
        $data = [
            'H_Datetime' => $this->request->getVar('H_Datetime'),
            'RQ1_KodeKontainer' => $this->request->getVar('RQ1_KodeKontainer'),
            'H_KodeBatch' => $this->request->getVar('H_KodeBatch'),
            'H_NamaProduk'  => $this->request->getVar('H_NamaProduk'),
            'H_QTY'  => $this->request->getVar('H_QTY'),
            'H_PIC'  => $this->request->getVar('H_PIC'),
        ];
        $master_dataModel->update($holding_id, $data);
        return $this->response->redirect(site_url('holding'));
    }

     public function updateadmin(){
        $master_dataModel = new M_holding_temp();
        $holding_id = $this->request->getVar('H_No');
        $data = [
           
            'RQ1_KodeKontainer' => $this->request->getVar('RQ1_KodeKontainer'),
            'H_KodeBatch' => $this->request->getVar('H_KodeBatch'),
            'H_NamaProduk'  => $this->request->getVar('H_NamaProduk'),
            'H_QTY'  => $this->request->getVar('H_QTY'),
        ];
        $master_dataModel->update($holding_id, $data);
        return $this->response->redirect(site_url('holding'));
    }
  
    // delete user
    // public function holdingdelete($holding_id = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['Kode_Produk'] = $master_dataModel->where('No', $holding_id)->delete($holding_id);
    //     return $this->response->redirect(site_url('/holding'));
    // }    
}