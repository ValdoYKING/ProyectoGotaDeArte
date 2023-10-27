<?php 

namespace App\Models;

use CodeIgniter\Model;

class subastasModelo extends Model {

    protected $table      = 'obra_subastas';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';  //object
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'nombre','fotos','precioInicial','precioPagado','fk_obra','fk_usuario','fechaSubasta'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_modifica';
    protected $deletedField  = 'fecha_delete';



}

?>