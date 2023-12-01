<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuariocanasta; 
use App\Models\ObrasArtista;

class Canasta extends BaseController
{
    private $canastaModel;
    protected $helpers = ['form'];
    private $idUser;
    protected $userName;
    private $obrasArtista;

    public function __construct(){
        $this->canastaModel = new usuariocanasta();
        $this->obrasArtista = new ObrasArtista();
        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            $datosPersonalesModel = new \App\Models\datosPersonalesModel();
            $datosUsuario = $datosPersonalesModel->where('fk_usuario', $userNameSession)->first();
            if ($datosUsuario && property_exists($datosUsuario, 'nombre')) {
                $this->userName = $datosUsuario->nombre;
                $this->idUser = $datosUsuario->fk_usuario;
            }
        } else {
            $this->userName = 'Usuario Gota';
        }
    }
    public function index()
    {
        $date =  [
        'titulo' => 'Titulo', 
        'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
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

    public function canastaObra($id){  
        $dataGuardado = [
            'fk_obra' => $id,
            'fk_usuario_canasta' => $this->idUser,
        ];
        $this->canastaModel->insert($dataGuardado);
        return redirect()->to('/obras')->with('mensaje-canasta', 'La obra se agrego a tu canasta');
    }

    public function canastaObraGuardado($id){  
        $dataGuardado = [
            'fk_obra' => $id,
            'fk_usuario_canasta' => $this->idUser,
        ];
        $this->canastaModel->insert($dataGuardado);
        return redirect()->to('/obrasguardadas/'.$this->idUser)->with('mensaje-canasta-guaradado', 'La obra se agrego a tu canasta');
    }

    public function canastaUsuario($id) {
        $obrasGuardadas = $this->canastaModel->where('fk_usuario_canasta', $id)->findAll();
        $fkObras = array_column($obrasGuardadas, 'fk_obra');
        $obrasDetalles = $this->obrasArtista->whereIn('id', $fkObras)->findAll();
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Obras Guardadas',
            'obrasDetalles' => $obrasDetalles,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('usuarioCanasta/listaCanasta', $data);
    }

    public function eliminarObraCanasta($id){  
        $this->canastaModel->where('fk_obra', $id)->delete();
        return redirect()->to('/listacanasta/'.$this->idUser)->with('mensaje-eliminar', 'Obra eliminada del carrito exitosamente');
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