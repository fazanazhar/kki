<?php 
namespace App\Controllers;
use App\Models\Crud_masterdataeksp;
use CodeIgniter\Controller;
 
class Crud_masterexp extends BaseController
{
    // users list
    public function index(){
        $data = [
            'title' => 'Master Data Expedition'
        ];
         $crud_masterdatabox = new Crud_masterdataeksp();;
        $data['masterdataexps'] = $crud_masterdatabox->orderBy('me_id', 'DESC')->findAll();
        return view('crud_mastereksp/view', $data);
    }
 
    // user form
    public function create(){
         $data = [
            'title' => 'Master Data Expedition - Add Data'
        ];
        return view('crud_mastereksp/add', $data);
    }
  
    // insert data into database
    public function store() {
         $crud_masterdatabox = new Crud_masterdataeksp();;
        $data = [
            'me_kode' => $this->request->getVar('me_kode'),
            'me_nama'  => $this->request->getVar('me_nama'),
        ];
        $crud_masterdatabox->insert($data);
        return $this->response->redirect(site_url('masterdataexp'));
    }
 
    // // view single user
    public function singleUser($me_id = null){
         $crud_masterdatabox = new Crud_masterdataeksp();;
        $data['master_box_obj'] = $crud_masterdatabox->where('me_id', $me_id)->first();
        return view('crud_mastereksp/edit1', $data);
    }
 
    // update user data
    public function update(){
         $crud_masterdatabox = new Crud_masterdataeksp();;
        $me_id = $this->request->getVar('me_id');
        $data = [
            'me_kode' => $this->request->getVar('me_kode'),
            'me_nama'  => $this->request->getVar('me_nama'),
        ];
        $crud_masterdatabox->update($me_id, $data);
        return $this->response->redirect(site_url('masterdataexp'));
    }
  
    // delete user
    public function masterdelete($me_id = null){
         $crud_masterdatabox = new Crud_masterdataeksp();;
        $data['master_exp'] = $crud_masterdatabox->where('me_id', $me_id)->delete($me_id);
        return $this->response->redirect(site_url('/masterdataexp'));
    }    
}