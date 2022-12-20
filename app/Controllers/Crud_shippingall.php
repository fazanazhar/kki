<?php 
namespace App\Controllers;
use App\Models\M_shipping_box;
use App\Models\M_shippingdetail;
use App\Models\M_shipping;
use CodeIgniter\Controller;
 
class Crud_shippingall extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Shipping All Data'
        ];

        $this->db = db_connect();

        $sql = 'SELECT `FSHP_PIC`, DATE_FORMAT(`FSHP_Datetime`, "%d-%m-%Y, %H:%i:%s") as date , `FSHP_KodeBatch`, `FSHP_NamaProduk`, `FSHP_Kategori`, `FSHP_QTY`, `FSHP_Customer`, `FSHP_Expedition` FROM `final_detail_shippingbox` UNION SELECT `SHP_PIC`, DATE_FORMAT(`SHP_Datetime`, "%d-%m-%Y, %H:%i:%s") as date, `SHP_KodeBatch`, `SHP_NamaProduk`, `SHP_Kategori`, `SHP_QTY`, `SHP_Customer`, `SHP_Expedition` FROM `final_shipping` ORDER BY date DESC';
        $query = $this->db->query($sql)->getResult();
       
        $data['shippingalldatas'] = $query;
       
        return view('crud_shippingall/view', $data);
    }

    public function updateadmin(){
        $master_dataModel = new M_shippingdetail();
        $reject_id = $this->request->getVar('FSHP_No');
        $data = [
            'FSHP_KodeBatch'  => $this->request->getVar('FSHP_KodeBatch'),            
            'FSHP_NamaProduk'  => $this->request->getVar('FSHP_NamaProduk'),            
            'FSHP_QTY'  => $this->request->getVar('FSHP_QTY'),
        ];
        $master_dataModel->update($reject_id, $data);
        return $this->response->redirect(site_url('shippingall'));
    }
 
    
}