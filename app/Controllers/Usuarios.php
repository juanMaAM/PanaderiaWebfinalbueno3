<?php

namespace App\Controllers;

class Usuarios extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index()
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $usuarioM = model('Usuario');
        $data['usuarios'] = $usuarioM->findAll();
        return view('head') .
                view('menu') . 
                view('usuarios/show', $data) .
                view('footer');
    }

    public function login()
    {
        return view('pagina/login');
    }

    public function registrar()
    {
        return view('usuarios/registro');
    }


    public function add(){  
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        return view('head') .
        view('menu') . 
        view('usuarios/add') .
        view('footer');
    }

    public function edit($idUsuario){ 
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        
        $idUsuario = $data['idUsuario'] = $idUsuario;
        $usuarioM = model('Usuario');
        $data['usuario'] = $usuarioM->where('idUsuario',$idUsuario)->findAll();
        return view('head') .
        view('menu') . 
        view('usuarios/edit',$data) .
        view('footer');
    }

    public function update($idUsuario) {

        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $usuarioM = model('Usuario');
    
        
        if (!$idUsuario) {
            return redirect()->to(base_url('/usuarios'));
        }
    
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidoPaterno' => $this->request->getPost('apellidoPaterno'),
            'apellidoMaterno' => $this->request->getPost('apellidoMaterno'),
            'password' => $this->request->getPost('password'),
            'tipoUsuario' => $this->request->getPost('tipoUsuario'),
            'correo' => $this->request->getPost('correo'),
            'telefono' => $this->request->getPost('telefono'),
            'fechaNacimiento' => $this->request->getPost('fechaNacimiento')
        ];
    
        
        $usuarioM->update($idUsuario, $data);
    
        return redirect()->to(base_url('/usuarios'));
    }
    
    public function insert(){ 

        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        
        if (! $this->request->is('post')) {
                $this->index();
        }
        
        $rules = [
            'nombre' => 'required',
            'apellidoPaterno' => 'required',
            'apellidoMaterno' => 'required',
            'password' => 'required',
            'tipoUsuario' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'fechaNacimiento' => 'required'
        ];

        $usuarios = [
            "nombre" => $_POST['nombre'],
            "apellidoPaterno" => $_POST['apellidoPaterno'],
            "apellidoMaterno" => $_POST['apellidoMaterno'],
            "password" => $_POST['password'],
            "tipoUsuario" => 0,
            "correo" => $_POST['correo'],
            "telefono" => $_POST['telefono'],
            "fechaNacimiento" => $_POST['fechaNacimiento']
        ] ;

            if (! $this->validate($rules)) {
                return     
                view('head') .
                view('menu') . 
                view('usuarios/add',[
                    'validation' => $this->validator
                ]) .
                view('footer'); 
            }
            else{
                $UsuarioM = model('Usuario');
                $UsuarioM->insert($usuarios);
                return redirect()->to(base_url('/usuarios'));
            }

        
    }

    public function delete($idUsuario){
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }

        $usuarioM = model('Usuario');
        $usuarioM->delete($idUsuario);
        return redirect()->to(base_url('/usuarios'));
    }

    public function acceder(){
        $correo = $_POST['correo'];
        $password = $_POST['password'];
    
        $usuarioM = model('Usuario');
        $session = session();
        
        $result = $usuarioM->valida($password, $correo);
    
        if (count($result) > 0) {
            
                
                $newdata = [
                    'idUsuario'     => $result[0]->idusuario,
                    'nombre'        => $result[0]->nombre,
                    'apellidoPaterno' => $result[0]->apellidoPaterno,
                    'apellidoMaterno' => $result[0]->apellidoMaterno,
                    'tipo'   => $result[0]->tipoUsuario,
                    'logged_in'     => TRUE,
                ];
    
                $session->set($newdata);
                
                switch ($result[0]->tipoUsuario) {
                    case 0:
                        return redirect()->to(base_url('/inicio')); 
                    case 1:
                        return redirect()->to(base_url('/inicioAdmin'));  
                    default:
                        return redirect()->to(base_url('/product'));  
                }
            
        } else {
            $session->destroy();
            return redirect()->to(base_url('/login'));
        }
    }

    public function salir(){
        $array_items = ['nombre', 'apellidoPaterno', 'apellidoMaterno', 'tipoUsuario', 'logged_in'];
        $session = session();
        $session->remove($array_items); 

            return redirect()->to(base_url('/login'));
    }

    public function register()
{
    if (!$this->request->is('post')) {
        return $this->index();
    }

    $tipoUsuario = 0;

    $rules = [
        'nombre' => 'required',
        'apellidoPaterno' => 'required',
        'apellidoMaterno' => 'required',
        'password' => 'required|min_length[6]',
        'correo' => 'required',
        'telefono' => 'required|numeric|min_length[10]',
        'fechaNacimiento' => 'required|valid_date'
    ];

    $usuarios = [
        'nombre' => $this->request->getPost('nombre'),
        'apellidoPaterno' => $this->request->getPost('apellidoPaterno'),
        'apellidoMaterno' => $this->request->getPost('apellidoMaterno'),
        'password' => $this->request->getPost('password'), 
        'tipoUsuario' => $tipoUsuario,
        'correo' => $this->request->getPost('correo'),
        'telefono' => $this->request->getPost('telefono'),
        'fecha_nacimiento' => $this->request->getPost('fechaNacimiento'),
    ];

    if (!$this->validate($rules)) {
        return view('usuarios/registro', [
                'validation' => $this->validator
            ]);
    } else {
        $UsuarioM = model('Usuario');
        $UsuarioM->insert($usuarios);
        return redirect()->to(base_url('/login'))->with('success', 'cuenta creada correctamente.');
    }
}

public function perfil()
{
    if (!session('logged_in') || !session('idUsuario')) {
        return redirect()->to('/login'); 
    }

    $usuarioModel = model('Usuario');
    $direccionModel = model('DireccionM'); 
    $idUsuario = session('idUsuario'); 

    
    $usuario = $usuarioModel->find($idUsuario);

    if (!$usuario) {
        return redirect()->to('/login'); 
    }

    $direccion = $direccionModel->where('idusuario', $idUsuario)->first();

    if (!$direccion) {
        $direccion = null;
    }

    return view('usuarios/perfil', [
        'usuario' => $usuario,
        'direccion' => $direccion
    ]);
}


}

