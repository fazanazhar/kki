<?php 
namespace App\Controllers;
use App\Models\M_sunsan;
use App\Models\M_repair;
use App\Models\Crud_masterbarang;
use App\Models\M_qcholding;
use App\Models\Crud_mastercontainer;
use App\Models\M_holding_temp;
use App\Models\M_repair_temp;
use App\Models\M_rejectholding;
use CodeIgniter\Controller;
 
class Qualityholding extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Quantity Control Holding'
        ];
        $Crud_masterbarang = new Crud_masterbarang();  
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll();

        $master_dataModelrepair = new M_repair();
        $data['repairdatas'] = $master_dataModelrepair->orderBy('RPR_No', 'DESC')->findAll();
        $master_dataModelsunsan = new M_sunsan();
        $data['sunsandatas'] = $master_dataModelsunsan->orderBy('S_No', 'DESC')->findAll();
        $crud_sunsan = new M_sunsan();
        $resultsunsan = $crud_sunsan->select('sum(S_QTY) as sumsunsan_qty')->first();
        $data['sunsandata'] = $resultsunsan['sumsunsan_qty'];
        $crud_repair = new M_repair();
        $resultrepair = $crud_repair->select('sum(RPR_QTY) as sumrepair_qty')->first();
        $data['repairdata'] = $resultrepair['sumrepair_qty']; 
        $model = new M_qcholding();
        $data['data_tabels'] = $model->get_data();
        $crud_reject = new M_rejectholding();
        $resultreject = $crud_reject->select('sum(RJT_QTY) as sumreject_qty')->first();
        $data['rejectdata'] = $resultreject['sumreject_qty']; 
        $m_reject = new M_rejectholding();
        $data["reject_datas"] = $m_reject->findAll();
        $m_qcholding = new M_qcholding(); 
        $mqcholding = $m_qcholding->select('P2_KodeKontainer	 as kontainer')->first();
        if ($mqcholding){
        $data["get_kontainer_qcholding"] = $mqcholding['kontainer'];
        }else {
        $data["get_kontainer_qcholding"] = 0;    
        }
        return view('qc_holding/view', $data);
    }
        
        public function store()
    {
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $this->db = db_connect();
        $builder_sunsan = $this->db->table("data_qc_holding"); //tabel yang dibawah        
        $builder_sunsan->select('*,,COUNT(*)');
        $builder_sunsan->selectSum('Q2_QTY`');
        $builder_sunsan->where(array('`Q2_Kategori`' => 'Sunsan'));
        $builder_sunsan->groupBy('`Q2_KodeKontainer`, Q2_KodeBatch');
        // $builder_sunsan->where("Q2_Kategori", "Sunsan"); //tujuan dan triger nya
        $query_sunsan = $builder_sunsan->get();
        foreach ($query_sunsan->getResult() as $row) {
            $hasil_sunsan = [ //seuaikan dengan tabel tujuan " " //seikan dengan ->tabel bawah
                "S_PIC" => $row->Q2_PIC,
                "S_Datetime" => $waktu,
                "S_Kontainer" => $row->Q2_KodeKontainer,
                "S_KodeBatch" => $row->Q2_KodeBatch,
                "S_NamaProduk" => $row->Q2_NamaProduk,
                "S_QTY" => $row->Q2_QTY,
            ];
            if (!empty($hasil_sunsan)) {
                $builderss = $this->db->table("final_sunsan");
                $builderss->select('*');
                $builderss->where('S_Kontainer', $row->Q2_KodeKontainer);
                $queryss = $builderss->get();
                foreach ($queryss->getResult() as $rowcaris) {
                    
                    $id_temps= $rowcaris->S_No;
                    $sums_qty = $rowcaris->S_QTY + $row->Q2_QTY;
                    $hasil_sunsum = [
                        "S_PIC" => $row->Q2_PIC,
                        "S_KodeBatch" => $row->Q2_KodeBatch,
                        "S_Datetime" => $waktu,
                        "S_Kontainer" => $row->Q2_KodeKontainer,
                        "S_NamaProduk" => $row->Q2_NamaProduk,
                        "S_QTY" => $sums_qty,
                    ];
                }if (!empty($rowcaris)){
                    if ($rowcaris->S_KodeBatch == $row->Q2_KodeBatch && $rowcaris->S_Kontainer == $row->Q2_KodeKontainer){
                        $model = new M_sunsan();
                        $model->update_data($hasil_sunsum, $id_temps);
                 
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

        $builder_repair = $this->db->table("data_qc_holding");// tabel yang dibawah
        $builder_repair->select('*,,COUNT(*)');
        $builder_repair->selectSum('Q2_QTY`');
        $builder_repair->where(array('`Q2_Kategori`' => 'Repair'));
        $builder_repair->groupBy('`Q2_KodeKontainer`, Q2_KodeBatch');
        // $builder_repair->where("Q2_Kategori ", "Repair"); // tujuan dan triger nya
        $query_repair = $builder_repair->get();
        foreach ($query_repair->getResult() as $row) {
            $hasil_repair = [ //seuaikan dengan tabel tujuan " " //seikan dengan ->tabel bawah
                "RPR_Datetime" => $waktu,
                "RPR_KodeBatch" => $row->Q2_KodeBatch,
                "R_KodeKontainer" => $row->Q2_KodeKontainer,
                "RPR_NamaProduk" => $row->Q2_NamaProduk,
                "RPR_QTY" => $row->Q2_QTY,
                "RPR_PIC" => $row->Q2_PIC,
            ];
            if (!empty($hasil_repair)) {

                
                $builder = $this->db->table("data_repair_temp");
                $builder->select('*');
                $builder->where('R_KodeKontainer', $row->Q2_KodeKontainer);
                $query = $builder->get();
                foreach ($query->getResult() as $rowcari) {
                    
                    $id_temp= $rowcari->RPR_No;
                    $sum_qty = $rowcari->RPR_QTY + $row->Q2_QTY;
                    $hasil_repairsum = [
                        "RPR_PIC" => $row->Q2_PIC,
                        "RPR_KodeBatch" => $row->Q2_KodeBatch,
                        "RPR_Datetime" => $waktu,
                        "R_KodeKontainer" => $row->Q2_KodeKontainer,
                        "RPR_NamaProduk" => $row->Q2_NamaProduk,
                        "RPR_QTY" => $sum_qty,
                    ];
                }
                // var_dump($rowcari);
                if (!empty($rowcari)){
                    if ($rowcari->RPR_KodeBatch == $row->Q2_KodeBatch && $rowcari->R_KodeKontainer == $row->Q2_KodeKontainer){
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
        
        $model_repair = new M_rejectholding();
        $model_repair->delete_data_nol();

        $builder_reject = $this->db->table("data_rejectholding"); //tabel sebelum nya di hapus
        $builder_reject->where("RJT_QTY", "0"); //cari qty 0 di tabel sebelum nya
        $query_reject = $builder_reject->get();
        foreach ($query_reject->getResult() as $row) {
                    $get_id = $row->RJT_No; //ID no tabel sebelum nya
            if (!empty($get_id)) {
                $model_del = new M_rejectholding(); //model sebelum nya
                $model_del->delete_data($get_id); //cek / + fungsi di model
            }
        }
        $model = new M_qcholding(); //delet semua data tabel yang di bawah
        $model->delete_all();
        $suc = "Quality Holding";
        session()->setFlashdata('flashdata', $suc);
        return $this->response->redirect(site_url("qc_holding"));
    }

    public function min()
    {
        $kontainer = $this->request->getVar('P2_KodeKontainer');
        $batch = $this->request->getVar('Q2_KodeBatch');
        $min_qty = $this->request->getVar('Q2_QTY'); 
        $this->db = db_connect();
        $builderh = $this->db->table("data_rejectholding");
        $builderh->where("P2_KodeKontainer ", $kontainer);
        $builderh->where("RJT_KodeBatch ", $batch);
        $query = $builderh->get();
        // print_r($queryh);

        foreach ($query->getResult() as $row) {
            $id_temp = $row->RJT_No; //print no tabel sebelum nya
            $qty = $row->RJT_QTY; //print qty tabel sebelum nya
        }
        var_dump ($kontainer);
            $h_qty = (int)$qty;
            $h_min_qty = (int)$min_qty;
            $min_hasil = $h_qty - $h_min_qty;
            if ($min_hasil >= 0){
                $update_data = [
                    "RJT_QTY" => $min_hasil, //update ke tabel sebelum nya
                ];
                $model = new M_rejectholding(); //model tabel sebelum nya
                $model->update_data($update_data, $id_temp); //cek fungsi model
                $this->save(); //ganti di routs dari save jadi min
            }else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                return $this->response->redirect(site_url('qc_holding'));
            }
    }

        
    public function table_data(){
        $data = [
            'title' => 'Quantity Control Holding'
        ];
        $model = new M_qcholding();
        $data['data_tabels'] = $model->get_data();
        echo view('qc_holding/table', $data);
    }

    public function save(){
        $model = new M_qcholding();
        $data = array(
            'Q2_PIC' => $this->request->getPost('Q2_PIC'),
            'Q2_Datetime' => $this->request->getPost('Q2_Datetime'),
            'P2_KodeKontainer' => $this->request->getPost('P2_KodeKontainer'),
            'Q2_KodeKontainer' => $this->request->getPost('Q2_KodeKontainer'),
            'Q2_KodeBatch' => $this->request->getPost('Q2_KodeBatch'),
            'Q2_NamaProduk' => $this->request->getPost('Q2_NamaProduk'),
            'Q2_QTY' => $this->request->getPost('Q2_QTY'),
            'Q2_Kategori' => $this->request->getPost('Q2_Kategori'),
        );
        $model->simpan_data($data);
    }
    
    public function deleteee(){
        $model = new M_qcholding();
        $Q2_No = $this->request->getPost('Q2_No');
        $model->delete_data($Q2_No);
    }
    public function delete(){
        
        $kontainer = $this->request->getVar('P2_KodeKontainer');
        $batch = $this->request->getVar('Q2_KodeBatch');
        $jumlah = $this->request->getVar('Q2_QTY'); 
        $this->db = db_connect();
        $builder_del = $this->db->table("data_rejectholding");
        $builder_del->where("P2_KodeKontainer ", $kontainer);
        $builder_del->where("RJT_KodeBatch ", $batch);
        $query_del = $builder_del->get();


        foreach ($query_del->getResult() as $row) {
            $id_temp = $row->RJT_No; //sesuaikan dengan tabel sebelum nya
            $qty = $row->RJT_QTY;
            
        }
        $hasil_tambah = $qty + $jumlah;
        $update_data = [
                "RJT_QTY" => $hasil_tambah,
            ];
            $model1 = new M_rejectholding();
            $model1->update_data($update_data, $id_temp); //cek fungsi di model sebelum nya
            $model = new M_qcholding();
            $Q2_No = $this->request->getPost('Q2_No');
            $model->delete_data($Q2_No);
    }

    function delete_cek()
    {
        if($this->request->getVar('checkbox_value'))
        {
            $id = $this->request->getVar('checkbox_value');
            for($count = 0; $count < count($id); $count++)
            {
                $this->db = db_connect();
                $builder_del = $this->db->table("data_qc_holding");
                $builder_del->where("Q2_No ", $id[$count]);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->Q2_No;
                    $batch = $row->Q2_KodeBatch;
                    $kontainer = $row->P2_KodeKontainer;
                    $qty = $row->Q2_QTY;
                }
                
                $this->db = db_connect();
                $builder_del = $this->db->table("data_rejectholding");
                $builder_del->where("P2_KodeKontainer ", $kontainer);
                $builder_del->where("RJT_KodeBatch ", $batch);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->RJT_No;
                    $qty1 = $row->RJT_QTY;
                }
                // var_dump($qty1);
                $tam = $qty1 + $qty;
                 $update_data = [
                    "RJT_QTY" => $tam,
                ];
                print_r($tam);
                $model1 = new M_rejectholding();
                $model1->update_data($update_data, $id_temp);
                $model = new M_qcholding();
                $model->delete_data($id[$count]);
            }
        }
    }
}