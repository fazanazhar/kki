<?php 
namespace App\Models;
use CodeIgniter\Model;
class Crud_masterdatabox extends Model
{
    protected $table = 'master_box';
    protected $primaryKey = 'mb_id';
     
    protected $allowedFields = ['mb_kode', 'mb_nama'];

    public function get_data($mb_id = false){
		if($mb_id == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['mb_id' => $mb_id]);
		}
	}

    public function get_layanan(){
        $query = $this->db->get('master_box');
        return $query->result_array();
    }
}