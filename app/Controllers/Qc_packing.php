<?php 
namespace App\Controllers;
use App\Models\M_sunsan;
use App\Models\M_release;
use App\Models\M_repair;
use App\Models\Crud_masterbarang;
use App\Models\M_qcpacking;
use App\Models\Crud_packing;
use App\Models\M_repair_temp;

use CodeIgniter\Controller;
 
class Qc_packing extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'QC Final Inscpection'
        ];
        $Crud_masterbarang = new Crud_masterbarang();      
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll(); 
        $crud_release = new M_release();
        $resultrelease = $crud_release->select('sum(R_QTY) as sumrelease_qty')->first();
        $data['releasedata'] = $resultrelease['sumrelease_qty'];
        $crud_sunsan = new M_sunsan();
        $resultsunsan = $crud_sunsan->select('sum(S_QTY) as sumsunsan_qty')->first();
        $data['sunsandata'] = $resultsunsan['sumsunsan_qty'];
        $crud_repair = new M_repair();
        $resultrepair = $crud_repair->select('sum(RPR_QTY) as sumrepair_qty')->first();
        $data['repairdata'] = $resultrepair['sumrepair_qty'];
        $model = new M_qcpacking();
        $data['data_tabels'] = $model->get_data();
        $crud_packing = new Crud_packing();
        $resultpacking = $crud_packing->select('sum(K_QTY) as sumpacking_qty')->first();
        $data['packingdata'] = $resultpacking['sumpacking_qty'];
        
        $master_dataModelrelease = new M_release();
        $data['releasedatas'] = $master_dataModelrelease->orderBy('R_No', 'DESC')->findAll();

        $master_dataModelrepair = new M_repair();
        $data['repairdatas'] = $master_dataModelrepair->orderBy('RPR_No', 'DESC')->findAll();
        $master_dataModelsunsan = new M_sunsan();
        $data['sunsandatas'] = $master_dataModelsunsan->orderBy('S_No', 'DESC')->findAll();
        $m_packing = new Crud_packing();
        $data["packing_datas"] = $m_packing->findAll();

        $m_qcpacking = new M_qcpacking(); 
        $mqcpacking = $m_qcpacking->select('K_KodeDus	 as dus')->first();
        if ($mqcpacking){
        $data["get_dus_qcpacking"] = $mqcpacking['dus'];
        }else {
        $data["get_dus_qcpacking"] = 0;    
        }

        return view('qc_packing/view', $data);
    }

    public function store()
    {
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $this->db = db_connect();
        $builder_release = $this->db->table("data_qc_packing"); //tabel yang dibawah
        $builder_release->select('Q3_PIC, K_KodeDus, Q3_KodeBatch, Q3_NamaProduk,COUNT(`Q3_KodeBatch`)');
        $builder_release->selectSum('Q3_QTY');        
        $builder_release->where(array('`Q3_Kategori`' => 'Release'));
        $builder_release->groupBy('`Q3_KodeBatch`,Q3_KodeKontainer');
        // $builder_release->where("Q3_Kategori", "Release"); //tujuan dan triger nya
        $query_release = $builder_release->get();
        foreach ($query_release->getResult() as $row) {
            $hasil_release = [ //seuaikan dengan tabel tujuan " " //seikan dengan ->tabel bawah
                "K_PIC" => $row->Q3_PIC,
                "K_Datetime" => $waktu,                
                "K_KodeDus" => $row->K_KodeDus,
                "K_Kodebatch" => $row->Q3_KodeBatch,
                "K_NamaProduk" => $row->Q3_NamaProduk,
                "K_QTY" => $row->Q3_QTY,
            ];
            if (!empty($hasil_release)) {
                $builderdss = $this->db->table("data_packing");
                $builderdss->select('*');
                $builderdss->where('K_KodeDus', $row->K_KodeDus);
                $querydss = $builderdss->get();
                foreach ($querydss->getResult() as $rowcarids) {
                    
                    $id_tempds= $rowcarids->K_No;
                    $sumds_qty = $rowcarids->K_QTY + $row->Q3_QTY;
                    $hasil_releasesum = [
                        "K_PIC" => $row->Q3_PIC,
                        "K_Kodebatch" => $row->Q3_KodeBatch,
                        "K_Datetime" => $waktu,
                        "K_KodeDus" => $row->K_KodeDus,
                        "K_NamaProduk" => $row->Q3_NamaProduk,
                        "K_QTY" => $sumds_qty,
                    ];
                }if (!empty($rowcarids)){
                    if ($rowcarids->K_Kodebatch == $row->Q3_KodeBatch && $rowcarids->K_KodeDus == $row->K_KodeDus){
                        $model = new Crud_packing();
                        $model->update_data($hasil_releasesum, $id_tempds);
                 
                    } else{
                        $m_release = new Crud_packing(); //model tujuan
                        $m_release->insert($hasil_release);
                    }
                } else {
                    $m_release = new Crud_packing(); //model tujuan
                    $m_release->insert($hasil_release);
                }
            }
        }
        $model_release = new Crud_packing();
        $model_release->delete_data_nol();

        $builder_sunsan = $this->db->table("data_qc_packing"); //tabel yang dibawah        
        $builder_sunsan->select('*,,COUNT(*)');
        $builder_sunsan->selectSum('Q3_QTY`');
        $builder_sunsan->where(array('`Q3_Kategori`' => 'Sunsan'));
        $builder_sunsan->groupBy('`Q3_KodeKontainer`,Q3_KodeBatch');
        // $builder_sunsan->where("Q3_Kategori", "Sunsan"); //tujuan dan triger nya
        $query_sunsan = $builder_sunsan->get();
        foreach ($query_sunsan->getResult() as $row) {
            $hasil_sunsan = [ //seuaikan dengan tabel tujuan " " //seikan dengan ->tabel bawah
                "S_PIC" => $row->Q3_PIC,
                "S_Datetime" => $waktu,
                "S_Kontainer" => $row->Q3_KodeKontainer,
                "S_KodeBatch" => $row->Q3_KodeBatch,
                "S_NamaProduk" => $row->Q3_NamaProduk,
                "S_QTY" => $row->Q3_QTY,
            ];
            if (!empty($hasil_sunsan)) {

                $builderss = $this->db->table("final_sunsan");
                $builderss->select('*');
                $builderss->where('S_Kontainer', $row->Q3_KodeKontainer);
                $queryss = $builderss->get();
                foreach ($queryss->getResult() as $rowcaris) {
                    
                    $id_temps= $rowcaris->S_No;
                    $sums_qty = $rowcaris->S_QTY + $row->Q3_QTY;
                    $hasil_sunsansum = [
                        "S_PIC" => $row->Q3_PIC,
                        "S_KodeBatch" => $row->Q3_KodeBatch,
                        "S_Datetime" => $waktu,
                        "S_Kontainer" => $row->Q3_KodeKontainer,
                        "S_NamaProduk" => $row->Q3_NamaProduk,
                        "S_QTY" => $sums_qty,
                    ];
                }if (!empty($rowcaris)){
                    if ($rowcaris->S_KodeBatch == $row->Q3_KodeBatch && $rowcaris->S_Kontainer == $row->Q3_KodeKontainer){
                        $model = new M_sunsan();
                        $model->update_data($hasil_sunsansum, $id_temps);
                 
                    } else{                        
                        $m_sunsan = new M_sunsan();
                        $m_sunsan->insert($hasil_sunsan);
                    }
                } else {
                    $m_sunsan = new M_sunsan();
                    $m_sunsan->insert($hasil_sunsan);
                }
            }
        }
        $model_sunsan = new M_sunsan();
        $model_sunsan->delete_data_nol();
        
        $builder_repair = $this->db->table("data_qc_packing");// tabel yang dibawah
        $builder_repair->select('*,,COUNT(*)');
        $builder_repair->selectSum('Q3_QTY`');
        $builder_repair->where(array('`Q3_Kategori`' => 'Repair'));
        $builder_repair->groupBy('`Q3_KodeKontainer`,Q3_KodeBatch');
        // $builder_repair->where("Q3_Kategori ", "Repair"); // tujuan dan triger nya
        $query_repair = $builder_repair->get();
        foreach ($query_repair->getResult() as $row) {
            $hasil_repair = [ //seuaikan dengan tabel tujuan " " //seikan dengan ->tabel bawah
                "RPR_Datetime" => $waktu,
                "RPR_KodeBatch" => $row->Q3_KodeBatch,
                "R_KodeKontainer" => $row->Q3_KodeKontainer,
                "RPR_NamaProduk" => $row->Q3_NamaProduk,
                "RPR_QTY" => $row->Q3_QTY,
                "RPR_PIC" => $row->Q3_PIC,
            ];
            if (!empty($hasil_repair)) {

                $builder = $this->db->table("data_repair_temp");
                $builder->select('*');
                $builder->where('R_KodeKontainer', $row->Q3_KodeKontainer);
                $query = $builder->get();
                foreach ($query->getResult() as $rowcari) {
                    
                    $id_temp= $rowcari->RPR_No;
                    $sum_qty = $rowcari->RPR_QTY + $row->Q3_QTY;
                    $hasil_repairsum = [
                        "RPR_PIC" => $row->Q3_PIC,
                        "RPR_KodeBatch" => $row->Q3_KodeBatch,
                        "RPR_Datetime" => $waktu,
                        "R_KodeKontainer" => $row->Q3_KodeKontainer,
                        "RPR_NamaProduk" => $row->Q3_NamaProduk,
                        "RPR_QTY" => $sum_qty,
                    ];
                }
                // var_dump($rowcari);
                if (!empty($rowcari)){
                    if ($rowcari->RPR_KodeBatch == $row->Q3_KodeBatch && $rowcari->R_KodeKontainer == $row->Q3_KodeKontainer){
                        $model = new M_repair_temp();
                        $model->update_data($hasil_repairsum, $id_temp);
                // var_dump('hoho');

                 
                    } 
                    else{
                        
                        $m_repair_temp = new M_repair_temp();
                        $m_repair_temp->insert($hasil_repair);
                // var_dump('hihi');

                    }
                } 
                else {
                        $m_repair_temp = new M_repair_temp();
                        $m_repair_temp->insert($hasil_repair);
                // var_dump('hehe');

                }
            }
        }
        $model_repair = new M_repair();
        $model_repair->delete_data_nol();
        $model_packing = new Crud_packing();
        $model_packing->delete_data_nol();
        

        $builder_reject = $this->db->table("data_packing"); //tabel sebelum nya di hapus
        $builder_reject->where("K_QTY", "0"); //cari qty 0 di tabel sebelum nya
        $query_reject = $builder_reject->get();
        foreach ($query_reject->getResult() as $row) {
                    $get_id = $row->K_No; //ID no tabel sebelum nya
            if (!empty($get_id)) {
                $model_del = new Crud_packing(); //model sebelum nya
                $model_del->delete_data($get_id); //cek / + fungsi di model
            }
        }
        $model = new M_qcpacking(); //delet semua data tabel yang di bawah
        $model->delete_all();
        $suc = "Final Inspection";
        session()->setFlashdata('flashdata', $suc);
        return $this->response->redirect(site_url("Final_Inspection"));
    } 

    public function min()
    {
        $kodedus = $this->request->getVar('K_KodeDus');
        $batch = $this->request->getVar('Q3_KodeBatch');
        $min_qty = $this->request->getVar('Q3_QTY'); 
        $this->db = db_connect();
        $builderh = $this->db->table("data_packing");
        $builderh->where("K_KodeDus ", $kodedus);
        $builderh->where("K_Kodebatch ", $batch);
        $query = $builderh->get();
        // print_r($queryh);

        foreach ($query->getResult() as $row) {
            $id_temp = $row->K_No; //print no tabel sebelum nya
            $qty = $row->K_QTY; //print qty tabel sebelum nya
        }
        var_dump ($kodedus);
            $h_qty = (int)$qty;
            $h_min_qty = (int)$min_qty;
            $min_hasil = $h_qty - $h_min_qty;
            if ($min_hasil >= 0){
                $update_data = [
                    "K_QTY" => $min_hasil, //update ke tabel sebelum nya
                ];
                $model = new Crud_packing(); //model tabel sebelum nya
                $model->update_data($update_data, $id_temp); //cek fungsi model
                $this->save(); //ganti di routs dari save jadi min
            }else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                return $this->response->redirect(site_url('Final_Inspection'));
            }
    }

    public function table_data(){
        $data = [
            'title' => 'QC Final Inspection'
        ];
        $model = new M_qcpacking();
        $data['data_tabels'] = $model->get_data();
        echo view('qc_packing/table', $data);
    }

    public function save(){
        $model = new M_qcpacking();
        $data = array(
            'Q3_PIC' => $this->request->getPost('Q3_PIC'),
            'Q3_Datetime' => $this->request->getPost('Q3_Datetime'),
            'K_KodeDus' => $this->request->getPost('K_KodeDus'),
            'Q3_KodeKontainer' => $this->request->getPost('Q3_KodeKontainer'),
            'Q3_KodeBatch' => $this->request->getPost('Q3_KodeBatch'),
            'Q3_NamaProduk' => $this->request->getPost('Q3_NamaProduk'),
            'Q3_QTY' => $this->request->getPost('Q3_QTY'),
            'Q3_Kategori' => $this->request->getPost('Q3_Kategori'),
        );
        $model->simpan_data($data);
    }

    public function deleteeee(){
        $model = new M_qcpacking();
        $Q3_No = $this->request->getPost('Q3_No');
        $model->delete_data($Q3_No);
    }

    public function delete(){
        
        $kodedus = $this->request->getVar('K_KodeDus');
        $batch = $this->request->getVar('Q3_KodeBatch');
        $jumlah = $this->request->getVar('Q3_QTY'); 
        $this->db = db_connect();
        $builder_del = $this->db->table("data_packing");
        $builder_del->where("K_KodeDus ", $kodedus);
        $builder_del->where("K_Kodebatch ", $batch);
        $query_del = $builder_del->get();


        foreach ($query_del->getResult() as $row) {
            $id_temp = $row->K_No; //sesuaikan dengan tabel sebelum nya
            $qty = $row->K_QTY;
            
        }
        $hasil_tambah = $qty + $jumlah;
        $update_data = [
                "K_QTY" => $hasil_tambah,
            ];
            $model1 = new Crud_packing();
            $model1->update_data($update_data, $id_temp); //cek fungsi di model sebelum nya
            $model = new M_qcpacking();
            $Q3_No = $this->request->getPost('Q3_No');
            $model->delete_data($Q3_No);
    }

    function delete_cek()
    {
        if($this->request->getVar('checkbox_value'))
        {
            $id = $this->request->getVar('checkbox_value');
            for($count = 0; $count < count($id); $count++)
            {
                $this->db = db_connect();
                $builder_del = $this->db->table("data_qc_packing");
                $builder_del->where("Q3_No ", $id[$count]);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->Q3_No;
                    $batch = $row->Q3_KodeBatch;
                    $kodedus = $row->K_KodeDus;
                    $qty = $row->Q3_QTY;
                }
                
                $this->db = db_connect();
                $builder_del = $this->db->table("data_packing");
                $builder_del->where("K_KodeDus ", $kodedus);
                $builder_del->where("K_Kodebatch ", $batch);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->K_No;
                    $qty1 = $row->K_QTY;
                }
                // var_dump($qty1);
                $tam = $qty1 + $qty;
                 $update_data = [
                    "K_QTY" => $tam,
                ];
                print_r($tam);
                $model1 = new Crud_packing();
                $model1->update_data($update_data, $id_temp);
                $model = new M_qcpacking();
                $model->delete_data($id[$count]);
            }
        }
    }
}