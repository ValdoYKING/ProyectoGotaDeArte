<?php

namespace App\Controllers;
use App\Models\ObrasArtista;
use App\Models\subastasModelo;
use App\Models\contactosModel;

class Admin extends BaseController{
    private $obrasArtista;
    private $subastas;
    private $contactosModel;
    protected $userName;


    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
        $this->subastas = new subastasModelo();
        $this->contactosModel = new ContactosModel();
        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            $datosPersonalesModel = new \App\Models\datosPersonalesModel();
            $datosUsuario = $datosPersonalesModel->where('fk_usuario', $userNameSession)->first();
            if ($datosUsuario && property_exists($datosUsuario, 'nombre')) {
                $this->userName = $datosUsuario->nombre;
            }
        } else {
            $this->userName = 'Usuario Gota';
        }
    }
    public function inicioAdmin(): string{
        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->findAll();
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salirAdmin'),
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

        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->findAll();

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

    public function listaSubastas(): string{

        $subastasArte = new subastasModelo();
        $results = $subastasArte->findAll();


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

        $contactosModel = new contactosModel();
        $results = $contactosModel->findAll();


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