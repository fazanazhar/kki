<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_qcpacking extends Model
{
    protected $table = 'data_qc_packing';
    protected $primaryKey = 'Q3_No';     
    protected $allowedFields = ['Q3_PIC', 'Q3_Datetime', 'K_KodeDus', 'Q3_KodeKontainer', 'Q3_KodeBatch','Q3_NamaProduk','Q3_QTY','Q3_Kategori'];

    public function get_data($Q3_No = false){
		if($Q3_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['Q3_No' => $Q3_No]);
		}
	}

	public function gupdate_data($data, $Q3_No){
		$update_query = $this->db->table($this->table)->update($data, array('Q3_no' => $Q3_no));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	public function delete_data($Q3_No){
		$delete_query = $this->db->table($this->table)->delete(array('Q3_No' => $Q3_No));
		return $delete_query;
	}
	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}

}