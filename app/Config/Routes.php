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


$routes->get('/enviarlogin', 'Login_controller::auth');
$routes->get('/iniciosesion', 'Login_controller::index');
$routes->post('/iniciosesion', 'Login_controller::auth');
$routes->get('/logout', 'Login_controller::logout'); 


$routes->get('productosactivos', 'Producto_controller::index');
$routes->get('altaproducto', 'Producto_controller::creaproducto');
$routes->post('productos/store', 'Producto_controller::store');
$routes->get('productos/edit/(:num)', 'Producto_controller::edit/$1');
$routes->post('productos/update/(:num)', 'Producto_controller::update/$1');
$routes->get('productos/delete/(:num)', 'Producto_controller::delete/$1');
$routes->get('productos/eliminados', 'Producto_controller::eliminados');
$routes->get('productos/reactivar/(:num)', 'Producto_controller::reactivar/$1');



$routes->get('/nosotros', 'Home::nosotros');
$routes->get('/contacto', 'Home::contacto');
$routes->get('/celulares', 'Home::celulares');
$routes->get('/relojes', 'Home::relojes');
$routes->get('/auriculares', 'Home::auriculares');
$routes->get('/parlantes', 'Home::parlantes');
$routes->get('/cargadores', 'Home::cargadores');
$routes->get('/fundas', 'Home::fundas');
$routes->get('/terminos', 'Home::terminos');
$routes->get('/comercializacion', 'Home::comercializacion');
$routes->get('/carrito', 'Home::carrito');
$routes->get('/favoritos', 'Home::favoritos');

$routes->get('/carrito', 'carrito_controller::index');

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