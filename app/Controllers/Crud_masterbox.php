<?php 
namespace App\Controllers;
use App\Models\Crud_masterdatabox;
use CodeIgniter\Controller;
 
class Crud_masterbox extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Master Data Box'
        ];
         $crud_masterdatabox = new Crud_masterdatabox();;
        $data['masterdataboxs'] = $crud_masterdatabox->orderBy('mb_id', 'DESC')->findAll();
        return view('crud_masterbox/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Master Data Box - Add Data'
        ];
        return view('crud_masterbox/add', $data);
    }
  
    // insert data into database
    public function store() {
         $crud_masterdatabox = new Crud_masterdatabox();;
        $data = [
            'mb_kode' => $this->request->getVar('mb_kode'),
            'mb_nama'  => $this->request->getVar('mb_nama'),
        ];
        $crud_masterdatabox->insert($data);
        return $this->response->redirect(site_url('masterdatabox'));
    }
 
    // // view single user
    public function singleUser($mb_id = null){
         $crud_masterdatabox = new Crud_masterdatabox();;
        $data['master_box_obj'] = $crud_masterdatabox->where('mb_id', $mb_id)->first();
        return view('crud_masterbox/edit1', $data);
    }
 
    // update user data
    public function update(){
         $crud_masterdatabox = new Crud_masterdatabox();;
        $mb_id = $this->request->getVar('mb_id');
        $data = [
            'mb_kode' => $this->request->getVar('mb_kode'),
            'mb_nama'  => $this->request->getVar('mb_nama'),
        ];
        $crud_masterdatabox->update($mb_id, $data);
        return $this->response->redirect(site_url('masterdatabox'));
    }
  
    // delete user
    public function masterdelete($mb_id = null){
         $crud_masterdatabox = new Crud_masterdatabox();;
        $data['master_box'] = $crud_masterdatabox->where('mb_id', $mb_id)->delete($mb_id);
        return $this->response->redirect(site_url('/masterdatabox'));
    }    
}