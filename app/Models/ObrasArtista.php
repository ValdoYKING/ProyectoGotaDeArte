<?php

namespace App\Models;

use CodeIgniter\Model;

class ObrasArtista extends Model{

    protected $table      = 'obras_artista';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';  //object
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'nombre','descripcion','medidas','estatus_subasta','fk_usuario_artista','foto'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_delete';

}