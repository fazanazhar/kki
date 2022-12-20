<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_retain extends Model
{
    protected $table = 'final_retain';
    protected $primaryKey = 'RTN_No';
     
    protected $allowedFields = ['RTN_PIC', 'RTN_Datetime', 'RTN_KodeKontainer','RTN_KodeBatch','RTN_NamaProduk','RTN_QTY'];

    
	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('RTN_QTY' => "0"));
		return $delete_query;
	}
}