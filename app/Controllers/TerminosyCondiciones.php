<?php
namespace App\Controllers;
use App\Models\datosPersonalesModel;

class TerminosyCondiciones extends BaseController
{
    private $datosPersonalesModel;
    protected $helpers = ['form'];
    protected $userName;
    protected $idUser;
    protected $idpersonal;
    protected $fotoUser;
    protected $urlFoto;

    public function __construct(){
        $this->datosPersonalesModel = new datosPersonalesModel();

        if (session()->has('user_id')) {
            $userNameSession = session()->get('user_id');
            $datosUsuario = $this->datosPersonalesModel->where('fk_usuario', $userNameSession)->first();
            if ($datosUsuario && property_exists($datosUsuario, 'nombre')) {
                $this->userName = $datosUsuario->nombre;
                $this->idUser = $datosUsuario->fk_usuario;
                $this->idpersonal = $datosUsuario->id;
                $this->fotoUser = $datosUsuario->foto;
                if ($this->fotoUser == " " || empty($this->fotoUser)) {
                    $this->urlFoto = base_url('img/avatars/userGA.png');
                } else {
                    $this->urlFoto = base_url('img/usuarios/' . $this->fotoUser);
                }
            }
        } else {
            $this->userName = 'Usuario Gota';
        }
    }
    public function terminos(): string
    {

        $dataMenu = [
            'userName' => 'Iniciar sesión',
            'sesion' => 'Iniciar sesión',
            'urlSalir' => base_url('/login'),
            'canastaUrl' => base_url('/login'),
            'guardadosUrl' => base_url('/login'),
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE - Galería de arte | Subasta de cuadros',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('/TerminosYCondiciones/TerminosyCondiciones', $data);
    }

}