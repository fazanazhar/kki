<?php 
namespace App\Controllers;
use App\Models\Crud_masterdatasup;
use CodeIgniter\Controller;
 
class Crud_mastersup extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Master Data Supplier'
        ];
         $Crud_masterdatasup = new Crud_masterdatasup();;
        $data['masterdatasups'] = $Crud_masterdatasup->orderBy('ms_id', 'DESC')->findAll();
        return view('crud_mastersuplier/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Master Data Supplier - Add Data'
        ];
        return view('crud_mastersuplier/add', $data);
    }
  
    // insert data into database
    public function store() {
         $Crud_masterdatasup = new Crud_masterdatasup();;
        $data = [
            'ms_kode' => $this->request->getVar('ms_kode'),
            'ms_nama'  => $this->request->getVar('ms_nama'),
        ];
        $Crud_masterdatasup->insert($data);
        return $this->response->redirect(site_url('masterdatasup'));
    }
 
    // // view single user
    public function singleUser($ms_id = null){
         $Crud_masterdatasup = new Crud_masterdatasup();;
        $data['master_box_obj'] = $Crud_masterdatasup->where('ms_id', $ms_id)->first();
        return view('crud_mastersuplier/edit1', $data);
    }
 
    // update user data
    public function update(){
         $Crud_masterdatasup = new Crud_masterdatasup();;
        $ms_id = $this->request->getVar('ms_id');
        $data = [
            'ms_kode' => $this->request->getVar('ms_kode'),
            'ms_nama'  => $this->request->getVar('ms_nama'),
        ];
        $Crud_masterdatasup->update($ms_id, $data);
        return $this->response->redirect(site_url('masterdatasup'));
    }
  
    // delete user
    public function masterdelete($ms_id = null){
         $Crud_masterdatasup = new Crud_masterdatasup();;
        $data['master_sup'] = $Crud_masterdatasup->where('ms_id', $ms_id)->delete($ms_id);
        return $this->response->redirect(site_url('/masterdatasup'));
    }    
}