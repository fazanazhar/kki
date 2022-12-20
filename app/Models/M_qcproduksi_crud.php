<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_qcproduksi_crud extends Model
{
    protected $table = 'data_qc_produksi';
    protected $primaryKey = 'Q1_No';     
    protected $allowedFields = ['Q1_PIC', 'Q1_Datetime', 'P_KodeKontainer', 'Q1_KodeKontainer', 'Q1_KodeBatch','Q1_NamaProduk','Q1_QTY','Q1_Kategori','P_Report'];

    public function get_data($Q1_No = false){
		if($Q1_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['Q1_No' => $Q1_No]);
		}
	}

	public function gupdate_data($data, $Q1_No){
		$update_query = $this->db->table($this->table)->update($data, array('Q1_no' => $Q1_no));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	public function delete_data($Q1_No){
		$delete_query = $this->db->table($this->table)->delete(array('Q1_No' => $Q1_No));
		return $delete_query;
	}
	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}
}