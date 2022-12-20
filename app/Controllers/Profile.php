<?php 
namespace App\Controllers;
 
class Profile extends BaseController
{
    public function index(){
        $data = [
            'title' => 'My Profile'
        ];
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users->findAll();
        return view('myprofile/view', $data);
    }
}