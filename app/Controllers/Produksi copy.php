<?php 
namespace App\Controllers;
use App\Models\M_dataproduksi;
use App\Models\M_dataproduksitemp;
use App\Models\Crud_masterbarang;
use App\Models\Crud_mastercontainer;
use App\Models\Crud_masterdatasup;
use CodeIgniter\Controller;
 
class Produksi extends BaseController
{
    public function __construct(){
        $session = \Config\Services::session();
    }
    public function index(){
        $data = [
            'title' => 'Panel Production'
        ];
        
        $M_dataproduksitemp = new M_dataproduksitemp();
        $Crud_masterbarang = new Crud_masterbarang();
        $crud_mastercontainer = new Crud_mastercontainer();
        $master = $Crud_masterbarang->findAll();
        $data['produksidatatemps'] = $M_dataproduksitemp->orderBy('P_No', 'DESC')->findAll();
        $data['masterbarang'] = $Crud_masterbarang->orderBy('mbr_id', 'DESC')->findAll();       
        $data['mastercontainer'] = $crud_mastercontainer->findAll();       
        return view('pd/view', $data);
    }

    public function barcode(){
        $data = [
            'title' => 'Generate Barcode'
        ];        
        $bar = new Crud_masterbarang();
        $data['masterbarang'] = $bar->get_data();

        $sup = new Crud_masterdatasup();
        $data['mastersupplier'] = $sup->get_data();

        return view('pd/barcode', $data);
    }
    
       public function store() {
           $M_dataproduksi = new M_dataproduksi();
           $M_dataproduksitemp = new M_dataproduksitemp();
           $crud_mastercontainer = new Crud_mastercontainer();
           $data = [
            'P_PIC'  => $this->request->getVar('P_PIC'),
            'P_Datetime' => $this->request->getVar('P_Datetime'),
            'P_KodeKontainer' => $this->request->getVar('P_KodeKontainer'),
            'P_KodeBatch'  => $this->request->getVar('P_KodeBatch'),
            'P_NamaProduk'  => $this->request->getVar('P_NamaProduk'),            
            'P_QTY'  => $this->request->getVar('P_QTY'),            
            'P_Status'  => $this->request->getVar('P_Status'),            
            'P_Report'  => $this->request->getVar('P_Report'),
           ];
           $dataproduksi = [
            'P_PIC'  => $this->request->getVar('P_PIC'),
            'P_Datetime'  => $this->request->getVar('P_Datetime'),
            'P_KodeBatch'  => $this->request->getVar('P_KodeBatch'),            
            'P_NamaProduk'  => $this->request->getVar('P_NamaProduk'),            
            'P_QTY'  => $this->request->getVar('P_QTY'),            
            'P_Status'  => $this->request->getVar('P_Status'),            
            'P_Report'  => $this->request->getVar('P_Report'),
            ];

        //     $conn = $this->request->getVar('P_KodeKontainer');
        //    $kon = [
        //     'mk_QTY'  => $this->request->getVar('P_QTY'),
        //     ];

        $suc = $this->request->getVar('P_KodeBatch');
            // $crud_mastercontainer->update($conn, $kon);
           $M_dataproduksitemp->insert($data);
           $M_dataproduksi->insert($dataproduksi);
            session()->setFlashdata('flashdata', $suc);
           return $this->response->redirect(site_url('pd'));
       }

}