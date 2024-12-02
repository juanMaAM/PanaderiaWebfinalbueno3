<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaM;
use App\Models\Local;

class ProductoController extends BaseController
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
        $productoM = model('ProductoModel');
        $data['producto'] = $productoM->select('producto.*, categoria.nombreCategoria, local.nombreLocal')
            ->join('categoria', 'categoria.idCategoria = producto.idCategoria', 'left')
            ->join('local', 'local.idLocal = producto.idLocal', 'left')
            ->findAll();
    
        return view('head') . 
               view('menus') . 
               view('producto/show', $data) . 
               view('footer');
    }
    
    public function add()
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $categoriaModel = new CategoriaM();
        $localModel = new Local();
    
        $categorias = $categoriaModel->findAll();
        $locales = $localModel->findAll();
    
        return view('producto/add', [
            'categorias' => $categorias,
            'locales' => $locales
        ]);
    }

    public function insert()
{
    $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
    $productoModel = new ProductoModel();
    $categoriaModel = new CategoriaM();
    $localModel = new Local();

    $categorias = $categoriaModel->findAll();
    $locales = $localModel->findAll();

    $data = [
        'nombreProducto' => $this->request->getPost('nombreProducto'),
        'descripcion' => $this->request->getPost('descripcion'),
        'precioProducto' => $this->request->getPost('precioProducto'),
        'stock' => $this->request->getPost('stock'),
        'idCategoria' => $this->request->getPost('idCategoria'),
        'idLocal' => $this->request->getPost('idLocal')
    ];

    if (!$this->validate([
        'nombreProducto' => 'required',
        'descripcion' => 'required',
        'precioProducto' => 'required|numeric',
        'precioProducto' => 'required|numeric',
        'stock' => 'required|numeric',
        'idCategoria' => 'required',
        'idLocal' => 'required',
        'imagen' => 'uploaded[imagen]|is_image[imagen]|max_size[imagen,2048]'  
    ])) {
        return view('producto/add', [
            'validation' => $this->validator,
            'categorias' => $categorias,
            'locales' => $locales
        ]);
    }

    $imagen = $this->request->getFile('imagen');
    if ($imagen->isValid() && !$imagen->hasMoved()) {
        $nuevoNombre = $imagen->getRandomName();
        $imagen->move(WRITEPATH . '../public/imagenes', $nuevoNombre);
        
        $data['imagen'] = $nuevoNombre;
    } else {
        
        return view('producto/add', [
            'validation' => $this->validator,
            'error' => 'No se pudo cargar la imagen. Por favor, inténtelo de nuevo.',
            'categorias' => $categorias,
            'locales' => $locales
        ]);
    }

    
    $productoModel->save($data);

    return redirect()->to(base_url('productos'));

}


    public function edit($idProducto)
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaM();
        $localModel = new Local();
        
        
        $producto = $productoModel->select('producto.*, categoria.nombreCategoria, local.nombreLocal')
                                ->join('categoria', 'categoria.idCategoria = producto.idCategoria', 'left')
                                ->join('local', 'local.idLocal = producto.idLocal', 'left')
                                ->where('producto.idProducto', $idProducto)
                                ->get()
                                ->getRowArray();
    
        if (!$producto) {
            return redirect()->to('/productos');
        }
    
        
        $data = [
            'producto' => $producto,
            'categorias' => $categoriaModel->asArray()->findAll(),
            'locales' => $localModel->asArray()->findAll(),
            'menus' => view('menus')
        ];
    
        return view('producto/edit', $data);
    }
    
    public function update($idProducto)
{
    $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
    $productoModel = new ProductoModel();

    
    $data = [
        'nombreProducto' => $this->request->getPost('nombreProducto'),
        'descripcion' => $this->request->getPost('descripcion'),
        'precioProducto' => $this->request->getPost('precioProducto'),
        'stock' => $this->request->getPost('stock'),
        'idCategoria' => $this->request->getPost('idCategoria'),
        'idLocal' => $this->request->getPost('idLocal')
    ];




    $productoModel->update($idProducto, $data);

    return redirect()->to(base_url('productos'));
    
}


    public function delete($idProducto)
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $productoModel = new ProductoModel();
        $productoModel->delete($idProducto);
        return redirect()->to(base_url('productos'));
    }


    public function visualizar()
{
    $session = session();

    
    if (!$session->has('selected_local')) {
        return view('producto/vista', ['productos' => [], 'localSeleccionado' => false]);
    }

    $idLocal = $session->get('selected_local');

    $productoModel = new ProductoModel();
    $categoriaModel = new CategoriaM();

    
    $productos = $productoModel->where('idLocal', $idLocal)->findAll();

    
    foreach ($productos as &$producto) {
        
        $categoria = $categoriaModel->find($producto->idCategoria);
        $producto->categoria = $categoria ? $categoria->nombreCategoria : 'Sin categoría';
    }

    
    if ($this->request->getGet('categoria') && $this->request->getGet('categoria') !== 'todos') {
        $categoriaSeleccionada = $this->request->getGet('categoria');
        $productos = array_filter($productos, function($producto) use ($categoriaSeleccionada) {
            return $producto->categoria === $categoriaSeleccionada;
        });
    }

    
    $categorias = array_unique(array_map(function($producto) {
        return $producto->categoria;
    }, $productos));

    return view('producto/vista', [
        'productos' => $productos,
        'localSeleccionado' => true,
        'categorias' => $categorias
    ]);
}



    public function insertaC()
    {
        $session = session();

        $idProducto = $_POST['idProducto'];
        $nombre = $this->request->getPost('nombre');
        $cantidad =$this->request->getPost('cantidad');
        $costo =$this->request->getPost('costo');
        $subtotal = $cantidad * $costo;

        $carrito = $session->get('carrito') ??[];
        $item = [
            "idProducto" => $idProducto,
            "nombre" => $nombre,
            "cantidad" => $cantidad,
            "costo" => $costo,
            "subtotal" => $subtotal
        ];

        if(isset($carrito[$idProducto])){
            $carrito[$idProducto]['cantidad'] += $cantidad;
            $carrito[$idProducto]['subtotal'] = $carrito[$idProducto]['cantidad']* $costo;
        }else {
            $carrito[$idProducto] = $item;
        }

        $session->set('carrito', $carrito);

        return redirect()->to(base_url('producto/show'));

    }



    public function detalle($idProducto)
    {
        
        $productoM = model('ProductoModel');
        
        $producto['producto'] = $productoM->where('idProducto', $idProducto)->first();

        return 
            view('producto/descripcion', $producto);
    }



    public function verCarro(){
        $session = session();
        if($session->get('logged_in')!=true){
            return redirect()->to(base_url('/inicio'));
        }
        $data['session'] =$session= session();
        return view('pagina/carro', $data);

    }



    public function pagar (){
        $session = session();
        if($session->get('logged_in')!=true){
            return redirect()->to(base_url('/inicio'));
        }
        
        $ventasM = model('VentasModel');
        $carritoM = model('CarritoModel');
        $productosM = model('ProductoModel');
        $direccionM = model('DireccionM'); 

        $idUsuario = $session->get('idUsuario');
        $direccion = $direccionM->where('idUsuario', $idUsuario)->first();
    
        if (!$direccion) {
            return redirect()->to(base_url('perfil'))->with('mensaje', 'Por favor, agregue una dirección para continuar con la compra.');
        }
    

        $total = $_POST['total'];
        $dataventa =[
            'idCliente'=>$session-> get('idUsuario'),
            'fecha'=> date('Y-m-d H:i:s'),
            'total'=> $total 
        ];
        $ventasM -> insert ($dataventa);
        $idVenta = $ventasM->getInsertID();

        foreach ($session-> get('carrito') as $item){
            $dataVentaProducto = [
                'idVenta' => $idVenta,
                'idProducto' => $item['idProducto'],
                'cantidad' => $item['cantidad'],
                'precio' => $item['costo'],
                'subtotal' => $item['subtotal']

                
            ];
            $carritoM ->insert($dataVentaProducto);

            $producto = $productosM->find($item['idProducto']); // Buscar el producto en la base de datos

            if ($producto) {
                $producto->stock -= $item['cantidad'];
    
                $productosM->update($producto->idProducto, ['stock' => $producto->stock]);
            }

            
        }
                    $session->remove('carrito');
                    return redirect()->to(base_url('verCarro'));

    }


    public function borrarC($idProducto)
{
    $session = session();

    
    $carrito = $session->get('carrito') ?? [];

    
    if (isset($carrito[$idProducto])) {
        
        unset($carrito[$idProducto]);

        
        $session->set('carrito', $carrito);
    }

    
    return redirect()->to(base_url('verCarro'));
}



