<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_repair_temp extends Model
{
    protected $table = 'data_repair_temp';
    protected $primaryKey = 'RPR_No';
     
    protected $allowedFields = ['RPR_PIC', 'RPR_Datetime', 'R_KodeKontainer','RPR_KodeBatch','RPR_NamaProduk','RPR_QTY'];
    public function update_data($update_data, $id_temp){
		$update_query = $this->db->table($this->table)->update($update_data, array('RPR_No' => $id_temp)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data($get_id){
		$delete_query = $this->db->table($this->table)->delete(array('P_No' => $get_id));
		return $delete_query;
	}
	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('RPR_No' => "0"));
		return $delete_query;
	}
}