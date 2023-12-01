<?php
namespace App\Controllers;
use App\Models\ObrasArtista;
use App\Models\subastasModelo;
use App\Models\datosPersonalesModel;
use App\Models\usuariosModel;



class Artista extends BaseController
{
    private $obrasArtista;
    private $subasta;
    protected $datosPersonalesModel;
    protected $usuario;
    private $idpersonal;
    private $userName;
    private $idUser;

    protected $helpers = ['form'];
    public function __construct(){
        $this->obrasArtista = new ObrasArtista();
        $this->subasta = new subastasModelo();
        $this->usuario = new usuariosModel();
        $this->datosPersonalesModel = new datosPersonalesModel();

        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            $datosUsuario = $this->datosPersonalesModel->where('fk_usuario', $userNameSession)->first();
            if ($datosUsuario && property_exists($datosUsuario, 'nombre')) {
                $this->userName = $datosUsuario->nombre;
                $this->idUser = $datosUsuario->fk_usuario;
                $this->idpersonal = $datosUsuario->id;
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

        $results = $this->obrasArtista->findAll();
        foreach ($results as $publicaciones) {
            $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $publicaciones->fk_usuario_artista)->findAll();
            $dataDatosPersonales[$publicaciones->fk_usuario_artista] = $datosPersonales;
        }

        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/salirArtista'),
            // 'url' => base_url('/salir'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Lista de publicaciones',
            'publicaciones' => $results,
            'datosPersonales' => $dataDatosPersonales
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/inicioArtista',$data);
    }

    public function insertaObra(){

        $imagen = $_FILES['foto']['tmp_name'];
        $nombreImg = $_FILES['foto']['name'];
        $tipoImg = strtolower(pathinfo($nombreImg, PATHINFO_EXTENSION));
        $direccion = "img/galeria/";
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $status = $_POST['status'];
        $descrip = $_POST['descripcion'];
        $medidas = $_POST['medidas'];
        $fecha = Date('Y-m-d H:i:s');
        $idU = $this->idUser;
        $idImg = $this->obrasArtista->orderBy('id','desc')->first();
        $imgid = $idImg->id + 1;
        $ruta = $direccion.$nombre."_".$imgid.".".$tipoImg;
        if($tipoImg == "jpg" or $tipoImg == "jpeg" or $tipoImg == "png"){
            
            if(move_uploaded_file($imagen,$ruta)){
                
                $data = [
                    'nombre' => $nombre,
                    'foto' => $ruta,
                    'descripcion' => $descrip ,
                    'precio' => $precio,
                    'medidas' => $medidas,
                    'estatus_subasta' => $status,
                    'fk_usuario_artista'=> $idU,
                    'fecha_creacion'=> $fecha
                ];
                
                if($status == 1 ){
                    
                    $this->obrasArtista->insert($data);
                    $id_fk = $this->obrasArtista->getInsertID();
                    
                    $precioSubatas = $_POST['Psubasta'];
                    $dataSubes = [
                        'nombre' => $nombre,
                        'fotos' => $ruta,
                        'precioInicial' => $precioSubatas,
                        'precioPagado' => 0,
                        'fk_obra' => $id_fk,
                        'fk_usuario' => $idU,
                        'fechaSubasta' => '',
                        'fecha_creacion' => $fecha
        
                    ];
        
                    $this->subasta->insert($dataSubes);            
        
                    return redirect()->to('/Artista/publicacionesArtista')->with('message', 'Se registro la obra y la subasta exitosamente.');
        
                } else {
                    
                    $this->obrasArtista->insert($data);
        
                    return redirect()->to('/Artista/publicacionesArtista')->with('message', 'Se registro la obra y exitosamente.');
                }
            }
            
        }
        
    }


