<?php

namespace App\Controllers;
use App\Models\M_disc;
use App\Models\M_sunsan;
use App\Models\M_release;
use App\Models\M_marketplace;
use App\Models\M_retain;
use App\Models\M_destroy;
use App\Models\M_shipping;
use App\Models\M_repair;
use App\Models\M_shipping_box;
use App\Models\M_holding_temp;
use App\Models\crud_packing;
use App\Models\Crud_masterbarang;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'SUNSKRIPS WMS'
        ];

        $crud_sunsan = new M_sunsan();
        $resultsunsan = $crud_sunsan->select('sum(S_QTY) as sumsunsan_qty')->first();
        $data['sunsandata'] = $resultsunsan['sumsunsan_qty'];
        $crud_disc = new M_disc();
        $resultdisc = $crud_disc->select('sum(DMP_QTY) as sumdisc_qty')->first();
        $data['discdata'] = $resultdisc['sumdisc_qty'];
        $crud_repair = new M_repair();
        $resultrepair = $crud_repair
            ->select("sum(RPR_QTY) as sumrepair_qty")
            ->first();
        $data["repairdata"] = $resultrepair["sumrepair_qty"];
        $crud_marketplace = new M_marketplace();
        $resultmarketplace = $crud_marketplace->select('sum(M_QTY) as summarketplace_qty')->first();
        $data['marketplacedata'] = $resultmarketplace['summarketplace_qty'];
        $crud_destroy = new M_destroy();
        $resultdestroy = $crud_destroy->select('sum(D_QTY) as sumdestroy_qty')->first();
        $data['destroydata'] = $resultdestroy['sumdestroy_qty'];
        $crud_retain = new M_retain();
        $resultretain = $crud_retain->select('sum(RTN_QTY) as sumretain_qty')->first();
        $data['retainrdata'] = $resultretain['sumretain_qty'];
        $crud_holding = new M_holding_temp();
        $resultholding = $crud_holding->select('sum(H_QTY) as sumholding_qty')->first();
        $data['holdingdata'] = $resultholding['sumholding_qty'];
        $crud_release = new M_release();
        $resultrelease = $crud_release->select('sum(R_QTY) as sumrelease_qty')->first();
        $crud_packing = new crud_packing();
        $resultpacking = $crud_packing->select('sum(K_QTY) as sumpacking_qty')->first();
        $data['onprogressdata'] = $resultpacking['sumpacking_qty'] + $resultrelease['sumrelease_qty'];
        $crud_shipping_item = new M_shipping();        
        $resultshipping_item = $crud_shipping_item->select('sum(SHP_QTY) as sumshipping_item_qty')->first();
        $crud_shipping_box = new M_shipping_box();
        $resultshipping_box = $crud_shipping_box->select('sum(SHP_QTY) as sumshipping_box_qty')->first();
        $data['shippingdata'] = $resultshipping_item['sumshipping_item_qty'] + $resultshipping_box['sumshipping_box_qty'];
        $crud_masterbarang = new Crud_masterbarang();
        $data['produk_all'] = $crud_masterbarang->findAll();

        
        $this->db = db_connect();
        
        $builderloop = $this->db->table("master_barang");
        $builderloop->select("*");
        $gets = $builderloop->get();
        foreach ($gets->getResult() as $get) {
            $builderp = $this->db->table("data_produksi");
            $builderp->select('SUM(`P_QTY`) as qty,`P_NamaProduk`,MONTH(`P_Datetime`) as bulan');
            $builderp->where('P_NamaProduk', "$get->mbr_produk");          
            $builderp->where('P_Status', "QC-Accepted");          
            $builderp->where('YEAR(P_Datetime)', 'YEAR(CURDATE())', FALSE);
            $builderp->groupBy('MONTH(`P_Datetime`)');                     
            $queryp = $builderp->get();
            foreach ($queryp->getResult() as $rowp) {
                $target_bulan = $rowp->bulan;
                $target_nama = $rowp->P_NamaProduk;
                $target_qty = $rowp->qty;
                $hasil0 = [
                    "D$target_bulan" => "0",
                ];
                $hasil1 = [
                    "D$target_bulan" => $target_qty,
                ];
                $crud_masterbarang = new Crud_masterbarang();
                $this->db->table("master_barang")->update($hasil0, array('mbr_produk' => $target_nama));
                $this->db->table("master_barang")->update($hasil1, array('mbr_produk' => $target_nama));
            }
            
        }
        $builderloop = $this->db->table("master_barang");
        $builderloop->select("*");
        $gets = $builderloop->get();
        foreach ($gets->getResult() as $get) {
            $builder1 = $this->db->table('`data_produksi`');
            $builder1->select('*,SUM(`P_QTY`) as total');
            $builder1->where('P_NamaProduk', "$get->mbr_produk");
            $builder1->where('YEAR(P_Datetime)', 'YEAR(CURDATE())', FALSE);
            $builder1->where('MONTH(`P_Datetime`)', 'MONTH(CURDATE())', FALSE);
            $builder1->groupBy('MONTH(`P_Datetime`)');
            $query1 = $builder1->get();
            $data['alldetail'] =  $query1;
            $as =  $data['alldetail'];
             foreach ($as->getResult() as $rowp) {
                // d($rowp);
            }
            // d($as);
        }
        return view('main/index', $data);
    }

public function praop()
{
$data = [
"title" => "Select Data On Progress",
];
return view("main/pra_op", $data);
}

public function prartg()
{
$data = [
"title" => "Select Data Ready to Go",
];
return view("main/pra_shipping", $data);
}
}