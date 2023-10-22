<?php
namespace App\Controllers;

class Contacto extends BaseController
{
    public function index(): string{

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Iniciar sesión',
            'url' => base_url('/'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Contacto',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Contactos/contacto',$data);
    }

    public function insertar() {
    $data = [
        'id'=>$_POST('nombre'),
        'nombre'=>$_POST('email'),
        ''=>$_POST(''),
        
    ];
        return view('Contactos/contacto');
    }
    
}
?>