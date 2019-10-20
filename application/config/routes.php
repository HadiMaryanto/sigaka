<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

$route['manpower'] = 'ManpowerController';
$route['manpower/lihat/(:any)'] = 'ManpowerController/lihat/$1';
$route['manpower/detail/(:any)'] = 'ManpowerController/detail/$1';
$route['manpower/tambah'] = 'ManpowerController/tambah';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
