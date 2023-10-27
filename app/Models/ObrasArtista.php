<?php

namespace App\Models;

use CodeIgniter\Model;

class ObrasArtista extends Model{

    protected $table      = 'obras_artista';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';  //object
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'nombre','foto','descripcion','medidas','precio','estatus_subasta','fk_usuario_artista'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_delete';

}