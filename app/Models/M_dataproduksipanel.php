<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_dataproduksipanel extends Model
{
    protected $table = 'data_produksi_panel';
    protected $primaryKey = 'P_No'; 
    protected $allowedFields = ['P_No','P_PIC', 'P_Datetime','P_KodeKontainer','P_KodeBatch','P_NamaProduk','P_QTY','P_Status','P_Report'];
	
	public function get_data($P_No = false){
		if($P_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['P_No' => $P_No]);
		}
	}

	public function gupdate_data($data, $P_No){
		$update_query = $this->db->table($this->table)->update($data, array('P_no' => $P_No));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	public function delete_data($P_No){
		$delete = $this->db->table($this->table)->delete(array('P_No' => $P_No));
		return $delete;
	}
	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}

}