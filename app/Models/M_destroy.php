<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_destroy extends Model
{
    protected $table = 'final_destroy';
    protected $primaryKey = 'D_No';
     
    protected $allowedFields = ['D_PIC', 'D_Datetime', 'D_KodeBatch','D_NamaProduk','D_QTY'];

    public function update_data($update_data, $id_temp){
		$update_query = $this->db->table($this->table)->update($update_data, array('D_No' => $id_temp)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data($get_id){
		$delete_query = $this->db->table($this->table)->delete(array('D_No' => $get_id));
		return $delete_query;
	}
	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('D_QTY' => "0"));
		return $delete_query;
	}
}