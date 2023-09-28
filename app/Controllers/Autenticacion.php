<?php

namespace App\Controllers;

class Autenticacion extends BaseController{

    public function login(): string{
        $dataMenu = [
            'userName' => 'John Doe',
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Iniciar sesión',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Autenticacion/login',$data);
    }

    public function ingresar(): string{
        $dataMenu = [
            'userName' => 'John Doe',
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Registrate',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Autenticacion/registrarNuevo',$data);
    }

    public function loginArtista(): string{
        $dataMenu = [
            'userName' => 'John Doe',
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Iniciar sesión',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Autenticacion/loginArtista',$data);
    }

    public function ingresarArtista(): string{
        $dataMenu = [
            'userName' => 'John Doe',
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Registrate',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Autenticacion/registrarArtista',$data);
    }

    public function loginAdmin(): string{
        $dataMenu = [
            'userName' => 'John Doe',
        ];
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Iniciar sesión',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $dataPiePagina;
        return view('Autenticacion/loginAdmin',$data);
    }
}