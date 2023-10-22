<?php
namespace App\Controllers;
use App\Models\ObrasArtista;

class Artista extends BaseController
{
    private $obrasArtista;
    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
    }
    public function biografia(): string{

        $dataMenu = [
            'userName' => 'Pepito',
        ];
        $dataContenido = [
            'titulo' => 'Bibliografia',
        ];
        $artista = [
            'artista' => 'Mario Galileo',
        ];
        $fraseArt = [
            'frase' => 'La vida es un lienzo en blanco, y debes lanzar sobre él toda la pintura que puedas',
        ];
        $alias = [
            'alias' => 'lopcot',
        ];
        $historia = [
            'historia' => 'Mario inicion desde 2010 su vida de artista en la cual se especializa en el pintura Realismo, Abstraccto y Retrato'
        ];
        $fechaNacimiento = [
            'fecha_n' => 'Nacio 1990',
        ];
        $nacionalidad = [
            'nacionalidad' => 'Mexicano',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $artista + $fraseArt + $alias + $historia + $fechaNacimiento + $nacionalidad + $dataPiePagina;
        return view('biografia_Art/Artista',$data);
    }

    public function incioArtista(): string{

        /* $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM obras_artista');
        $results = $query->getResult(); */

        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->findAll();

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicaciones' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/inicioArtista',$data);
    }

    public function insertaObraArtista(): string{

        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->find();

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicaciones' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/inicioArtista',$data);
    }

    /* FUNCION PARA MOSTRAR POR BUSQUEDA POR ID */
    public function show($id){
        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->find($id);

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicaciones' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/inicioArtistashow',$data);
    }

    /* Transaccion basica para agregar resgistros */
    public function transaccion(){
        $data = [
            'nombre' => 'GOTA DE ARTE | Lista de publicaciones',
            'descripcion' => 2,
        ];
        echo $this->obrasArtista->insert($data);
    }


    public function publicacionesArtista(): string{

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Mis publicaciones',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/publicacionesArtista',$data);
    }

    public function nuevaPublicacion(): string{

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Nueva publicación',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/nuevaPublicacion',$data);
    }
}
?>