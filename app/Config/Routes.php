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

$routes->get('/party', 'PartyController::present');

$routes->get('/', 'CustomerController::presentDashboard');

// ROUTES GROUP : AUTHENTICATION
$routes->add('/auth/login', 'AuthController::login');
$routes->add('/auth/login_process', 'AuthController::login_process');
$routes->add('/auth/register', 'AuthController::register');
$routes->add('/auth/register_process', 'AuthController::register_process');

$routes->add('/auth/logout', 'AuthController::logout');

// ROUTES GROUP : -- POV ADMIN --
$routes->add('/admin', 'AdminController::dashboard');
$routes->add('/admin/dashboard', 'AdminController::dashboard');
$routes->add('/admin/tambah_pelanggan', 'AdminController::tambah_pelanggan');
$routes->add('/admin/users', 'UserController::list_user');
$routes->add('/admin/users_add', 'UserController::add_user');
$routes->add('/admin/users_edit/(:any)', 'UserController::edit_user/$1');
$routes->add('/admin/edit_user_process', 'UserController::edit_user_process');
$routes->add('/admin/edit_user_inactive/(:any)', 'UserController::edit_user_inactive/$1');

$routes->add('/admin/events', 'EventController::list_event');

// ROUTES GROUP : -- POV GUEST --
$routes->add('event/tambah_event', 'GuestController::tambah_event');

// ROUTES GROUP : -- POV CUSTOMER --
$routes->add('/customer', 'CustomerController::present');
$routes->add('/customer/event_selected/(:num)/(:any)/(:any)', 'CustomerController::requestEventSelected/$1/$2/$3');
$routes->add('/customer/event_selected/(:num)/(:any)', 'CustomerController::requestHomeEventSelected/$1/$2');

$routes->add('/customer/dashboard', 'CustomerController::present');

$routes->add('/customer/tema', 'CustomerThemeController::present');
$routes->add('/customer/tema/select', 'CustomerThemeController::requestSelect');

$routes->add('/customer/tamu', 'CustomerGuestController::present');
$routes->add('/customer/tamu/create', 'CustomerGuestController::requestCreate');
$routes->add('/customer/tamu/update', 'CustomerGuestController::requestUpdate');
$routes->add('/customer/tamu/delete/(:num)', 'CustomerGuestController::requestDelete/$1');

$routes->add('/customer/buku-tamu', 'CustomerGuestBookController::present');
$routes->add('/customer/buku-tamu/pdf', 'CustomerPDFController::present');

// Wedding
$routes->add('/customer/kelola-konten-undangan/general', 'WeddingGeneralController::present');
$routes->add('/customer/kelola-konten-undangan/general/update', 'WeddingGeneralController::requestUpdate');
$routes->add('/customer/kelola-konten-undangan/general/music/select', 'WeddingGeneralController::requestSelectMusic');

$routes->add('/customer/kelola-konten-undangan/galeri', 'WeddingGalleryController::presentGallery');
$routes->add('/customer/kelola-konten-undangan/galeri/create', 'WeddingGalleryController::requestCreateGallery');
$routes->add('/customer/kelola-konten-undangan/galeri/change-option', 'WeddingGalleryController::requestUpdateGalleryOption');

$routes->add('/customer/kelola-konten-undangan/halaman-utama', 'WeddingCoverController::presentCover');
$routes->add('/customer/kelola-konten-undangan/halaman-utama/create', 'WeddingCoverController::requestCreateCover');
$routes->add('/upload_controller/upload', 'WeddingCoverController::requestCreateCover');

$routes->add('/customer/kelola-konten-undangan/profil', 'WeddingProfileController::present');
$routes->add('/customer/kelola-konten-undangan/profil/create', 'WeddingProfileController::requestCreate');
$routes->add('/customer/kelola-konten-undangan/profil/update', 'WeddingProfileController::requestUpdate');

$routes->add('/customer/kelola-konten-undangan/hadiah', 'WeddingGiftController::present');
$routes->add('/customer/kelola-konten-undangan/hadiah/create', 'WeddingGiftController::requestCreate');
$routes->add('/customer/kelola-konten-undangan/hadiah/update', 'WeddingGiftController::requestUpdate');
$routes->add('/customer/kelola-konten-undangan/hadiah/delete/(:num)', 'WeddingGiftController::requestDelete/$1');

$routes->add('/customer/kelola-konten-undangan/akad-resepsi', 'WeddingReceptionController::present');
$routes->add('/customer/kelola-konten-undangan/akad-resepsi/create', 'WeddingReceptionController::requestCreate');
$routes->add('/customer/kelola-konten-undangan/akad-resepsi/update', 'WeddingReceptionController::requestUpdate');
$routes->add('/customer/kelola-konten-undangan/akad-resepsi/delete/(:num)', 'WeddingReceptionController::requestDelete/$1');

$routes->add('/customer/kelola-konten-undangan/love-story', 'WeddingLoveStoryController::present');
$routes->add('/customer/kelola-konten-undangan/love-story/create', 'WeddingLoveStoryController::requestCreate');
$routes->add('/customer/kelola-konten-undangan/love-story/create_photo', 'WeddingLoveStoryController::requestSubmitPhoto');

// GUEST 
$routes->get('/(:segment)/invitation', 'GuestHomeController::present/$1');
$routes->add('/(:segment)/submit-rsvp', 'GuestHomeController::requestSubmitRSVP');

$routes->add('/test', 'GuestHomeController::presentTest');



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