public function venta()
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $ventasModel = model('VentasModel');
        $usuarioModel = model('Usuario');

        $ventas = $ventasModel->findAll();

        foreach ($ventas as &$venta) {
            $usuario = $usuarioModel->find($venta->idCliente); 
            $venta->usuario = $usuario; 

        }

        return view('head').
        view('menus').
        view('venta/ventas', ['ventas' => $ventas]);
    }

   

    public function detalleVenta($idVenta)
    {
        $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
        $ventaModel = model('VentasModel');
        
        $data = $ventaModel->getVentaDetalles($idVenta);

        if ($data['venta']) {
            return view('menus').
            view('venta/detalleVenta', $data);
        } else {
            
        }
    }



    public function inicioAdmin()
{

    $session = session();
        if($session->get('logged_in')!=true || $session->get('tipo')!=1){
            return redirect()->to(base_url('/login'));
        }
    $productoModel = new ProductoModel();
    $categoriaModel = new CategoriaM();
    $localModel = new Local(); 

    $productos = $productoModel->findAll();

    $umbralStockBajo = 5;
    $alertas = [];

    foreach ($productos as $producto) {
        if ($producto->stock <= $umbralStockBajo) {
            $categoria = $categoriaModel->find($producto->idCategoria);

            $local = $localModel->find($producto->idLocal);

            $alertas[] = [
                'idproducto' => $producto->idProducto,
                'producto' => $producto->nombreProducto,
                'categoria' => $categoria ? $categoria->nombreCategoria : 'Sin Categoría',
                'stock' => $producto->stock,
                'local' => $local ? $local->nombreLocal : 'Local Desconocido', 
            ];
        }
    }

    return view('menus').
    view('inicioAdmin', ['alertas' => $alertas]);
}





}













