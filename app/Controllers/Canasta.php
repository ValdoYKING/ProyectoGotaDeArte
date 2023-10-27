<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuariocanasta; 

class Canasta extends BaseController
{
    private $canastaModel;
    protected $helpers = ['form'];

    public function __construct(){
        $this->canastaModel = new usuariocanasta();
    }
    public function index()
    {
        $date =  [
        'titulo' => 'Titulo', 
        'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        // Cargar el modelo
        $contactosModel = new usuariocanasta();

        // Obtener todos los registros de la tabla 'obras_canasta'
        $contactos = $contactosModel->findAll();// obtienes los todos los registros de la tabla correspondiente al modelo contactosModel, 
        //se obtiene todo

        // Pasar los datos a la vista
        return view('UsuarioCanasta/CanastaView',$date, ['contactos_view' => $contactos]); //buscara en view, 
        // ['contactos' => $contactos]= lado izquierdo: variable en la vista, lado derecho: varible en controlador
    }                                             

    public function create()
    {
        // Código para crear un nuevo registro
    }

    public function edit()

    {
        //print_r($_POST);
        $data = [
            'precio' => $_POST['precio'],
            'medidad' => $_POST['medidas'],
            'fk_obra' => 2,
         
            
        ];
    
        
        $this->canastaModel->insert($data);
        return redirect()->to('/canasta_prueba');
        // Código para editar un registro específico
    }

    public function update($id)
    {
        // Código para actualizar un registro específico
    }

    public function delete($id)
    {
        // Código para eliminar un registro específico
        
    }
}