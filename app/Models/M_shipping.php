<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_shipping extends Model
{
    protected $table = 'final_shipping';
    protected $primaryKey = 'SHP_No';
     
    protected $allowedFields = ['SHP_PIC', 'SHP_Datetime', 'SHP_KodeBatch','SHP_NamaProduk','SHP_QTY','SHP_Customer','SHP_Expedition','SHP_Kategori'];

    public function get_data($SHP_No = false){
		if($SHP_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['SHP_No' => $SHP_No]);
		}
	}

	public function gupdate_data($data, $SHP_No){
		$update_query = $this->db->table($this->table)->update($data, array('SHP_No' => $SHP_No));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	public function delete_data($SHP_No){
		$delete_query = $this->db->table($this->table)->delete(array('SHP_No' => $SHP_No));
		return $delete_query;
	}
	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}
}