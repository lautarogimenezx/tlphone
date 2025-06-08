<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('/registrarse', 'Usuarios_controller::create');
$routes->post('/enviar-form', 'Usuarios_controller::formValidation');
$routes->get('/usuarios', 'Usuarios_controller::index');
$routes->get('usuarios/baja/(:num)', 'Usuarios_controller::baja/$1');
$routes->get('usuarios/alta/(:num)', 'Usuarios_controller::alta/$1');
$routes->get('usuario/perfil', 'Usuarios_controller::perfil');
$routes->post('usuario/actualizar_perfil', 'Usuarios_controller::actualizar_perfil');

$routes->get('/enviarlogin', 'Login_controller::auth');
$routes->get('/iniciosesion', 'Login_controller::index');
$routes->post('/iniciosesion', 'Login_controller::auth');
$routes->get('/logout', 'Login_controller::logout'); 

$routes->get('productosactivos', 'Producto_controller::index');
$routes->get('catalogo', 'Producto_controller::catalogo');
$routes->get('catalogo/(:num)', 'Producto_controller::catalogo/$1');
$routes->get('altaproducto', 'Producto_controller::creaproducto');
$routes->post('productos/store', 'Producto_controller::store');
$routes->get('productos/edit/(:num)', 'Producto_controller::edit/$1');
$routes->post('productos/update/(:num)', 'Producto_controller::update/$1');
$routes->get('productos/delete/(:num)', 'Producto_controller::delete/$1');
$routes->get('productos/eliminados', 'Producto_controller::eliminados');
$routes->get('productos/reactivar/(:num)', 'Producto_controller::reactivar/$1');

$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/terminos', 'Home::terminos');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/favoritos', 'Home::favoritos');

$routes->get('carrito', 'Carrito_controller::index');
$routes->post('carrito/add', 'Carrito_controller::add');
$routes->post('carrito/actualiza_carrito', 'Carrito_controller::actualiza_carrito');
$routes->post('carrito/eliminar_item', 'Carrito_controller::eliminar_item');
$routes->post('carrito/vaciar_carrito', 'Carrito_controller::vaciar_carrito');
$routes->get('compras/mis_compras', 'Carrito_controller::verComprasUsuario');
$routes->get('factura/ver/(:num)', 'Carrito_controller::verFactura/$1');
$routes->get('carrito/finalizar_compra', 'Carrito_controller::finalizarCompra');

$routes->get('ventas/mis_compras', 'Ventas_controller::mis_compras');
$routes->get('ventas/ver_factura/(:num)', 'Ventas_controller::ver_factura/$1');
$routes->post('ventas/registrar_venta', 'Ventas_controller::registrar_venta');
$routes->get('ruta/a/checkout', 'Ventas_controller::registrar_venta');
$routes->get('ventas', 'Ventas_controller::todas_las_ventas');

$routes->get('contacto', 'Consultas_controller::index');
$routes->post('contacto/enviar', 'Consultas_controller::enviar');
$routes->get('consultas', 'Consultas_controller::verConsultas');









/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}