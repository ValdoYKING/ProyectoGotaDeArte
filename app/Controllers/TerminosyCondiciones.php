<?php
namespace App\Controllers;

class TerminosyCondiciones extends BaseController
{
    public function terminos(): string
    {

        $dataMenu = [
            'userName' => 'userName',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('/TerminosYCondiciones/TerminosyCondiciones', $data);
    }

}