<?php

namespace App\Models;

use CodeIgniter\Model;

class usuariosModel extends Model{

    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';  //array
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'correo','contrasenia','salt','fk_rol'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_delete';

}