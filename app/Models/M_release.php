<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_release extends Model
{
    protected $table = 'final_release';
    protected $primaryKey = 'R_No';
     
    protected $allowedFields = ['R_PIC', 'R_Datetime', 'R_Kontainer', 'R_KodeBatch','R_NamaProduk','R_QTY'];

    
    public function update_data($update_data_release, $id_temp_release){
		$update_query = $this->db->table($this->table)->update($update_data_release, array('R_No' => $id_temp_release)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('R_QTY' => "0"));
		return $delete_query;
	}
}