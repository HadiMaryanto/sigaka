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
$route['default_controller'] = 'welcome';
$route['login'] = 'AuthController/login';
$route['karyawan'] = 'KaryawanController/index';
$route['karyawan/tambah'] = 'KaryawanController/tambah';
$route['karyawan/edit/(:any)'] = 'KaryawanController/edit/$1';
$route['karyawan/edit'] = 'KaryawanController/edit';
$route['karyawan/delete/(:any)'] = 'KaryawanController/delete/$1';
$route['jabatan'] = 'JabatanController/index';
$route['jabatan/tambah'] = 'JabatanController/tambah';
$route['jabatan/edit/(:any)'] = 'JabatanController/edit/$1';
$route['jabatan/edit'] = 'JabatanController/edit';
$route['jabatan/delete/(:any)'] = 'JabatanController/delete/$1';
$route['logout'] = 'AuthController/logout';
$route['absen'] = 'AbsenController/index';
$route['absen/tambah'] = 'AbsenController/tambah';
$route['absen/edit'] = 'AbsenController/edit';
$route['gaji'] = 'GajiController/index';
$route['gaji/detail/(:any)'] = 'GajiController/detail/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
