<?php

namespace App\Controllers;
use App\Models\ObrasArtista;

class Principal extends BaseController
{
    private $userName;
    private $obras;

    public function __construct()
    {
        $this->obras = new ObrasArtista();
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
        helper(['url', 'form']);
    }
    public function index(): string
    {
        $obras = $this->obras->limit(6)->find();
        $dataMenu = [
            'userName' => 'Iniciar sesión',
            'sesion' => 'Iniciar sesión',
            'urlSalir' => base_url('/login'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
            'obras' => $obras
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/paginaSinIngresar', $data);
    }

    public function inicio(): string
    {

        $dataMenu = [
            'userName' => $this->userName,
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
        return view('Principal/paginaInicial', $data);
    }

    public function obras(): string
    {
        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Obras',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/obras', $data);
    }

    public function sobreNosotros(): string
    {
        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Sobre nosotros',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/sobreNosotros', $data);
    }

    public function canasta(): string
    {
        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Mi canasta',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/canasta', $data);
    }

    public function guardados(): string
    {
        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Guardados',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/guardados', $data);
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
        return view('Pruebas/pruebaruta', $data);
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
        return view('Principal/estilodisenio', $data);
    }
}
