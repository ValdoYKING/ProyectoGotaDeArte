<?php
namespace App\Controllers;

class Subasta extends BaseController
{
    public function index(): string{
        $dataMenu = [
            'userName' => 'Pepito',
        ];
        $dataContenido = [
            'titulo' => 'Estas son las artes de subasta',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/index',$data);
    }
}
?>