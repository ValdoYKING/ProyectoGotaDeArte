<?php
namespace App\Controllers;


class CuadroArte extends BaseController

{
public  function index()
{
    $titulo =['titulo' => 'CuadroArte'];
    $usuarionombre =['userName' => 'Olayo'];
    $data = $titulo + $usuarionombre;
    return view('CuadroArte/CuadroArte',$data);
}
   
    public function show()

{
    return "<h2>Detalles del CuadroaArte</h2>";
}

}
