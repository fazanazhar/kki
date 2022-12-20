<?php
namespace App\Controllers;
use App\Models\M_disc;
use App\Models\M_sunsan;
use App\Models\M_release;
use App\Models\M_marketplace;
use App\Models\M_retain;
use App\Models\M_destroy;
use App\Models\M_shipping;
use App\Models\M_holding_temp;
use App\Models\M_repair;
use App\Models\M_dataproduksi;
use App\Models\M_dataproduksitemp;
use App\Models\Crud_masterbarang;
use App\Models\M_qcproduksi_crud;
use App\Models\Crud_mastercontainer;
use App\Models\M_repair_temp;
use App\Models\Crud_masterdata;
use CodeIgniter\Controller;

class Qualitycontrol extends BaseController
{
    // users list
    public function index()
    {
        $data = [
            "title" => "Quantity Control Produksi",
        ];
        $Crud_masterbarang = new Crud_masterbarang();      
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll(); 

        $crud_sunsan = new M_sunsan();
        $resultsunsan = $crud_sunsan
            ->select("sum(S_QTY) as sumsunsan_qty")
            ->first();
        $data["sunsandata"] = $resultsunsan["sumsunsan_qty"];
        $crud_pdtemp = new M_dataproduksitemp();
        $resultpdtemp = $crud_pdtemp
            ->select("sum(P_QTY) as sumpdtemp_qty")
            ->first();
        $data["pdtempdata"] = $resultpdtemp["sumpdtemp_qty"];
        $crud_repair = new M_repair();
        $resultrepair = $crud_repair
            ->select("sum(RPR_QTY) as sumrepair_qty")
            ->first();
        $data["repairdata"] = $resultrepair["sumrepair_qty"];
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
        $crud_destroy = new M_destroy();
        $resultdestroy = $crud_destroy
            ->select("sum(D_QTY) as sumdestroy_qty")
            ->first();
        $data["destroydata"] = $resultdestroy["sumdestroy_qty"];
        $crud_retain = new M_retain();
        $resultretain = $crud_retain
            ->select("sum(RTN_QTY) as sumretain_qty")
            ->first();
        $data["retainrdata"] = $resultretain["sumretain_qty"];
        $crud_holding = new M_holding_temp();
        $resultholding = $crud_holding
            ->select("sum(H_QTY) as sumholding_qty")
            ->first();
        $data["holdingdata"] = $resultholding["sumholding_qty"];
        $data["masterbarang"] = $Crud_masterbarang
            ->orderBy("mbr_id", "DESC")
            ->findAll();
        $model = new M_qcproduksi_crud();
        $data["data_tabels"] = $model->get_data();
        $m_dataproduksitemp = new M_dataproduksitemp();
        $data["p_kon"] = $m_dataproduksitemp->findAll();
        
        $crud_mastercontainer = new Crud_mastercontainer();
        $data["mastercontainer"] = $crud_mastercontainer->findAll();
        $m_qcproduksi = new M_qcproduksi_crud(); 
        $mqcproduksi = $m_qcproduksi->select('P_KodeKontainer as kontainer')->first();
        if ($mqcproduksi){
        $data["get_container"] = $mqcproduksi['kontainer'];
        }else {
        $data["get_container"] = 0;
        }

        $master_dataholding = new M_holding_temp();
        $data['holdingdatas'] = $master_dataholding->orderBy('H_No', 'DESC')->findAll();
        
        $master_datadisc = new M_disc();
        $data['discmpdatas'] = $master_datadisc->orderBy('DMP_No', 'DESC')->findAll();

        $master_datadestroy = new M_destroy();
        $data['destroydatas'] = $master_datadestroy->orderBy('D_No', 'DESC')->findAll();
        
        $master_dataModelretain= new M_retain();
        $data['retaindatas'] = $master_dataModelretain->orderBy('RTN_No', 'DESC')->findAll();
        
        $master_datamarketplace = new M_marketplace();
        $data['marketplacedatas'] = $master_datamarketplace->orderBy('M_No', 'DESC')->findAll();
        
        $master_dataModelrepair = new M_repair();
        $data['repairdatas'] = $master_dataModelrepair->orderBy('RPR_No', 'DESC')->findAll();
        
        $master_dataModelsunsan = new M_sunsan();
        $data['sunsandatas'] = $master_dataModelsunsan->orderBy('S_No', 'DESC')->findAll();
        
        $M_dataproduksi = new M_dataproduksi();
        $data['produksidatas'] = $M_dataproduksi->orderBy('P_No', 'DESC')->findAll();

        return view("qc/view", $data);
    }

