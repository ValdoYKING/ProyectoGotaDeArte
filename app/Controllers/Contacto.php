<?php
namespace App\Controllers;
use App\Models\contactosModel;

class Contacto extends BaseController
{
    private $contactosModel;
    protected $helpers = ['form'];
    protected $userName;

    public function __construct(){
        $this->contactosModel = new contactosModel();

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
    public function index(): string{

        $dataMenu = [
            'userName' => $this->userName,
            'sesion' => 'Iniciar sesión',
            'urlSalir' => base_url('/salir'),
            'canastaUrl' => base_url('/canasta'),
            'guardadosUrl' => base_url('/guardados'),
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
    $data = [
        'nombre_contacto' => $_POST['nombre'],
        'correo_contacto' => $_POST['email'],
        'asunto_contacto' => $_POST['asunto'],
        'comentario_contacto' => $_POST['mensaje'],
        'fk_rol' => 1
        
    ];

    
    $this->contactosModel->insert($data);
    $this->contactosModel->getInsertID();
    
    return redirect()->to('/');
    }
    
    public function listaContactos(): string{

        $results = $this->contactosModel->findAll();


        $dataMenu = [
            'userName' => 'Usuario Gota PRUEBA',
            'sesion' => 'Cerrar sesión',
            'url' => base_url('/'),
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
}
?>