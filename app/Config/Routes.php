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

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('/registrarse', 'Usuarios_controller::create');
$routes->post('/enviar-form', 'Usuarios_controller::formValidation');

$routes->get('/usuarios', 'Usuarios_controller::index', ['filter' => 'auth:admin']);
$routes->get('usuarios/baja/(:num)', 'Usuarios_controller::baja/$1', ['filter' => 'auth:admin']);
$routes->get('usuarios/alta/(:num)', 'Usuarios_controller::alta/$1', ['filter' => 'auth:admin']);
$routes->get('usuario/perfil', 'Usuarios_controller::perfil', ['filter' => 'auth']);
$routes->post('usuario/actualizar_perfil', 'Usuarios_controller::actualizar_perfil', ['filter' => 'auth']);
$routes->get('usuarios/cambiarRol/(:num)', 'Usuarios_controller::cambiarRol/$1', ['filter' => 'auth:admin']);

$routes->get('/enviarlogin', 'Login_controller::auth');
$routes->get('/iniciosesion', 'Login_controller::index');
$routes->post('/iniciosesion', 'Login_controller::auth');
$routes->get('/logout', 'Login_controller::logout', ['filter' => 'auth']);

$routes->get('productosactivos', 'Producto_controller::index', ['filter' => 'auth:admin']);
$routes->get('catalogo', 'Producto_controller::catalogo');
$routes->get('catalogo/(:num)', 'Producto_controller::catalogo/$1');

$routes->get('altaproducto', 'Producto_controller::creaproducto', ['filter' => 'auth:admin']);
$routes->post('productos/store', 'Producto_controller::store', ['filter' => 'auth']);
$routes->get('productos/edit/(:num)', 'Producto_controller::edit/$1', ['filter' => 'auth:admin']);
$routes->post('productos/update/(:num)', 'Producto_controller::update/$1', ['filter' => 'auth:admin']);
$routes->get('productos/delete/(:num)', 'Producto_controller::delete/$1', ['filter' => 'auth:admin']);
$routes->get('productos/eliminados', 'Producto_controller::eliminados', ['filter' => 'auth:admin']);
$routes->get('productos/reactivar/(:num)', 'Producto_controller::reactivar/$1', ['filter' => 'auth:admin']);
$routes->post('productos/borrar_definitivo/(:num)', 'Producto_controller::borrar_definitivo/$1', ['filter' => 'auth:admin']);


$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/terminos', 'Home::terminos');
$routes->get('/comercializacion', 'Home::comercializacion');

$routes->get('carrito', 'Carrito_controller::index', ['filter' => 'auth']);
$routes->post('carrito/add', 'Carrito_controller::add', ['filter' => 'auth']);
$routes->post('carrito/actualiza_carrito', 'Carrito_controller::actualiza_carrito', ['filter' => 'auth']);
$routes->post('carrito/eliminar_item', 'Carrito_controller::eliminar_item', ['filter' => 'auth']);
$routes->post('carrito/vaciar_carrito', 'Carrito_controller::vaciar_carrito', ['filter' => 'auth']);
$routes->get('compras/mis_compras', 'Carrito_controller::verComprasUsuario', ['filter' => 'auth']);
$routes->get('factura/ver/(:num)', 'Carrito_controller::verFactura/$1', ['filter' => 'auth']);
$routes->get('carrito/finalizar_compra', 'Carrito_controller::finalizarCompra', ['filter' => 'auth']);

$routes->get('ventas/mis_compras', 'Ventas_controller::mis_compras', ['filter' => 'auth']);
$routes->get('ventas/ver_factura/(:num)', 'Ventas_controller::ver_factura/$1', ['filter' => 'auth']);
$routes->get('ventas/ver_factura_admin/(:num)', 'Ventas_controller::ver_factura_admin/$1', ['filter' => 'auth:admin']);
$routes->post('ventas/registrar_venta', 'Ventas_controller::registrar_venta', ['filter' => 'auth']);
$routes->get('ruta/a/checkout', 'Ventas_controller::registrar_venta', ['filter' => 'auth']);
$routes->get('ventas', 'Ventas_controller::todas_las_ventas', ['filter' => 'auth:admin']);
$routes->get('ventas/descargar_factura/(:num)', 'Ventas_controller::descargar_factura/$1', ['filter' => 'auth']);
$routes->get('ventas/reporte_tiempo', 'Ventas_controller::reporte_tiempo', ['filter' => 'auth:admin']);
$routes->get('ventas/reporte_productos', 'Ventas_controller::reporte_productos', ['filter' => 'auth:admin']);
$routes->get('ventas/pdf_por_fecha/(:segment)', 'Ventas_controller::pdf_por_fecha/$1', ['filter' => 'auth:admin']);

$routes->get('contacto', 'Consultas_controller::index');
$routes->post('contacto/enviar', 'Consultas_controller::enviar');
$routes->get('consultas', 'Consultas_controller::verConsultas', ['filter' => 'auth:admin']);
$routes->post('consultas/cambiarRespondido/(:num)', 'Consultas_controller::cambiarRespondido/$1', ['filter' => 'auth:admin']);
$routes->post('consultas/eliminar/(:num)', 'Consultas_controller::eliminar/$1', ['filter' => 'auth:admin']);

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