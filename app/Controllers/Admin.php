<?php

namespace App\Controllers;
use App\Models\ObrasArtista;
use App\Models\subastasModelo;
use App\Models\contactosModel;

class Admin extends BaseController{
    private $obrasArtista;
    private $subastas;
    private $contactosModel;


    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
        $this->subastas = new subastasModelo();
        $this->contactosModel = new ContactosModel();
    }
    public function inicioAdmin(): string{
        
        $results = $this->obrasArtista->findAll();
        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
            'publicacion' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/inicio',$data);
    }

    public function listaUsuarios(): string{
        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de usuarios',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaUsuarios',$data);
    }

    public function listaArtistas(): string{
        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de artistas',
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
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
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
            'urlSalir' => base_url('/salir'),
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
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
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
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
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