<?php 
namespace App\Models;
use CodeIgniter\Model;
class Crud_masterbarang extends Model
{
    protected $table = 'master_barang';
    protected $primaryKey = 'mbr_id';
     
    protected $allowedFields = ['mbr_kode','mbr_produk', 'mbr_nama','D1', 'D2','D3','D4','D5','D6','D7','D8','D9','D10','D11','D12','basecolor'];
    
    public function get_data($mbr_id = false){
		if($mbr_id == false){
			return $this->findAll();
		} else{
			return $this->getWhere(['mbr_id' => $mbr_id]);
		}
	}
}