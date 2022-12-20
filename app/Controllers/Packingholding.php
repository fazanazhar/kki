<?php 
namespace App\Controllers;
use App\Models\M_release;
use App\Models\Crud_masterbarang;
use App\Models\M_rejectholding;
use App\Models\M_packingholding;
use App\Models\M_holding_temp;
use CodeIgniter\Controller;
 
class Packingholding extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Warehouse Holding'
        ];
        $Crud_masterbarang = new Crud_masterbarang();
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll();
        $m_rejectholding = new M_rejectholding();
        $m_release = new M_release();

        $crud_release = new M_release();
        $resultrelease = $crud_release->select('sum(R_QTY) as sumrelease_qty')->first();
        $data['releasedata'] = $resultrelease['sumrelease_qty']; 
        $crud_rejectholding = new M_rejectholding();
        $resultrejectholding = $crud_rejectholding->select('sum(RJT_QTY) as sumrejectholding_qty')->first();
        $data['rejectholdingdata'] = $resultrejectholding['sumrejectholding_qty']; 
        $model = new M_packingholding();
        $data['data_tabels'] = $model->get_data();
        $m_holding = new M_holding_temp();
        $data["produksiholding_datas"] = $m_holding->findAll();
        
        $master_dataModelrelease = new M_release();
        $data['releasedatas'] = $master_dataModelrelease->orderBy('R_No', 'DESC')->findAll();
        
        $master_dataModelrejectholding = new M_rejectholding();
        $data['rejectdatas'] = $master_dataModelrejectholding->orderBy('RJT_No', 'DESC')->findAll();
        
        $crud_holding = new M_holding_temp();
        $resultholding = $crud_holding->select('sum(H_QTY) as sumholding_qty')->first();
        $data['holdingdata'] = $resultholding['sumholding_qty']; 

        $m_wsholding = new M_packingholding(); 
        $mwsholding = $m_wsholding->select('RQ1_KodeKontainer	 as kon')->first();
        if ($mwsholding){
        $data["get_kon_wshold"] = $mwsholding['kon'];
        }else {
        $data["get_kon_wshold"] = 0;    
        }

        return view('packing_holding/view', $data);
    }
    public function store()
    {
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $this->db = db_connect();
        $builder_release = $this->db->table("data_packing_holding"); //tabel yang dibawah        
        $builder_release->select('*,,COUNT(*)');
        $builder_release->selectSum('P2_QTY`');
        $builder_release->where(array('`P2_Kategori`' => 'Release'));
        $builder_release->groupBy('`P2_KodeKontainer`,P2_KodeBatch');
        // $builder_release->where("P2_Kategori", "Release"); //tujuan dan triger nya
        $query_release = $builder_release->get();
        foreach ($query_release->getResult() as $row) {
            $hasil_release = [ //seuaikan dengan tabel tujuan " " //seikan dengan ->tabel bawah
                "R_PIC" => $row->P2_PIC,
                "R_Datetime" => $waktu,                
                "R_Kontainer" => $row->P2_KodeKontainer,
                "R_KodeBatch" => $row->P2_KodeBatch,
                "R_NamaProduk" => $row->P2_NamaProduk,
                "R_QTY" => $row->P2_QTY,
            ];
            if (!empty($hasil_release)) {
                
                $builderss = $this->db->table("final_release");
                $builderss->select('*');
                $builderss->where('R_Kontainer', $row->P2_KodeKontainer);
                $queryss = $builderss->get();
                foreach ($queryss->getResult() as $rowcaris) {
                    
                    $id_temps= $rowcaris->R_No;
                    $sums_qty = $rowcaris->R_QTY + $row->P2_QTY;
                    $hasil_sunsum = [
                        "R_PIC" => $row->P2_PIC,
                        "R_KodeBatch" => $row->P2_KodeBatch,
                        "R_Datetime" => $waktu,
                        "R_Kontainer" => $row->P2_KodeKontainer,
                        "R_NamaProduk" => $row->P2_NamaProduk,
                        "R_QTY" => $sums_qty,
                    ];
                }if (!empty($rowcaris)){
                    if ($rowcaris->R_KodeBatch == $row->P2_KodeBatch && $rowcaris->R_Kontainer == $row->P2_KodeKontainer){
                        $model = new M_release();
                        $model->update_data($hasil_sunsum, $id_temps);
                 
                    } else{
                        $m_release = new M_release(); //model tujuan
                        $m_release->insert($hasil_release);
                    }
                } else {
                    $m_release = new M_release(); //model tujuan
                    $m_release->insert($hasil_release);
                }
            }
        }
        
        $model_release = new M_release();
        $model_release->delete_data_nol();

        $builder_repair = $this->db->table("data_packing_holding");// tabel yang dibawah
        $builder_repair->select('*,,COUNT(*)');
        $builder_repair->selectSum('P2_QTY`');
        $builder_repair->where(array('`P2_Kategori`' => 'Reject'));
        $builder_repair->groupBy('`P2_KodeKontainer`,P2_KodeBatch');
        // $builder_repair->where("P2_Kategori ", "Repair"); // tujuan dan triger nya
        $query_repair = $builder_repair->get();
        foreach ($query_repair->getResult() as $row) {
            $hasil_repair = [ //seuaikan dengan tabel tujuan " " //seikan dengan ->tabel bawah
                "RJT_Datetime" => $waktu,
                "RJT_KodeBatch" => $row->P2_KodeBatch,
                "P2_KodeKontainer" => $row->P2_KodeKontainer,
                "RJT_NamaProduk" => $row->P2_NamaProduk,
                "RJT_QTY" => $row->P2_QTY,
                "RJT_PIC" => $row->P2_PIC,
            ];
            if (!empty($hasil_repair)) {

                $builder = $this->db->table("data_rejectholding");
                $builder->select('*');
                $builder->where('P2_KodeKontainer', $row->P2_KodeKontainer);
                $query = $builder->get();
                foreach ($query->getResult() as $rowcari) {
                    
                    $id_temp= $rowcari->RJT_No;
                    $sum_qty = $rowcari->RJT_QTY + $row->P2_QTY;
                    $hasil_repairsum = [
                        "RJT_PIC" => $row->P2_PIC,
                        "RJT_KodeBatch" => $row->P2_KodeBatch,
                        "RJT_Datetime" => $waktu,
                        "P2_KodeKontainer" => $row->P2_KodeKontainer,
                        "RJT_NamaProduk" => $row->P2_NamaProduk,
                        "RJT_QTY" => $sum_qty,
                    ];
                }
                // var_dump($rowcari);
                if (!empty($rowcari)){
                    if ($rowcari->RJT_KodeBatch == $row->P2_KodeBatch && $rowcari->P2_KodeKontainer == $row->P2_KodeKontainer){
                        $model = new M_rejectholding();
                        $model->update_data($hasil_repairsum, $id_temp);
                // var_dump('hoho');

                 
                    } 
                    else{                        
                $m_repair_temp = new M_rejectholding();//model tujuan
                $m_repair_temp->insert($hasil_repair);
                // var_dump('hihi');

                    }
                } 
                else {
                    $m_repair_temp = new M_rejectholding();//model tujuan
                    $m_repair_temp->insert($hasil_repair);
                // var_dump('hehe');

                }
            }
        }        
        $model_rejecthold = new M_rejectholding();
        $model_rejecthold->delete_data_nol();
        $model_hold = new M_holding_temp();
        $model_hold->delete_data_nol();


        $builder_reject = $this->db->table("data_holding_temp"); //tabel sebelum nya di hapus
        $builder_reject->where("H_QTY", "0"); //cari qty 0 di tabel sebelum nya
        $query_reject = $builder_reject->get();
        foreach ($query_reject->getResult() as $row) {
                    $get_id = $row->H_No; //ID no tabel sebelum nya
            if (!empty($get_id)) {
                $model_del = new M_holding_temp(); //model sebelum nya
                $model_del->delete_data($get_id); //cek / + fungsi di model
            }
        }
        $model = new M_packingholding(); //delet semua data tabel yang di bawah
        $model->delete_all();
        
        $suc = "Warehouse Holding";
        session()->setFlashdata('flashdata', $suc);

        return $this->response->redirect(site_url("packing_holding"));
    } 
    public function min()
    {
        $kontainer = $this->request->getVar('RQ1_KodeKontainer');
        $batch = $this->request->getVar('P2_KodeBatch');
        $min_qty = $this->request->getVar('P2_QTY'); 
        $this->db = db_connect();
        $builderh = $this->db->table("data_holding_temp");
        $builderh->where("RQ1_KodeKontainer ", $kontainer);
        $builderh->where("H_KodeBatch ", $batch);
        $query = $builderh->get();
        // print_r($queryh);

        foreach ($query->getResult() as $row) {
            $id_temp = $row->H_No; //print no tabel sebelum nya
            $qty = $row->H_QTY; //print qty tabel sebelum nya
        }
        var_dump ($kontainer);
            $h_qty = (int)$qty;
            $h_min_qty = (int)$min_qty;
            $min_hasil = $h_qty - $h_min_qty;
            if ($min_hasil >= 0){
                $update_holding_temp = [
                    "H_QTY" => $min_hasil, //update ke tabel sebelum nya
                ];
                $model = new M_holding_temp(); //model tabel sebelum nya
                $model->update_data($update_holding_temp, $id_temp); //cek fungsi model
                $this->save(); //ganti di routs dari save jadi min
            }else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                return $this->response->redirect(site_url('packing_holding'));
            }
    }
    public function table_data(){
        $data = [
            'title' => 'Warehouse Holding'
        ];
        $model = new M_packingholding();
        $data['data_tabels'] = $model->get_data();
        echo view('packing_holding/table', $data);
    }

    public function save(){
        $model = new M_packingholding();
        $data = array(
            'P2_PIC' => $this->request->getPost('P2_PIC'),
            'P2_Datetime' => $this->request->getPost('P2_Datetime'),
            'RQ1_KodeKontainer' => $this->request->getPost('RQ1_KodeKontainer'),
            'P2_KodeKontainer' => $this->request->getPost('P2_KodeKontainer'),
            'P2_KodeBatch' => $this->request->getPost('P2_KodeBatch'),
            'P2_NamaProduk' => $this->request->getPost('P2_NamaProduk'),
            'P2_QTY' => $this->request->getPost('P2_QTY'),
            'P2_Kategori' => $this->request->getPost('P2_Kategori'),
        );
        $model->simpan_data($data);
    }

    public function deleteeee(){
        $model = new M_packingholding();
        $P2_No = $this->request->getPost('P2_No');
        $model->delete_data($P2_No);
    }
    public function delete(){
        
        $kontainer = $this->request->getVar('RQ1_KodeKontainer');
        $batch = $this->request->getVar('P2_KodeBatch');
        $jumlah = $this->request->getVar('P2_QTY'); 
        $this->db = db_connect();
        $builder_del = $this->db->table("data_holding_temp");
        $builder_del->where("RQ1_KodeKontainer ", $kontainer);
        $builder_del->where("H_KodeBatch ", $batch);
        $query_del = $builder_del->get();


        foreach ($query_del->getResult() as $row) {
            $id_temp = $row->H_No; //sesuaikan dengan tabel sebelum nya
            $qty = $row->H_QTY;
            
        }
        $hasil_tambah = $qty + $jumlah;
        $update_holding_temp = [
                "H_QTY" => $hasil_tambah,
            ];
            $model1 = new M_holding_temp();
            $model1->update_data($update_holding_temp, $id_temp); //cek fungsi di model sebelum nya
            $model = new M_packingholding();
            $P2_No = $this->request->getPost('P2_No');
            $model->delete_data($P2_No);
    }

    function delete_cek()
    {
        if($this->request->getVar('checkbox_value'))
        {
            $id = $this->request->getVar('checkbox_value');
            for($count = 0; $count < count($id); $count++)
            {
                $this->db = db_connect();
                $builder_del = $this->db->table("data_packing_holding");
                $builder_del->where("P2_No ", $id[$count]);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->P2_No;
                    $batch = $row->P2_KodeBatch;
                    $kontainer = $row->RQ1_KodeKontainer;
                    $qty = $row->P2_QTY;
                }
                
                $this->db = db_connect();
                $builder_del = $this->db->table("data_holding_temp");
                $builder_del->where("RQ1_KodeKontainer ", $kontainer);
                $builder_del->where("H_KodeBatch ", $batch);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->H_No;
                    $qty1 = $row->H_QTY;
                }
                // var_dump($qty1);
                $tam = $qty1 + $qty;
                 $update_holding_temp = [
                    "H_QTY" => $tam,
                ];
                print_r($tam);
                $model1 = new M_holding_temp();
                $model1->update_data($update_holding_temp, $id_temp);
                $model = new M_packingholding();
                $model->delete_data($id[$count]);
            }
        }
    }
}