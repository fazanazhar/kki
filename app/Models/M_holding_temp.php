<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_holding_temp extends Model
{
    protected $table = 'data_holding_temp';
    protected $primaryKey = 'H_No';
    protected $allowedFields = ['H_PIC', 'H_Datetime', 'RQ1_KodeKontainer', 'H_KodeBatch', 'H_NamaProduk','H_QTY'];

    public function update_data($update_holding_temp, $id_temp){
		$update_query = $this->db->table($this->table)->update($update_holding_temp, array('H_No' => $id_temp));
		return $update_query;
	}

 	public function delete_data($get_id){
		$delete_query = $this->db->table($this->table)->delete(array('H_No' => $get_id));
		return $delete_query;
	}
	
	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('H_QTY' => "0"));
		return $delete_query;
	}
}