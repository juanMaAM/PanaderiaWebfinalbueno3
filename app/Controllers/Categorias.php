<?php
namespace App\Controllers;

class Categorias extends BaseController
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
        $categoriaM = model('CategoriaM');
        $data['categorias'] = $categoriaM->findAll();
        return view('head') .
                view('menus') . 
                view('categorias/show', $data) .
                view('footer');
    }

    public function add()
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        return view('head') .
        view('menus') . 
        view('categorias/add') .
        view('footer');
    }

    public function edit($idcategoria)
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $categoriaM = model('CategoriaM');
        $data['categoria'] = $categoriaM->where('idcategoria', $idcategoria)->findAll();
        return view('head') .
        view('menus') . 
        view('categorias/edit', $data) .
        view('footer');
    }

    public function update($idcategoria)
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $categoriaM = model('CategoriaM');
        $data = [
            'nombreCategoria' => $this->request->getPost('categoria'),
            'descripcionCategoria' => $this->request->getPost('descripcion')
        ];
        $categoriaM->set($data)->where('idcategoria', $idcategoria)->update();
        return redirect()->to(base_url('/categorias'));
    }

    public function insert()
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        if (! $this->request->is('post')) {
            return $this->index();
        }
        
        $rules = [
            'categoria' => 'required',
            'descripcion' => 'required'
        ];

        $categorias = [
            "nombreCategoria" => $this->request->getPost('categoria'),
            "descripcionCategoria" => $this->request->getPost('descripcion')
        ];

        if (! $this->validate($rules)) {
            return view('head') .
                view('menu') . 
                view('categorias/add', [
                    'validation' => $this->validator
                ]) .
                view('footer'); 
        } else {
            $CategoriaM = model('CategoriaM');
            $CategoriaM->insert($categorias);
            return redirect()->to(base_url('/categorias'));
        }
    }

    public function delete($idcategoria)
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $categoriaM = model('CategoriaM');
        $categoriaM->delete($idcategoria);
        return redirect()->to(base_url('/categorias'));
    }
}



