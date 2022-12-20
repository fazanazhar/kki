<?php 
namespace App\Models;
use CodeIgniter\Model;
class M_qc extends Model
{
    protected $table = 'master_data';
    protected $primaryKey = 'master_id';
     
    protected $allowedFields;
}