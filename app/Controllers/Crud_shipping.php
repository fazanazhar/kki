<?php 
namespace App\Controllers;
use App\Models\M_shipping;
use CodeIgniter\Controller;
 
class Crud_shipping extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Shipping Item Data'
        ];
        $master_dataModel = new M_shipping();
        $data['shippingdatas'] = $master_dataModel->orderBy('SHP_No', 'DESC')->findAll();
        return view('crud_shipping/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Shipping Item Data'
        ];
        return view('crud_shipping/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_shipping();
        $data = [
            'SHP_PIC' => $this->request->getVar('SHP_PIC'),
            'SHP_Datetime'  => $this->request->getVar('SHP_Datetime'),
            'SHP_KodeBatch'  => $this->request->getVar('SHP_KodeBatch'),            
            'SHP_NamaProduk'  => $this->request->getVar('SHP_NamaProduk'),            
            'SHP_QTY'  => $this->request->getVar('SHP_QTY'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('shippingitem'));
    }
 
    // // view single user
    public function singleUser($shipping_id = null){
        $master_dataModel = new M_shipping();
        $data['shipping_barang_obj'] = $master_dataModel->where('SHP_No', $shipping_id)->first();
        return view('crud_shipping/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_shipping();
        $shipping_id = $this->request->getVar('SHP_No');
        $data = [
            'SHP_PIC' => $this->request->getVar('SHP_PIC'),
            'SHP_Datetime'  => $this->request->getVar('SHP_Datetime'),
            'SHP_KodeBatch'  => $this->request->getVar('SHP_KodeBatch'),            
            'SHP_NamaProduk'  => $this->request->getVar('SHP_NamaProduk'),            
            'SHP_QTY'  => $this->request->getVar('SHP_QTY'),
        ];
        $master_dataModel->update($shipping_id, $data);
        return $this->response->redirect(site_url('shippingitem'));
    }

    public function updateadmin(){
        $master_dataModel = new M_shipping();
        $reject_id = $this->request->getVar('SHP_No');
        $data = [
            'SHP_KodeBatch'  => $this->request->getVar('SHP_KodeBatch'),            
            'SHP_NamaProduk'  => $this->request->getVar('SHP_NamaProduk'),            
            'SHP_QTY'  => $this->request->getVar('SHP_QTY'),
        ];
        $master_dataModel->update($reject_id, $data);
        return $this->response->redirect(site_url('shippingitem'));
    }
  
    // delete user
    // public function masterdelete($No = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('No', $No)->delete($No);
    //     return $this->response->redirect(site_url('/shipping'));
    // }    
}