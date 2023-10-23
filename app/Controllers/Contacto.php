<?php
namespace App\Controllers;
use App\Models\contactosModel;

class Contacto extends BaseController
{
    private $contactosModel;

    public function __construct(){
        $this->contactosModel = new contactosModel();
    }
    public function index(): string{

        $dataMenu = [
            'userName' => 'Pepito',
            'sesion' => 'Iniciar sesión',
            'url' => base_url('/'),
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

    public function insertar() {
    $data = [
        'nombre_contacto' => "Gabriel",
        'correo_contacto' => "gabriel@gmail.com",
        'asunto_contacto' => "Nuevo arte",
        'fk_rol' => 1
        
    ];

    echo $this->contactosModel->insert($data);
    echo $this->contactosModel->getInsertID();
    
    }
    
}
?>