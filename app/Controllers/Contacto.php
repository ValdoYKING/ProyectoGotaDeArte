<?php
namespace App\Controllers;

class Contacto extends BaseController
{
    public function index(): string{

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Iniciar sesión',
            'url' => base_url('/'),
            'canastaUrl' => base_url('/cantasta'),
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
}
?>