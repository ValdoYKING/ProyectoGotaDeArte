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
    protected $fotoUser;
    protected $urlFoto;

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
                $this->fotoUser = $datosUsuario->foto;
                if ($this->fotoUser == " " || empty($this->fotoUser)) {
                    $this->urlFoto = base_url('img/avatars/admin.png');
                } else {
                    $this->urlFoto = base_url('img/usuarios/' . $this->fotoUser);
                }
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
        $model = new usuariosModel();
        $page = $this->request->getVar('page') ?? 1;

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
            'urlPhoto' => $this->urlFoto,
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
            return redirect()->to(base_url('/usuariosLista'));
        }
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id)->findAll();
        $Menu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/salirAdmin'),
            'urlPhoto' => $this->urlFoto,
        ];
        $Contenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar datos de usuario',
            'usuario' => $usuario,
            'datosPersonales' => $datosPersonales,
        ];
        $PiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $Menu + $Contenido + $PiePagina;
        return view('Administrador/usuarioEdit', $data);
    }

    public function actualizarusario($id)
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
            'estatus_user' => $_POST['estatus'],
        ];
        $this->usuariomodel->update($id, $dataUser);
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id);
        $id_dataPersonal = $datosPersonales->first()->id;
        $this->datosPersonalesModel->update($id_dataPersonal, $dataPersonal);
        return redirect()->to('/usuariosLista')->with('message-update', 'Se actualizo el usuario '.$id.' exitosamente.');
    }

    public function actualizarEstatusUsuario($id)
    {
        $results = $this->usuariomodel->find($id);
        $fecha = Date('Y-m-d H:i:s');  
        //$status = $_POST['status'];
        if( $results->estatus_user == 0){
            $dataUser = [
                'estatus_user' => '1',
            ];
            $this->usuariomodel->update($id, $dataUser);
            return redirect()->to('/usuariosLista')->with('message-update', 'Se actualizo el usuario '.$id.' exitosamente.');
        } else if($results->estatus_user == 1){            
            $dataUser = ['estatus_user' => '0' ];
            $this->usuariomodel->update($id, $dataUser);
            return redirect()->to('/usuariosLista')->with('message-update', 'Se actualizo el usuario 2'.$id.' exitosamente.');
        }
    }

    public function eliminarusario($id)
    {   
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id);
        $id_dataPersonal = $datosPersonales->first()->id;
        $this->datosPersonalesModel->delete($id_dataPersonal);
        $this->usuariomodel->delete($id);
        return redirect()->to('/usuariosLista')->with('message-delete', 'Se elmino el usuario '.$id.' exitosamente.');
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
            'urlPhoto' => $this->urlFoto,
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
            'urlPhoto' => $this->urlFoto,
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
            'estatus_user' => $_POST['estatus'],
        ];
        $this->usuariomodel->update($id, $dataUser);
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id);
        $id_dataPersonal = $datosPersonales->first()->id;
        $this->datosPersonalesModel->update($id_dataPersonal, $dataPersonal);
        return redirect()->to('/artistasLista')->with('message-update', 'Se actualizo el artista '.$id.' exitosamente.');
    }
    public function actualizarEstatusArtista($id)
    {
        $results = $this->usuariomodel->find($id);
        $fecha = Date('Y-m-d H:i:s');  
        //$status = $_POST['status'];
        if( $results->estatus_user == 0){
            $dataUser = [
                'estatus_user' => '1',
            ];
            $this->usuariomodel->update($id, $dataUser);
            return redirect()->to('/artistasLista')->with('message-update', 'Se actualizo el artista '.$id.' exitosamente.');
        } else if($results->estatus_user == 1){            
            $dataUser = ['estatus_user' => '0' ];
            $this->usuariomodel->update($id, $dataUser);
            return redirect()->to('/artistasLista')->with('message-update', 'Se actualizo el artista '.$id.' exitosamente.');
        }
    }
    public function eliminarArtista($id)
    {   
        $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $id);
        $id_dataPersonal = $datosPersonales->first()->id;
        $this->datosPersonalesModel->delete($id_dataPersonal);
        $this->usuariomodel->delete($id);
        return redirect()->to('/artistasLista')->with('message-delete', 'Se elimino el artista '.$id.' exitosamente.');
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
            'urlPhoto' => $this->urlFoto,
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
        $idObra = $results->id;
        $subasta = $this->subastas->where('fk_obra', $idObra)->first();

        $Menu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/salirAdmin'),
            'urlPhoto' => $this->urlFoto,
        ];
        $Contenido = [
            'titulo' => 'GOTA DE ARTE | Actualizar publicacion',
            'publicacion' => $results,
            'subasta' => $subasta
        ];
        $PiePagina = [
            'fecha' => date('Y'),
        ];

        $data = $Menu + $Contenido + $PiePagina;
        return view('Administrador/actualizarObra', $data);
    }

    public function actualizarPublicacion($id)
    {
        $results = $this->obrasArtista->find($id);
        $fecha = Date('Y-m-d H:i:s');  
        //$status = $_POST['status'];
        if( $results->estatus_subasta == 0){
            $subasta = [ 
                'nombre'=> $results->nombre,
                'fotos'=> $results->foto,
                'precioInicial'=> 0,
                'precioPagado'=> 0,
                'fk_obra'=> $results->id,
                'fk_usuario'=> $results->fk_usuario_artista,
                'fechaSubasta'=>'',
                'fecha_creacion'=>$fecha,


            ];
            $data = ['estatus_subasta' => 1 ];
            $this->obrasArtista->update($id,$data);
            $this->subastas->insert($subasta);
            
            return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra y la subasta se registro exitosamente.');
        } else if($results->estatus_subasta == 1){
            
            $data = ['estatus_subasta' => 0 ];
            $this->subastas->where('fk_obra', $id)->delete();
            $this->obrasArtista->update($id,$data);
            return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra y la subasta se elimino exitosamente.');
        }


        
        
       /*  $sub = $this->subastas->where('fk_obra', $id)->first();
        $dircFoto = $this->obrasArtista->find($id);
        $fecha = Date('Y-m-d H:i:s');
        $imagen = $_FILES['foto']['tmp_name'];
        $nombreImg = $_FILES['foto']['name'];
        $tipoImg = strtolower(pathinfo($nombreImg, PATHINFO_EXTENSION));
        $direccion = "img/galeria/";
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
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

                                return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra y la subasta fue registrada exitosamente.');
                            } else {
                                $fk = $sub['id'];

                                $this->subastas->update($fk, $dataSubes);

                                $this->obrasArtista->update($id, $data);
                                return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra exitosamente.');
                            }
                        } else if ($status == 0) {

                            if ($sub == true) {
                                $fk = $sub['fk_obra'];
                                $this->subastas->where('fk_obra', $fk)->delete();
                                $this->obrasArtista->update($id, $data);

                                return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra y la subasta fue eliminada exitosamente.');
                            } else {

                                $this->obrasArtista->update($id, $data);

                                return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra exitosamente.');
                            }
                        }
                    }
                }
            } else {
                return redirect()->to('/Artista/publicacionesArtista')->with('error', 'Archivo no encontrado');
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

                    return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizar la obra y la subasta se registro exitosamente.');
                } else {
                    $fk = $sub['id'];

                    $this->subastas->update($fk, $dataSubes);

                    $this->obrasArtista->update($id, $data);
                    return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra exitosamente.');
                }
            } else if ($status == 0) {

                if ($sub == true) {
                    $fk = $sub['fk_obra'];
                    $this->subastas->where('fk_obra', $fk)->delete();
                    $this->obrasArtista->update($id, $data);

                    return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra y la subasta se elimino exitosamente.');
                } else {

                    $this->obrasArtista->update($id, $data);

                    return redirect()->to('/publicacionesLista')->with('message-update', 'Se actualizo la obra exitosamente.');
                }
            }
        } */
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
            return redirect()->to('/publicacionesLista')->with('message-delete', 'Se elmino la obra y la subasta exitosamente.');
        } else {
            try {
                unlink($url);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $this->obrasArtista->delete($id);
            return redirect()->to('/publicacionesLista')->with('message-delete', 'Se elmino la obra exitosamente.');
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
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salirAdmin'),
            'urlPhoto' => $this->urlFoto,
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
            'urlPhoto' => $this->urlFoto,
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

        return redirect()->to('/subastasLista')->with('message-update', 'Se actualizo la obra exitosamente.');
    }

    public function eliminarSubasta($id){
        $results = $this->subastas->find($id);
        $idO = $results['fk_obra'];
        $subes = ['estatus_subasta' => 0];
        $this->obrasArtista->update($idO, $subes);
        $this->subastas->delete($id);
        return redirect()->to('/subastasLista')->with('message-delete', 'Se elmino la subasta exitosamente.');
    }


    public function listaContactos(): string
    {
        $results = $this->contactosModel->findAll();
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/salirAdmin'),
            'urlPhoto' => $this->urlFoto,
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

        return redirect()->to('/contactosLista')->with('message-delete', 'Se elimino el mensaje exitosamente.');
    }
}
