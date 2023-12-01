<?php
namespace App\Controllers;
use App\Models\subastasModelo;

class Subasta extends BaseController
{
    private $obraSubasta;
    protected $userName;
    protected $idUser;
    public function __construct(){
        $this->obraSubasta = new subastasModelo();
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

    public function index(): string{

        $dataMenu = [
            'userName' => 'Pepito',
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/index',$data);
    }

    public function subastas(): string{

        $subasta = new subastasModelo();
        $results = $subasta->findAll();

        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
            'canastaUrl' => base_url('/listacanasta/'.$this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/'.$this->idUser),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Subastas',
            'subastas' => $results            
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/subastas',$data);
    }

    public function insertSubasta(){
        $data = [
            'nombre_subasta' => 'maria',
            'fotos_subasta' => 'Cerrar sesión',
            'precio_inicial' => base_url('/'),
            'precio_pagado' => base_url('/canasta'),
            'fk_obra' => base_url('/guardados'),
            'fk_usuario' => '',
            'fecha_subasta' => ''
        ];

        $this->obraSubasta->insert($data);
        $this->obraSubasta->getInsertID();
        
        return redirect()->to('/inicio');
    }

    public function UpdateSubasta(){
        $data = [
            'nombre_subasta' => 'maria',
            'fotos_subasta' => 'Cerrar sesión',
            'precio_inicial' => base_url('/'),
            'precio_pagado' => base_url('/canasta'),
            'fk_obra' => base_url('/guardados'),
            'fk_usuario' => '',
            'fecha_subasta' => ''
        ];

        $this->obraSubasta->insert($data);
        $this->obraSubasta->getInsertID();
        
        return redirect()->to('/inicio');
    }

    public function deleteSubasta(){
        $data = [
            'nombre_subasta' => 'maria',
            'fotos_subasta' => 'Cerrar sesión',
            'precio_inicial' => base_url('/'),
            'precio_pagado' => base_url('/canasta'),
            'fk_obra' => base_url('/guardados'),
            'fk_usuario' => '',
            'fecha_subasta' => ''
        ];

        $this->obraSubasta->insert($data);
        $this->obraSubasta->getInsertID();
        
        return redirect()->to('/inicio');
    }

}
?>