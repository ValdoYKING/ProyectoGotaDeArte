<?php

namespace App\Models;

use CodeIgniter\Model;

class rolesModel extends Model{

    protected $table      = 'roles';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';  //array
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nombre'];

    // Dates
    protected $useTimestamps = false;


}