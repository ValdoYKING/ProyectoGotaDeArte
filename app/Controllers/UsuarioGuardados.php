<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuarioguardado;
use App\Models\ContactosModel;
use App\Models\ObrasArtista;

class UsuarioGuardados extends BaseController
{
    private $obrasArtista;
    private $usuarioGuardado;
    protected $userNameSession;
    protected $userName;
    private $idUser;
    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
        $this->usuarioGuardado = new usuarioguardado();
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
        // Cargar el modelo
        $contactosModel = new ContactosModel();

        // Obtener todos los registros de la tabla 'obras_usuario_guardado'
        $contactos = $contactosModel->findAll();

        // Pasar los datos a la vista
        return view('contactos/index', ['contactos' => $contactos]);
    }

    public function guardarObra($id){  
        $dataGuardado = [
            'fk_obra' => $id,
            'fk_usuario_guardado' => $this->idUser,
        ];
        $this->usuarioGuardado->insert($dataGuardado);
        return redirect()->to('/obras')->with('mensaje-guardado', 'Obra guardada exitosamente');
    }

    public function guardadoUsuario2($id){  
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
            'canastaUrl' => base_url('/listacanasta/'.$this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/'.$this->idUser),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Publicaciones',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('usuarioGuardado/listaGuardado',$data);
    }

    public function guardadoUsuario($id) {
        $obrasGuardadas = $this->usuarioGuardado->where('fk_usuario_guardado', $id)->findAll();
        $fkObras = array_column($obrasGuardadas, 'fk_obra');
        $obrasDetalles = $this->obrasArtista->whereIn('id', $fkObras)->findAll();
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
            'canastaUrl' => base_url('/listacanasta/'.$this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/'.$this->idUser),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Obras Guardadas',
            'obrasDetalles' => $obrasDetalles,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('usuarioGuardado/listaGuardado', $data);
    }
    

    public function eliminarObraGuardado($id){  
        $this->usuarioGuardado->where('fk_obra', $id)->delete();
        return redirect()->to('/obrasguardadas/'.$this->idUser)->with('mensaje-eliminar', 'Obra eliminada exitosamente');
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