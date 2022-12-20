<?php 
namespace App\Controllers;
use App\Models\M_dataproduksirepair;
use App\Models\M_dataproduksitempr;
use App\Models\Crud_masterbarang;
use App\Models\M_repair;
use App\Models\Crud_mastercontainer;
use App\Models\M_datarepairpanel;
use App\Models\M_repair_temp;
use CodeIgniter\Controller;
 
class Repair_produksi extends BaseController
{
    public function __construct(){
        $session = \Config\Services::session();
    }
    public function index(){
        $data = [
            'title' => 'Panel Production Repair'
        ];
        
        $M_dataproduksi = new M_dataproduksirepair();
        $data['produksidatas'] = $M_dataproduksi->orderBy('P_No', 'DESC')->findAll();
        $crud_pdtemp = new M_dataproduksitempr();
        $resultpdtemp = $crud_pdtemp
            ->select("sum(P_QTY) as sumpdtemp_qty")
            ->first();
        $data["pdtempdata"] = $resultpdtemp["sumpdtemp_qty"];

        $M_dataproduksitemp = new M_dataproduksitempr();
        $Crud_masterbarang = new Crud_masterbarang();
        $crud_mastercontainer = new Crud_mastercontainer();
        $m_repair_temp = new M_repair_temp();
        $data['produksidatatemps'] = $M_dataproduksitemp->orderBy('P_No', 'DESC')->findAll();
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll();       
        $data['mastercontainer'] = $crud_mastercontainer->findAll();       
        $data['repair_temp'] = $m_repair_temp->findAll();    
        $this->db = db_connect();
        $builder = $this->db->table("data_repair_temp");
        $builder->where('RPR_QTY', "0");
        $query = $builder->get();
        if (!empty($query)){
            foreach($query->getResult() as $row){
                $min_no = $row->RPR_No;
                $m_repair_temp->delete($min_no);
            }
        }    
        $crud_repair = new M_repair();
        $resultrepair = $crud_repair->select('sum(RPR_QTY) as sumrepair_qty')->first();
        $data['repairdata'] = $resultrepair['sumrepair_qty']; 
        $crud_repairp = new M_dataproduksirepair();
        $resultrepairp = $crud_repairp->select('sum(P_QTY) as sumrepairp_qty')->first();
        $data['repairp'] = $resultrepairp['sumrepairp_qty']; 
        $m_release = new M_datarepairpanel();
        $data["release_datas"] = $m_release->findAll();
        $model = new M_datarepairpanel();
        $data['data_tabels'] = $model->get_data(); 
        $M_dataproduksipanel = new M_datarepairpanel(); 
        $M_dataproduksipanel = $M_dataproduksipanel->select('P_KodeKontainer	 as kontainer')->first();
        if ($M_dataproduksipanel){
        $data["get_kontainer_produksi"] = $M_dataproduksipanel['kontainer'];
        }else {
        $data["get_kontainer_produksi"] = 0;    
        } 
        
        return view('qc_repair/repair_produksi', $data);
    }

    public function updatestatus()
    {
        $hP_No = $this->request->getVar("confirmno");
        $hP_KodeBatch = $this->request->getVar("confirmbatch");        
        $this->db = db_connect();
        $builder = $this->db->table("data_produksi_repair");
        $builder->where("P_No ", $hP_No);
        $builder->where("P_KodeBatch ", $hP_KodeBatch);
        $queryh = $builder->get()->getResult();
            foreach ($queryh as $row) {   
                $id_temp = $row->P_No;             
            }
            var_dump($id_temp);
            $update_data = [
                "P_Report" => "P-Confirmed", //update ke tabel sebelum nya
            ];
                $m_holding_temp = new M_dataproduksirepair();
                $m_holding_temp->update_data($update_data, $id_temp);
                
        $buildert = $this->db->table("data_produksi_repair_temp");
        $buildert->where("P_No ", $hP_No);
        $buildert->where("P_KodeBatch ", $hP_KodeBatch);
        $queryht = $buildert->get()->getResult();
            foreach ($queryht as $row) {   
                $id_tempt = $row->P_No;             
            }
            var_dump($id_tempt);
            $update_datat = [
                "P_Report" => "P-Confirmed", //update ke tabel sebelum nya
            ];
                $m_produktemp = new M_dataproduksitempr();
                $m_produktemp->update_data($update_datat, $id_tempt);
            
        
        return $this->response->redirect(site_url("qc_repair_produksi"));
    }

