<?php
namespace App\Controllers;

class SobreNosotros extends BaseController {

    public function index(){
        return view('pagina/inicio.php');
    }

    
    public function sobreNosotros() {
        return view('pagina/info.php'); 
    }

    public function contactos(){
        return view('contacto/add');
    }
    
}

