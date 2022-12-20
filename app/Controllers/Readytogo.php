<?php 
namespace App\Controllers;
use App\Models\M_shipping;
use App\Models\M_shipping_box;
use App\Models\M_shippingdetail;
use App\Models\M_release;
use App\Models\Crud_packing;
use App\Models\Crud_masterdatapelanggan;
use App\Models\M_marketplace;
use App\Models\Crud_masterdataeksp;
use App\Models\M_disc;
use App\Models\M_sunsan;

use CodeIgniter\Controller;
use App\Models\Crud_masterbarang;
 
class Readytogo extends BaseController
{

    // public function __construct(){
    //     parent::__construct();
    
    //     // Load Model
    //     $this->load->model('Crud_packing');
    
    //     // Load base_url
    //     $this->load->helper('url');
    //   }

    // // users list
    public function indexitem(){
        $data = [
            'title' => 'Ready To Go Panel'
        ];
        $crud_release = new M_release();
        $resultrelease = $crud_release->select('sum(R_QTY) as sumrelease_qty')->first();
        $data['releasedata'] = $resultrelease['sumrelease_qty'];
        $crud_shipping = new M_shipping();
        $resultshipping = $crud_shipping->select('sum(SHP_QTY) as sumshipping_qty')->first();
        $data['shippingdata'] = $resultshipping['sumshipping_qty'];
        
        $Crud_masterbarang = new Crud_masterbarang();
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll(); 
        
        $m_release = new M_release();
        $data["release_datas"] = $m_release->findAll();
        $crud_sunsan = new M_sunsan();
        $resultsunsan = $crud_sunsan
            ->select("sum(S_QTY) as sumsunsan_qty")
            ->first();
        $data["sunsandata"] = $resultsunsan["sumsunsan_qty"];
        $crud_disc = new M_disc();
        $resultdisc = $crud_disc
            ->select("sum(DMP_QTY) as sumdisc_qty")
            ->first();
        $data["discdata"] = $resultdisc["sumdisc_qty"];
        $crud_marketplace = new M_marketplace();
        $resultmarketplace = $crud_marketplace
            ->select("sum(M_QTY) as summarketplace_qty")
            ->first();
        $data["marketplacedata"] = $resultmarketplace["summarketplace_qty"];
        
        $m_mp = new M_marketplace();
        $data["mp_datas"] = $m_mp->findAll();

        $m_dmp = new M_disc();
        $data["dmp_datas"] = $m_dmp->findAll();

        $m_sun = new M_sunsan();
        $data["sun_datas"] = $m_sun->findAll();

        
        $master_dataModelshipping = new M_shipping();
        $data['shippingdatas'] = $master_dataModelshipping->orderBy('SHP_No', 'DESC')->findAll();

        
        $exp = new Crud_masterdataeksp();
        $data['masterexp'] = $exp->get_data();
        
        
        return view('rtg/view_item', $data);
    }

    public function indexbox(){
        $data = [
            'title' => 'Ready To Go Panel'
        ];
        $crud_packing = new Crud_packing();
        $resultpacking = $crud_packing->select('sum(K_QTY) as sumpacking_qty')->first();
        $data['packingdata'] = $resultpacking['sumpacking_qty'];
        $crud_shipping = new M_shipping_box();
        $resultshipping = $crud_shipping->select('sum(SHP_QTY) as sumshipping_qty')->first();
        $data['shippingdata'] = $resultshipping['sumshipping_qty'];
        $Crud_masterbarang = new Crud_masterbarang();
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll();
        $master_dataModel = new M_shipping_box();
        $data['shippingboxdatas'] = $master_dataModel->orderBy('SHP_No', 'DESC')->findAll();

        $m_packing = new Crud_packing();
        $data["packing_datas"] = $m_packing->findAll();

        
        $cus = new Crud_masterdatapelanggan();
        $data['mastercus'] = $cus->get_data();

        $exp = new Crud_masterdataeksp();
        $data['masterexp'] = $exp->get_data();

        return view('rtg/view_box', $data);
    }

    public function manggilIdYeuh(){
        $data = [
            'title' => 'Detail Box'
        ];
        $kodedus = $this->request->getVar('SHP_KodeDus');        
        // print_r($kodedus);
        $this->db = db_connect();
        $builderh = $this->db->table("data_packing");
        $builderh->where("K_KodeDus ", $kodedus);
        $queryh = $builderh->get()->getResult();
        $data["packingdatas"] = $queryh;

        echo view('rtg/table', $data);
    }   

