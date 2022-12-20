<?php 
namespace App\Controllers;
use App\Models\Crud_packing;
use App\Models\Crud_tpacking;
use App\Models\Crud_masterbarang;
use App\Models\M_release;
use App\Models\Crud_mastercontainer;
use App\Models\Crud_masterdatabox;
use CodeIgniter\Controller;
 
class Packing extends BaseController
{
    public function index(){
        $data = [
            'title' => 'Packing Data'
        ];
        $Crud_masterbarang = new Crud_masterbarang();  
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll();

        $model = new Crud_tpacking();
        $data['data_tabels'] = $model->get_data();

        $box = new Crud_masterdatabox();
        $data['tipebox'] = $box->get_data();

        
        $m_release = new M_release();
        $data["release_datas"] = $m_release->findAll();

        $crud_release = new M_release();
        $resultrelease = $crud_release->select('sum(R_QTY) as sumrelease_qty')->first();
        $data['releasedata'] = $resultrelease['sumrelease_qty']; 

        $m_tpacking = new Crud_tpacking(); 
        $mtpacking = $m_tpacking->select('RQ2_KodeKontainer	 as kontainer')->first();
        if ($mtpacking){
        $data["get_kontainer_packing"] = $mtpacking['kontainer'];
        }else {
        $data["get_kontainer_packing"] = 0;    
        }

        return view('packing/view', $data);
    }

    
    public function save(){
        $model = new Crud_tpacking();
        $data = array(
            'K_PIC' => $this->request->getPost('K_PIC'),
            'K_Datetime' => $this->request->getPost('K_Datetime'),
            'RQ2_KodeKontainer' => $this->request->getPost('RQ2_KodeKontainer'),
            'K_KodeDus' => $this->request->getPost('K_KodeDus'),
            'K_Kodebatch' => $this->request->getPost('K_Kodebatch'),
            'K_NamaProduk' => $this->request->getPost('K_NamaProduk'),
            'K_QTY' => $this->request->getPost('K_QTY'),
        );
        $model->simpan_data($data);
    }

    public function store()
    {
        // $banding = "Holding";
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $this->db = db_connect();
        $builderh = $this->db->table("data_packing_temp");
        $builderh->select('K_PIC, K_KodeDus, K_Kodebatch, K_NamaProduk,COUNT(`K_Kodebatch`)');
        $builderh->selectSum('K_QTY');
        $builderh->groupBy('`K_Kodebatch`,K_KodeDus,');
        $queryh = $builderh->get();
        foreach ($queryh->getResult() as $row) {
            $hasil_packing = [
                "K_PIC" => $row->K_PIC,
                "K_Datetime" => $waktu,
                "K_KodeDus" => $row->K_KodeDus,
                "K_Kodebatch" => $row->K_Kodebatch,
                "K_NamaProduk" => $row->K_NamaProduk,
                "K_QTY" => $row->K_QTY,
            ];
            // var_dump($hasil_packing);
            if (!empty($hasil_packing)) {

                $builderss = $this->db->table("data_packing");
                $builderss->select('*');
                $builderss->where('K_KodeDus', $row->K_KodeDus);
                $queryss = $builderss->get();
                foreach ($queryss->getResult() as $rowcaris) {
                    
                    $id_temps= $rowcaris->K_No;
                    $sums_qty = $rowcaris->K_QTY + $row->K_QTY;
                    $hasil_sunsum = [
                        "K_PIC" => $row->K_PIC,
                        "K_Kodebatch" => $row->K_Kodebatch,
                        "K_Datetime" => $waktu,
                        "K_KodeDus" => $row->K_KodeDus,
                        "K_NamaProduk" => $row->K_NamaProduk,
                        "K_QTY" => $sums_qty,
                    ];
                }if (!empty($rowcaris)){
                    if ($rowcaris->K_Kodebatch == $row->K_Kodebatch && $rowcaris->K_KodeDus == $row->K_KodeDus){
                        $model = new Crud_packing();
                        $model->update_data($hasil_sunsum, $id_temps);
                 
                    } else{
                        $Crud_packing = new Crud_packing();
                        $Crud_packing->insert($hasil_packing);
                    }
                } else {
                    $Crud_packing = new Crud_packing();
                    $Crud_packing->insert($hasil_packing);
                }
            }
        }
        $model = new Crud_tpacking();
        $model->delete_all();
        $model_release = new M_release();
        $model_release->delete_data_nol();
        $suc = "Packing";
        session()->setFlashdata('flashdata', $suc);
        return $this->response->redirect(site_url("packing"));
    }


