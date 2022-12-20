<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_dataproduksitempr extends Model
{
    protected $table = 'data_produksi_repair_temp';
    protected $primaryKey = 'P_No'; 
    protected $allowedFields = ['P_No','P_PIC', 'P_Datetime','P_KodeKontainer','P_KodeBatch','P_NamaProduk','P_QTY','P_Status','P_Report','P_QC_QTY','P_Reporter'];
    
    public function update_data($update_data, $id_temp){
		$update_query = $this->db->table($this->table)->update($update_data, array('P_No' => $id_temp)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data($get_id){
		$delete_query = $this->db->table($this->table)->delete(array('Q1T_No' => $get_id));
		return $delete_query;
	}

	public function delete_data2($get_id){
		$delete_query = $this->db->table($this->table)->delete(array('Q1_No' => $get_id));
		return $delete_query;
	}

	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('P_QTY' => "0"));
		return $delete_query;
	}
}