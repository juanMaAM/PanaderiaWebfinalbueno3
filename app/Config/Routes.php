<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */





//navegacion 
$routes->get('inicio', 'SobreNosotros::index');
$routes->get('sobreNosotros', 'SobreNosotros::sobreNosotros');
$routes->get('product', 'ProductoController::visualizar');
$routes->get('local/show', 'Locales::visualizar');
$routes->get('contactanos', 'ContactoController::contactos');
$routes->get('/producto/show', 'ProductoController::visualizar');
$routes->post('/usuario/acceder', 'Usuarios::acceder');
$routes->get('login', 'Usuarios::login');
$routes->get('salir', 'Usuarios::salir');
$routes->get('usuario/Registrar', 'Usuarios::registrar');
$routes->post('usuario/register', 'Usuarios::register');
$routes->get('/perfil', 'Usuarios::perfil');


$routes->get('/producto/detalle/(:num)', 'ProductoController::detalle/$1');


$routes->post('/insertarCarro', 'ProductoController::insertaC');
$routes->get('/verCarro', 'ProductoController::verCarro');
$routes->get('/borrar/(:num)', 'ProductoController::borrarC/$1');
$routes->post('/pagar', 'ProductoController::pagar');




$routes->get('/direccion/add', 'DireccionC::agregar');
$routes->post('/direccion/insert', 'DireccionC::insert');





$routes->post('/local/select/(:num)', 'Locales::selectLocal/$1');
$routes->post('/local/reset', 'Locales::resetSelection');









//admin productos, locales, categorias

$routes->get('/inicioAdmin', 'ProductoController::inicioAdmin');



$routes->get('/categorias', 'Categorias::index');
$routes->get('/categorias/add', 'Categorias::add');
$routes->post('/categorias/insert', 'Categorias::insert');
$routes->get('/categorias/edit/(:num)', 'Categorias::edit/$1');
$routes->post('/categorias/update/(:num)', 'Categorias::update/$1');
$routes->get('/categorias/delete/(:num)', 'Categorias::delete/$1');




$routes->get('/productos', 'ProductoController::index');  
$routes->get('productos/add', 'ProductoController::add');  
$routes->post('/productos/insert', 'ProductoController::insert');  
$routes->get('/productos/edit/(:num)', 'ProductoController::edit/$1');  
$routes->post('/productos/update/(:num)', 'ProductoController::update/$1');  
$routes->get('/productos/delete/(:num)', 'ProductoController::delete/$1');  
$routes->get('/productos/visualizar', 'ProductoController::visualizar');  




$routes->get('/locales', 'Locales::index');
$routes->get('/locales/add', 'Locales::add');
$routes->post('/locales/insert', 'Locales::insert');
$routes->get('/locales/edit/(:num)', 'Locales::edit/$1');
$routes->post('/locales/update', 'Locales::update');
$routes->get('/locales/delete/(:num)', 'Locales::delete/$1');




//contacto
$routes->get('contacto/add', 'ContactoController::add');
$routes->post('contacto/insert', 'ContactoController::insert');
$routes->get('contacto/show_contactos', 'ContactoController::show_contactos');
$routes->get('contacto/delete/(:num)', 'ContactoController::delete/$1');







$routes->get('usuarios', 'Usuarios::index');
$routes->get('usuarios/add', 'Usuarios::add');
$routes->post('usuarios/insert', 'Usuarios::insert');
$routes->get('usuarios/edit/(:num)', 'Usuarios::edit/$1');
$routes->post('usuarios/update/(:num)', 'Usuarios::update/$1');
$routes->get('usuarios/delete/(:num)', 'Usuarios::delete/$1');




$routes->get('ventas', 'ProductoController::venta');
$routes->get('venta/detalle/(:num)', 'ProductoController::detalleVenta/$1');







