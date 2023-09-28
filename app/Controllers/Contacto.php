<?php
namespace App\Controllers;

class Contacto extends BaseController
{
    public function index(): string{

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Iniciar sesión',
            'url' => base_url('/login'),
        ];
        $dataContenido = [
            'titulo' => 'Estas son las artes de subasta',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Contactos/contacto',$data);
    }
}
?>