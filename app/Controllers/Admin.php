<?php

namespace App\Controllers;
use App\Models\ObrasArtista;
use App\Models\subastasModelo;
use App\Models\contactosModel;
use App\Models\usuariosModel;
use App\Models\datosPersonalesmodel;


class Admin extends BaseController{
    private $obrasArtista;
    private $subastas;
    private $contactosModel;
    private $usuariomodel;
    private $personamodel;

    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
        $this->subastas = new subastasModelo();
        $this->contactosModel = new ContactosModel();
        $this->usuariomodel = new UsuariosModel();
        $this->personamodel = new datosPersonalesmodel();
    }

    public function listaUsuarios(): string{

        $results = $this->usuariomodel->where('fk_rol',1)->findAll();
        $dataMenu = [
            'userName' => 'Administrador',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de usuarios',
            'usuarios' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaUsuarios',$data);
    }

    public function eliminarusario($id){
        $this->usuariomodel->where('')->find($id);
        $this->usuariomodel->delete($id);
        
        return redirect()->to('/usuariosLista');   

    }

    public function listaArtistas(): string{
        $results = $this->usuariomodel->where('fk_rol',2)->findAll();

        $dataMenu = [
            'userName' => 'Administrador',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de artistas',
            'artistas' => $results
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaArtistas',$data);
    }

    public function listaPublicaciones(): string{

        $results = $this->obrasArtista->findAll();

        $dataMenu = [
            'userName' => 'Administrador',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicacion' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaPublicaciones',$data);
    }

    public function mostrarObra($id){

        $results = $this->obrasArtista->find($id);

        $Menu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/'),
        ];
        $Contenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar publicacion',
            'publicacion' => $results,
        ];
        $PiePagina = [
            'fecha' => date('Y'),
        ];

        $data = $Menu + $Contenido + $PiePagina;
        return view('Administrador/actualizarObra',$data);

    }

    public function actualizarPublicacion($id){

     
        $data = [
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'medidas'=> $_POST['medidas'],
            'precio' => $_POST['precio'],
            'estatus_subasta' => $_POST['status']
            
        ];
    
        
        $this->obrasArtista->update($id, $data);

    
        return redirect()->to('/publicacionesLista');   

    }

    public function eliminarPublicacion($id){

        $this->obrasArtista->delete($id);

        return redirect()->to('/publicacionesLista');   

    }

    public function listaSubastas(): string{

        $results = $this->subastas->findAll();


        $dataMenu = [
            'userName' => 'Administrador',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de subastas',
            'subasta' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaSubastas',$data);
    }

    public function listaContactos(): string{

        $results = $this->contactosModel->findAll();


        $dataMenu = [
            'userName' => 'Administrador',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de Contactos',
            'contactos' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaContactos',$data);
    }

}