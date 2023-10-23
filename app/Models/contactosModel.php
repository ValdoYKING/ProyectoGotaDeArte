<?php 

namespace App\Models;

use CodeIgniter\Model;

class contactosModel extends Model {

    protected $table      = 'contactos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';  //object
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'nombre_contacto','correo_contacto','asunto_contacto','fk_rol'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';


}

?>