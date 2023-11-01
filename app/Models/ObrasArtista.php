<?php

namespace App\Models;

use CodeIgniter\Model;

class ObrasArtista extends Model{

    protected $table      = 'obras_artista';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';  //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nombre','foto','descripcion','medidas','precio','estatus_subasta','fk_usuario_artista','fecha_creacion'];

    // Dates
    

}