<?php
namespace App\Controllers;

class Artista extends BaseController
{
    public function biografia(): string{

        $dataMenu = [
            'userName' => 'Pepito',
        ];
        $dataContenido = [
            'titulo' => 'Bibliografia',
        ];
        $artista = [
            'artista' => 'Mario Galileo',
        ];
        $fraseArt = [
            'frase' => 'La vida es un lienzo en blanco, y debes lanzar sobre él toda la pintura que puedas',
        ];
        $alias = [
            'alias' => 'lopcot',
        ];
        $historia = [
            'historia' => 'Mario inicion desde 2010 su vida de artista en la cual se especializa en el pintura Realismo, Abstraccto y Retrato'
        ];
        $fechaNacimiento = [
            'fecha_n' => 'Nacio 1990',
        ];
        $nacionalidad = [
            'nacionalidad' => 'Mexicano',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $artista + $fraseArt + $alias + $historia + $fechaNacimiento + $nacionalidad + $dataPiePagina;
        return view('biografia_Art/Artista',$data);
    }
}
?>