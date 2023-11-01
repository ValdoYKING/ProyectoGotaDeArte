<?php 

namespace App\Models;

use CodeIgniter\Model;

class contactosModel extends Model {

    protected $table      = 'contactos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'object';  //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nombre_contacto','correo_contacto','asunto_contacto','comentario_contacto','fk_rol','fecha_creacion'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';

}

?>