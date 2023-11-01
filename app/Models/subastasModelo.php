<?php 

namespace App\Models;

use CodeIgniter\Model;

class subastasModelo extends Model {

    protected $table      = 'obra_subastas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';  //object
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nombre','fotos','precioInicial','precioPagado','fk_obra','fk_usuario','fechaSubasta','fecha_creacion'];

    // Dates
    protected $useTimestamps = false;

}

?>