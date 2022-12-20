<?php 
namespace App\Models;
use CodeIgniter\Model;
class Crud_masterdatapelanggan extends Model
{
    protected $table = 'master_pelanggan';
    protected $primaryKey = 'mp_id';
     
    protected $allowedFields = ['mp_nama', 'mp_kategori'];

    public function get_data($mp_id = false){
		if($mp_id == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['mp_id' => $mp_id]);
		}
	}
}