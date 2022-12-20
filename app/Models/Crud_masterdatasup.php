<?php 
namespace App\Models;
use CodeIgniter\Model;
class Crud_masterdatasup extends Model
{
    protected $table = 'master_supplier';
    protected $primaryKey = 'ms_id';
     
    protected $allowedFields = ['ms_kode', 'ms_nama'];

    public function get_data($ms_id = false){
		if($ms_id == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['ms_id' => $ms_id]);
		}
	}

    public function get_layanan(){
        $query = $this->db->get('master_sup');
        return $query->result_array();
    }
}