<?php

namespace App\Controllers;

class Principal extends BaseController
{
    public function index(): string{
        $dataMenu = [
            'userName' => 'Iniciar sesión',
            'sesion' => 'Iniciar sesión',
            'url' => base_url('/login'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/inicio',$data);
    }

    public function inicio(): string
    {
        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/inicio',$data);
    }

    public function miestilo(): string
    {
        return view('Principal/miestilo');
    }

    public function estilodisenio(): string
    {
        $dataMenuDisenio = [
            'title' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
            'userName' => 'John Doe',
            'sesion' => 'Iniciar sesión',
        ];

        $elementosCarrusel = '<li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
        <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>';

        $dataContenido = [
            'titulo' => 'Hello, world!',
            'carruselImagenes' => $elementosCarrusel,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenuDisenio + $dataContenido + $dataPiePagina;
        return view('Principal/estilodisenio',$data);
    }

    public function pruebaruta(): string
    {
        /* Encabezado y head de HTML en disenio.php */
        $dataMenuDisenio = [
            'title' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
            'userName' => 'John Doe',
        ];
        /* Informacion enviada a la vista  */
        $dataContenido = [
            'mensaje' => 'mensaje enciado desde el controlador'
        ];
        /* Info para el pie pagina */
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenuDisenio + $dataContenido + $dataPiePagina;
        return view('Pruebas/pruebaruta',$data);
    }
}