    public function storebox() {
        $crud_shipping = new M_shipping_box();
        $data = [
         'SHP_PIC'  => $this->request->getVar('SHP_PIC'),
         'SHP_Datetime' => $this->request->getVar('SHP_Datetime'),
         'SHP_KodeDus' => $this->request->getVar('SHP_KodeDus2'),            
         'SHP_QTY'  => $this->request->getVar('SHP_QTY'),            
         'SHP_Customer'  => $this->request->getVar('SHP_Customer'),            
         'SHP_Expedition'  => $this->request->getVar('SHP_Expedition'),
        ];

        
        $kodedus = $this->request->getVar('SHP_KodeDus2');
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $kategori = "dus";
        $this->db = db_connect();
        $builderh = $this->db->table("data_packing");        
        $builderh->where("K_KodeDus ", $kodedus);
        $queryh = $builderh->get()->getResult();
            foreach ($queryh as $row) {
                $No = $row->K_No;
                
            $hasil_holding = [
                "FSHP_PIC" => $row->K_PIC,
                "FSHP_Datetime" => $waktu,
                "FSHP_KodeDus" => $row->K_KodeDus,
                "FSHP_KodeBatch" => $row->K_Kodebatch,
                "FSHP_NamaProduk" => $row->K_NamaProduk,
                "FSHP_QTY" => $row->K_QTY,
                "FSHP_Customer" => $this->request->getVar('SHP_Customer'), 
                "FSHP_Expedition" => $this->request->getVar('SHP_Expedition'),
                "FSHP_Kategori" => $kategori,
                
            ];

            if (!empty($hasil_holding)) {
                $m_holding_temp = new M_shippingdetail();
                $m_holding_temp->insert($hasil_holding);                
                $model = new Crud_packing();
                $model->delete_data($No);
            }
        }
        $model_packing = new Crud_packing();
        $model_packing->delete_data_nol();
        $crud_shipping->insert($data);
        $suc = "Shipping Box";
        session()->setFlashdata('flashdata', $suc);
        return $this->response->redirect(site_url('rtg_box'));
    }

