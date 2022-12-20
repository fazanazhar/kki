<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_marketplace extends Model
{
    protected $table = 'final_marketplace';
    protected $primaryKey = 'M_No';
     
    protected $allowedFields = ['M_PIC', 'M_Datetime', 'M_Kontainer', 'M_KodeBatch','M_NamaProduk','M_QTY'];
    
    public function update_data($update_data_mp, $id_temp_mp){
		$update_query = $this->db->table($this->table)->update($update_data_mp, array('M_No' => $id_temp_mp)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('M_QTY' => "0"));
		return $delete_query;
	}
}