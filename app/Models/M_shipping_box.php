<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_shipping_box extends Model
{
    protected $table = 'final_shipping_dus';
    protected $primaryKey = 'SHP_No';
     
    protected $allowedFields = ['SHP_PIC', 'SHP_Datetime', 'SHP_KodeDus','SHP_QTY','SHP_Customer','SHP_Expedition'];
}