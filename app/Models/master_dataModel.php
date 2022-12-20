<?php 
namespace App\Models;
use CodeIgniter\Model;
class master_dataModel extends Model
{
    protected $table = 'master_data';
    protected $primaryKey = 'No';
    protected $useTimestamps = true;     
    protected $allowedFields = ['Tanggal_Holding','No', 'Batch','Kode_Produk','Holding_FG_QTY','Tanggal_QC','QC_Sunsan_QTY','Packing_Sunsan_QTY','RTG_Sunsan_QTY','QC_Repack_QTY','Packing_Repack_QTY','RTG_Repack_QTY','QC_Discmp_QTY','Packing_Discmp_QTY','RTG_Discmp_QTY'];
    // protected $allowedFields = ['No', 'Batch','Kode_Produk','Holding_FG_QTY'];
}