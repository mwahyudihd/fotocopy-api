<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

//Login Route:
$routes->post('/login', 'LoginController::login');

$routes->put('pegawai_job/(:segment)', 'PegawaiJobController::ubah/$1');

//status pelanggan only
$routes->group('pelanggan_status', function($routes) {
    $routes->get('(:segment)', 'PelangganController::list_status/$1');
    $routes->put('(:segment)', 'PelangganController::ubah_status/$1');
});

$routes->get('pelanggan_status_pdk/(:segment)', 'PelangganController::list_status_pdk/$1');
$routes->get('pelanggan_status_js/(:segment)', 'PelangganController::list_status_js/$1');

#CRUD Produk routes
$routes->group('produk', function($routes) {
    $routes->post('/', 'ProdukController::create');
    $routes->get('/', 'ProdukController::list');
    $routes->get('(:segment)', 'ProdukController::detail/$1');
    $routes->put('(:segment)', 'ProdukController::ubah/$1');
    $routes->delete('(:segment)', 'ProdukController::hapus/$1');
});

#CRUD Jasa routes
$routes->group('jasa', function($routes) {
    $routes->post('/', 'JasaController::create');
    $routes->get('/', 'JasaController::list');
    $routes->get('(:segment)', 'JasaController::detail/$1');
    $routes->put('(:segment)', 'JasaController::ubah/$1');
    $routes->delete('(:segment)', 'JasaController::hapus/$1');
});

#CRUD Pelanggan routes
$routes->group('pelanggan', function($routes) {
    $routes->post('/', 'PelangganController::create');
    $routes->get('/', 'PelangganController::list');
    $routes->get('(:segment)', 'PelangganController::detail/$1');
    $routes->put('(:segment)', 'PelangganController::ubah/$1');
    $routes->delete('(:segment)', 'PelangganController::hapus/$1');
});

#CRUD Pegawai routes
$routes->group('pegawai', function($routes) {
    $routes->post('/', 'PegawaiController::create');
    $routes->get('/', 'PegawaiController::list');
    $routes->get('(:segment)', 'PegawaiController::detail/$1');
    $routes->put('(:segment)', 'PegawaiController::ubah/$1');
    $routes->delete('(:segment)', 'PegawaiController::hapus/$1');
});

#CRUD Absensi routes
$routes->group('absen', function($routes) {
    $routes->post('/', 'AbsensiController::create');
    $routes->get('/', 'AbsensiController::list');
    $routes->get('(:segment)', 'AbsensiController::detail/$1');
    $routes->put('(:segment)', 'AbsensiController::ubah/$1');
    $routes->delete('(:segment)', 'AbsensiController::hapus/$1');
});