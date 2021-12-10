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

$routes->get('/', 'Home::index');
$routes->get('service', 'Home::worker');
$routes->get('login', 'UserController::loginView');
$routes->post('login/proses', 'UserController::login', ['filter' => 'noauth']);

$routes->group('analis/nk', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'AnalisNKController::index');
    $routes->get('profile', 'AnalisNKController::profile');
    $routes->get('listnaskah', 'AnalisNKController::liatNaskah');
    $routes->get('viewpdfnaskah/(:num)', 'AnalisNKController::viewPDFNaskah/$1');
});

$routes->group('analis/sk', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'AnalisSKController::index');
    $routes->get('profile', 'AnalisSKController::profile');
    $routes->get('listnaskah', 'AnalisSKController::liatNaskah');
    $routes->get('viewpdfnaskah/(:num)', 'AnalisSKController::viewPDFNaskah/$1');
});

$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'RegularUserController::index');
    $routes->get('profile', 'RegularUserController::profile');
    $routes->get('surat', 'RegularUserController::kirimSurat');
    $routes->post('surat/proses', 'RegularUserController::kirimSuratProses');
});

$routes->group('superadmin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'SuperAdminController::index');
    $routes->get('user', 'SuperAdminController::user');
    $routes->get('user/ajaxList', 'SuperAdminController::ajaxList');
    $routes->get('tambah', 'SuperAdminController::tambah');
    $routes->post('tambah/proses', 'SuperAdminController::tambahUser');
    $routes->get('profile', 'SuperAdminController::profile');
    $routes->get('surat', 'SuperAdminController::surat');
    $routes->get('surat/edit/(:num)', 'SuperAdminController::editStatus/$1');
    $routes->post('update', 'SuperAdminController::updateStatus');
    $routes->get('surat/viewpdf/(:num)', 'SuperAdminController::viewPDF/$1');
    $routes->get('surat/viewpdfnaskah/(:num)', 'SuperAdminController::viewPDFNaskah/$1');
    $routes->get('surat/delete/(:num)', 'SuperAdminController::delete/$1');
    $routes->get('user/delete/(:num)', 'SuperAdminController::deleteUser/$1');
    $routes->get('user/edit/(:num)', 'SuperAdminController::viewEdit/$1');
    $routes->post('user/proses', 'SuperAdminController::prosesEdit');
    $routes->get('email', 'SuperAdminController::viewEmail');
    $routes->get('email/sent', 'SuperAdminController::sendMail');
});

$routes->get('logout', 'UserController::logout');

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
