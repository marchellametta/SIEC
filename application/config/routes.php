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

$route['login'] = 'C_login/index';
$route['logout'] = 'C_login/logout';
$route['acl'] = 'C_acl/index';
$route['change-role/(:num)'] = 'C_login/changeRole/$1';
$route['kelola-beranda'] = 'C_beranda/edit';
$route['kelola-berita/(:num)'] = 'C_beranda/editBerita/$1';
$route['hapus-berita/(:num)'] = 'C_beranda/hapusBerita/$1';
$route['tambah-berita'] = 'C_beranda/tambahBerita';

$route['kelas/laporan/(:num)'] = 'C_laporan/index/$1';
$route['kelas/laporan/unduh/(:num)'] = 'C_laporan/unduh/$1';


$route['informasi/aktif'] = 'C_informasi/aktif';
$route['informasi/riwayat'] = 'C_informasi/riwayat';
$route['informasi/mendatang'] = 'C_informasi/akanDatang';
$route['tambahkelas'] = 'C_informasi/tambah';
$route['editkelas/(:num)'] = 'C_informasi/edit/$1';
$route['lokasi'] = 'C_lokasi/index';
$route['visimisi'] = 'C_visimisi/index';
$route['informasi/jadwal/(:num)'] = 'C_jadwal/index/$1';
$route['profil/(:num)'] = 'C_user_profile/view/$1';
$route['kelas-saya'] = 'C_kelas_user/aktif';
$route['kelas/aktif'] = 'C_kelas_panitia/aktif';
$route['kelas/riwayat'] = 'C_kelas_panitia/riwayat';
//$route['kelas/mendatang'] = 'C_kelas_panitia/akanDatang';
$route['kelas/peserta/topik/(:num)'] = 'C_kelas_panitia/pesertaTopik/$1';
$route['kelas/peserta/(:num)'] = 'C_kelas_panitia/pesertaEC/$1';
$route['kelas-saya/detail/(:num)'] = 'C_evaluasi/listEvaluasi/$1';
$route['kelas-saya/modul/(:num)'] = 'C_kelas_user/modul/$1';
$route['profil/editProfil/(:num)'] = 'C_user_profile/editProfil/$1';
$route['profil/editPassword/(:num)'] = 'C_user_profile/editPassword/$1';
$route['pendaftaran'] = 'C_pendaftaran/index';
$route['pendaftaran/panitia'] = 'C_pendaftaran/panitia';
$route['pendaftaran/panitia/assign'] = 'C_kelas_panitia/assign';
$route['pendaftaran/daftar'] = 'C_pendaftaran/daftar';
$route['pendaftaran/daftar-panitia'] = 'C_pendaftaran/daftarPanitia';
$route['informasi/detail/(:num)'] = 'C_informasi/detailEC/$1';
$route['upload-modul/(:num)'] = 'C_informasi/uploadModul/$1';
$route['kelas/absensi/(:num)'] = 'C_absensi/index/$1';
$route['kelas/absensi/daftar-topik/(:num)'] = 'C_absensi/getTopik/$1';
$route['kelas/pembayaran/(:num)'] = 'C_pembayaran/index/$1';
$route['kelas/pembayaran-tetap/(:num)'] = 'C_pembayaran/pembayaranTetap/$1';
$route['kelas/pembayaran-lepas/(:num)'] = 'C_pembayaran/pembayaranLepas/$1';
$route['kelas/cetak-sertifikat/(:num)'] = 'C_kelas_panitia/cetakSertifikat/$1';
$route['peserta/search'] = 'C_search_api/search_peserta';
$route['panitia/search'] = 'C_search_api/search_panitia';
$route['pekerjaan/search'] = 'C_search_api/search_pekerjaan';
$route['narasumber/search'] = 'C_search_api/search_narasumber';
$route['kelas-saya/isi-evaluasi/(:num)'] = 'C_evaluasi/evaluasiTema/$1';
$route['kelas-saya/isi-evaluasi/topik/(:num)'] = 'C_evaluasi/evaluasiTopik/$1';
