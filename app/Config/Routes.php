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
$routes->get('/obras', 'Principal::obras');
$routes->get('/canasta', 'Principal::canasta');
$routes->get('/guardados', 'Principal::guardados');

$routes->get('/login', 'Autenticacion::login');
$routes->get('/registrar', 'Autenticacion::ingresar');
$routes->get('/login_art', 'Autenticacion::loginArtista');
$routes->get('/registrar_art', 'Autenticacion::ingresarArtista');
$routes->get('/login_admin', 'Autenticacion::loginAdmin');

$routes->get('/subasta', 'Subasta::listaSubastas');
$routes->get('/subastas', 'Subasta::subastas');

$routes->get('/solicita_cuadro', 'CuadroArte::solicitarCuadro');

$routes->get('/Contactos', 'Contacto::index');
/* $routes->get('/Contactos/insertar', 'Contacto::insertar'); */
$routes->post('/Contactos/insertar', 'Contacto::insertar');



$routes->get('/biografia_Art', 'Artista::biografia');
$routes->get('/inicioartista', 'Artista::incioArtista');
$routes->get('/inicioartista/(:num)', 'Artista::show/$1');
$routes->get('/inicioartista/trasaccion', 'Artista::transaccion');
$routes->get('/nuevapublicacion', 'Artista::nuevaPublicacion');
$routes->get('/publicacionesartista', 'Artista::publicacionesArtista');

$routes->get('/comprarObra', 'Pagos::compraObra');


$routes->get('/inicioadmin', 'Admin::inicioAdmin');
$routes->get('/usuariosLista', 'Admin::listaUsuarios');
$routes->get('/artistasLista', 'Admin::listaArtistas');
$routes->get('/publicacionesLista', 'Admin::listaPublicaciones');
$routes->get('/subastasLista', 'Admin::listaSubastas');

/* TESTS */
$routes->get('/prueba', 'Principal::index');
$routes->get('/miestilo', 'Principal::miestilo');
$routes->get('/estilodisenio', 'Principal::estilodisenio');
$routes->get('/Principal', 'Principal::index2');

/* EXAMPLES GET/%*/
$routes->get('/pinturas/(:num)', 'Pinturas::index/$1');
