<?php
namespace App\Controllers;
use App\Models\ObrasArtista;
use App\Models\subastasModelo;
use \App\Models\datosPersonalesModel;


class CuadroArte extends BaseController{

    private $subasta;
    private $personal;
    //private $db;
    private $obrasArtista;
    private $userName;
    private $idUser;

    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
        $this->subasta = new subastasModelo();
        //$this->db = \Config\Database::connect();
        $this->personal = new datosPersonalesModel();

        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            //$datosPersonalesModel = new \App\Models\datosPersonalesModel();
            $datosUsuario = $this->personal->where('fk_usuario', $userNameSession)->first();
            if ($datosUsuario && property_exists($datosUsuario, 'nombre')) {
                $this->userName = $datosUsuario->nombre;
                $this->idUser = $datosUsuario->id;
            }
        } else {
            $this->userName = 'Usuario Gota';
        }
    }

    /* FUNCION PARA MOSTRAR POR BUSQUEDA POR ID */
    public function obraArtista($id){

        $results = $this->obrasArtista->find($id);
        $fkid = $results->fk_usuario_artista;
        $datoArtista = $this->personal->find($fkid);


        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicaciones' => $results,
            'datosart' => $datoArtista
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/inicioArtistashow',$data);
    }

    public function obraCliente($id){

        $results = $this->obrasArtista->find($id);
        $fkid = $results->fk_usuario_artista;
        $datoArtista = $this->personal->find($fkid);


        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados')
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicaciones' => $results,
            'datosart' => $datoArtista
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('CuadroArte/obra',$data);
    }

}
