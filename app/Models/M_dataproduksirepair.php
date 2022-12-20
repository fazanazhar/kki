<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_dataproduksirepair extends Model
{
    protected $table = 'data_produksi_repair';
    protected $primaryKey = 'P_No';
    // protected $useTimestamps = true;     
    protected $allowedFields = ['P_No','P_PIC', 'P_Datetime','P_KodeBatch','P_NamaProduk','P_QTY','P_Status','P_Report'];
    // protected $allowedFields = ['No', 'Batch','Kode_Produk','Holding_FG_QTY'];

    
    public function update_data($update_data, $id_temp){
		$update_query = $this->db->table($this->table)->update($update_data, array('P_No' => $id_temp)); //ubah ID sesuai Tabel
		return $update_query;
    }
}