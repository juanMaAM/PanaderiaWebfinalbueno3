<?php
namespace App\Controllers;

use App\Models\Local;
use App\Models\ProductoModel;
use App\Models\CategoriaM;


class Locales extends BaseController
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
        $localM = model('Local');
        
        $local['locales'] = $localM->findAll();
        $local['nombre'] = 'Mi tienda'; 
    
        return view('head') .
            view('menus', $local) . 
            view('local/show', $local) .
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
            view('local/add') .
            view('footer');
    }

    public function insert()
{
    $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
    $localM = model('Local');

    $local = [
        'nombreLocal' => $this->request->getPost('local'),
        'aliasLocal' => $this->request->getPost('alias'),
        'direccionLocal' => $this->request->getPost('direccion'),
        'horario' => $this->request->getPost('horario')
    ];

    if (!$this->validate([
        'local' => 'required',
        'alias' => 'required',
        'direccion' => 'required',
        'horario' => 'required',
        'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]'
    ])) {
        return view('local/add', [
            'validation' => $this->validator
        ]);
    }

    $imagen = $this->request->getFile('imagen');
    if ($imagen->isValid() && !$imagen->hasMoved()) {
        $nuevoNombre = $imagen->getRandomName();
        $imagen->move(WRITEPATH . '../public/imagenes', $nuevoNombre);
        $local['imagen'] = $nuevoNombre;
    } else {
        return view('local/add', [
            'validation' => $this->validator,
            'error' => 'No se pudo cargar la imagen. Por favor, inténtelo de nuevo.'
        ]);
    }

    $localM->insert($local);

    return redirect()->to(base_url('/locales'));
}

    

    public function edit($idLocal)
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $localM = model('Local');
        
        $local['locales'] = $localM->find($idLocal);

        return view('head') .
            view('menus') .
            view('local/edit', $local) .
            view('footer');
    }

    public function update()
{
    $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
    $localM = model('Local');

    $idLocal = $this->request->getPost('idLocal');

    $local = [
        'nombreLocal' => $this->request->getPost('local'),
        'aliasLocal' => $this->request->getPost('alias'),
        'direccionLocal' => $this->request->getPost('direccion'),
        'horario' => $this->request->getPost('horario')
    ];

    $localM->update($idLocal, $local);

    return redirect()->to(base_url('/locales'));
}


public function visualizar()
{
    $session = session();
    $localModel = new Local();

    if ($session->has('selected_local')) {
        $localId = $session->get('selected_local');
        $local = $localModel->find($localId); 

        return view('local/vista', ['locales' => [$local], 'selected' => true]);
    }

    $locales = $localModel->findAll();

    return view('/local/vista', ['locales' => $locales, 'selected' => false]);
}

public function selectLocal($id)
{
    $session = session();
    $session->set('selected_local', $id);
    return redirect()->to('/local/show');
}

public function resetSelection()
{
    $session = session();
    $session->remove('selected_local'); 
    return redirect()->to('/local/show'); 
}

public function delete($idLocal)
{
    $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
    $localM = model('Local');

    if ($localM->delete($idLocal)) {
        return redirect()->to(base_url('/locales'))->with('success', 'Local eliminado correctamente.');
    } else {
        return redirect()->to(base_url('/locales'))->with('error', 'No se pudo eliminar el local.');
    }
}

}    






