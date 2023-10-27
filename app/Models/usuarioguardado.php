<?php 

namespace App\Models;

use CodeIgniter\Model;

class usuarioguardado extends Model {
// se define el nombre de la tabla y campo id 
    protected $table      = 'obras_usuario_guardado';
    protected $primaryKey = 'id';
// se define el autoincrement para cada registro
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';  //object
    protected $useSoftDeletes = true;
// se define cada uno de los campos que contiene la tabla
    protected $allowedFields = ['id', 'foto','precio','medidas','fk_obra', 'fk_usuario_guardado'];

    // Dates: si el valor el true se agregan fechas en automatico, 
    // en caso de ser false  no se inserta las fechas 
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_delete';


}

?>