<?php 
namespace App\Controllers;
use App\Models\Crud_masterbarang;
use App\Models\M_dashboard;
use CodeIgniter\Controller;
 
class Crud_master extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Master Product'
        ];
        $crud_masterdata = new Crud_masterbarang();
        $data['masterdatas'] = $crud_masterdata->orderBy('mbr_id', 'DESC')->findAll();
        return view('crud_master/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Master Data - Tamabah Data'
        ];
        return view('crud_master/add', $data);
    }
  
    // insert data into database
    public function store() {
        $crud_masterdata = new Crud_masterbarang();
        $data = [
            'mbr_kode' => $this->request->getVar('mbr_kode'),
            'mbr_produk' => $this->request->getVar('mbr_produk'),
            'mbr_nama'  => $this->request->getVar('mbr_nama'),
            'D1' => '0',
            'D2' => '0',
            'D3' => '0',
            'D4' => '0',
            'D5' => '0',
            'D6' => '0',
            'D7' => '0',
            'D8' => '0',
            'D9' => '0',
            'D10' => '0',
            'D11' => '0',
            'D12' => '0',            
            'basecolor' => $this->request->getVar('warna'),
        ];

        $crud_masterdata->insert($data);
        return $this->response->redirect(site_url('masterdata'));
    }
 
    // // view single user
    public function singleUser($mbr_id = null){
        $crud_masterdata = new Crud_masterbarang();
        $data['master_barang_obj'] = $crud_masterdata->where('mbr_id', $mbr_id)->first();
        return view('crud_master/edit1', $data);
    }
 
    // update user data
    public function update(){
        $crud_masterdata = new Crud_masterbarang();
        $m_dashboard = new M_dashboard();
        $mbr_id = $this->request->getVar('mbr_id');
        $mbr_trgetup = $this->request->getVar('mbr_produk');
        $data1 = [
            'das_name'  => $this->request->getVar('mbr_produk'),
        ];
        $data = [
            'mbr_kode' => $this->request->getVar('mbr_kode'),
            'mbr_produk' => $this->request->getVar('mbr_produk'),
            'mbr_nama'  => $this->request->getVar('mbr_nama'),
            'basecolor'  => $this->request->getVar('warnabaru'),
        ];
        // $this->db = db_connect();
        // $builderp = $this->db->table("data_dashboard");
        // $builderp->where('das_name', );
        // $builderp->groupBy('MONTH(`P_Datetime`)');
        // $queryp = $builderp->get();
        // foreach ($queryp->getResult() as $rowp) {};
        
        $m_dashboard->update($mbr_trgetup, $data1);
        $crud_masterdata->update($mbr_id, $data);
        return $this->response->redirect(site_url('masterdata'));
    }
  
    // delete user
    public function masterdelete($mbr_id = null){
        $crud_masterdata = new Crud_masterbarang();
        $data['master_barang'] = $crud_masterdata->where('mbr_id', $mbr_id)->delete($mbr_id);
        return $this->response->redirect(site_url('/masterdata'));
    }    
}