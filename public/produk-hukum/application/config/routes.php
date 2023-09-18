<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Front_controller/index';
$route['kategori/(:any)'] = 'Front_controller/kategori/$1';
$route['kategori/(:any)/(:num)'] = 'Front_controller/kategori/$1/$2';

$route['semua'] = 'Front_controller/semua';
$route['semua/(:num)'] = 'Front_controller/semua/$1';

$route['pencarian'] = 'Front_controller/pencarian';
$route['download/(:num)'] = 'Front_controller/download/$1';


$route['detail/(:any)/(:num)'] = 'Front_controller/detail/$1/$2';
$route['administrator/login'] = 'admin/Auth/index';
$route['administrator/logout'] = 'admin/Auth/logout';
$route['administrator'] = 'admin/Konten/index';

$route['administrator/kategori'] = 'admin/Konten/kategori';
$route['administrator/kategori/tambah'] = 'admin/Konten/tambah_cat';
$route['administrator/kategori/ubah/(:num)'] = 'admin/Konten/ubah_cat/$1';
$route['administrator/kategori/hapus/(:num)'] = 'admin/Konten/delete_kategori/$1';

$route['administrator/produk-hukum'] = 'admin/Konten/produk';
$route['administrator/produk-hukum/tambah'] = 'admin/Konten/produk_tambah';
$route['administrator/produk-hukum/ubah/(:num)'] = 'admin/Konten/produk_ubah/$1';
$route['administrator/produk-hukum/hapus/(:num)'] = 'admin/Konten/delete_produk/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
