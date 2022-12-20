<?php 
namespace App\Models;
use CodeIgniter\Model;
class Crud_packing extends Model
{
    protected $table = 'data_packing';
    protected $primaryKey = 'K_No';
     
    protected $allowedFields = ['K_PIC', 'K_Datetime', 'K_KodeDus', 'K_Kodebatch', 'K_NamaProduk', 'K_QTY'];

    protected $db;

	public function getUserDetails($postData=array()){
 
		$response = array();
	 
		if(isset($postData['K_KodeDus']) ){
	 
		  // Select record
		  $this->db->select('*');
		  $this->db->where('K_KodeDus', $postData['K_KodeDus']);
		  $records = $this->db->get('data_packing');
		  $response = $records->result_array();
	 
		}
	 
		return $response;
	  }

	public function update_data($update_data, $id_temp){
		$update_query = $this->db->table($this->table)->update($update_data, array('K_No' => $id_temp)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data($get_id){
		$delete_query = $this->db->table($this->table)->delete(array('K_No' => $get_id));
		return $delete_query;
	}
	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('K_QTY' => "0"));
		return $delete_query;
	}
	
	
}