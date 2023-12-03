<?php
namespace App\Controllers;
use App\Models\contactosModel;

class Contacto extends BaseController
{
    private $contactosModel;
    protected $helpers = ['form'];
    protected $userName;
    protected $fotoUser;
    protected $urlFoto;

    public function __construct(){
        $this->contactosModel = new contactosModel();

        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            $datosPersonalesModel = new \App\Models\datosPersonalesModel();
            $datosUsuario = $datosPersonalesModel->where('fk_usuario', $userNameSession)->first();
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
    public function index(): string{

        $dataMenu = [
            'userName' => 'Iniciar sesión',
            'sesion' => 'Iniciar sesión',
            'urlSalir' => base_url('/login'),
            'canastaUrl' => base_url('/login'),
            'guardadosUrl' => base_url('/login'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Contacto',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Contactos/contacto',$data);
    }

    public function guargar(){
        print_r($_POST);

        $val = [
            'nombre' => 'required',
            'email' =>  'required',
            'telefono' =>  'required',
            'asunto' =>  'required',
            'mensaje' =>  'required',

        ];

        if(!$this->validate($val)){

            return redirect()->back()->withInput();
        }
    }

    public function insertar() {
        $fecha = Date('Y-m-d H:i:s');
        $asunto = '';

    if($_POST['asunto'] == 1){
        $asunto = 'Informes de Artista';
    } else if($_POST['asunto'] == 2){
        $asunto = 'Informe del envio de la obra';
    } else if($_POST['asunto'] == 3){
        $asunto = 'Contactar algun artista';
    } else if($_POST['asunto'] == 4){
        $asunto = 'Como entrar a una subasta';
    } else if($_POST['asunto'] == 5){
        $asunto = 'Ser parte de Gota de Arte';
    } 
    $data = [
        'nombre_contacto' => $_POST['nombre'],
        'correo_contacto' => $_POST['email'],
        'comentario_contacto' => $_POST['mensaje'],
        'asunto_contacto' => $asunto,
        'fk_rol' => 1,
        'fecha_creacion' => $fecha,
        
    ];

    
    $this->contactosModel->insert($data);
    //$this->contactosModel->getInsertID();
    
    return redirect()->to('/');
    }
    
    public function listaContactos(): string{

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
        return view('Administrador/listaContactos',$data);
    }

    public function eliminarcontacto($id){

        $this->contactosModel->delete($id);

        return redirect()->to('/contactosLista');

    }
}
?>