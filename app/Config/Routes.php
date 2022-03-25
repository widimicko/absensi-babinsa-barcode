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
// ! ============= Home ============
$routes->get('/', 'Home::index');
$routes->get('/absence/in', 'Home::in');
$routes->get('/absence/out', 'Home::out');
$routes->post('/absence/(:any)', 'Home::absence/$1');

// ! ============= Authentication ============
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::authenticate');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Member::index');

// ! ============= Member Resource ============
$routes->get('/dashboard/members', 'Member::index');
$routes->get('/dashboard/members/create', 'Member::create');
$routes->post('/dashboard/members/store', 'Member::store');
$routes->get('/dashboard/members/print/(:num)', 'Member::print/$1');
$routes->get('/dashboard/members/edit/(:num)', 'Member::edit/$1');
$routes->post('/dashboard/members/update/(:num)', 'Member::update/$1');
$routes->get('/dashboard/members/destroy/(:num)', 'Member::destroy/$1');

// ! ============= User Resource ============
$routes->get('/dashboard/users', 'User::index');
$routes->post('/dashboard/users/store', 'User::store');
$routes->post('/dashboard/users/update/(:num)', 'User::update/$1');
$routes->get('/dashboard/users/destroy/(:num)', 'User::destroy/$1');

// ! ============= Absence Resource ============
$routes->get('/dashboard/absences', 'Absence::index');
$routes->post('/dashboard/absences/filter', 'Absence::filter');



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
