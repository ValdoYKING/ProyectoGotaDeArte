<?php 

namespace App\Models;

use CodeIgniter\Model;

class usuariocanasta extends Model {

    protected $table      = 'usuario_canasta';
    protected $primaryKey = 'id';
// se define el autoincrement para cada registro
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';  //object
    protected $useSoftDeletes = true;
// se define cada uno de los campos que contiene la tabla
    protected $allowedFields = ['id', 'precio','foto','medidas','fk_usuario_canasta', 'fk_obra'];

    // Dates
     // Dates: si el valor el true se agregan fechas en automatico, 
    // en caso de ser false  no se inserta las fechas 
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_delete';

}

?>