<?php 
namespace App\Controllers;
use App\Models\M_shipping_box;
use App\Models\Crud_packing;
use CodeIgniter\Controller;
 
class Crud_shipping_box extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Shipping Box Data'
        ];
        $master_dataModel = new M_shipping_box();
        $data['shippingboxdatas'] = $master_dataModel->orderBy('SHP_No', 'DESC')->findAll();

        return view('crud_shipping_box/view', $data);
        }

    public function manggilIdYeuh(){
        $data = [
            'title' => 'Detail Box Final'
        ];
        $kodedus = $this->request->getVar('SHP_KodeDus');        
        // print_r($kodedus);
        $this->db = db_connect();
        $builderh = $this->db->table("final_detail_shippingbox");
        $builderh->where("FSHP_KodeDus ", $kodedus);
        $queryh = $builderh->get()->getResult();
        $data["packingdatas"] = $queryh;

        echo view('crud_shipping_box/table', $data);
    }   

    

    // user form
    public function create(){
         $data = [
            'title' => 'Shipping Box Data'
        ];
        return view('crud_shipping_box/add', $data);
    }
  
    // insert data into database
    public function store() {
        $master_dataModel = new M_shipping_box();
        $data = [
            'SHP_PIC' => $this->request->getVar('SHP_PIC'),
            'SHP_Datetime'  => $this->request->getVar('SHP_Datetime'),
            'SHP_KodeDus'  => $this->request->getVar('SHP_KodeDus'),            
            'SHP_NamaProduk'  => $this->request->getVar('SHP_NamaProduk'),            
            'SHP_QTY'  => $this->request->getVar('SHP_QTY'),
        ];
        $master_dataModel->insert($data);
        return $this->response->redirect(site_url('shippingbox'));
    }
 
    // // view single user
    public function singleUser($shipping_id = null){
        $master_dataModel = new M_shipping_box();
        $data['shipping_barang_obj'] = $master_dataModel->where('SHP_No', $shipping_id)->first();
        return view('crud_shipping/edit1', $data);
    }
 
    // update user data
    public function update(){
        $master_dataModel = new M_shipping_box();
        $shipping_id = $this->request->getVar('SHP_No');
        $data = [
            'SHP_PIC' => $this->request->getVar('SHP_PIC'),
            'SHP_Datetime'  => $this->request->getVar('SHP_Datetime'),
            'SHP_KodeDus'  => $this->request->getVar('SHP_KodeDus'),            
            'SHP_NamaProduk'  => $this->request->getVar('SHP_NamaProduk'),            
            'SHP_QTY'  => $this->request->getVar('SHP_QTY'),
        ];
        $master_dataModel->update($shipping_id, $data);
        return $this->response->redirect(site_url('shippingbox'));
    }
  
    // delete user
    // public function masterdelete($No = null){
    //     $master_dataModel = new master_dataModel();
    //     $data['master_barang'] = $master_dataModel->where('No', $No)->delete($No);
    //     return $this->response->redirect(site_url('/shipping'));
    // }    
}