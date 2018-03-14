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
$route['default_controller'] = 'C_beranda/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Login_Controller/login';
$route['informasi'] = 'C_informasi/index';
$route['tambahkelas'] = 'C_informasi/tambah';
$route['lokasi'] = 'C_lokasi/index';
$route['visimisi'] = 'C_visimisi/index';
$route['informasi/jadwal/(:num)'] = 'C_jadwal/index/$1';
$route['profil/(:num)'] = 'C_user_profile/view/$1';
$route['kelas-saya'] = 'C_kelas_user/getEC';
$route['kelas'] = 'C_kelas_panitia/getEC';
$route['kelas-saya/detail/(:num)'] = 'C_kelas_user/getTopik/$1';
$route['profil/editProfil/(:num)'] = 'C_user_profile/editProfil/$1';
$route['profil/editPassword/(:num)'] = 'C_user_profile/editPassword/$1';
$route['pendaftaran'] = 'C_pendaftaran/index';
$route['pendaftaran/daftar'] = 'C_pendaftaran/daftar';
$route['informasi/detail/(:num)'] = 'C_informasi/detailEC/$1';
$route['kelas/absensi/(:num)'] = 'C_absensi/index/$1';
$route['kelas/absensi/daftar-topik/(:num)'] = 'C_absensi/getTopik/$1';
$route['kelas/cetak-sertifikat/(:num)'] = 'C_kelas_panitia/cetakSertifikat/$1';
$route['peserta/search'] = 'C_search_api/search_peserta';
