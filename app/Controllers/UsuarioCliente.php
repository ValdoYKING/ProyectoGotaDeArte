<?php
namespace App\Controllers;
use App\Models\ObrasArtista;

class UsuarioCliente extends BaseController
{
    private $obrasArtista;
    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
    }
 
    public function iniciObras(): string{

        /* $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM obras_artista');
        $results = $query->getResult(); */

        $obraArteModel = new ObrasArtista();
        $results = $obraArteModel->findAll();

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Cerrar sesión',
            'urlSalir' => base_url('/'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Publicaciones',
            'publicaciones' => $results
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/obras',$data);
    }


    /* FUNCION PARA MOSTRAR POR BUSQUEDA POR ID */
    public function show($id){
        $results = $this->obrasArtista->find($id);

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
        return view('CuadroArte/CuadroArte',$data);
    }


}
?>