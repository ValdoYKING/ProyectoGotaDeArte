<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/dev', 'dev::index');
$routes->get('/', 'Principal::index');
$routes->get('/incio', 'Principal::inicio');
$routes->get('/contacto', 'Principal::contacto');
$routes->get('/info', 'Principal::sobreNosotros');
$routes->get('/tyc', 'Principal::terminosCondiciones');
$routes->get('/politicadeprivacidad', 'Principal::politicaPrivacidad');

$routes->get('/login', 'Autenticacion::login');
$routes->get('/sign_in', 'Autenticacion::ingresar');

$routes->get('/subasta', 'Subasta::listaSubastas');

$routes->get('/solicita_cuadro', 'CuadroArte::solicitarCuadro');

$routes->get('/biografia_usuario', 'Usuario::biografia');
/* TESTS2 */

/* TESTS */
$routes->get('/prueba', 'Principal::index');
$routes->get('/miestilo', 'Principal::miestilo');
$routes->get('/estilodisenio', 'Principal::estilodisenio');
//Hola soy German!!
$routes->get('/Subastas', 'Subasta::index');
$routes->get('/cuadroArtePrueba', 'CuadroArte::index');
$routes->get('/loginPrueba', 'Autenticacion::index');


$routes->get('/pruebaruta', 'Principal::pruebaruta');

/* EXAMPLES */
$routes->get('/pinturas/(:num)', 'Pinturas::index/$1');

