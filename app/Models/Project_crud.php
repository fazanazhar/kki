<?php

namespace App\Models;
use CodeIgniter\Model;

class Project_crud extends Model
{
    protected $table                = 'project_data';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $allowedFields        = ['project_name'];
}