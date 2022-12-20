<?php 
namespace App\Models;
use CodeIgniter\Model;
class Crud_tpacking extends Model
{
    protected $table = 'data_packing_temp';
    protected $primaryKey = 'K_No ';
     
    protected $allowedFields = ['K_PIC', 'K_Datetime', 'RQ2_KodeKontainer', 'K_KodeDus', 'K_Kodebatch', 'K_NamaProduk', 'K_QTY'];

    public function get_data($K_No = false){
		if($K_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['K_No' => $K_No]);
		}
	}

	public function gupdate_data($data, $K_No){
		$update_query = $this->db->table($this->table)->update($data, array('K_no' => $K_no));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	// public function delete_data($K_No){
	// 	$delete_query = $this->db->table($this->table)->delete(array('K_No' => $K_No));
	// 	return $delete_query;
	// }

	public function delete_data($get_id){
		$delete_query = $this->db->table($this->table)->delete(array('K_No' => $get_id));
		return $delete_query;
	}

	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}
}