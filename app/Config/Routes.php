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
$routes->get('/obras', 'UsuarioCliente::iniciObras', ['filter' => 'auth']);
$routes->get('/canasta', 'Principal::canasta');
$routes->get('/guardados', 'Principal::guardados', ['filter' => 'auth']);

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
$routes->get('/salirArtista', 'Autenticacion::salirArtista');
$routes->get('/salirAdmin', 'Autenticacion::salirAdmin');

$routes->get('/subasta', 'Subasta::listaSubastas', ['filter' => 'auth']);
$routes->get('/subastas', 'Subasta::subastas', ['filter' => 'auth']);
// $routes->get('/subastas', 'Subasta::subastas', ['filter' => 'SessionFilter']);


$routes->get('/solicita_cuadro', 'CuadroArte::solicitarCuadro');

$routes->get('/Contactos', 'Contacto::index');
/* $routes->get('/Contactos/insertar', 'Contacto::insertar'); */
$routes->post('/Contactos/insertar', 'Contacto::insertar');
$routes->get('/Contactos/eliminarcontacto/(:num)', 'Contacto::eliminarcontacto/$1');


//
$routes->get('/canasta_prueba', 'Canasta::index');
$routes->post('/UsuarioCanasta/edit', 'Canasta::edit');
$routes->get('/CuadroArte/obraCliente/(:num)', 'CuadroArte::obraCliente/$1');

$routes->post('/guardarobra/(:num)', 'UsuarioGuardados::guardarObra/$1');
$routes->get('/obrasguardadas/(:num)', 'UsuarioGuardados::guardadoUsuario/$1');
$routes->post('/eliminaobraguardado/(:num)', 'UsuarioGuardados::eliminarObraGuardado/$1');

$routes->post('/agregarcanasta/(:num)', 'Canasta::canastaObra/$1');
$routes->post('/agregarcanastaGuardado/(:num)', 'Canasta::canastaObraGuardado/$1');
$routes->get('/listacanasta/(:num)', 'Canasta::canastaUsuario/$1');
$routes->post('/eliminaobracanasta/(:num)', 'Canasta::eliminarObraCanasta/$1');


$routes->get('/biografia_Art', 'Artista::biografia');
$routes->get('/inicioartista', 'Artista::incioArtista');
$routes->get('/inicioartista/obraArtista/(:num)', 'CuadroArte::obraArtista/$1', ['filter' => 'auth']);
$routes->get('/inicioartista/consultarObra/(:num)', 'Artista::consultarObra/$1', ['filter' => 'auth']);
$routes->get('/inicioartista/consultarSubasta/(:num)', 'Artista::consultarSubasta/$1');
$routes->post('/Artista/actualizarSubasta/(:num)', 'Artista::actualizarSubasta/$1');


//$routes->get('/nuevapublicacion/insertarObra', 'Artista::insertarObra');
$routes->get('/nuevapublicacion', 'Artista::nuevaPublicacion', ['filter' => 'auth']);
$routes->post('/Artista/insertaObra', 'Artista::insertaObra');
$routes->get('/Artista/publicacionesArtista', 'Artista::publicacionesArtista');
$routes->get('/Artista/subastaArt', 'Artista::publicacionesSubastas', ['filter' => 'auth']);

$routes->post('/Artista/ActualizarArtista/(:num)', 'Artista::ActualizarArtista/$1');
$routes->get('/Artista/EliminarArtista/(:num)', 'Artista::EliminarArtista/$1');

$routes->get('/Artista/eliminarSubasta/(:num)', 'Artista::eliminarSubasta/$1');
$routes->get('/Artista/perfil/(:num)', 'Artista::perfil/$1');


$routes->get('/comprarObra', 'Pagos::compraObra');


$routes->get('/inicioadmin', 'Admin::inicioAdmin', ['filter' => 'auth']);
$routes->get('/usuariosLista', 'Admin::listaUsuarios', ['filter' => 'auth']);
$routes->get('/get_usuario/(:num)', 'Admin::get_data_usuario/$1');
$routes->post('/actualizarUsuario/(:num)', 'Admin::actualizarusario/$1');
$routes->get('/Admin/eliminarusario/(:num)', 'Admin::eliminarusario/$1');
$routes->get('/Admin/eliminarartista/(:num)', 'Admin::eliminarArtista/$1');
$routes->get('/artistasLista', 'Admin::listaArtistas', ['filter' => 'auth']);
$routes->get('/get_artista/(:num)', 'Admin::get_data_artista/$1', ['filter' => 'auth']);
$routes->post('/actualizarArtista/(:num)', 'Admin::actualizarArtista/$1');
$routes->get('/publicacionesLista', 'Admin::listaPublicaciones', ['filter' => 'auth']);
$routes->get('/subastasLista', 'Admin::listaSubastas', ['filter' => 'auth']);
$routes->get('/contactosLista', 'Contacto::listaContactos', ['filter' => 'auth']);
$routes->get('/Admin/mostrarObra/(:num)', 'Admin::mostrarObra/$1', ['filter' => 'auth']);
$routes->get('/Admin/actualizarPublicacion/(:num)', 'Admin::actualizarPublicacion/$1');
$routes->get('/Admin/eliminarPublicacion/(:num)', 'Admin::eliminarPublicacion/$1');
$routes->get('/Admin/mostrarSubasta/(:num)', 'Admin::mostrarSubasta/$1', ['filter' => 'auth']);
$routes->post('/Admin/actualizarSubasta/(:num)', 'Admin::actualizarSubasta/$1');
$routes->get('/Admin/eliminarSubasta/(:num)', 'Admin::eliminarSubasta/$1');

$routes->get('/Admin/eliminarContacto/(:num)', 'Admin::eliminarContacto/$1');

$routes->get('/TerminosYCondiciones/TerminosyCondiciones', 'TerminosYCondiciones::terminos');

/* TESTS */
$routes->get('/prueba', 'Principal::index');
$routes->get('/miestilo', 'Principal::miestilo');
$routes->get('/estilodisenio', 'Principal::estilodisenio');
$routes->get('/Principal', 'Principal::index2');
/* Prueba de framework */
$routes->get('/dev', 'dev::index');

/* EXAMPLES GET/%*/
$routes->get('/pinturas/(:num)', 'Pinturas::index/$1');
