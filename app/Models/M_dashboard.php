<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_dashboard extends Model
{
    protected $table = 'data_dashboard';
    protected $primaryKey = 'das_id';
     
    protected $allowedFields = ['das_name','1', '2','3','4','5','6','7','8','9','10','11','12'];
}