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
$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('robonesia_db')) {
        echo 'Database Created!';
    }
});

$routes->get('login', 'Auth::login');
$routes->get('register', 'Auth::register');

// $routes->get('/', 'Home');
$routes->addRedirect('/', 'home');

$routes->get('pengguna', 'Pengguna::index');
$routes->get('pengguna/edit/(:any)', 'Pengguna::edit/$1');
$routes->put('pengguna/(:any)', 'Pengguna::update/$1');
$routes->delete('pengguna/(:segment)', 'Pengguna::destroy/$1');

$routes->get('karyawansupply', 'KaryawanSupply::index');
$routes->get('karyawansupply/add', 'KaryawanSupply::create');
$routes->post('karyawansupply', 'KaryawanSupply::store');
$routes->get('karyawansupply/edit/(:any)', 'KaryawanSupply::edit/$1');
$routes->put('karyawansupply/(:any)', 'KaryawanSupply::update/$1');
$routes->delete('karyawansupply/(:segment)', 'KaryawanSupply::destroy/$1');

// DataMaster

$routes->get('supplier', 'Supplier::index');
$routes->get('supplier/add', 'Supplier::create');
$routes->post('supplier', 'Supplier::store');
$routes->get('supplier/edit/(:any)', 'Supplier::edit/$1');
$routes->put('supplier/(:any)', 'Supplier::update/$1');
$routes->delete('supplier/(:segment)', 'Supplier::destroy/$1');

$routes->get('barang', 'Barang::index');
$routes->get('barang/add', 'Barang::create');
$routes->post('barang', 'Barang::store');
$routes->get('barang/edit/(:num)', 'Barang::edit/$1');
$routes->put('barang/(:any)', 'Barang::update/$1');
$routes->delete('barang/(:segment)', 'Barang::destroy/$1');

$routes->get('satuanbarang', 'SatuanBarang::index');
$routes->get('satuanbarang/add', 'SatuanBarang::create');
$routes->post('satuanbarang', 'SatuanBarang::store');
$routes->get('satuanbarang/edit/(:num)', 'SatuanBarang::edit/$1');
$routes->put('satuanbarang/(:any)', 'SatuanBarang::update/$1');
$routes->delete('satuanbarang/(:segment)', 'SatuanBarang::destroy/$1');

// PemesananBarang

$routes->get('konsumen', 'Konsumen::index');
$routes->get('konsumen/add', 'Konsumen::create');
$routes->post('konsumen', 'Konsumen::store');
$routes->get('konsumen/edit/(:any)', 'Konsumen::edit/$1');
$routes->put('konsumen/(:any)', 'Konsumen::update/$1');
$routes->delete('konsumen/(:segment)', 'Konsumen::destroy/$1');


$routes->resource('pesanan', ['filter' => 'isLoggedIn']);

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
