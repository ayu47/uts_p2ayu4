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
//VIEW
$routes->get('/', 'Home::index');
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/dosen', 'Dosen::index');
$routes->get('/admin', 'admin::index');

//UPDATE VIEW
$routes->get('/mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('/dosen/update/(:num)', 'Dosen::update/$1');
$routes->get('/admin/update/(:num)', 'admin::update/$1');
//EDIT 
$routes->post('/mahasiswa/edit/', 'Mahasiswa::edit/$1');
$routes->post('/dosen/edit/', 'Dosen::edit/$1');
$routes->post('/admin/edit/', 'Admin::edit/$1');
//INSERT VIEW
$routes->add('/mahasiswa/input/', 'Mahasiswa::input');
$routes->add('dosen/input/', 'Dosen::input');
$routes->add('admin/input/', 'Admin::input');

//INSERT
$routes->add('/mahasiswa/insert/', 'Mahasiswa::insert');
$routes->add('/dosen/insert/', 'Dosen::insert');
$routes->add('/admin/insert/', 'Admin::insert');

//DELETE
$routes->add('/mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
$routes->add('/dosen/delete/(:num)', 'Dosen::delete/$1');
$routes->add('/admin/delete/(:num)', 'Admin::delete/$1');
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
