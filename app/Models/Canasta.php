<?php 

namespace App\Models;

use CodeIgniter\Model;

class Canasta extends Model {

    protected $table      = 'usuario_canasta';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';  //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'precio','foto', 'medidas', 'fk_usuario_canasta','fk_obra', 'fecha_creacion', 'fecha_modifica', 'fecha_delate'];

    // Dates
    protected $useTimestamps = false;

}

?>