    public function minbox()
    {

        $kontainer = $this->request->getVar('SHP_KodeDus2');
        $min_qty = $this->request->getVar('SHP_QTY');        
        // print_r($kodedus);
        $this->db = db_connect();
        $builder = $this->db->table("data_packing");
        $builder->where("K_KodeDus ", $kontainer);
        $builder->select('*,,COUNT(*)');
        $builder->selectSum('K_QTY`');
        // $builder->where(array('`Q2_Kategori`' => 'Sunsan'));
        $builder->groupBy('`K_KodeDus`');        
        $queryh = $builder->get()->getResult();
        // $builder->where("K_Kodebatch ", $batch);
        // $query = $builder->get();
        var_dump ($queryh);

        // foreach ($query->getResult() as $row) {
        foreach ($queryh as $row) {
            $id_temp = $row->K_No; //print no tabel sebelum nya
            $qty = $row->K_QTY; //print qty tabel sebelum nya
        }
            $h_qty = (int)$qty;
            $h_min_qty = (int)$min_qty;
            $min_hasil = $h_qty - $h_min_qty;
            if ($min_hasil >= 0){
                $update_data = [
                    "K_QTY" => $min_hasil, //update ke tabel sebelum nya
                ];
                $model = new Crud_packing(); //model tabel sebelum nya
                $model->update_data($update_data, $id_temp); //cek fungsi model
                $this->storebox(); //ganti di routs dari save jadi min
                
            }else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                return $this->response->redirect(site_url('rtg_box'));
            }

    }
    public function storeitem() {
        $crud_shipping = new M_shipping();
        $data = [
         'SHP_PIC'  => $this->request->getVar('SHP_PIC'),
         'SHP_Datetime' => $this->request->getVar('SHP_Datetime'),
         'SHP_KodeBatch' => $this->request->getVar('SHP_KodeBatch'),
         'SHP_NamaProduk'  => $this->request->getVar('SHP_NamaProduk'),
         'SHP_Kategori'  => $this->request->getVar('SHP_Kategori'),            
         'SHP_QTY'  => $this->request->getVar('SHP_QTY'),            
         'SHP_Customer'  => $this->request->getVar('SHP_Customer'),            
         'SHP_Expedition'  => $this->request->getVar('SHP_Expedition'),
        ];
        
        $suc = "Shipping Item";
        session()->setFlashdata('flashdata', $suc);
        $crud_shipping->insert($data);
        return $this->response->redirect(site_url('rtg_item'));
    }

    public function minitem()
    {
        $this->db = db_connect();
        
        $kategori = $this->request->getVar('SHP_Kategori'); 
        $cari_kontainer = $this->request->getPost('RQ2_KodeKontainer'); //tag input
        $cari_batch = $this->request->getPost('SHP_KodeBatch'); //tag input
        $min_qty = $this->request->getPost('SHP_QTY'); //tag input

        //RELEASE
        if ($kategori == "Release") {
            $builder_release = $this->db->table("final_release"); //tabel sebelum nya
            $builder_release->where("R_Kontainer ", $cari_kontainer);//kontainer tabel sebelum nya
            $builder_release->where("R_KodeBatch ", $cari_batch); //batch tabel sebelum nya
            $query_release = $builder_release->get();
            foreach ($query_release->getResult() as $row) {
                $id_temp_release = $row->R_No; //print no tabel sebelum nya
                $qty_release = $row->R_QTY; //print qty tabel sebelum nya
            }
                $h_qty_release = (int)$qty_release;
                $h_min_qty = (int)$min_qty;
                $min_hasil_release = $h_qty_release - $h_min_qty;
                if ($min_hasil_release >= 0){
                    $update_data_release = [
                        "R_QTY" => $min_hasil_release, //update ke tabel sebelum nya
                    ];
                    $model = new M_release(); //model tabel sebelum nya
                    $model->update_data($update_data_release, $id_temp_release); //cek fungsi model
                    $model->delete_data_nol();
                    $this->storeitem(); //ganti di routs dari save jadi min
                }
                else {
                    $suc = "Item In Container Empty";
                    session()->setFlashdata('flashdata', $suc);
                    echo "fuck";
                    return $this->response->redirect(site_url('rtg_item'));
                }
        }

        //MARKETPLACE
        if ($kategori == "Marketplace") {
        $builder_mp = $this->db->table("final_marketplace"); //tabel sebelum nya
        $builder_mp->where("M_Kontainer ", $cari_kontainer);//kontainer tabel sebelum nya
        $builder_mp->where("M_KodeBatch ", $cari_batch); //batch tabel sebelum nya
        $query_mp = $builder_mp->get();
        foreach ($query_mp->getResult() as $row) {
            $id_temp_mp = $row->M_No; //print no tabel sebelum nya
            $qty_mp = $row->M_QTY; //print qty tabel sebelum nya
        }
            $h_qty_mp = (int)$qty_mp;
            $h_min_qty = (int)$min_qty;
            $min_hasil_mp = $h_qty_mp - $h_min_qty;
            if ($min_hasil_mp >= 0){
                $update_data_mp = [
                    "M_QTY" => $min_hasil_mp, //update ke tabel sebelum nya
                ];
                $model = new M_marketplace(); //model tabel sebelum nya
                $model->update_data($update_data_mp, $id_temp_mp); //cek fungsi model
                $model->delete_data_nol();
                $this->storeitem(); //ganti di routs dari save jadi min
            }
            else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                echo "fuck";
                return $this->response->redirect(site_url('rtg_item'));
            }
        }

        //DISCMP
        if ($kategori == "DiscMP") {
            $builder_mp = $this->db->table("final_discmp"); //tabel sebelum nya
            $builder_mp->where("DMP_Kontainer ", $cari_kontainer);//kontainer tabel sebelum nya
            $builder_mp->where("DMP_KodeBatch ", $cari_batch); //batch tabel sebelum nya
            $query_mp = $builder_mp->get();
            foreach ($query_mp->getResult() as $row) {
                $id_temp_mp = $row->DMP_No; //print no tabel sebelum nya
                $qty_mp = $row->DMP_QTY; //print qty tabel sebelum nya
            }
                $h_qty_mp = (int)$qty_mp;
                $h_min_qty = (int)$min_qty;
                $min_hasil_mp = $h_qty_mp - $h_min_qty;
                if ($min_hasil_mp >= 0){
                    $update_data_mp = [
                        "DMP_QTY" => $min_hasil_mp, //update ke tabel sebelum nya
                    ];
                    $model = new M_disc(); //model tabel sebelum nya
                    $model->update_data($update_data_mp, $id_temp_mp); //cek fungsi model
                    $model->delete_data_nol();
                    $this->storeitem(); //ganti di routs dari save jadi min
                }
                else {
                    $suc = "Item In Container Empty";
                    session()->setFlashdata('flashdata', $suc);
                    echo "fuck";
                    return $this->response->redirect(site_url('rtg_item'));
                }
            }
        
       //SUNSAN
       if ($kategori == "Sunsan") {
        $builder_sunsan = $this->db->table("final_sunsan"); //tabel sebelum nya
        $builder_sunsan->where("S_Kontainer ", $cari_kontainer);//kontainer tabel sebelum nya
        $builder_sunsan->where("S_KodeBatch ", $cari_batch); //batch tabel sebelum nya
        $query_sunsan = $builder_sunsan->get();
        foreach ($query_sunsan->getResult() as $row) {
            $id_temp_sunsan = $row->S_No; //print no tabel sebelum nya
            $qty_sunsan = $row->S_QTY; //print qty tabel sebelum nya
        }
            $h_qty_sunsan = (int)$qty_sunsan;
            $h_min_qty = (int)$min_qty;
            $min_hasil_sunsan = $h_qty_sunsan - $h_min_qty;
            if ($min_hasil_sunsan >= 0){
                $update_data_sunsan = [
                    "S_QTY" => $min_hasil_sunsan, //update ke tabel sebelum nya
                ];
                $model = new M_sunsan(); //model tabel sebelum nya
                $model->update_data($update_data_sunsan, $id_temp_sunsan); //cek fungsi model
                $model->delete_data_nol();
                $this->storeitem(); //ganti di routs dari save jadi min
            }
            else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                echo "fuck";
                return $this->response->redirect(site_url('rtg_item'));
            }
    }
        
            
            
    }


    public function prartg()
    {
        $data = [
            "title" => "Select Shipping",
        ];
        return view("rtg/pra_rtg", $data);
    }  
}