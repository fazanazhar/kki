<?php 
namespace App\Models;
use CodeIgniter\Model;
class T_praqc extends Model
{
    protected $table = 'data_produksi_temp';
    protected $primaryKey = 'P_No';
     
    protected $allowedFields = ['P_QC_QTY', 'P_Report', 'P_Status'];
}