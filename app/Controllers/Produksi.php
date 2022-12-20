<?php 
namespace App\Controllers;
use App\Models\M_dataproduksi;
use App\Models\M_dataproduksitemp;
use App\Models\Crud_masterbarang;
use App\Models\Crud_mastercontainer;
use App\Models\Crud_masterdatasup;
use App\Models\M_dataproduksipanel;
use CodeIgniter\Controller;
 
class Produksi extends BaseController
{
    public function __construct(){
        $session = \Config\Services::session();
    }
    public function index(){
        $data = [
            'title' => 'Panel Production'
        ];
        
        $M_dataproduksitemp = new M_dataproduksitemp();
        $Crud_masterbarang = new Crud_masterbarang();
        $crud_mastercontainer = new Crud_mastercontainer();
        $master = $Crud_masterbarang->findAll();
        $data['produksidatatemps'] = $M_dataproduksitemp->orderBy('P_No', 'DESC')->findAll();
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll();       
        $data['mastercontainer'] = $crud_mastercontainer->findAll();
        $M_dataproduksi = new M_dataproduksi();
        $data['produksidatas'] = $M_dataproduksi->orderBy('P_No', 'DESC')->findAll();

        $crud_pdtemp = new M_dataproduksitemp();
        $resultpdtemp = $crud_pdtemp
            ->select("sum(P_QTY) as sumpdtemp_qty")
            ->first();
        $data["pdtempdata"] = $resultpdtemp["sumpdtemp_qty"];
        
        $m_release = new M_dataproduksipanel();
        $data["release_datas"] = $m_release->findAll();
        
        $model = new M_dataproduksipanel();
        $data['data_tabels'] = $model->get_data(); 
        $M_dataproduksipanel = new M_dataproduksipanel(); 
        $M_dataproduksipanel = $M_dataproduksipanel->select('P_KodeKontainer	 as kontainer')->first();
        if ($M_dataproduksipanel){
        $data["get_kontainer_produksi"] = $M_dataproduksipanel['kontainer'];
        }else {
        $data["get_kontainer_produksi"] = 0;    
        }      
        return view('pd/view', $data);
    }

    public function updatestatus()
    {
        $hP_No = $this->request->getVar("confirmno");
        $hP_KodeBatch = $this->request->getVar("confirmbatch");        
        $this->db = db_connect();
        $builder = $this->db->table("data_produksi");
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
                $m_holding_temp = new M_dataproduksi();
                $m_holding_temp->update_data($update_data, $id_temp);
                
        $buildert = $this->db->table("data_produksi_temp");
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
                $m_produktemp = new M_dataproduksitemp();
                $m_produktemp->update_data($update_datat, $id_tempt);
            
        
        return $this->response->redirect(site_url("pd"));
    }

    public function updatestatusreport()
    {
        $hP_No = $this->request->getVar("confirmnoreport");
        $hP_KodeBatch = $this->request->getVar("confirmbatchreport");        
        $this->db = db_connect();
        $builder = $this->db->table("data_produksi");
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
                $m_holding_temp = new M_dataproduksi();
                $m_holding_temp->update_data($update_data, $id_temp);
                
        $buildert = $this->db->table("data_produksi_temp");
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
                $m_produktemp = new M_dataproduksitemp();
                $m_produktemp->update_data($update_datat, $id_tempt);
            
        
        return $this->response->redirect(site_url("pd"));
    }
    

    public function barcode(){
        $data = [
            'title' => 'Generate Barcode'
        ];        
        $bar = new Crud_masterbarang();
        $data['masterbarang'] = $bar->get_data();

        $sup = new Crud_masterdatasup();
        $data['mastersupplier'] = $sup->get_data();

        return view('pd/barcode', $data);
    }

    public function save(){
        $model = new M_dataproduksipanel();
        $data = array(            
            'P_PIC'  => $this->request->getPost('P_PIC'),
            'P_Datetime' => $this->request->getPost('P_Datetime'),
            'P_KodeKontainer' => $this->request->getPost('P_KodeKontainer'),
            'P_KodeBatch'  => $this->request->getPost('P_KodeBatch'),
            'P_NamaProduk'  => $this->request->getPost('P_NamaProduk'),            
            'P_QTY'  => $this->request->getPost('P_QTY'),            
            'P_Status'  => $this->request->getPost('P_Status'),            
            'P_Report'  => $this->request->getPost('P_Report'),
        );
        $model->simpan_data($data);
    }

    public function delete(){
        $model = new M_dataproduksipanel();
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
                $builder_del = $this->db->table("data_produksi_panel");
                $builder_del->where("P_No ", $id[$count]);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->P_No;
                    $batch = $row->P_KodeBatch;
                    $kontainer = $row->P_KodeKontainer;
                    $qty = $row->P_QTY;
                }
                $model = new M_dataproduksipanel();
                $model->delete_data($id[$count]);
            }
        }
    }

        
    public function table_data(){
        $data = [
            'title' => 'Data Produksi'
        ];
        $model = new M_dataproduksipanel();
        $data['data_tabels'] = $model->get_data();
        echo view('pd/table', $data);
    }
    
    public function store() {
            $M_dataproduksi = new M_dataproduksi();
            $M_dataproduksitemp = new M_dataproduksitemp();
            $crud_mastercontainer = new Crud_mastercontainer();

            date_default_timezone_set("Asia/Jakarta");
            $waktu = date("Y-m-d H:i:s");
            $this->db = db_connect();
            $builder = $this->db->table("data_produksi_panel");      
            $builder->select('*,,COUNT(*)');
            $builder->selectSum('P_QTY`');
            $builder->groupBy('`P_KodeBatch`,`P_KodeKontainer');
            $query = $builder->get();
            var_dump ($query);
            foreach ($query->getResult() as $row) {
            $data = [
            'P_PIC'  => $row->P_PIC,
            'P_Datetime' => $waktu,
            'P_KodeKontainer' => $row->P_KodeKontainer,
            'P_KodeBatch' => $row->P_KodeBatch,
            'P_NamaProduk'  => $row->P_NamaProduk,            
            'P_QTY' => $row->P_QTY,         
            'P_Status'  => $row->P_Status,            
            'P_Report'  => $row->P_Report,
            ];
            $dataproduksi = [
            'P_PIC'  => $row->P_PIC,
            'P_Datetime' => $waktu,
            'P_KodeBatch' => $row->P_KodeBatch,           
            'P_NamaProduk' => $row->P_NamaProduk,         
            'P_QTY' => $row->P_QTY,          
            'P_Status' => $row->P_Status,           
            'P_Report' => $row->P_Report,
            ];
            
            if (!empty($data)) {
                $M_dataproduksitemp = new M_dataproduksitemp(); //model tujuan
                $M_dataproduksitemp->insert($data);
            }
            if (!empty($dataproduksi)) {
                $M_dataproduksi = new M_dataproduksi(); //model tujuan
                $M_dataproduksi->insert($dataproduksi);
            }
        }
                        
        $model = new M_dataproduksipanel();
        $model->delete_all();
        $suc = $this->request->getVar('P_KodeBatch');
        session()->setFlashdata('flashdata', $suc);
        return $this->response->redirect(site_url('pd'));
       }

}