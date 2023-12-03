<?php

namespace App\Controllers;

use App\Models\usuariosModel;
use App\Models\datosPersonalesModel;
use App\Models\ObrasArtista;

class Principal extends BaseController
{
    private $userName;
    private $idUser;
    protected $usuario;
    protected $datosPersonalesModel;
    private $obras;
    private $fotoUser;
    private $urlFoto;

    public function __construct()
    {
        $this->usuario = new usuariosModel();
        $this->datosPersonalesModel = new datosPersonalesModel();
        $this->obras = new ObrasArtista();
        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            $datosUsuario = $this->datosPersonalesModel->where('fk_usuario', $userNameSession)->first();
            if ($datosUsuario && property_exists($datosUsuario, 'nombre')) {
                $this->userName = $datosUsuario->nombre;
                $this->idUser = $datosUsuario->fk_usuario;
                $this->fotoUser = $datosUsuario->foto;
                if ($this->fotoUser == " " || empty($this->fotoUser)) {
                    $this->urlFoto = base_url('img/avatars/userGA.png');
                } else {
                    $this->urlFoto = base_url('img/usuarios/' . $this->fotoUser);
                }
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
        $obras = $this->obras->limit(6)->find();

        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salir'),
            'canastaUrl' => base_url('/listacanasta/' . $this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/' . $this->idUser),
            'urlPerfil' => base_url('/Usuario/perfil/' . $this->idUser),
            'urlPhoto' => $this->urlFoto,
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
            'obras' => $obras
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
            'canastaUrl' => base_url('/listacanasta/' . $this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/' . $this->idUser),
            'urlPerfil' => base_url('/Usuario/perfil/' . $this->idUser),
            'urlPhoto' => $this->urlFoto,
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
            'userName' => 'Iniciar sesión',
            'sesion' => 'Iniciar de sesión',
            'urlSalir' => base_url('/login'),
            'canastaUrl' => base_url('/login'),
            'guardadosUrl' => base_url('/login'),
            'urlPhoto' => base_url('/login'),
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
            'canastaUrl' => base_url('/listacanasta/' . $this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/' . $this->idUser),
            'urlPerfil' => base_url('/Usuario/perfil/' . $this->idUser),
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
            'canastaUrl' => base_url('/listacanasta/' . $this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/' . $this->idUser),
            'urlPerfil' => base_url('/Usuario/perfil/' . $this->idUser),
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

    public function perfil($id): string
    {
        $usuario = $this->usuario->find($id);
        if (!$usuario) {
            return redirect()->to(base_url('/usuariosLista'));
        }
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id)->findAll();
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'canastaUrl' => base_url('/listacanasta/' . $this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/' . $this->idUser),
            'urlSalir' => base_url('/'),
            'urlPerfil' => base_url('/Artista/perfil/' . $this->idUser),
            'urlPhoto' => $this->urlFoto,
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Mi perfil',
            'usuario' => $usuario,
            'datosPersonales' => $datosPersonales,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/perfil', $data);
    }

    public function actualizarDatosUsuario($id)
    {
        $nuevo_nombre = base_url('img/avatars/userGA.png');

        if (isset($_FILES["userFoto"]) && $_POST["UrlPhotoUser"][0] == " ") {
            $extension = pathinfo($_FILES["userFoto"]["name"], PATHINFO_EXTENSION);
            $nuevo_nombre = rand() . '.' . $extension;
            $ubicacion = FCPATH . 'img/usuarios/' . $nuevo_nombre;
            move_uploaded_file($_FILES["userFoto"]["tmp_name"], $ubicacion);
        } elseif ($_POST['UrlPhotoUser'][0] != " ") {
            $nuevo_nombre = $_POST['UrlPhotoUser'][0];
        }/* elseif (isset($_FILES["userFoto"]) && $_POST["UrlPhotoUser"][0] != " ") {
            $extension = pathinfo($_FILES["userFoto"]["name"], PATHINFO_EXTENSION);
            $nuevo_nombre = rand() . '.' . $extension;
            $ubicacion = FCPATH . 'img/usuarios/' . $nuevo_nombre;        
            move_uploaded_file($_FILES["userFoto"]["tmp_name"], $ubicacion);
        } */
        // Datos personales
        $dataPersonal = [
            'nombre' => $_POST['Nombre'][0],
            'a_paterno' => $_POST['Apellido_p'][0],
            'a_materno' => $_POST['Apellido_m'][0],
            'fecha_nacimiento' => $_POST['FechaNacimiento'][0],
            'descripcion' => $_POST['Descripcion'][0],
            'foto' => $nuevo_nombre,
        ];
        // Datos de usuario
        $dataUser = [
            'correo' => $_POST['correo'],
        ];
        $this->usuario->update($id, $dataUser);
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id);
        $id_dataPersonal = $datosPersonales->first()->id;
        $this->datosPersonalesModel->update($id_dataPersonal, $dataPersonal);
        return redirect()->to('/Usuario/perfil/' . $this->idUser)->with('message-update', 'Se actualizaron tus datos exitosamente.');
    }

    public function actualizarContrasennaUsuario($id)
    {
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'canastaUrl' => base_url('/listacanasta/' . $this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/' . $this->idUser),
            'urlSalir' => base_url('/'),
            'urlPerfil' => base_url('/Artista/perfil/' . $this->idUser),
            'urlPhoto' => $this->urlFoto,
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar contraseña',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/actualizarContrasenia', $data);
    }

    public function actualizaPassUser()
    {
        $contraseñaAnterior = $_POST['passwordAnterior'];
        $contrasennaNueva = $_POST['passwordNuevo'];

        $usuario = $this->usuario->find($this->idUser);

        if (!$usuario) {
            return redirect()->to('/Usuario/perfil/' . $this->idUser)->with('message-update_pass', 'Usuario no encontrado.');
        }

        if (!password_verify($contraseñaAnterior . $usuario->salt, $usuario->contrasenia)) {
            return redirect()->to('/Usuario/perfil/' . $this->idUser)->with('message-update_pass', 'Contraseña anterior incorrecta.');
        }

        $nuevaContraseñaHasheada = $this->usuario->setPassword($contrasennaNueva, $usuario->salt);

        $data = [
            'contrasenia' => $nuevaContraseñaHasheada,
        ];
        $this->usuario->update($this->idUser, $data);

        return redirect()->to('/Usuario/perfil/' . $this->idUser)->with('message-update_pass', 'Contraseña actualizada con éxito.');
    }

    public function actualizarContrasennaArtista($id)
    {
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'canastaUrl' => base_url('/listacanasta/' . $this->idUser),
            'guardadosUrl' => base_url('/obrasguardadas/' . $this->idUser),
            'urlSalir' => base_url('/'),
            'urlPerfil' => base_url('/Artista/perfil/' . $this->idUser),
            'urlPhoto' => $this->urlFoto,
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar contraseña',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/actualizarContrasenia', $data);
    }

    public function actualizaPassArtista()
    {
        $contraseñaAnterior = $_POST['passwordAnterior'];
        $contrasennaNueva = $_POST['passwordNuevo'];

        $usuario = $this->usuario->find($this->idUser);

        if (!$usuario) {
            return redirect()->to('/Artista/perfil/' . $this->idUser)->with('message-update_pass', 'Usuario no encontrado.');
        }

        if (!password_verify($contraseñaAnterior . $usuario->salt, $usuario->contrasenia)) {
            return redirect()->to('/Artista/perfil/' . $this->idUser)->with('message-update_pass', 'Contraseña anterior incorrecta.');
        }

        $nuevaContraseñaHasheada = $this->usuario->setPassword($contrasennaNueva, $usuario->salt);

        $data = [
            'contrasenia' => $nuevaContraseñaHasheada,
        ];
        $this->usuario->update($this->idUser, $data);

        return redirect()->to('/Artista/perfil/' . $this->idUser)->with('message-update_pass', 'Contraseña actualizada con éxito.');
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
