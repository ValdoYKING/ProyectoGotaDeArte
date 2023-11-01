<?php

namespace App\Models;

use CodeIgniter\Model;

class datosPersonalesModel extends Model{

    protected $table      = 'datos_personales';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';  //array
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nombre','a_paterno','a_materno','fecha_nacimiento','edad','descripcion','foto','fk_usuario','fk_pago','fecha_creacion'];

    // Dates
    protected $useTimestamps = false;

}