    /* Transaccion basica para agregar resgistros */
    public function consultarObra($id){
        $results = $this->obrasArtista->find($id);
        $idObra = $results->id;
        $subasta = $this->subasta->where('fk_obra',$idObra)->first();



        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Formulario publicación',
            'publicacion' => $results,
            'subasta' => $subasta
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];

        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/actualizarPublicacion',$data);
    }


    public function publicacionesArtista(): string{
        $idU = $this->idUser;
        $results = $this->obrasArtista->where('fk_usuario_artista',$idU )->findAll();
        if(!empty($results)){
            foreach ($results as $publicaciones) {
                $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $publicaciones->fk_usuario_artista)->findAll();
                $dataDatosPersonales[$publicaciones->fk_usuario_artista] = $datosPersonales;
            }
        } else {
            $results = 'vacio';
            $dataDatosPersonales = 'vacio';
        }
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión', 
            'url' => base_url('/'),   
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Mi publicacion',
            'publicaciones' => $results,
            'datosPersonales' => $dataDatosPersonales

        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/publicacionesArtista',$data);
    }

    public function nuevaPublicacion(): string{

        $dataMenu = [
            'userName' => $this->userName,
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
        
        $sub = $this->subasta->where('fk_obra', $id)->first();
        $dircFoto = $this->obrasArtista->find($id);
        $idU = $this->idUser;

        $fecha = Date('Y-m-d H:i:s');
        $imagen = $_FILES['foto']['tmp_name'];
        $nombreImg = $_FILES['foto']['name'];
        $tipoImg = strtolower(pathinfo($nombreImg, PATHINFO_EXTENSION));
        $direccion = "img/galeria/";
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $precioSubatas = $_POST['Psubasta'];
        $status = $_POST['status'];
        $descrip = $_POST['descripcion'];
        $medidas = $_POST['medidas'];
        $ruta = $direccion.$nombre."_".$id.".".$tipoImg;

        //echo print_r($_POST);
         if(!empty($imagen)){
            $fotUrl = $ruta;
            $data = [
                'nombre' => $nombre,
                'foto' => $fotUrl,
                'descripcion' => $descrip ,
                'medidas' => $medidas ,
                'precio' => $precio,
                'estatus_subasta' => $status, 
                'fk_usuario_artista'=> $idU,
     
            ];
            $dataSubes = [
                'nombre' => $nombre,
                'fotos' => $fotUrl,
                'precioInicial' => $precioSubatas,
                'fk_obra' => $id,
                'fk_usuario' => $idU,
                'fechaSubasta' => '',
            ];
            if(is_file($imagen)){
    
                if($tipoImg == 'jpg' or $tipoImg == 'jpeg' or $tipoImg == 'png'){
    
                    try {
                        unlink($dircFoto->foto);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                    //$name = str_replace(" ","",$nombre);
                    if(move_uploaded_file($imagen, $ruta)){
    
    
                    
                    if($status == 1 ){        
                
                        if($sub == false){
                            $Subasta =  $dataSubes + ['fecha_creacion' => $fecha ];
                    
                        $this->obrasArtista->update($id, $data);
                        $this->subasta->insert($Subasta);            
                
                        return redirect()->to('/Artista/publicacionesArtista')->with('message-update', 'Se actualizo la obra y la subasta se registro exitosamente.');
                    
                        } else {
                            $fk = $sub['id'];
                        
                            $this->subasta->update($fk,$dataSubes);
                
                            $this->obrasArtista->update($id, $data);
                            return redirect()->to('/Artista/publicacionesArtista')->with('message-update', 'Se actualizo la obra exitosamente.');
                        }
                            
                    } else if ($status == 0) {
                
                        if($sub == true){
                            $fk = $sub['fk_obra'];
                            $this->subasta->where('fk_obra',$fk)->delete(); 
                            $this->obrasArtista->update($id, $data);
                
                            return redirect()->to('/Artista/publicacionesArtista')->with('message-update', 'Se actualizo la obra y la subasta se elimino exitosamente.');
                    
                        } else {
                
                            $this->obrasArtista->update($id, $data);
                        
                            return redirect()->to('/Artista/publicacionesArtista')->with('message-update', 'Se actualizo la obra  exitosamente.');
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
                'descripcion' => $descrip ,
                'medidas' => $medidas ,
                'precio' => $precio,
                'fk_usuario_artista'=> $idU,
                'estatus_subasta' => $status,      
            ];
            $dataSubes = [
                'nombre' => $nombre,
                'fotos' => $fotUrl,
                'precioInicial' => $precioSubatas,
                'precioPagado' => 0,
                'fk_obra' => $id,
                'fk_usuario' => $idU,
                'fechaSubasta' => '',

            ];
            if($status == 1 ){        
                
                if($sub == false){
                    
                $Subasta =  $dataSubes + ['fecha_creacion' => $fecha ];

                $this->obrasArtista->update($id, $data);
                $this->subasta->insert($Subasta);            
        
                return redirect()->to('/Artista/publicacionesArtista')->with('message-update', 'Se actualiza la obra y la subasta se registro exitosamente.');
            
                } else {
                    $fk = $sub['id'];
                
                    $this->subasta->update($fk,$dataSubes);
        
                    $this->obrasArtista->update($id, $data);
                    return redirect()->to('/Artista/publicacionesArtista')->with('message-update', 'Se actualizo la obra exitosamente.');
                }
                    
            } else if ($status == 0) {
        
                if($sub == true){
                    $fk = $sub['fk_obra'];
                    $this->subasta->where('fk_obra',$fk)->delete(); 
                    $this->obrasArtista->update($id, $data);
        
                    return redirect()->to('/Artista/publicacionesArtista')->with('message-update', 'Se actualizo la obra y la subasta fue elminida exitosamente.');
            
                } else {
        
                    $this->obrasArtista->update($id, $data);
                
                    return redirect()->to('/Artista/publicacionesArtista')->with('message-update', 'Se actualizo la obra exitosamente.');
                }
            }
            
        }
 
    }
    public function EliminarArtista($id){

        $sub = $this->subasta->where('fk_obra', $id)->first();
        $foto = $this->obrasArtista->find($id);
        $url = $foto->foto;
        if($sub ==true){

            $fk = $sub['id'];

            try {
                unlink($url);
            } catch (\Throwable $th) {
                //throw $th;
            }
    
            $this->subasta->delete($fk);            
            $this->obrasArtista->delete($id);
            return redirect()->to('/Artista/publicacionesArtista')->with('message-delete', 'Se elmino la obra y la subasta exitosamente.');
        } else {
            try {
                unlink($url);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $this->obrasArtista->delete($id);
            return redirect()->to('/Artista/publicacionesArtista')->with('message-delete', 'Se elimino la obra exitosamente.');
        }
    }  
    
    public function publicacionesSubastas(){
        $idU = $this->idUser;
        $results = $this->subasta->where('fk_usuario', $idU)->findAll();
        if(!empty($results)){
            foreach ($results as $publicaciones) {
                $datosPersonales = $this->datosPersonalesModel->where('fk_usuario', $publicaciones->fk_usuario_artista)->findAll();
                $dataDatosPersonales[$publicaciones->fk_usuario_artista] = $datosPersonales;
            }
        } else {
            $results = 'vacio';
            $dataDatosPersonales = 'vacio';
        }
        $dataMenu = [ 
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión', 
            'url' => base_url('/'),   
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE A RTE | Mis Subastas',
            'subastas' => $results,
            'datosPersonales' => $dataDatosPersonales

        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/subastaArt',$data);
    }

    public function consultarSubasta($id){

        $results = $this->subasta->find($id);
        
        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Cerrar sesión', 
            'url' => base_url('/'),   
            'urlSalir' => base_url('/'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Formualrio Subasta',
            'subasta' => $results,

        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Artista/actualizarSubasta',$data);
    }


    public function actualizarSubasta($id){

        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $fsubasta = $_POST['subasta'];

        $subastaData = [
            'nombre' => $nombre,
            'precioInicial' => $precio,
            'fechaSubasta' => $fsubasta
        ];

        $this->subasta->update($id,$subastaData);

        return redirect()->to('Artista/subastaArt')->with('message-update', 'Se actualizo la subasta exitosamente.');
    }

    public function eliminarSubasta($id)
    {       
            $results = $this->subasta->find($id);
            $idO = $results['fk_obra'];
            $subes = ['estatus_subasta' => 0];
            $this->obrasArtista->update($idO, $subes);
            $this->subasta->delete($id);            
            return redirect()->to('Artista/subastaArt')->with('message-delete', 'Se elimino la subasta exitosamente.');
    }
}
    

?>