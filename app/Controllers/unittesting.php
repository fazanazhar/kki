<?php 
namespace App\Controllers;
use App\Models\Crud_masterbarang;
use CodeIgniter\Controller;
 
class Unittesting extends BaseController
{
public function testunit(){
    
        $crud_masterbarang = new Crud_masterbarang();
        $data = [
            'title' => 'test'
        ];

     
        $hP_KodeKontainer =  
        $this->request->getVar('P_KodeKontainer')
        ;
        $hP_KodeBatch  =  
        $this->request->getVar('P_KodeBatch')
        ;
        $hP_QC_QTY = 
        $this->request->getVar('P_QTY')
        ;

        $this->db = db_connect();
        $builder = $this->db->table('data_produksi_temp');
        // $builder->select('P_QTY');
        $builder->where('P_KodeKontainer ', $hP_KodeKontainer);
        $builder->where('P_KodeBatch ', $hP_KodeBatch);
        $query = $builder->get();
        $hasil = $query->getResult();
      
        foreach($query->getResult() as $row){
            	$hasil = $row->P_QTY;}

        // if ($hasil == $hP_QC_QTY){
        //     foreach($query->getResult() as $row){
        //         $hasil = $row->P_No;}
        //     echo $hasil;
        //     $data1 = [
        //         'P_Status' => 'Aprrove',
        //         'P_Report'  => 'Confirmed',
        //         'P_QC_QTY'  => $hP_QC_QTY,
        //     ];
        //     $data2 = [
        //         'P_Status' => 'Aprrove',
        //         'P_Report'  => 'Confirmed',
        //     ];
        //     $m_dataproduksitemp->update($hasil, $data1);
        //     $m_dataproduksi->update($hasil, $data2);
        //     session()->setFlashdata('flashdata', $hP_KodeBatch);
        //     return $this->response->redirect(site_url('qc_produk_v'));
        //     }
        //     else {
        //         echo "data tidak sesuai";
        //     };
    }
}