    public function praqc()
    {
        $data = [
            "title" => "Validation Quantity",
        ];
        return view("qc/pra_qc", $data);
    }

    public function validasi()
    {
        $data = [
            "title" => "Validation Quantity",
        ];
        return view("qc/validasi", $data);
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
                // "P_Status" => "QC-Confirmed", //update ke tabel sebelum nya
                "P_Report" => "QC-Confirmed", //update ke tabel sebelum nya
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
                // "P_Status" => "QC-Confirmed", //update ke tabel sebelum nya                
                "P_Report" => "QC-Confirmed", //update ke tabel sebelum nya
            ];
                $m_produktemp = new M_dataproduksitemp();
                $m_produktemp->update_data($update_datat, $id_tempt);
            
        
        return $this->response->redirect(site_url("qc_produk_v"));
    }

    public function updatestatusnapp()
    {
        $hP_No = $this->request->getVar("confirmnonapp");
        $hP_KodeBatch = $this->request->getVar("confirmbatchnapp");        
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
                // "P_Status" => "QC-Confirmed", //update ke tabel sebelum nya
                "P_Report" => "QC-Confirmed", //update ke tabel sebelum nya
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
                // "P_Status" => "QC-Confirmed", //update ke tabel sebelum nya                
                "P_Report" => "QC-Confirmed", //update ke tabel sebelum nya
            ];
                $m_produktemp = new M_dataproduksitemp();
                $m_produktemp->update_data($update_datat, $id_tempt);
            
        
        return $this->response->redirect(site_url("qc_produk_v"));
    }

    public function acc()
    {
        $m_dataproduksi = new M_dataproduksi();
        $m_dataproduksitemp = new M_dataproduksitemp();
        $data = [
            "title" => "Validation Quantity",
        ];

        $hP_KodeKontainer = $this->request->getVar("P_KodeKontainer");
        $hP_KodeBatch = $this->request->getVar("P_KodeBatch");
        $hP_QC_QTY = $this->request->getVar("P_QTY");
        $packing_operator = $this->request->getVar("packing_operator");
        $this->db = db_connect();
        $builder = $this->db->table("data_produksi_temp");
        $builder->where("P_KodeKontainer ", $hP_KodeKontainer);
        $builder->where("P_KodeBatch ", $hP_KodeBatch);
        $builder->where("P_Status ", "Waiting");
        $builder->orwhere("P_Status ", "Dont Match");
        $builder->orwhere("P_Status ", "Approved");
        $query = $builder->get();
        $hasil = $query->getResult();

        foreach ($query->getResult() as $row) {
            $hasil = $row->P_QTY;
        }
        foreach ($query->getResult() as $row) {
            $hasilut = $row->P_No;
        }

        if ($hasil == $hP_QC_QTY) {
            foreach ($query->getResult() as $row) {
                $hasil = $row->P_No;
            }
            $data1 = [
                "P_Status" => "QC-Accepted",
                "P_Reporter" => $this->request->getVar("packing_operator"),
                "P_Report" => "Confirmed",
                "P_QC_QTY" => $hP_QC_QTY,
                "P_pass" => $hP_KodeKontainer,
            ];
            $data2 = [
                "P_Status" => "QC-Accepted",
                "P_Reporter" => $this->request->getVar("packing_operator"),
                "P_QC_QTY" => $hP_QC_QTY,
                "P_Report" => "Confirmed",
            ];
            $m_dataproduksitemp->update($hasil, $data1);
            $m_dataproduksi->update($hasil, $data2);
            session()->setFlashdata("flashdata", $hP_KodeBatch);
            return $this->response->redirect(site_url("qc_produk"));
        } elseif (!empty($hasilut)) {
            $data3 = [
                "P_Reporter" => $this->request->getVar("packing_operator"),
                "P_Report" => "Dont Match",
                "P_Status" => "Dont Match",
                "P_QC_QTY" => $hP_QC_QTY,
            ];
            $data4 = [
                "P_Status" => "Dont Match",
                "P_Report" => "Dont Match",

            ];
            $m_dataproduksitemp->update($hasilut, $data3);
            $m_dataproduksi->update($hasilut, $data4);
            session()->setFlashdata("flashdata_error", $packing_operator);
            return $this->response->redirect(site_url("qc_produk"));
        } else {
            session()->setFlashdata("flashdata_not", $hP_KodeBatch);
            return $this->response->redirect(site_url("qc_produk"));
        }
    }

    public function update()
    {
        $crud_masterdata = new Crud_masterdata();
        $batch = $this->request->getVar("Batch");
        $data = [
            "master_idbarang" => $this->request->getVar("master_idbarang"),
            "master_namabarang" => $this->request->getVar("master_namabarang"),
        ];
        $crud_masterdata->update($batch, $data);
        return $this->response->redirect(site_url("masterdata"));
    }

    public function table_data()
    {
        $data = [
            "title" => "Quantity Control Produksi",
        ];
        $model = new M_qcproduksi_crud();
        $data["data_tabels"] = $model->get_data();
        echo view("qc/table", $data);
    }

    public function save()
    {
        $model = new M_qcproduksi_crud();
        $data = [
            "Q1_PIC" => $this->request->getPost("Q1_PIC"),
            "Q1_Datetime" => $this->request->getPost("Q1_Datetime"),
            "P_KodeKontainer" => $this->request->getPost("P_KodeKontainer"),
            "Q1_KodeKontainer" => $this->request->getPost("Q1_KodeKontainer"),
            "Q1_KodeBatch" => $this->request->getPost("Q1_KodeBatch"),
            "Q1_NamaProduk" => $this->request->getPost("Q1_NamaProduk"),
            "Q1_QTY" => $this->request->getPost("Q1_QTY"),
            "Q1_Kategori" => $this->request->getPost("Q1_Kategori"),
        ];

        $model->simpan_data($data);
    }

    public function store()
    {
        $banding = "Holding";
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
        $this->db = db_connect();
        $builderh = $this->db->table("data_qc_produksi");
        $builderh->select('*,,COUNT(*)');
        $builderh->selectSum('Q1_QTY`');
        $builderh->where(array('`Q1_Kategori`' => 'Holding'));
        $builderh->groupBy('`Q1_KodeKontainer`, Q1_KodeBatch');
        $queryh = $builderh->get();
        foreach ($queryh->getResult() as $row) {
            $hasil_holding = [
                "H_PIC" => $row->Q1_PIC,
                "H_Datetime" => $waktu,
                "H_KodeBatch" => $row->Q1_KodeBatch,
                "RQ1_KodeKontainer" => $row->Q1_KodeKontainer,
                "H_NamaProduk" => $row->Q1_NamaProduk,
                "H_QTY" => $row->Q1_QTY,
            ];

            if (!empty($hasil_holding)) {

                $builderhh = $this->db->table("data_holding_temp");
                $builderhh->select('*');
                $builderhh->where('RQ1_KodeKontainer', $row->Q1_KodeKontainer);
                $queryhh = $builderhh->get();
                foreach ($queryhh->getResult() as $rowcarih) {
                    
                    $id_temph= $rowcarih->H_No;
                    $sumh_qty = $rowcarih->H_QTY + $row->Q1_QTY;
                    $hasil_holdingsum = [
                        "H_PIC" => $row->Q1_PIC,
                        "H_KodeBatch" => $row->Q1_KodeBatch,
                        "H_Datetime" => $waktu,
                        "RQ1_KodeKontainer" => $row->Q1_KodeKontainer,
                        "H_NamaProduk" => $row->Q1_NamaProduk,
                        "H_QTY" => $sumh_qty,
                    ];
                }if (!empty($rowcarih)){
                    if ($rowcarih->H_KodeBatch == $row->Q1_KodeBatch && $rowcarih->RQ1_KodeKontainer == $row->Q1_KodeKontainer){
                        $model = new M_holding_temp();
                        $model->update_data($hasil_holdingsum, $id_temph);
                 
                    } else{
                        $m_holding_temp = new M_holding_temp();
                        $m_holding_temp->insert($hasil_holding);
                    }
                } else {
                    $m_holding_temp = new M_holding_temp();
                    $m_holding_temp->insert($hasil_holding);
                }
            }
        }
        $model_hold = new M_holding_temp();
        $model_hold->delete_data_nol();

        $builderm = $this->db->table("data_qc_produksi");
        $builderm->select('*,,COUNT(*)');
        $builderm->selectSum('Q1_QTY`');
        $builderm->where(array('`Q1_Kategori`' => 'Marketplace'));
        $builderm->groupBy('`Q1_KodeKontainer`, Q1_KodeBatch');
        $querym = $builderm->get();
        foreach ($querym->getResult() as $row) {
            $hasil_marketplace = [
                "M_PIC" => $row->Q1_PIC,
                "M_Datetime" => $waktu,
                "M_KodeBatch" => $row->Q1_KodeBatch,
                "M_Kontainer" => $row->Q1_KodeKontainer,
                "M_NamaProduk" => $row->Q1_NamaProduk,
                "M_QTY" => $row->Q1_QTY,
            ];
            if (!empty($hasil_marketplace)) {

                $buildermm = $this->db->table("final_marketplace");
                $buildermm->select('*');
                $buildermm->where('M_Kontainer', $row->Q1_KodeKontainer);
                $querymm = $buildermm->get();
                foreach ($querymm->getResult() as $rowcarim) {
                    
                    $id_tempm= $rowcarim->M_No;
                    $summ_qty = $rowcarim->M_QTY + $row->Q1_QTY;
                    $hasil_marketplacesum = [
                        "M_PIC" => $row->Q1_PIC,
                        "M_KodeBatch" => $row->Q1_KodeBatch,
                        "M_Datetime" => $waktu,
                        "M_Kontainer" => $row->Q1_KodeKontainer,
                        "M_NamaProduk" => $row->Q1_NamaProduk,
                        "M_QTY" => $summ_qty,
                    ];
                }if (!empty($rowcarim)){
                    if ($rowcarim->M_KodeBatch == $row->Q1_KodeBatch && $rowcarim->M_Kontainer == $row->Q1_KodeKontainer){
                        $model = new M_marketplace();
                        $model->update_data($hasil_marketplacesum, $id_tempm);
                 
                    } else{
                        $m_marketplace = new M_marketplace();
                        $m_marketplace->insert($hasil_marketplace);
                    }
                } else {
                    $m_marketplace = new M_marketplace();
                    $m_marketplace->insert($hasil_marketplace);
                }
            }
            var_dump($hasil_marketplace);
        }
        
        $model_market = new M_marketplace();
        $model_market->delete_data_nol();
        
        $builderd = $this->db->table("data_qc_produksi");
        $builderd->select('*,,COUNT(*)');
        $builderd->selectSum('Q1_QTY`');
        $builderd->where(array('`Q1_Kategori`' => 'DiscMP'));
        $builderd->groupBy('`Q1_KodeKontainer`, Q1_KodeBatch');
        $queryd = $builderd->get();
        foreach ($queryd->getResult() as $row) {
            $hasil_disc = [
                "DMP_PIC" => $row->Q1_PIC,
                "DMP_Datetime" => $waktu,
                "DMP_KodeBatch" => $row->Q1_KodeBatch,
                "DMP_Kontainer" => $row->Q1_KodeKontainer,
                "DMP_NamaProduk" => $row->Q1_NamaProduk,
                "DMP_QTY" => $row->Q1_QTY,
            ];

            if (!empty($hasil_disc)) {
                $builderdss = $this->db->table("final_discmp");
                $builderdss->select('*');
                $builderdss->where('DMP_Kontainer', $row->Q1_KodeKontainer);
                $querydss = $builderdss->get();
                foreach ($querydss->getResult() as $rowcarids) {
                    
                    $id_tempds= $rowcarids->DMP_No;
                    $sumds_qty = $rowcarids->DMP_QTY + $row->Q1_QTY;
                    $hasil_discsum = [
                        "DMP_PIC" => $row->Q1_PIC,
                        "DMP_KodeBatch" => $row->Q1_KodeBatch,
                        "DMP_Datetime" => $waktu,
                        "DMP_Kontainer" => $row->Q1_KodeKontainer,
                        "DMP_NamaProduk" => $row->Q1_NamaProduk,
                        "DMP_QTY" => $sumds_qty,
                    ];
                }if (!empty($rowcarids)){
                    if ($rowcarids->DMP_KodeBatch == $row->Q1_KodeBatch && $rowcarids->DMP_Kontainer == $row->Q1_KodeKontainer){
                        $model = new M_disc();
                        $model->update_data($hasil_discsum, $id_tempds);
                 
                    } else{
                        $m_disc = new M_disc();
                        $m_disc->insert($hasil_disc);
                    }
                } else {
                    $m_disc = new M_disc();
                    $m_disc->insert($hasil_disc);
                }
            }
        }
        $model_disc = new M_disc();
        $model_disc->delete_data_nol();

        $builders = $this->db->table("data_qc_produksi");
        $builders->select('*,,COUNT(*)');
        $builders->selectSum('Q1_QTY`');
        $builders->where(array('`Q1_Kategori`' => 'Sunsan'));
        $builders->groupBy('`Q1_KodeKontainer`, Q1_KodeBatch');
        $querys = $builders->get();
        foreach ($querys->getResult() as $row) {
            $hasil_sun = [
                "S_PIC" => $row->Q1_PIC,
                "S_Datetime" => $waktu,
                "S_KodeBatch" => $row->Q1_KodeBatch,
                "S_Kontainer" => $row->Q1_KodeKontainer,
                "S_NamaProduk" => $row->Q1_NamaProduk,
                "S_QTY" => $row->Q1_QTY,
            ];
            if (!empty($hasil_sun)) {

                $builderss = $this->db->table("final_sunsan");
                $builderss->select('*');
                $builderss->where('S_Kontainer', $row->Q1_KodeKontainer);
                $queryss = $builderss->get();
                foreach ($queryss->getResult() as $rowcaris) {
                    
                    $id_temps= $rowcaris->S_No;
                    $sums_qty = $rowcaris->S_QTY + $row->Q1_QTY;
                    $hasil_sunsum = [
                        "S_PIC" => $row->Q1_PIC,
                        "S_KodeBatch" => $row->Q1_KodeBatch,
                        "S_Datetime" => $waktu,
                        "S_Kontainer" => $row->Q1_KodeKontainer,
                        "S_NamaProduk" => $row->Q1_NamaProduk,
                        "S_QTY" => $sums_qty,
                    ];
                }if (!empty($rowcaris)){
                    if ($rowcaris->S_KodeBatch == $row->Q1_KodeBatch && $rowcaris->S_Kontainer == $row->Q1_KodeKontainer){
                        $model = new M_sunsan();
                        $model->update_data($hasil_sunsum, $id_temps);
                 
                    } else{                        
                        $m_sunsan = new M_sunsan();
                        $m_sunsan->insert($hasil_sun);
                    }
                } else {
                    $m_sunsan = new M_sunsan();
                    $m_sunsan->insert($hasil_sun);
                }
            }
        }
        $model_sunsan = new M_sunsan();
        $model_sunsan->delete_data_nol();

        $builderr = $this->db->table("data_qc_produksi");
        $builderr->select('*,COUNT(*)');
        $builderr->selectSum('Q1_QTY`');
        $builderr->where(array('`Q1_Kategori`' => 'Repair'));
        $builderr->groupBy('`Q1_KodeKontainer`, Q1_KodeBatch');
        $queryr = $builderr->get();
        foreach ($queryr->getResult() as $row) {
            $hasil_repair = [
                "RPR_PIC" => $row->Q1_PIC,
                "RPR_KodeBatch" => $row->Q1_KodeBatch,
                "RPR_Datetime" => $waktu,
                "R_KodeKontainer" => $row->Q1_KodeKontainer,
                "RPR_NamaProduk" => $row->Q1_NamaProduk,
                "RPR_QTY" => $row->Q1_QTY,
            ];
            if (!empty($hasil_repair)) {

                $builder = $this->db->table("data_repair_temp");
                $builder->select('*');
                $builder->where('R_KodeKontainer', $row->Q1_KodeKontainer);
                $query = $builder->get();
                foreach ($query->getResult() as $rowcari) {
                    
                    $id_temp= $rowcari->RPR_No;
                    $sum_qty = $rowcari->RPR_QTY + $row->Q1_QTY;
                    $hasil_repairsum = [
                        "RPR_PIC" => $row->Q1_PIC,
                        "RPR_KodeBatch" => $row->Q1_KodeBatch,
                        "RPR_Datetime" => $waktu,
                        "R_KodeKontainer" => $row->Q1_KodeKontainer,
                        "RPR_NamaProduk" => $row->Q1_NamaProduk,
                        "RPR_QTY" => $sum_qty,
                    ];
                }
                // var_dump($rowcari);
                if (!empty($rowcari)){
                    if ($rowcari->RPR_KodeBatch == $row->Q1_KodeBatch && $rowcari->R_KodeKontainer == $row->Q1_KodeKontainer){
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

        $builderre = $this->db->table("data_qc_produksi");
        $builderre->select('*,,COUNT(*)');
        $builderre->selectSum('Q1_QTY`');
        $builderre->where(array('`Q1_Kategori`' => 'Retain'));
        $builderre->groupBy('`Q1_KodeKontainer`, Q1_KodeBatch');
        $queryre = $builderre->get();
        foreach ($queryre->getResult() as $row) {
            $hasil_retain = [
                "RTN_PIC" => $row->Q1_PIC,
                "RTN_Datetime" => $waktu,
                "RTN_KodeBatch" => $row->Q1_KodeBatch,
                "RTN_KodeKontainer" => $row->Q1_KodeKontainer,
                "RTN_NamaProduk" => $row->Q1_NamaProduk,
                "RTN_QTY" => $row->Q1_QTY,
            ];
            if (!empty($hasil_retain)) {
                $m_retain = new M_retain();
                $m_retain->insert($hasil_retain);
            }
        }
        $model_retain = new M_retain();
        $model_retain->delete_data_nol();

        $builderde = $this->db->table("data_qc_produksi");
        $builderde->select('*,,COUNT(*)');
        $builderde->selectSum('Q1_QTY`');
        $builderde->where(array('`Q1_Kategori`' => 'Destroy'));
        $builderde->groupBy('`Q1_KodeKontainer`, Q1_KodeBatch');
        $queryde = $builderde->get();
        foreach ($queryde->getResult() as $row) {
            $hasil_destroy = [
                "D_PIC" => $row->Q1_PIC,
                "D_Datetime" => $waktu,
                "D_KodeBatch" => $row->Q1_KodeBatch,
                "D_NamaProduk" => $row->Q1_NamaProduk,
                "D_QTY" => $row->Q1_QTY,
            ];
            if (!empty($hasil_destroy)) {
                $builderdtt = $this->db->table("final_destroy");
                $builderdtt->select('*');
                $builderdtt->where('D_KodeBatch', $row->Q1_KodeBatch);
                $querydtt = $builderdtt->get();
                foreach ($querydtt->getResult() as $rowcaridt) {
                    
                    $id_tempdt= $rowcaridt->D_No;
                    $sumdt_qty = $rowcaridt->D_QTY + $row->Q1_QTY;
                    $hasil_destroysum = [
                        "D_PIC" => $row->Q1_PIC,
                        "D_KodeBatch" => $row->Q1_KodeBatch,
                        "D_Datetime" => $waktu,
                        "D_NamaProduk" => $row->Q1_NamaProduk,
                        "D_QTY" => $sumdt_qty,
                    ];
                }if (!empty($rowcaridt)){
                    if ($rowcaridt->D_KodeBatch == $row->Q1_KodeBatch){
                        $model = new M_destroy();
                        $model->update_data($hasil_destroysum, $id_tempdt);
                 
                    } else{
                        $m_destroy = new M_destroy();//model tujuan
                        $m_destroy->insert($hasil_destroy);
                    }
                } else {
                    $m_destroy = new M_destroy();//model tujuan
                    $m_destroy->insert($hasil_destroy);
                }
            }
        }
        $model_destroy = new M_destroy();
        $model_destroy->delete_data_nol();        
        $model_dataproduksitem = new M_dataproduksitemp();
        $model_dataproduksitem->delete_data_nol();
        $builder_reject = $this->db->table("data_produksi_temp"); //tabel sebelum nya di hapus
        $builder_reject->where("P_QTY", "0"); //cari qty 0 di tabel sebelum nya
        $query_reject = $builder_reject->get();
        foreach ($query_reject->getResult() as $row) {
                    $get_id = $row->P_No; //ID no tabel sebelum nya
            if (!empty($get_id)) {
                $model_del = new M_dataproduksitemp(); //model sebelum nya
                $model_del->delete_data($get_id); //cek / + fungsi di model
            }
        }

        $model = new M_qcproduksi_crud();
        $model->delete_all();
        return $this->response->redirect(site_url("qc_produk_v"));
    }

    public function min()
    {
        $kontainer = $this->request->getVar('P_KodeKontainer');
        $batch = $this->request->getVar('Q1_KodeBatch');
        $min_qty = $this->request->getVar('Q1_QTY'); 
        $this->db = db_connect();
        $builderh = $this->db->table("data_produksi_temp");
        $builderh->where("P_KodeKontainer ", $kontainer);
        $builderh->where("P_KodeBatch ", $batch);
        $query = $builderh->get();
        // print_r($queryh);

        foreach ($query->getResult() as $row) {
            $id_temp = $row->P_No; //print no tabel sebelum nya
            $qty = $row->P_QTY; //print qty tabel sebelum nya
        }
        var_dump ($kontainer);
            $h_qty = (int)$qty;
            $h_min_qty = (int)$min_qty;
            $min_hasil = $h_qty - $h_min_qty;
            if ($min_hasil >= 0){
                $update_data = [
                    "P_QTY" => $min_hasil, //update ke tabel sebelum nya
                ];
                $model = new M_dataproduksitemp(); //model tabel sebelum nya
                $model->update_data($update_data, $id_temp); //cek fungsi model
                $this->save(); //ganti di routs dari save jadi min
            }else {
                $suc = "Item In Container Empty";
                session()->setFlashdata('flashdata', $suc);
                return $this->response->redirect(site_url('qc_produk_v'));
            }
    }

    public function deleteeee()
    {
        $model = new M_qcproduksi_crud();
        $Q1_No = $this->request->getPost("Q1_No");
        $model->delete_data($Q1_No);
    }

    public function delete(){
        $kontainer = $this->request->getVar('P_KodeKontainer');
        $batch = $this->request->getVar('Q1_KodeBatch');
        $jumlah = $this->request->getVar('Q1_QTY'); 
        $this->db = db_connect();
        $builder_del = $this->db->table("data_produksi_temp");
        $builder_del->where("P_KodeKontainer ", $kontainer);
        $builder_del->where("P_KodeBatch ", $batch);
        $query_del = $builder_del->get();
        // var_dump ($kontainer);

        foreach ($query_del->getResult() as $row) {
            $id_temp = $row->P_No; //sesuaikan dengan tabel sebelum nya
            $qty = $row->P_QTY;
            
        }
        $hasil_tambah = $qty + $jumlah;
        $update_data = [
                "P_QTY" => $hasil_tambah,
            ];
            $model1 = new M_dataproduksitemp();
            $model1->update_data($update_data, $id_temp); //cek fungsi di model sebelum nya
            $model = new M_qcproduksi_crud();
            $Q1_No = $this->request->getPost('Q1_No');
            $model->delete_data($Q1_No);
    }

    function delete_cek()
    {
        if($this->request->getVar('checkbox_value'))
        {
            $id = $this->request->getVar('checkbox_value');
            for($count = 0; $count < count($id); $count++)
            {
                $this->db = db_connect();
                $builder_del = $this->db->table("data_qc_produksi");
                $builder_del->where("Q1_No ", $id[$count]);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->Q1_No;
                    $batch = $row->Q1_KodeBatch;
                    $kontainer = $row->P_KodeKontainer;
                    $qty = $row->Q1_QTY;
                }
                
                $this->db = db_connect();
                $builder_del = $this->db->table("data_produksi_temp");
                $builder_del->where("P_KodeKontainer ", $kontainer);
                $builder_del->where("P_KodeBatch ", $batch);
                $query_del = $builder_del->get();
                foreach ($query_del->getResult() as $row) {
                    $id_temp = $row->P_No;
                    $qty1 = $row->P_QTY;
                }
                // var_dump($qty1);
                $tam = $qty1 + $qty;
                 $update_data = [
                    "P_QTY" => $tam,
                ];
                print_r($tam);
                $model1 = new M_dataproduksitemp();
                $model1->update_data($update_data, $id_temp);
                $model = new M_qcproduksi_crud();
                $model->delete_data($id[$count]);
            }
        }
    }
    function matchingupdate(){
        $pd_container = $this->request->getVar("pd_container");
        $batch_code = $this->request->getVar("batch_code");
        $hmatch = $this->request->getVar("matching");
        $this->db = db_connect();
        $builder = $this->db->table("data_produksi_temp");
        $builder->where("P_KodeKontainer ", $pd_container);
        $builder->where("P_KodeBatch ", $batch_code);
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
            $id = $row->P_No;
        }
         $update_datamatch = [
                "P_KodeKontainer" => $hmatch,
            ];
            
        $models = new M_dataproduksitemp();
        $models->update_data($update_datamatch, $id);
        return $this->response->redirect(site_url('qc_produk'));
    }
}