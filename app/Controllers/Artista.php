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
            'frase' => 'Mario Galileo',
        ];
        $alias = [
            'alias' => 'lopcot2',
        ];
        $historia = [
            'historia' => 'Mario inicion desde 2010 su vida de artista en la cual se especializa en el pintura Realismo, Abstraccto y Retrato'
        ];
        $fechaNacimiento = [
            'fecha_n' => 'Nacio 1990',
        ];
        $nacionalidad = [
            'nacionalidad' => 'Mario Galileo',
        ];
        $dataPiePagina = [
            'fecha' => date('Y'),
        ];
        $data = $dataMenu + $dataContenido + $artista + $fraseArt + $alias + $historia + $fechaNacimiento + $nacionalidad + $dataPiePagina;
        return view('biografia_Art/Artista',$data);
    }
}
?>