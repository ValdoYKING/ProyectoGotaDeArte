<?php
namespace App\Controllers;


class SobreNosotros extends BaseController

{

public  function index()
{
    
    $titulo =['titulo' => 'SobreNosotros'];
    $usuarionombre =['userName' => 'Olayo'];
    $data = $titulo + $usuarionombre;
    return view('SobreNosotros/SobreNosotros',$data);
}
   
    public function show()

{
    return "<h2>Sobre Nosotros</h2>";
}}