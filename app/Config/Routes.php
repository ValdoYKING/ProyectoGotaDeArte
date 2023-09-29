<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/dev', 'dev::index');
$routes->get('/', 'Principal::index');
$routes->get('/inicio', 'Principal::inicio');
//$routes->get('/contacto', 'Principal::contacto');
$routes->get('/info', 'Principal::sobreNosotros');
$routes->get('/tyc', 'Principal::terminosCondiciones');
$routes->get('/politicadeprivacidad', 'Principal::politicaPrivacidad');

$routes->get('/login', 'Autenticacion::login');
$routes->get('/registrar', 'Autenticacion::ingresar');
$routes->get('/login_art', 'Autenticacion::loginArtista');
$routes->get('/registrar_art', 'Autenticacion::ingresarArtista');
$routes->get('/login_admin', 'Autenticacion::loginAdmin');

$routes->get('/subasta', 'Subasta::listaSubastas');
$routes->get('/subastas', 'Subasta::index');

$routes->get('/solicita_cuadro', 'CuadroArte::solicitarCuadro');

$routes->get('/Contactos', 'Contacto::index');

$routes->get('/biografia_Art', 'Artista::biografia');
$routes->get('/inicioartista', 'Artista::incioArtista');
$routes->get('/nuevapublicacion', 'Artista::nuevaPublicacion');


$routes->get('/inicioadmin', 'Admin::inicioAdmin');
$routes->get('/usuariosLista', 'Admin::listaUsuarios');
$routes->get('/artistasLista', 'Admin::listaArtistas');
$routes->get('/publicacionesLista', 'Admin::listaPublicaciones');
$routes->get('/subastasLista', 'Admin::listaSubastas');

/* TESTS */
$routes->get('/prueba', 'Principal::index');
$routes->get('/miestilo', 'Principal::miestilo');
$routes->get('/estilodisenio', 'Principal::estilodisenio');

$routes->get('/subastaPrueba', 'Subasta::index');
$routes->get('/CuadroArte', 'CuadroArte::index');

//Hola soy German!!

$routes->get('/cuadroArtePrueba', 'CuadroArte::index');
$routes->get('/loginPrueba', 'Autenticacion::index');

$routes->get('/Principal', 'Principal::index2');

/* EXAMPLES */
$routes->get('/pinturas/(:num)', 'Pinturas::index/$1');
