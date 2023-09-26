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
/* TESTS2 */

/* TESTS */
$routes->get('/prueba', 'Principal::index');
$routes->get('/miestilo', 'Principal::miestilo');
$routes->get('/estilodisenio', 'Principal::estilodisenio');

/* EXAMPLES */
$routes->get('/pinturas/(:num)', 'Pinturas::index/$1');

$routes->get('/solicita_cuadro', 'CuadroArte::solicitarCuadro');