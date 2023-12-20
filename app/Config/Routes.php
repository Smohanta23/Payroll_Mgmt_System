<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index',['filter' => 'authenticated']);
$routes->get('/register', 'Auth::register',['filter' => 'authenticated']);
$routes->get('/Auth', 'Auth::index',['filter' => 'authenticated']);
$routes->get('/update_user', 'Auth::update_user',['filter' => 'authenticate']);
$routes->match(['post'], '/update_user', 'Auth::update_user',['filter' => 'authenticate']);
$routes->get('/Auth/(:segment)', 'Auth::$1',['filter' => 'authenticated']);
$routes->match(['post'], '/register', 'Auth::register',['filter' => 'authenticated']);
$routes->match(['post'], '/login', 'Auth::index',['filter' => 'authenticated']);
$routes->get('/logout', 'Auth::logout');

$routes->group('Main', ['filter'=>'authenticate'], static function($routes){
    $routes->get('', 'Main::index');
    $routes->get('(:segment)', 'Main::$1');
    $routes->get('(:segment)/(:any)', 'Main::$1/$2');
    $routes->match(['post'], 'user_add', 'Main::user_add');
    $routes->match(['post'], 'user_edit/(:num)', 'Main::user_edit/$1');
    $routes->match(['post'], 'department_edit/(:num)', 'Main::department_edit/$1');
    $routes->match(['post'], 'department_add', 'Main::department_add/$1');
    $routes->match(['post'], 'designation_edit/(:num)', 'Main::designation_edit/$1');
    $routes->match(['post'], 'designation_add', 'Main::designation_add/$1');
    $routes->match(['post'], 'employee_edit/(:num)', 'Main::employee_edit/$1');
    $routes->match(['post'], 'employee_add', 'Main::employee_add/$1');
    $routes->match(['post'], 'payroll_edit/(:num)', 'Main::payroll_edit/$1');
    $routes->match(['post'], 'payroll_add', 'Main::payroll_add/$1');
    $routes->match(['post'], 'payslip_edit/(:num)', 'Main::payslip_edit/$1');
    $routes->match(['post'], 'payslip_add', 'Main::payslip_add/$1');
});



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
