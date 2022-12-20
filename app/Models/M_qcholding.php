<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_qcholding extends Model
{
    protected $table = 'data_qc_holding';
    protected $primaryKey = 'Q2_No';     
    protected $allowedFields = ['Q2_PIC', 'Q2_Datetime', 'P2_KodeKontainer', 'Q2_KodeKontainer', 'Q2_KodeBatch','Q2_NamaProduk','Q2_QTY','Q2_Kategori','P_Report'];

    public function get_data($Q2_No = false){
		if($Q2_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['Q2_No' => $Q2_No]);
		}
	}

	public function gupdate_data($data, $Q2_No){
		$update_query = $this->db->table($this->table)->update($data, array('Q2_no' => $Q2_No));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	public function delete_data($Q2_No){
		$delete_query = $this->db->table($this->table)->delete(array('Q2_No' => $Q2_No));
		return $delete_query;
	}
	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}

}