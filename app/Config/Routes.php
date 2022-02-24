<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('lugares', 'Lugares::index');
$routes->get('lugaresUsers', 'Lugares::Lugares');
$routes->get('login', 'Lugares::login');
$routes->get('validar', 'Lugares::validar_Login');
$routes->post('validar_user', 'Lugares::validar_User');
$routes->get('publicar/(:num)', 'Home::publicar/$1');
$routes->get('home', 'Home::home');
$routes->post('publicarForm', 'Lugares::validarLugar');
$routes->get('registrar_1', 'Home::registrar_1');
$routes->get('registrar', 'Home::registrar');
$routes->get('addTurista/(:num)', 'Home::addTurista/$1');
$routes->get('addHotel/(:num)', 'Home::addHotel/$1');
$routes->get('logout', 'Home::cerrarSesion');
$routes->get('atras', 'Home::atras');
$routes->get('hoteles', 'Hoteles::index');
$routes->post('hotelForm', 'Hoteles::validarHotel');
$routes->post('turistaForm', 'Turistas::validarTurista');
$routes->get('lugares/user', 'Lugares::lugaresUser');
$routes->get('hoteles/user', 'Hoteles::hotelesUser');
$routes->get('reservas/user', 'Turistas::Reservas');
$routes->get('verHotel/(:num)', 'Hoteles::verHotel/$1');
$routes->get('verHotelUser/(:num)', 'Hoteles::verHotelUser/$1');
$routes->get('trabajadores/list/(:num)', 'Hoteles::AddTrabajador/$1');
$routes->get('form/trabajador/(:num)', 'Trabajador::formAdd/$1');
$routes->post('dataFormTra', 'Trabajador::validarForm');
$routes->post('dataFormHab', 'Trabajador::validarFormHab');
$routes->get('edit/trabajador/(:num)', 'Trabajador::formEdit/$1');
$routes->post('update/trabajador', 'Trabajador::updateTrabajador');
$routes->get('eliminar/trabajador/(:num)', 'Trabajador::eliminarTrabajador/$1');
$routes->get('habilitar/trabajador/(:num)', 'Trabajador::habilitarTrabajador/$1');
$routes->get('empleado/habitaciones/(:num)', 'Hoteles::habitacionesEmpleado/$1');
$routes->get('form/habitacion/(:num)', 'Hoteles::formAddHabitacion/$1');
$routes->get('edit/habitacion/(:num)', 'Trabajador::formEditHab/$1');
$routes->post('editFormHab', 'Trabajador::editHabitacion');
$routes->get('eliminar/habitacion/(:num)', 'Trabajador::eliminarHabitacion/$1');
$routes->get('habilitar/habitacion/(:num)', 'Trabajador::habilitarHabitacion/$1');
$routes->get('empleado/reservar/(:num)', 'Trabajador::reservaUser/$1');
$routes->get('empleado/res/(:num)', 'Trabajador::reserva/$1');
$routes->post('addReserva', 'Trabajador::addReserva');
$routes->get('reservas', 'Trabajador::mosReservas');
$routes->get('inspeccionar/reserva/(:num)', 'Trabajador::inspeccionar/$1');
$routes->get('aprobar/(:num)', 'Trabajador::aprobar/$1');
$routes->post('denegar', 'Trabajador::denegar');
$routes->get('reservasA', 'Trabajador::mosReservasA');
$routes->get('inspeccionar/reservasA/(:num)', 'Trabajador::inspeccionarA/$1');
$routes->get('inspeccionar/user/(:num)', 'Turistas::inspeccionar/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
