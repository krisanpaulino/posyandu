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
$routes->get('pencarian', 'Antropometri::pencarian');
$routes->get('hasilukur', 'Antropometri::daftarHasil');
$routes->get('hasilukur/(:num)', 'Antropometri::detailUkurFront/$1');
$routes->get('auth', 'Auth::loginPage');
$routes->post('login', 'Auth::login');
$routes->post('logout', 'Auth::logout');

$routes->group('admin', ['filter' => 'admin'], static function ($routes) {
    $routes->get('/', 'Home::admin');
    $routes->get('admin', 'User::admin');
    $routes->post('admin/tambah', 'User::storeAdmin');
    $routes->post('user/hapus', 'User::deleteAdmin');
    $routes->post('petugas/hapus', 'User::deletePetugas');

    $routes->get('petugas', 'User::petugas');
    $routes->post('petugas/tambah', 'User::storePetugas');
    $routes->get('petugas/(:num)', 'User::detailPetugas/$1');
    $routes->post('petugas/update', 'User::updatePetugas');

    $routes->get('posyandu', 'Posyandu::index');
    $routes->post('posyandu/tambah', 'Posyandu::store');
    $routes->post('posyandu/hapus', 'Posyandu::hapus');

    $routes->get('/', 'Home::petugas');
    $routes->get('balita', 'Balita::index');
    $routes->get('balita/(:num)', 'Balita::detail/$1');
    $routes->post('balita/tambah', 'Balita::store');
    $routes->post('balita/update', 'Balita::update');
    $routes->post('balita/hapus', 'Balita::delete');
    $routes->post('balita/buat-akun', 'Balita::buatAkun');

    $routes->get('periode', 'Periode::index');
    $routes->post('periode/tambah', 'Periode::store');
    $routes->post('periode/buka', 'Periode::buka');
    $routes->post('periode/selesai', 'Periode::selesai');

    $routes->get('ambangbatas', 'Master::ambangbatas');
    $routes->post('ambangbatas/tambah', 'Master::store_ambangbatas');
    $routes->post('ambangbatas/update', 'Master::update_ambangbatas');
    $routes->post('ambangbatas/hapus', 'Master::delete_ambangbatas');

    $routes->get('kriteria', 'Master::kriteria');
    $routes->post('kriteria/tambah', 'Master::store_kriteria');
    $routes->post('kriteria/hapus', 'Master::delete_kriteria');

    $routes->get('statusgizi', 'Master::statusgizi');
    $routes->get('statusgizi/(:num)', 'Master::edit_statusgizi/$1');
    $routes->post('statusgizi/tambah', 'Master::store_statusgizi');
    $routes->post('statusgizi/hapus', 'Master::delete_statusgizi');
    $routes->post('statusgizi/update', 'Master::update_statusgizi');

    $routes->get('hasilukur', 'Antropometri::index');
    $routes->post('antropometri/hitung', 'Antropometri::hitung');
    $routes->get('hasilukur/(:num)', 'Antropometri::posyandu/$1');
    $routes->get('hasilukur/(:num)/posyandu/(:num)', 'Antropometri::detailAdmin/$1/$2');
    $routes->get('hasilukur/(:num)/detail/(:num)', 'Antropometri::detailUkur/$1/$2');

    $routes->get('cetak-hasil/(:num)/(:num)', 'Antropometri::cetakHasil/$1/$2');
    $routes->get('laporan-hasil/(:num)/(:num)', 'Antropometri::laporanHasil/$1/$2');
});

$routes->group('petugas', ['filter' => 'petugas'], static function ($routes) {
    $routes->get('/', 'Home::petugas');
    $routes->get('balita', 'Balita::index');
    $routes->get('balita/(:num)', 'Balita::detail/$1');
    $routes->post('balita/tambah', 'Balita::store');
    $routes->post('balita/update', 'Balita::update');
    $routes->post('balita/hapus', 'Balita::delete');
    $routes->post('balita/buat-akun', 'Balita::buatAkun');

    $routes->get('periksa', 'Periksa::index');
    $routes->get('periksa/(:num)', 'Periksa::periksa/$1');
    $routes->get('periksa/detail/(:num)', 'Periksa::detail/$1');
    $routes->post('periksa/store', 'Periksa::store');

    $routes->get('hasilukur', 'Antropometri::index');
    $routes->post('antropometri/hitung', 'Antropometri::hitung');
    $routes->get('hasilukur/(:num)', 'Antropometri::detailPetugas/$1');

    $routes->get('profil', 'Profil::petugas');
    $routes->post('update-profil', 'Profil::updatePetugas');
    $routes->post('update-login', 'Profil::updateUser');

    $routes->get('cetak-hasil/(:num)/(:num)', 'Antropometri::cetakHasil/$1/$2');
    $routes->get('laporan-hasil/(:num)/(:num)', 'Antropometri::laporanHasil/$1/$2');

    $routes->get('hasilukur/(:num)/detail/(:num)', 'Antropometri::detailUkur/$1/$2');
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
