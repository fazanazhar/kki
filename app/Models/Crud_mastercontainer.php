<?php 
namespace App\Models;
use CodeIgniter\Model;
class Crud_mastercontainer extends Model
{
    protected $table = 'master_kontainer';
    protected $primaryKey = 'mk_id';
     
    protected $allowedFields = ['mk_kode','mk_QTY', 'mk_kategori','mk_maxqty','mk_keterangan'];
}