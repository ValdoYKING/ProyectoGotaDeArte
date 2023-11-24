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
    /*     public function inicioAdmin(): string
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
    } */

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
        if ($_POST['estatusHidden']) {
            $estatus = 0;
        } else {
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
            return redirect()->to(base_url('/artistasLista'));
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
            'usuario' => $usuario,
            'datosPersonales' => $datosPersonales,
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
            'nombre' => $_POST['Nombre'][0],
            'a_paterno' => $_POST['Apellido_p'][0],
            'a_materno' => $_POST['Apellido_m'][0],
            'fecha_nacimiento' => $_POST['FechaNacimiento'][0],
            'descripcion' => $_POST['Descripcion'][0],
            // 'urlFoto' => $_POST['urlFoto'], // Asegúrate de que el formulario tenga un campo 'urlFoto'
        ];
        // Datos de usuario
        if ($_POST['estatusHidden']) {
            $estatus = 0;
        } else {
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
        foreach ($results as $publicacion) {
            $datosPersonales = $this->datosPersonalesModel->where('id', $publicacion->fk_usuario_artista)->findAll();
            $dataDatosPersonales[$publicacion->fk_usuario_artista] = $datosPersonales;
        }
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicacion' => $results,
            'datosPersonales' => $dataDatosPersonales,
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
        $sub = $this->subastas->where('fk_obra', $id)->first();
        $dircFoto = $this->obrasArtista->find($id);
        $fecha = Date('Y-m-d H:i:s');
        $imagen = $_FILES['foto']['tmp_name'];
        $nombreImg = $_FILES['foto']['name'];
        $tipoImg = strtolower(pathinfo($nombreImg, PATHINFO_EXTENSION));
        $direccion = "img/galeria/";
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $status = $_POST['status'];
        $descrip = $_POST['descripcion'];
        $medidas = $_POST['medidas'];
        $ruta = $direccion . $nombre . "_" . $id . "." . $tipoImg;


        if (!empty($imagen)) {
            $fotUrl = $ruta;
            $data = [
                'nombre' => $nombre,
                'foto' => $fotUrl,
                'descripcion' => $descrip,
                'medidas' => $medidas,
                'precio' => $precio,
                'estatus_subasta' => $status,

            ];
            $dataSubes = [
                'nombre' => $nombre,
                'fotos' => $fotUrl,
                'precioInicial' => $precio,
                'precioPagado' => 0,
                'fk_obra' => $id,
                'fechaSubasta' => '',
            ];
            if (is_file($imagen)) {

                if ($tipoImg == 'jpg' or $tipoImg == 'jpeg' or $tipoImg == 'png') {

                    try {
                        unlink($dircFoto->foto);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                    //$name = str_replace(" ","",$nombre);
                    if (move_uploaded_file($imagen, $ruta)) {



                        if ($status == 1) {

                            if ($sub == false) {
                                $Subasta =  $dataSubes + ['fecha_creacion' => $fecha];

                                $this->obrasArtista->update($id, $data);
                                $this->subastas->insert($Subasta);

                                return redirect()->to('/publicacionesLista');
                            } else {
                                $fk = $sub['id'];

                                $this->subastas->update($fk, $dataSubes);

                                $this->obrasArtista->update($id, $data);
                                return redirect()->to('/publicacionesLista');
                            }
                        } else if ($status == 0) {

                            if ($sub == true) {
                                $fk = $sub['fk_obra'];
                                $this->subastas->where('fk_obra', $fk)->delete();
                                $this->obrasArtista->update($id, $data);

                                return redirect()->to('/publicacionesLista');
                            } else {

                                $this->obrasArtista->update($id, $data);

                                return redirect()->to('/publicacionesLista');
                            }
                        }
                    }
                }
            } else {
                echo 'archivo no encontrado';
            }
        } else {
            $fotUrl =  $dircFoto->foto;
            $data = [
                'nombre' => $nombre,
                'foto' => $fotUrl,
                'descripcion' => $descrip,
                'medidas' => $medidas,
                'precio' => $precio,
                'estatus_subasta' => $status,
            ];
            $dataSubes = [
                'nombre' => $nombre,
                'fotos' => $fotUrl,
                'precioInicial' => $precio,
                'precioPagado' => 0,
                'fk_obra' => $id,
                'fechaSubasta' => '',

            ];
            if ($status == 1) {

                if ($sub == false) {

                    $Subasta =  $dataSubes + ['fecha_creacion' => $fecha];

                    $this->obrasArtista->update($id, $data);
                    $this->subastas->insert($Subasta);

                    return redirect()->to('/publicacionesLista');
                } else {
                    $fk = $sub['id'];

                    $this->subastas->update($fk, $dataSubes);

                    $this->obrasArtista->update($id, $data);
                    return redirect()->to('/publicacionesLista');
                }
            } else if ($status == 0) {

                if ($sub == true) {
                    $fk = $sub['fk_obra'];
                    $this->subastas->where('fk_obra', $fk)->delete();
                    $this->obrasArtista->update($id, $data);

                    return redirect()->to('/publicacionesLista');
                } else {

                    $this->obrasArtista->update($id, $data);

                    return redirect()->to('/publicacionesLista');
                }
            }
        }
    }

    public function eliminarPublicacion($id)
    {
        $sub = $this->subastas->where('fk_obra', $id)->first();
        $foto = $this->obrasArtista->find($id);
        $url = $foto->foto;
        if ($sub == true) {

            $fk = $sub['id'];
            try {
                unlink($url);
            } catch (\Throwable $th) {
                //throw $th;
            }

            $this->subastas->delete($fk);
            $this->obrasArtista->delete($id);
            return redirect()->to('/publicacionesLista');
        } else {
            try {
                unlink($url);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $this->obrasArtista->delete($id);
            return redirect()->to('/publicacionesLista');
        }
    }

    public function listaSubastas(): string
    {
        $results = $this->subastas->findAll();
        foreach ($results as $subasta) {
            $datosPersonales = $this->datosPersonalesModel->where('id', $subasta['fk_usuario'])->findAll();
            $dataDatosPersonales[$subasta['fk_usuario']] = $datosPersonales;
        }
        $dataMenu = [
            'userName' => 'Administrador',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de subastas',
            'subasta' => $results,
            'datosPersonales' => $dataDatosPersonales
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Administrador/listaSubastas', $data);
    }
    public function mostrarSubasta($id)
    {
        $results = $this->subastas->find($id);

        $Menu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/salirAdmin'),
        ];
        $Contenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar Subasta',
            'subasta' => $results,
        ];
        $PiePagina = [
            'fecha' => date('Y'),
        ];

        $data = $Menu + $Contenido + $PiePagina;
        return view('Administrador/actualizarSubasta', $data);
    }

    public function actualizarSubasta($id)
    {

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $fsubasta = $_POST['subasta'];

        $subastaData = [
            'nombre' => $nombre,
            'precioInicial' => $precio,
            'fechaSubasta' => $fsubasta
        ];

        $this->subastas->update($id, $subastaData);

        return redirect()->to('/subastasLista');
    }

    public function eliminarSubasta($id)
    {
        $this->subastas->delete($id);
        return redirect()->to('/subastasLista');
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

    public function eliminarContacto($id)
    {

        $this->contactosModel->delete($id);

        return redirect()->to('/contactosLista');
    }
}
