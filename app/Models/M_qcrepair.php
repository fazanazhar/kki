<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_qcrepair extends Model
{
    protected $table = 'data_qc_repair';
    protected $primaryKey = 'Q1T_No';     
    protected $allowedFields = ['Q1T_PIC', 'Q1T_Datetime', 'R_KodeKontainer', 'Q1T_KodeKontainer', 'Q1T_KodeBatch','Q1T_NamaProduk','Q1T_QTY','Q1T_Kategori'];

    public function get_data($Q1T_No = false){
		if($Q1T_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['Q1T_No' => $Q1T_No]);
		}
	}

	public function gupdate_data($data, $Q1T_No){
		$update_query = $this->db->table($this->table)->update($data, array('Q1T_no' => $Q1T_no));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	public function delete_data($Q1T_No){
		$delete_query = $this->db->table($this->table)->delete(array('Q1T_No' => $Q1T_No));
		return $delete_query;
	}
	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}

}