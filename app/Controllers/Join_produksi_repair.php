<?php 
namespace App\Controllers;
use App\Models\M_dataproduksirepair;
use App\Models\M_dataproduksitempr;
use CodeIgniter\Controller;
 
class Join_produksi_repair extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Detail Data Production'
        ];
        $M_dataproduksi = new M_dataproduksirepair();
        $M_dataproduksitemp = new M_dataproduksitempr();
        $master = $M_dataproduksi->findAll();
        $mastertemp = $M_dataproduksitemp->findAll();
        $data['produksidatas'] = $M_dataproduksi->orderBy('P_No', 'DESC')->findAll();
        $data['produksidatatemps'] = $M_dataproduksitemp->orderBy('P_No', 'DESC')->findAll();
        // dd($M_dataproduksi);
        return view('data_pd_repair/view', $data);
        
    }

   // // view single user
   public function singleUser($produkdetail_id = null){
    $M_dataproduksitemp = new M_dataproduksitempr();
    $data['detail_report_obj'] = $M_dataproduksitemp->where('P_No', $produkdetail_id)->first();
    return view('data_pd_repair/edit1', $data);
}

// update user data
public function update(){
    $M_dataproduksitemp = new M_dataproduksitempr();
    $M_dataproduksi = new M_dataproduksirepair();
    $produkdetail_id = $this->request->getVar('P_No');
    $data = [
        'P_PIC'  => $this->request->getVar('P_PIC'),
        'P_Datetime'  => $this->request->getVar('P_Datetime'),
        'P_KodeKontainer'  => $this->request->getVar('P_KodeKontainer'),
        'P_KodeBatch'  => $this->request->getVar('P_KodeBatch'),            
        'P_NamaProduk'  => $this->request->getVar('P_NamaProduk'),            
        'P_QTY'  => $this->request->getVar('P_QTY'),            
        'P_Status'  => $this->request->getVar('P_Report'),            
        'P_Report'  => $this->request->getVar('P_Report'),                    
        'P_QC_QTY'  => $this->request->getVar('P_QC_QTY'),
    ];
    $dataproduksi = [
        'P_PIC'  => $this->request->getVar('P_PIC'),
        'P_Datetime'  => $this->request->getVar('P_Datetime'),
        'P_KodeBatch'  => $this->request->getVar('P_KodeBatch'),            
        'P_NamaProduk'  => $this->request->getVar('P_NamaProduk'),            
        'P_QTY'  => $this->request->getVar('P_QTY'),            
        'P_Status'  => $this->request->getVar('P_Report'),            
        'P_Report'  => $this->request->getVar('P_Report'),
    ];
    $M_dataproduksitemp->update($produkdetail_id, $data);
    $M_dataproduksi->update($produkdetail_id, $dataproduksi);
    $suc = "Data";
    session()->setFlashdata("flashdata_error", $suc);
    return $this->response->redirect(site_url('data_pd_repair'));
}

function matchingupdate(){
    $pd_container = $this->request->getVar("pd_container");
    $batch_code = $this->request->getVar("batch_code");
    $hmatch = $this->request->getVar("p_qty");
    $this->db = db_connect();
    $builder = $this->db->table("data_produksi_repair_temp");
    $builder->where("P_KodeKontainer ", $pd_container);
    $builder->where("P_KodeBatch ", $batch_code);
    $query = $builder->get();
    foreach ($query->getResult() as $row) {
        $id = $row->P_No;
    }
     $update_datamatch = [
            "P_QTY" => $hmatch,
        ];
        
    $models = new M_dataproduksitempr();
    $models->update_data($update_datamatch, $id);
    $models2 = new M_dataproduksirepair();
    $models2->update_data($update_datamatch, $id);
    return $this->response->redirect(site_url('data_pd_repair'));
}


// delete user
public function masterdelete($master_id = null){
    $crud_masterdata = new M_dataproduksirepair();
    $data['data_produksi_repair'] = $crud_masterdata->where('P_No', $master_id)->delete($master_id);
//    return $this->response->redirect(site_url('/data_pd'));
    $crud_masterdatatemp = new M_dataproduksitempr();
    $data['data_produksi_repair_temp'] = $crud_masterdatatemp->where('P_No', $master_id)->delete($master_id);
    return $this->response->redirect(site_url('/data_pd_repair'));
} 

    public function updateadmin(){
        $M_dataproduksitemp = new M_dataproduksitempr();
    $M_dataproduksi = new M_dataproduksirepair();
    $produkdetail_id = $this->request->getVar('P_No');
    $data = [
        
        'P_KodeKontainer'  => $this->request->getVar('P_KodeKontainer'),            
        'P_KodeBatch'  => $this->request->getVar('P_KodeBatch'),            
        'P_NamaProduk'  => $this->request->getVar('P_NamaProduk'),            
        'P_QTY'  => $this->request->getVar('P_QTY'),
    ];
    $dataproduksi = [
        'P_KodeKontainer'  => $this->request->getVar('P_KodeKontainer'),            
        'P_KodeBatch'  => $this->request->getVar('P_KodeBatch'),            
        'P_NamaProduk'  => $this->request->getVar('P_NamaProduk'),            
        'P_QTY'  => $this->request->getVar('P_QTY'),
    ];
    $M_dataproduksitemp->update($produkdetail_id, $data);
    $M_dataproduksi->update($produkdetail_id, $dataproduksi);
    return $this->response->redirect(site_url('data_pd_repair'));
}
}