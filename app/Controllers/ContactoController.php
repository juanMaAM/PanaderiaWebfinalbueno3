<?php
namespace App\Controllers;

use App\Models\Contacto;

class ContactoController extends BaseController
{
    
    public function add()
    {
               view('contacto/add');

            }

    
    public function insert()
    {
        $contactoModel = new Contacto();

        
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'email' => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'mensaje' => $this->request->getPost('mensaje'),
            'fecha' => date('Y-m-d H:i:s'),
        ];

        
        $contactoModel->insert($data);

        
        return 
               view('contacto/show_single', ['mensaje' => 'Recibimos su mensaje, brevemente le contestaremos.']);
    }

    
    public function show_contactos()
    {

        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $contactoModel = new Contacto();
    
       
        $data['contactos'] = $contactoModel->findAll();
    
       
        return view('head').
               view('menus').
               view('contacto/show_contactos', $data);
    }
    public function delete($id)
    {

        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $contactoModel = new Contacto();

        
        $contactoModel->delete($id);

        
        return redirect()->to('/contacto/show_contactos')->with('message', 'El contacto ha sido eliminado correctamente.');
    }


    public function contactos(){
        return view('contacto/add');
    }
    
}






