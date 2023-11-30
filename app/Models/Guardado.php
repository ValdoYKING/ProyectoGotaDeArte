<?php 

namespace App\Models;

use CodeIgniter\Model;

class Guardado extends Model {

    protected $table      = 'obra_usuario_guardado';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';  //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id','foto','precio','fk_obra', 'fecha_creacion', 'fecha_usuario_guardado', 'fecha_modifica', 'fehca_delete'];

    // Dates
    protected $useTimestamps = false;

}

?>