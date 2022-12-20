<?php 
namespace App\Controllers;
use App\Models\Crud_packing;
use App\Models\Crud_packingreject;
use CodeIgniter\Controller;
 
class Barcode_packing extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Packing Panel'
        ];

        $m_repair = new M_repair();
        $crud_packing = new crud_packing();
        $crud_packingreject = new crud_packingreject();
        $data['count_repair'] = $m_repair->countAllResults();
        $result = $crud_packing->select('sum(packing_qty) as sumpacking_qty')->first();
        $resultreject = $crud_packingreject->select('sum(packing_qty) as sumpacking_qty')->first();
        $data['sumdata'] = $result['sumpacking_qty'];
        $data['sumdatareject'] = $resultreject['sumpacking_qty'];

        return view('packing/view', $data);
    }
}