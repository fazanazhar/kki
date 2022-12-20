<?php

namespace App\Controllers;
use App\Models\Project_crud;

class Project extends BaseController
{
    protected $project_crud;
 
    function __construct()
    {
        $this->project_crud = new Project_crud();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Project'
        ];

        $data['projects'] = $this->project_crud->findAll();

        return view('main/project', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Project Detail';
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();
        $data['user'] = $query->getRow();
        // if (empty($data['user'])){
        //     return redirect()->to('/admin');
        // }
        return view('main/project', $data);
    } 

    public function create()
    {
        $this->contact->insert([
            'project_name' => $this->request->getPost('project_name'),
        ]);

		return redirect('project')->with('success', 'Data Added Successfully');	
    }
}
