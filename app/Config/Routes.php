<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Principal::index');
$routes->get('/inicio', 'Principal::inicio', ['filter' => 'auth']);
$routes->get('/info', 'Principal::sobreNosotros');
$routes->get('/tyc', 'Principal::terminosCondiciones');
$routes->get('/politicadeprivacidad', 'Principal::politicaPrivacidad');
$routes->get('/obras', 'UsuarioCliente::iniciObras');
$routes->get('/canasta', 'Principal::canasta');
$routes->get('/guardados', 'Principal::guardados');

$routes->get('/login', 'Autenticacion::loginUsuario');
$routes->post('/autenticarInicio', 'Autenticacion::autenticarInicioUsuario');
$routes->get('/registrar', 'Autenticacion::ingresarNuevoUsuario');
$routes->post('/registrar-usuario', 'Autenticacion::registrarUsuario');
$routes->get('/login_art', 'Autenticacion::loginArtista');
$routes->post('/autenticarInicioArtista', 'Autenticacion::autenticarInicioArtista');
$routes->get('/registrar_art', 'Autenticacion::ingresarArtista');
$routes->post('/registrar-artista', 'Autenticacion::registrarUsuarioArtista');
$routes->get('/login_admin', 'Autenticacion::loginAdmin');
$routes->post('/autenticarInicioAdmin', 'Autenticacion::autenticarInicioAdmin');
$routes->get('/salir', 'Autenticacion::salirUsuario');

$routes->get('/subasta', 'Subasta::listaSubastas');
$routes->get('/subastas', 'Subasta::subastas');
// $routes->get('/subastas', 'Subasta::subastas', ['filter' => 'SessionFilter']);


$routes->get('/solicita_cuadro', 'CuadroArte::solicitarCuadro');

$routes->get('/Contactos', 'Contacto::index');
/* $routes->get('/Contactos/insertar', 'Contacto::insertar'); */
$routes->post('/Contactos/insertar', 'Contacto::insertar');

//
$routes->get('/canasta_prueba', 'Canasta::index');
$routes->post('/UsuarioCanasta/edit', 'Canasta::edit');


$routes->get('/biografia_Art', 'Artista::biografia');
$routes->get('/inicioartista', 'Artista::incioArtista');
$routes->get('/inicioartista/obraArtista/(:num)', 'Artista::obraArtista/$1');
$routes->get('/inicioartista/consultarObra/(:num)', 'Artista::consultarObra/$1');


//$routes->get('/nuevapublicacion/insertarObra', 'Artista::insertarObra');
$routes->get('/nuevapublicacion', 'Artista::nuevaPublicacion');
$routes->post('/Artista/insertaObra', 'Artista::insertaObra');
$routes->get('/publicacionesartista', 'Artista::publicacionesArtista');
$routes->post('/Artista/ActualizarArtista/(:num)', 'Artista::ActualizarArtista/$1');
$routes->get('/Artista/EliminarArtista/(:num)', 'Artista::EliminarArtista/$1');


$routes->get('/comprarObra', 'Pagos::compraObra');


$routes->get('/inicioadmin', 'Admin::inicioAdmin', ['filter' => 'auth']);
$routes->get('/usuariosLista', 'Admin::listaUsuarios');
$routes->get('/artistasLista', 'Admin::listaArtistas');
$routes->get('/publicacionesLista', 'Admin::listaPublicaciones');
$routes->get('/subastasLista', 'Admin::listaSubastas');
$routes->get('/contactosLista', 'Contacto::listaContactos');


/* TESTS */
$routes->get('/prueba', 'Principal::index');
$routes->get('/miestilo', 'Principal::miestilo');
$routes->get('/estilodisenio', 'Principal::estilodisenio');
$routes->get('/Principal', 'Principal::index2');
/* Prueba de framework */
$routes->get('/dev', 'dev::index');

/* EXAMPLES GET/%*/
$routes->get('/pinturas/(:num)', 'Pinturas::index/$1');
