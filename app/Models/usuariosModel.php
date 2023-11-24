<?php

namespace App\Models;

use CodeIgniter\Model;

class usuariosModel extends Model{

    protected $table      = 'usuarios';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';  //array
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'correo','contrasenia','salt','fk_rol','estatus_user','fecha_creacion'];

    // Dates
    protected $useTimestamps = false;


}