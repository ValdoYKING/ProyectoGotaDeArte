<?php

namespace App\Controllers;

class Autenticacion extends BaseController{
    
    public function index(): string{
        $dataMenu = [
            'userName' => 'John Doe',
        ];
        $dataContenido = [
            'titulo' => 'Hello, world!',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Principal/index',$data);
    }
}