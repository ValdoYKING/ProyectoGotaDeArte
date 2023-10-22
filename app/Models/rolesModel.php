<?php

namespace App\Models;

use CodeIgniter\Model;

class rolesModel extends Model{

    protected $table      = 'roles';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';  //array
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'nombre'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_delete';

}