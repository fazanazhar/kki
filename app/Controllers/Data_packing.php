<?php 
namespace App\Controllers;
use App\Models\Crud_packing;
use App\Models\Crud_tpacking;
use CodeIgniter\Controller;
 
class Data_packing extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Detail Data Packing'
        ];
        $Crud_packing = new Crud_packing();
        // $Crud_tpacking = new Crud_tpacking();
        $master = $Crud_packing->findAll();
        // $mastertemp = $Crud_tpacking->findAll();
        $data['packingdatas'] = $Crud_packing->orderBy('K_No', 'DESC')->findAll();
        // $data['packingdatas'] = $Crud_tpacking->orderBy('K_No', 'DESC')->findAll();
        // dd($M_dataproduksi);
        return view('crud_packing/view', $data);
        
    }

   // // view single user
   public function singleUser($packingdetail_id = null){
    $Crud_tpacking = new Crud_tpacking();
    $data['detail_packing_obj'] = $Crud_tpacking->where('K_No', $packingdetail_id)->first();
    return view('crud_packing/edit1', $data);
}

// update user data
public function update(){
    $Crud_tpacking = new Crud_tpacking();
    $Crud_packing = new Crud_packing();
    $packingdetail_id = $this->request->getVar('K_No');
    $data = [
        'K_PIC'  => $this->request->getVar('K_PIC'),
        'K_Datetime'  => $this->request->getVar('K_Datetime'),
        'RQ2_KodeKontainer'  => $this->request->getVar('RQ2_KodeKontainer'),
        'K_Kodebatch'  => $this->request->getVar('K_Kodebatch'),            
        'K_NamaProduk'  => $this->request->getVar('K_NamaProduk'),            
        'K_QTY'  => $this->request->getVar('K_QTY'),            
        'K_KodeDus'  => $this->request->getVar('K_KodeDus'),
    ];
    $datapacking = [
        'K_PIC'  => $this->request->getVar('K_PIC'),
        'K_Datetime'  => $this->request->getVar('K_Datetime'),
        'K_Kodebatch'  => $this->request->getVar('K_Kodebatch'),            
        'K_NamaProduk'  => $this->request->getVar('K_NamaProduk'),            
        'K_QTY'  => $this->request->getVar('K_QTY'),            
        'K_KodeDus'  => $this->request->getVar('K_KodeDus'), 
    ];
    $Crud_tpacking->update($packingdetail_id, $data);
    $Crud_packing->update($packingdetail_id, $datapacking);
    return $this->response->redirect(site_url('data_packing'));
}
  
    public function updateadmin(){
    $Crud_tpacking = new Crud_tpacking();
    $Crud_packing = new Crud_packing();
    $packingdetail_id = $this->request->getVar('K_No');
    $data = [
        'RQ2_KodeKontainer'  => $this->request->getVar('RQ2_KodeKontainer'),
        'K_Kodebatch'  => $this->request->getVar('K_Kodebatch'),            
        'K_NamaProduk'  => $this->request->getVar('K_NamaProduk'),            
        'K_QTY'  => $this->request->getVar('K_QTY'),            
        'K_KodeDus'  => $this->request->getVar('K_KodeDus'),
    ];
    $datapacking = [
        'K_Kodebatch'  => $this->request->getVar('K_Kodebatch'),            
        'K_NamaProduk'  => $this->request->getVar('K_NamaProduk'),            
        'K_QTY'  => $this->request->getVar('K_QTY'),            
        'K_KodeDus'  => $this->request->getVar('K_KodeDus'), 
    ];
    $Crud_tpacking->update($packingdetail_id, $data);
    $Crud_packing->update($packingdetail_id, $datapacking);
    return $this->response->redirect(site_url('data_packing'));
}
}