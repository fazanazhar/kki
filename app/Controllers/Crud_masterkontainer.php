<?php 
namespace App\Controllers;
use App\Models\Crud_mastercontainer;
use CodeIgniter\Controller;
 
class Crud_masterkontainer extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Master Data Container'
        ];
         $crud_masterdatakontainer = new Crud_mastercontainer();;
        $data['masterdatakontainers'] = $crud_masterdatakontainer->orderBy('mk_id', 'DESC')->findAll();
        return view('crud_masterkontainer/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Master Data kontainer - Add Data'
        ];
        return view('crud_masterkontainer/add', $data);
    }
  
    // insert data into database
    public function store() {
         $crud_masterdatakontainer = new Crud_mastercontainer();;
        $data = [
            'mk_kode' => $this->request->getVar('mk_kode'),
            'mk_keterangan' => $this->request->getVar('mk_keterangan'),        
            'mk_maxqty'  => $this->request->getVar('mk_maxqty'),
        ];
        $crud_masterdatakontainer->insert($data);
        return $this->response->redirect(site_url('masterdatakontainer'));
    }
 
    // // view single user
    public function singleUser($mk_id = null){
         $crud_masterdatakontainer = new Crud_mastercontainer();;
        $data['master_kontainer_obj'] = $crud_masterdatakontainer->where('mk_id', $mk_id)->first();
        return view('crud_masterkontainer/edit1', $data);
    }
 
    // update user data
    public function update(){
         $crud_masterdatakontainer = new Crud_mastercontainer();;
        $mk_id = $this->request->getVar('mk_id');
        $data = [
            'mk_kode' => $this->request->getVar('mk_kode'),        
            'mk_keterangan' => $this->request->getVar('mk_keterangan'),        
            'mk_maxqty'  => $this->request->getVar('mk_maxqty'),
        ];
        $crud_masterdatakontainer->update($mk_id, $data);
        return $this->response->redirect(site_url('masterdatakontainer'));
    }
  
    // delete user
    public function masterdelete($mk_id = null){
         $crud_masterdatakontainer = new Crud_mastercontainer();;
        $data['master_kontainer'] = $crud_masterdatakontainer->where('mk_id', $mk_id)->delete($mk_id);
        return $this->response->redirect(site_url('/masterdatakontainer'));
    }    
}