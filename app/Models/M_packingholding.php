<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_packingholding extends Model
{
    protected $table = 'data_packing_holding';
    protected $primaryKey = 'P2_No';     
    protected $allowedFields = ['P2_PIC', 'P2_Datetime', 'RQ1_KodeKontainer', 'P2_KodeKontainer', 'P2_KodeBatch','P2_NamaProduk','P2_QTY','P2_Kategori'];

    public function get_data($P2_No = false){
		if($P2_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['P2_No' => $P2_No]);
		}
	}

	public function gupdate_data($data, $P2_No){
		$update_query = $this->db->table($this->table)->update($data, array('P2_no' => $P2_no));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	public function delete_data($P2_No){
		$delete_query = $this->db->table($this->table)->delete(array('P2_No' => $P2_No));
		return $delete_query;
	}
	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}

}