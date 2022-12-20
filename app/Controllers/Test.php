<?php 
namespace App\Controllers; 
use App\Models\M_repair_temp;
class Test extends BaseController{
    
    public function index(){
        $data = [
            'title' => 'Panel Production'
        ];
        
        $this->db = db_connect();
        date_default_timezone_set("Asia/Jakarta");
        $waktu = date("Y-m-d H:i:s");
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
                "R_KodeKontainer" => $row->Q1_KodeKontainer,
                "RPR_NamaProduk" => $row->Q1_NamaProduk,
                "RPR_QTY" => $row->Q1_QTY,
            ];
             if (!empty($hasil_repair)) {

                $builder = $this->db->table("data_repair_temp");
                $builder->select('*');
                $builder->where('RPR_KodeBatch', $row->Q1_KodeBatch);
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
                }if (!empty($rowcari)){
                    if ($rowcari->RPR_KodeBatch == $row->Q1_KodeBatch && $rowcari->R_KodeKontainer == $row->Q1_KodeKontainer){
                        $model = new M_repair_temp();
                        $model->update_data($hasil_repairsum, $id_temp);
                 
                    } else{
                        
                        $m_repair_temp = new M_repair_temp();
                        $m_repair_temp->insert($hasil_repair);
                    }
                } else {
                        $m_repair_temp = new M_repair_temp();
                        $m_repair_temp->insert($hasil_repair);
                }
            }
        }
        
           
        // return view('pd/view', $data);
    }
}