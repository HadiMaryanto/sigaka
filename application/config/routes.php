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
$route['manpower/tambah/(:any)'] = 'ManpowerController/tambah/$1';
$route['manpower/pekerjabaru/(:any)'] = 'ManpowerController/pekerjabaru/$1';
$route['manpower/potongan/(:any)'] = 'ManpowerController/potongan/$1';
$route['manpower/ubahPot/(:any)'] = 'ManpowerController/ubahPot/$1';
$route['manpower/laporan/(:any)'] = 'ManpowerController/laporan/$1';

$route['project'] = 'ProjectController';
$route['project/lihat/(:any)'] = 'ProjectController/lihat/$1';
$route['project/detail/(:any)'] = 'ProjectController/detail/$1';
$route['project/tambah/(:any)'] = 'ProjectController/tambah/$1';
$route['project/pekerjabaru/(:any)'] = 'ProjectController/pekerjabaru/$1';
$route['project/potongan/(:any)'] = 'ProjectController/potongan/$1';
$route['project/ubahPot/(:any)'] = 'ProjectController/ubahPot/$1';
$route['project/laporan/(:any)'] = 'ProjectController/laporan/$1';

$route['contract'] = 'ContractController';
$route['contract/lihat/(:any)'] = 'ContractController/lihat/$1';
$route['contract/detail/(:any)'] = 'ContractController/detail/$1';
$route['contract/tambah/(:any)'] = 'ContractController/tambah/$1';
$route['contract/pekerjabaru/(:any)'] = 'ContractController/pekerjabaru/$1';
$route['contract/potongan/(:any)'] = 'ContractController/potongan/$1';
$route['contract/ubahPot/(:any)'] = 'ContractController/ubahPot/$1';
$route['contract/laporan/(:any)'] = 'ContractController/laporan/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
