<?php

namespace App\Controllers;

class DireccionC extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];


    public function insert()
    {
        if (!session('logged_in') || !session('idUsuario')) {
            return redirect()->to('/login'); 
        }
    
        if (!$this->request->is('post')) {
            return redirect()->to(base_url('direcciones/add')); 
        }
    
        $idUsuario = session()->get('idUsuario');
    
        $rules = [
            'calle' => 'required',
            'numeroExterior' => 'required',
            'colonia' => 'required',
            'ciudad' => 'required',
            'estado' => 'required',
            'codigoPostal' => 'required|numeric'
        ];
    
        $direccion = [
            "calle" => $this->request->getPost('calle'),
            "numero_exterior" => $this->request->getPost('numeroExterior'),
            "numero_interior" => $this->request->getPost('numeroInterior'),
            "colonia" => $this->request->getPost('colonia'),
            "ciudad" => $this->request->getPost('ciudad'),
            "estado" => $this->request->getPost('estado'),
            "codigoPostal" => $this->request->getPost('codigoPostal'),
            "pais" => 'México',
            "idusuario" => $idUsuario
        ];
    
        $direccionModel = model('DireccionM');
        $existingAddress = $direccionModel->where('idusuario', $idUsuario)->first();
    
        if (!$this->validate($rules)) {
            return view('usuarios/direccion');
        } else {
            if ($existingAddress) {
                $direccionModel->update($existingAddress->iddireccion, $direccion);
            } else {
                $direccionModel->insert($direccion);
            }
    
            return redirect()->to(base_url('/perfil'));
        }
    }
    
    public function agregar(){
        if (!session('logged_in') || !session('idUsuario')) {
            return redirect()->to('/login'); 
        }
        return view('usuarios/direccion');
    }
    

}