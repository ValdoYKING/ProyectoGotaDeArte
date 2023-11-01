<?php
namespace App\Controllers;
use App\Models\ObrasArtista;

class Artista extends BaseController
{
    private $obrasArtista;
    private $db;
    private $userName;
    protected $helpers = ['form'];
    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
        $this->db = \Config\Database::connect();

        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            $datosPersonalesModel = new \App\Models\datosPersonalesModel();
            $datosUsuario = $datosPersonalesModel->where('fk_usuario', $userNameSession)->first();
            if ($datosUsuario && property_exists($datosUsuario, 'nombre')) {
                $this->userName = $datosUsuario->nombre;
            }
        } else {
            $this->userName = 'Usuario Gota';
        }
    }
    public function biografia(): string{

        $data = [
            'userName' => 'Pepito',
            'titulo' => 'Bibliografia',
            'artista' => 'Mario Galileo',
            'frase' => 'La vida es un lienzo en blanco, y debes lanzar sobre él toda la pintura que puedas',
            'alias' => 'lopcot',
            'historia' => 'Mario inicion desde 2010 su vida de artista en la cual se especializa en el pintura Realismo, Abstraccto y Retrato',
            'fecha_n' => 'Nacio 1990',
            'nacionalidad' => 'Mexicano',
            'fecha' => date('Y'),
        ];
        return view('biografia_Art/Artista',$data);
    }

    public function incioArtista(): string{

        /* $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM obras_artista');
        $results = $query->getResult(); */

        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->findAll();

        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/salirArtista'),
            // 'url' => base_url('/salir'),
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

    public function insertaObra(){

        
            $data = [
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'medidas' => $_POST['medidas'],
                'estatus_subasta' => $_POST['status']
                
            ];

            $this->obrasArtista->insert($data);

    
            return redirect()->to('/inicioartista');
        
    }

    /* FUNCION PARA MOSTRAR POR BUSQUEDA POR ID */
    public function obraArtista($id){
        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->find($id);

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/'),
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
    public function consultarObra($id){
        $results = $this->obrasArtista->find($id);


        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicacion' => $results,
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];

        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/actualizarPublicacion',$data);
    }


    public function publicacionesArtista(): string{

        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->find();
        
        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión', 
            'url' => base_url('/'),   
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Mi publicacion',
            'publicaciones' => $results,

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

            'urlSalir' => base_url('/salir'),
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


    public function ActualizarArtista($id){

        $data = [
            'nombre' => $_POST['nombre'],
            'descripcion' => $_POST['descripcion'],
            'medidas' => $_POST['medidas'],
            'precio' => $_POST['precio'],
            'estatus_subasta' => $_POST['status']
            
        ];
    
        
        $this->obrasArtista->update($id, $data);

    
        return redirect()->to('/inicioartista');


    }
    public function EliminarArtista($id){


        $this->obrasArtista->delete($id);


        return redirect()->to('/publicacionesartista');

    }    
    
        

}
    

?>