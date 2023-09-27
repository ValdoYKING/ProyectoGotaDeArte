<?php
namespace App\Controllers;


class CuadroArte extends BaseController

{
public  function index()
{
    $data =['Titulo' => 'CuadroArte'];
    return view('CuadroArte',$data);
}
   
    public function show()

{
    return "<h2>Detalles del CuadroaArte</h2>";
}
}
