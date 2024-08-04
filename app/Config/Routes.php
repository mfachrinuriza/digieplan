<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/party', 'PartyController::present');

$routes->get('/', 'CustomerController::present');

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
$routes->get('/(:segment)', 'GuestHomeController::present/$1');
$routes->get('/preview/(:segment)', 'GuestHomeController::presentPreview/$1');
$routes->add('/(:segment)/submit-rsvp', 'GuestHomeController::requestSubmitRSVP');
$routes->get('/(:segment)/get-wishses-list', 'GuestHomeController::requestUpdateWishesList/$1');

$routes->add('/test', 'GuestHomeController::presentTest');
