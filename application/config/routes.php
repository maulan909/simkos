<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'Auth/login';
//Authentication Routes
$route['login'] = 'Auth/login';
$route['register'] = 'Auth/register';
$route['logout'] = 'Auth/logout';
$route['verify'] = 'Auth/verify';

$route['dasbor'] = 'Dashboard/dasbor';
//Kamar route
$route['daftar-kamar'] = 'Kamar/index';
$route['pilih-kamar'] = 'Kamar/pilih_kamar';
$route['edit-harga-kamar/(:any)'] = 'Kamar/edit/$1';
$route['aksi-edit-harga-kamar'] = 'Kamar/update';

//User route
$route['daftar-penghuni'] = 'User/index';
$route['get-detail-penghuni'] = 'User/get_detail_user';
$route['edit-penghuni/(:num)'] = 'User/edit_user/$1';
$route['hapus-penghuni/(:num)'] = 'User/hapus_penghuni/$1';
$route['ubah-pass'] = 'User/ubah_pass';

//Pembayaran route
$route['riwayat-pembayaran'] = 'Pembayaran/index';
$route['tambah-pembayaran/(:num)'] = 'Pembayaran/tambah_pembayaran/$1';
$route['hapus-pembayaran/(:num)'] = 'Pembayaran/hapus_pembayaran/$1';
$route['list-tagihan'] = 'Pembayaran/list_tagihan';
$route['tagihan-penghuni'] = 'Pembayaran/tagihan';

$route['daftar-user'] = 'c_admin/daftar_user';
$route['daftar-harga'] = 'c_admin/daftar_harga';
$route['daftar-ekspenghuni'] = 'c_admin/daftar_ekspenghuni';
$route['laporan-keuangan'] = 'c_admin/laporan_keuangan';

$route['tambah-user'] = 'c_admin/tambah_user';
$route['tambah-penghuni/(:num)'] = 'c_admin/tambah_penghuni/$1';
$route['edit-pembayaran/(:num)'] = 'c_admin/edit_pembayaran/$1';

$route['get-prodi'] = 'c_aksi/get_prodi';
$route['get-kamar'] = 'c_aksi/get_kamar';
$route['get-detail-kamar'] = 'c_aksi/get_detail_kamar';
$route['aksi-tambah-penghuni'] = 'c_aksi/aksi_tambah_penghuni';
$route['perpanjang/(:num)'] = 'c_aksi/perpanjang/$1';
$route['eks-penghuni/(:num)'] = 'c_aksi/eks_penghuni/$1';
$route['aksi-tambah-pembayaran'] = 'c_aksi/aksi_tambah_pembayaran';
$route['aksi-edit-pembayaran'] = 'c_aksi/aksi_edit_pembayaran';
$route['aksi-ubah-pass'] = 'c_aksi/aksi_ubah_pass';
$route['aksi-tambah-user'] = 'c_aksi/aksi_tambah_user';
$route['aksi-hapus-user/(:any)'] = 'c_aksi/aksi_hapus_user/$1';




$route['(c_admin|c_aksi|c_login)/(:any)'] = 'error404';

$route['404_override'] = 'error404';
$route['translate_uri_dashes'] = FALSE;
