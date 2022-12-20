<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_rejectholding extends Model
{
    protected $table = 'data_rejectholding';
    protected $primaryKey = 'RJT_No';
    protected $allowedFields = ['RJT_PIC', 'RJT_Datetime', 'P2_KodeKontainer', 'RJT_KodeBatch', 'RJT_NamaProduk','RJT_QTY'];

    public function update_data($update_data, $id_temp){
		$update_query = $this->db->table($this->table)->update($update_data, array('RJT_No' => $id_temp)); //ubah ID sesuai Tabel
		return $update_query;
	}

 	public function delete_data($get_id){
		$delete_query = $this->db->table($this->table)->delete(array('Q2_No' => $get_id));
		return $delete_query;
	}
	public function delete_data_nol(){
		$delete_query = $this->db->table($this->table)->delete(array('RJT_QTY' => "0"));
		return $delete_query;
	}
}