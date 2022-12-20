<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_shippingdetail extends Model
{
    protected $table = 'final_detail_shippingbox';
    protected $primaryKey = 'FSHP_No';
     
    protected $allowedFields = ['FSHP_PIC', 'FSHP_Datetime', 'FSHP_KodeBatch','FSHP_KodeDus','FSHP_NamaProduk','FSHP_QTY','FSHP_Customer','FSHP_Expedition','FSHP_Kategori'];

    public function get_data($FSHP_No = false){
		if($FSHP_No == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['FSHP_No' => $FSHP_No]);
		}
	}

	public function gupdate_data($data, $FSHP_No){
		$update_query = $this->db->table($this->table)->update($data, array('FSHP_No' => $FSHP_No));
		return $update_query;
	}

	public function simpan_data($data){
		$simpan_query = $this->db->table($this->table)->insert($data);
		return $simpan_query;
	}

	public function delete_data($FSHP_No){
		$delete_query = $this->db->table($this->table)->delete(array('FSHP_No' => $FSHP_No));
		return $delete_query;
	}
	public function delete_all(){
		$delete_query = $this->db->table($this->table)->truncate();
		return $delete_query;
	}
}