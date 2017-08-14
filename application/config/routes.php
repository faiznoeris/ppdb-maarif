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
$route['default_controller'] = 'index/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*--------------------------------------------------*/

/*
*		MAIN & AUTH PAGES
*/


$route['jurusan'] = 'index/jurusan';
$route['home'] = 'index/home';
$route['pengumuman'] = 'index/pengumuman';
$route['pendaftaran'] = 'index/daftar';
$route['login'] = 'index/login';

$route['login/forgotpassword'] = 'index/forgotpassword';


/*
*		DASHBOARD
*/


$route['dashboard'] = 'index/dashboard';
$route['dashboard/datapendaftar'] = 'index/datapendaftar';
$route['dashboard/datapendaftar/edit/(:num)'] = 'index/editdatapendaftar/$1';
$route['dashboard/datapendaftar/view/(:num)'] = 'index/lihatdatapendaftar/$1';

$route['dashboard/adduser'] = 'index/adduser';


$route['dashboard/pengaturan'] = 'index/pengaturan';
$route['dashboard/pengaturan/thajaran/add'] = 'index/addthajaran';
$route['dashboard/pengaturan/thajaran/edit/(:num)'] = 'index/editthajaran/$1';
$route['dashboard/pengaturan/kuota/edit/(:num)'] = 'index/editkuota/$1';


$route['dashboard/datasiswa'] = 'index/datasiswa';
$route['dashboard/datablacklist'] = 'index/datablacklist';
$route['dashboard/editprofile'] = 'index/editprofile';
$route['dashboard/seleksipendaftar'] = 'index/seleksipendaftar';
$route['dashboard/daftarulang'] = 'index/daftarulang';


/*
*		GAGAL / SUKSES PAGES
*/

$route['dashboard/adduser/sukses'] = 'index/adduser/sukses';
$route['dashboard/adduser/gagal'] = 'index/adduser/gagal';

$route['pendaftaran/sukses'] = 'index/daftar/sukses';
$route['pendaftaran/gagal'] = 'index/daftar/gagal';

$route['login/gagal'] = 'index/login/gagal';

$route['login/forgotpassword/sukses'] = 'index/forgotpassword/sukses';
$route['login/forgotpassword/gagal'] = 'index/forgotpassword/gagal';

//$route['viewuser/(:num)'] = "/index/viewuser/$1";

