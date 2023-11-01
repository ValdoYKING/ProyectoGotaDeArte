<?php

namespace App\Controllers;

use App\Models\ObrasArtista;
use App\Models\subastasModelo;
use App\Models\contactosModel;
use App\Models\usuariosModel;
use App\Models\datosPersonalesModel;


class Admin extends BaseController
{
    private $obrasArtista;
    private $subastas;
    private $contactosModel;
    private $usuariomodel;
    private $personamodel;
    protected $userName;
    protected $datosPersonalesModel;


    public function __construct()
    {
        $this->obrasArtista = new ObrasArtista();
        $this->subastas = new subastasModelo();
        $this->contactosModel = new ContactosModel();
        $this->usuariomodel = new usuariosModel();
        $this->datosPersonalesModel = new datosPersonalesModel();
        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            // $datosPersonalesModel = new datosPersonalesModel();
            $datosUsuario = $this->datosPersonalesModel->where('fk_usuario', $userNameSession)->first();
            if ($datosUsuario && property_exists($datosUsuario, 'nombre')) {
                $this->userName = $datosUsuario->nombre;
            }
        } else {
            $this->userName = 'Usuario Gota';
        }
    }
    public function inicioAdmin(): string
    {
        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->findAll();
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
            'publicacion' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/inicio', $data);
    }

    public function listaUsuarios(): string
    {
        $model = new usuariosModel(); // Reemplaza 'UserModel' con el nombre de tu modelo de usuarios
        $page = $this->request->getVar('page') ?? 1; // Obtiene el número de página actual de la URL, predeterminado a 1 si no está presente

        $results = $this->usuariomodel->where('fk_rol', 1)->findAll();
        $dataDatosPersonales = array();
        foreach ($results as $usuario) {
            $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $usuario->id)->findAll();
            $dataDatosPersonales[$usuario->id] = $datosPersonales;
        }
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de usuarios',
            'usuarios' => $model->where('fk_rol', 1)->paginate(10, 'default', $page), // 20 registros por página
            'pager' => $model->pager,
            // 'usuarios' => $results,
            'datosPersonales' => $dataDatosPersonales,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaUsuarios', $data);
    }

    public function get_data_usuario($id)
    {
        $usuario = $this->usuariomodel->find($id);
        if (!$usuario) {
            return redirect()->to(base_url('/usuariosLista')); // Reemplaza 'ruta_de_redirección' con la URL adecuada.
        }
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id)->findAll();
        $Menu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $Contenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar datos de usuario',
            'usuario' => $usuario, // Pasamos el usuario específico, no un arreglo de resultados
            'datosPersonales' => $datosPersonales, // Pasamos los datos personales
        ];
        $PiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $Menu + $Contenido + $PiePagina;
        return view('Administrador/usuarioEdit', $data);
    }

    public function actualizarusario($id)
{
    // Datos personales
    $dataPersonal = [
        'nombre' => $_POST['Nombre'][0], // Supongo que solo hay un campo 'Nombre' en el formulario
        'a_paterno' => $_POST['Apellido_p'][0], // Supongo que solo hay un campo 'Apellido_p' en el formulario
        'a_materno' => $_POST['Apellido_m'][0], // Supongo que solo hay un campo 'Apellido_m' en el formulario
        'fecha_nacimiento' => $_POST['FechaNacimiento'][0], // Supongo que solo hay un campo 'FechaNacimiento' en el formulario
        'descripcion' => $_POST['Descripcion'][0], // Supongo que solo hay un campo 'Descripcion' en el formulario
        // 'urlFoto' => $_POST['urlFoto'], // Asegúrate de que el formulario tenga un campo 'urlFoto'
    ];
    // Datos de usuario
    if($_POST['estatusHidden']){
        $estatus = 0;
    }else{
        $estatus = 9;
    }
    $dataUser = [
        'correo' => $_POST['correo'],
        'estatus_user' => $estatus,
    ];
    // Actualiza los datos del usuario
    $this->usuariomodel->update($id, $dataUser);
    // Actualiza los datos personales
    $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id);
    $id_dataPersonal = $datosPersonales->first()->id;
    $this->datosPersonalesModel->update($id_dataPersonal, $dataPersonal);

    return redirect()->to('/usuariosLista');
}

    public function eliminarusario($id)
    {
        $this->usuariomodel->where('')->find($id);
        $this->usuariomodel->delete($id);
        return redirect()->to('/usuariosLista');
    }

    public function listaArtistas(): string
    {
        $results = $this->usuariomodel->where('fk_rol', 2)->findAll();
        $dataDatosPersonales = array();
        foreach ($results as $usuario) {
            $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $usuario->id)->findAll();
            $dataDatosPersonales[$usuario->id] = $datosPersonales;
        }
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de artistas',
            'usuarios' => $results,
            'datosPersonales' => $dataDatosPersonales,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaArtistas', $data);
    }
    public function get_data_artista($id)
    {
        $usuario = $this->usuariomodel->find($id);
        if (!$usuario) {
            return redirect()->to(base_url('/artistasLista')); // Reemplaza 'ruta_de_redirección' con la URL adecuada.
        }
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id)->findAll();
        $Menu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $Contenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar datos de artista',
            'usuario' => $usuario, // Pasamos el usuario específico, no un arreglo de resultados
            'datosPersonales' => $datosPersonales, // Pasamos los datos personales
        ];
        $PiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $Menu + $Contenido + $PiePagina;
        return view('Administrador/artistaEdit', $data);
    }
    public function actualizarArtista($id)
    {
        // Datos personales
        $dataPersonal = [
            'nombre' => $_POST['Nombre'][0], // Supongo que solo hay un campo 'Nombre' en el formulario
            'a_paterno' => $_POST['Apellido_p'][0], // Supongo que solo hay un campo 'Apellido_p' en el formulario
            'a_materno' => $_POST['Apellido_m'][0], // Supongo que solo hay un campo 'Apellido_m' en el formulario
            'fecha_nacimiento' => $_POST['FechaNacimiento'][0], // Supongo que solo hay un campo 'FechaNacimiento' en el formulario
            'descripcion' => $_POST['Descripcion'][0], // Supongo que solo hay un campo 'Descripcion' en el formulario
            // 'urlFoto' => $_POST['urlFoto'], // Asegúrate de que el formulario tenga un campo 'urlFoto'
        ];
        // Datos de usuario
        if($_POST['estatusHidden']){
            $estatus = 0;
        }else{
            $estatus = 9;
        }
        $dataUser = [
            'correo' => $_POST['correo'],
            'estatus_user' => $estatus,
        ];
        // Actualiza los datos del usuario
        $this->usuariomodel->update($id, $dataUser);
        // Actualiza los datos personales
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id);
        $id_dataPersonal = $datosPersonales->first()->id;
        $this->datosPersonalesModel->update($id_dataPersonal, $dataPersonal);

        return redirect()->to('/artistasLista');
    }
    public function listaPublicaciones(): string
    {
        $results = $this->obrasArtista->findAll();
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicacion' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaPublicaciones', $data);
    }

    public function mostrarObra($id)
    {
        $results = $this->obrasArtista->find($id);

        $Menu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $Contenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar publicacion',
            'publicacion' => $results,
        ];
        $PiePagina = [
            'fecha' => date('Y'),
        ];

        $data = $Menu + $Contenido + $PiePagina;
        return view('Administrador/actualizarObra', $data);
    }

    public function actualizarPublicacion($id)
    {
        $data = [
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'medidas' => $_POST['medidas'],
            'precio' => $_POST['precio'],
            // 'estatus_subasta' => $_POST['status']
        ];
        $this->obrasArtista->update($id, $data);
        return redirect()->to('/publicacionesLista');
    }

    public function eliminarPublicacion($id)
    {
        $this->obrasArtista->delete($id);
        return redirect()->to('/publicacionesLista');
    }

    public function listaSubastas(): string
    {
        $results = $this->subastas->findAll();
        $dataMenu = [
            'userName' => 'Administrador',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de subastas',
            'subasta' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaSubastas', $data);
    }

    public function listaContactos(): string
    {
        $results = $this->contactosModel->findAll();
        $dataMenu = [
            'userName' => 'Administrador',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de Contactos',
            'contactos' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaContactos', $data);
    }
}
