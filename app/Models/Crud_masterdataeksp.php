<?php 
namespace App\Models;
use CodeIgniter\Model;
class Crud_masterdataeksp extends Model
{
    protected $table = 'master_ekspedisi';
    protected $primaryKey = 'me_id';
     
    protected $allowedFields = ['me_kode', 'me_nama'];

    public function get_data($me_id = false){
		if($me_id == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['me_id' => $me_id]);
		}
	}

    public function get_layanan(){
        $query = $this->db->get('master_ekspedisi');
        return $query->result_array();
    }
}