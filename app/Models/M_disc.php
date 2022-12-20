<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_disc extends Model
{
    protected $table = 'final_discmp';
    protected $primaryKey = 'DMP_No';
     
    protected $allowedFields = ['DMP_PIC', 'DMP_Datetime', 'DMP_Kontainer','DMP_KodeBatch','DMP_NamaProduk','DMP_QTY'];

    
    public function update_data($update_data_mp, $id_temp_mp){
		$update_query = $this->db->table($this->table)->update($update_data_mp, array('DMP_No' => $id_temp_mp)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('DMP_QTY' => "0"));
		return $delete_query;
	}
}