    public function updatestatusreport()
    {
        $hP_No = $this->request->getVar("confirmnoreport");
        $hP_KodeBatch = $this->request->getVar("confirmbatchreport");        
        $this->db = db_connect();
        $builder = $this->db->table("data_produksi_repair");
        $builder->where("P_No ", $hP_No);
        $builder->where("P_KodeBatch ", $hP_KodeBatch);
        $queryh = $builder->get()->getResult();
            foreach ($queryh as $row) {   
                $id_temp = $row->P_No;             
            }
            var_dump($id_temp);
            $update_data = [
                "P_Report" => "P-Confirmed", //update ke tabel sebelum nya
            ];
                $m_holding_temp = new M_dataproduksirepair();
                $m_holding_temp->update_data($update_data, $id_temp);
                
        $buildert = $this->db->table("data_produksi_repair_temp");
        $buildert->where("P_No ", $hP_No);
        $buildert->where("P_KodeBatch ", $hP_KodeBatch);
        $queryht = $buildert->get()->getResult();
            foreach ($queryht as $row) {   
                $id_tempt = $row->P_No;             
            }
            var_dump($id_tempt);
            $update_datat = [
                "P_Report" => "P-Confirmed", //update ke tabel sebelum nya
            ];
                $m_produktemp = new M_dataproduksitempr();
                $m_produktemp->update_data($update_datat, $id_tempt);
            
        
        return $this->response->redirect(site_url("qc_repair_produksi"));
    }

    public function save(){
        
        // $batch  = $this->request->getVar('T_KodeBatch');
        // $batch_reject = $batch . "T";
        $model = new M_datarepairpanel();
        $data = array(            
            'P_PIC'  => $this->request->getPost('T_PIC'),
            'P_Datetime' => $this->request->getPost('T_Datetime'),
            'P_KodeKontainer' => $this->request->getPost('T_KodeKontainer'),
            'P_KodeBatch'  => $this->request->getPost('T_KodeBatch'),
            'P_NamaProduk'  => $this->request->getPost('T_NamaProduk'),            
            'P_QTY'  => $this->request->getPost('T_QTY'),            
            'P_Status'  => $this->request->getPost('T_Status'),            
            'P_Report'  => $this->request->getPost('T_Report'),
        );
        // $damn  = $this->request->getPost('T_Report');
        // var_dump($damn);
        $model->simpan_data($data);
    }

    public function delete(){
        $batch = $this->request->getPost('P_KodeBatch');
        $batcht= substr($batch,0,12);
        var_dump($batcht);
        $min_qty = $this->request->getPost('P_QTY'); 
        $this->db = db_connect();
        $builderh = $this->db->table("data_repair_temp");
        $builderh->where('SUBSTRING(`RPR_KodeBatch`,1,12)', $batcht);
        $query = $builderh->get();
        // print_r($query);

        foreach ($query->getResult() as $row) {
            $id_temp = $row->RPR_No; //print no tabel sebelum nya
            $qty = $row->RPR_QTY; //print qty tabel sebelum nya
        }
        $h_qty = (int)$qty;
        $h_min_qty = (int)$min_qty;
        $hasil_tambah = $h_qty + $h_min_qty;
        // var_dump($query);
        $update_data = [
                "RPR_QTY" => $hasil_tambah,
            ];
            $model1 = new M_repair_temp();
            $model1->update_data($update_data, $id_temp); //cek fungsi di model sebelum nya
            $model = new M_datarepairpanel();
            $P_No = $this->request->getPost('P_No');
            $model->delete_data($P_No);
    }

