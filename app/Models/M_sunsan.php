<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_sunsan extends Model
{
    protected $table = 'final_sunsan';
    protected $primaryKey = 'S_No';
     
    protected $allowedFields = ['S_PIC', 'S_Datetime',  'S_Kontainer','S_KodeBatch','S_NamaProduk','S_QTY'];

    public function update_data($update_data_sunsan, $id_temp_sunsan){
		$update_query = $this->db->table($this->table)->update($update_data_sunsan, array('S_No' => $id_temp_sunsan)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('S_QTY' => "0"));
		return $delete_query;
	}
}