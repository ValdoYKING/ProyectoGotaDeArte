<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ContactosModel;

class UsuarioGuardado extends BaseController
{
    public function index()
    {
        // Cargar el modelo
        $contactosModel = new ContactosModel();

        // Obtener todos los registros de la tabla 'obras_usuario_guardado'
        $contactos = $contactosModel->findAll();

        // Pasar los datos a la vista
        return view('contactos/index', ['contactos' => $contactos]);
    }

    public function create()
    {
        // Código para crear un nuevo registro
    }

    public function edit($id)
    {
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