    public function min()
    {

        $kontainer = $this->request->getVar('RQ2_KodeKontainer');
        $batch = $this->request->getVar('K_Kodebatch');
        $min_qty = $this->request->getVar('K_QTY');        
        // print_r($kodedus);
        $this->db = db_connect();
        $builder = $this->db->table("final_release");
        $builder->where("R_Kontainer ", $kontainer);
        $builder->where("R_KodeBatch ", $batch);
        $query = $builder->get();

        foreach ($query->getResult() as $row) {
            $id_temp_release = $row->R_No; //print no tabel sebelum nya
            $qty = $row->R_QTY; //print qty tabel sebelum nya
        }
            $h_qty = (int)$qty;
            $h_min_qty = (int)$min_qty;
            $min_hasil = $h_qty - $h_min_qty;
            if ($min_hasil >= 0){
                $update_data_release = [
                    "R_QTY" => $min_hasil, //update ke tabel sebelum nya
                ];
                $model = new M_release(); //model tabel sebelum nya
                $model->update_data($update_data_release, $id_temp_release); //cek fungsi model
                $this->save(); //ganti di routs dari save jadi min
            }else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                return $this->response->redirect(site_url('packing'));
            }

    }
       
    public function table_data(){
        $data = [
            'title' => 'Packing Data'
        ];
        $model = new Crud_tpacking();
        $data['data_tabels'] = $model->get_data();
        echo view('packing/table', $data);
    }

    public function deleteee(){
        $model = new Crud_tpacking();
        $K_No = $this->request->getPost('K_No');
        $model->delete_data($K_No);
    }

    public function delete(){
        
        $cari_kontainer = $this->request->getVar('RQ2_KodeKontainer'); //ambil dari tag 
        $cari_batch = $this->request->getVar('K_Kodebatch'); //ambil dari tag
        $jumlah = $this->request->getVar('K_QTY'); //ambil dari tag
        
        $this->db = db_connect();        
        $builder_del = $this->db->table("final_release"); //tabel sebelum nya
        $builder_del->where("R_Kontainer ", $cari_kontainer); //ke tabel sebelum nya
        $builder_del->where("R_KodeBatch ", $cari_batch);
        $query_del = $builder_del->get();


        foreach ($query_del->getResult() as $row) {
            $id_temp_release = $row->R_No; //sesuaikan dengan tabel sebelum nya
            $qty = $row->R_QTY;
            
        }
        $hasil_tambah = $qty + $jumlah;
        $update_data_release = [
                "R_QTY" => $hasil_tambah,
            ];
            $model1 = new M_release();
            $model1->update_data($update_data_release, $id_temp_release); //cek fungsi di model sebelum nya
            $model = new Crud_tpacking();
            $K_No = $this->request->getPost('K_No');
            $model->delete_data($K_No);
    }

    function delete_cek()
    {
        if($this->request->getVar('checkbox_value'))
        {
            $id = $this->request->getVar('checkbox_value');
            for($count = 0; $count < count($id); $count++)
            {
                $this->db = db_connect();
                $builder_del = $this->db->table("data_packing_temp");
                $builder_del->where("K_No ", $id[$count]);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp_release = $row->K_No;
                    $batch = $row->K_Kodebatch;
                    $kontainer = $row->RQ2_KodeKontainer;
                    $qty = $row->K_QTY;
                }
                $this->db = db_connect();        
                $builder_del = $this->db->table("final_release"); //tabel sebelum nya
                $builder_del->where("R_Kontainer ", $kontainer); //ke tabel sebelum nya
                $builder_del->where("R_KodeBatch ", $batch);
                $query_del = $builder_del->get();


                foreach ($query_del->getResult() as $row) {
                    $id_temp_release = $row->R_No; //sesuaikan dengan tabel sebelum nya
                    $jumlah = $row->R_QTY;

                }
                $hasil_tambah = $qty + $jumlah;
                $update_data_release = [
                        "R_QTY" => $hasil_tambah,
                    ];
                    $model1 = new M_release();
                    $model1->update_data($update_data_release, $id_temp_release); //cek fungsi di model sebelum nya
                    $model = new Crud_tpacking();
                    $K_No = $this->request->getPost('K_No');
                    $model->delete_data($id[$count]);
                    }
                }
    }
}