    function delete_cek()
    {
        if($this->request->getVar('checkbox_value'))
        {
            $id = $this->request->getVar('checkbox_value');
            for($count = 0; $count < count($id); $count++)
            {
                $this->db = db_connect();
                $builder_del = $this->db->table("data_repair_panel");
                $builder_del->where("P_No ", $id[$count]);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->P_No;
                    $batc = $row->P_KodeBatch;
                    $kontainer = $row->P_KodeKontainer;
                    $qty = $row->P_QTY;
                }
                
                $this->db = db_connect();
                $builder_del = $this->db->table("data_repair_temp");
                $batch= substr($batc,0,12);
                // var_dump($batch);
                $builder_del->where('SUBSTRING(`RPR_KodeBatch`,1,12)', $batch);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->RPR_No;
                    $qty1 = $row->RPR_QTY;
                }
                // var_dump($qty1);
                $tam = $qty1 + $qty;
                 $update_data = [
                    "RPR_QTY" => $tam,
                ];
                print_r($tam);
                $model1 = new M_repair_temp();
                $model1->update_data($update_data, $id_temp);
                $model = new M_datarepairpanel();
                $model->delete_data($id[$count]);
            }
        }
       
    }

        
    public function table_data(){
        $data = [
            'title' => 'Data Produksi Repair'
        ];
        $model = new M_datarepairpanel();
        $data['data_tabels'] = $model->get_data();
        echo view('qc_repair/tableproduksi', $data);
    }

    public function min()
    {
        $batc = $this->request->getVar('T_KodeBatch');        
        $batch= substr($batc,0,12);
        $min_qty = $this->request->getVar('T_QTY'); 
        $this->db = db_connect();
        $builderh = $this->db->table("data_repair_temp");
        $builderh->where('SUBSTRING(`RPR_KodeBatch`,1,12)', $batch);
        $query = $builderh->get();

        foreach ($query->getResult() as $row) {
            $id_temp = $row->RPR_No; //print no tabel sebelum nya
            $qty = $row->RPR_QTY; //print qty tabel sebelum nya
        }
        $h_qty = (int)$qty;
            $h_min_qty = (int)$min_qty;
            $min_hasil = $h_qty - $h_min_qty;
            if ($min_hasil >= 0){
                $update_data = [
                    "RPR_QTY" => $min_hasil, //update ke tabel sebelum nya
                ];
                $model = new M_repair_temp(); //model tabel sebelum nya
                $model->update_data($update_data, $id_temp); //cek fungsi model
                $this->save(); //ganti di routs dari save jadi min
            }
            else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                return $this->response->redirect(site_url('qc_repair_produksi'));
            }
            var_dump("hehe");
    }
    
    public function store() {
        // $batch  = $this->request->getVar('T_KodeBatch');
        // $qty    = $this->request->getVar('T_QTY');
        // $builder = $this->db->table("data_repair_temp");
        // $builder->where('RPR_KodeBatch', $batch);
        // $query = $builder->get();
        // foreach($query->getResult() as $row){
        //     $min_no = $row->RPR_No;
        //     $min_qty = $row->RPR_QTY;
        // } 

        // $batch_reject = $batch . "T";
        // $hasil_qty = $min_qty - $qty;
        // $data = [
        //         "RPR_QTY" => $hasil_qty,
        //     ];

        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $this->db = db_connect();
        $builderr = $this->db->table("data_repair_panel");      
        $builderr->select('*,,COUNT(*)');
        $builderr->selectSum('P_QTY`');
        $builderr->groupBy('`P_KodeBatch`,`P_KodeKontainer`');
        $queryr = $builderr->get();
        var_dump ($queryr);
        foreach ($queryr->getResult() as $row) {
        $data_temp = [
            'P_PIC'  => $row->P_PIC,
            'P_Datetime' => $waktu,
            'P_KodeKontainer' => $row->P_KodeKontainer,
            'P_KodeBatch'  => $row->P_KodeBatch,
            'P_NamaProduk'  => $row->P_NamaProduk,            
            'P_QTY'  => $row->P_QTY,            
            'P_Status'  => $row->P_Status,            
            'P_Report'  => $row->P_Report,
           ];
        $data_produksi = [
            'P_PIC'  => $row->P_PIC,
            'P_Datetime'  => $row->P_Datetime,
            'P_KodeBatch'  => $row->P_KodeBatch,           
            'P_NamaProduk'  => $row->P_NamaProduk,            
            'P_QTY'  => $row->P_QTY,            
            'P_Status'  => $row->P_Status,            
            'P_Report'  => $row->P_Report,
            ];

            if (!empty($data_temp)) {
                $M_dataproduksitemp = new M_dataproduksitempr(); //model tujuan
                $M_dataproduksitemp->insert($data_temp);
            }
            if (!empty($data_produksi)) {
                $M_dataproduksi = new M_dataproduksirepair(); //model tujuan
                $M_dataproduksi->insert($data_produksi);
            }
        }

        $model = new M_datarepairpanel(); //delet semua data tabel yang di bawah
        $model->delete_all();
        $suc = "Production Repair";
        session()->setFlashdata('flashdata', $suc);
        return $this->response->redirect(site_url('qc_repair_produksi'));
    }

}