<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error_404';

$route['kegiatan/([a-zA-Z0-9_-]+)'] = 'annual_report/propinsi/$1'; // Laporan Tahun Propinsi
$route['kegiatan/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)'] = 'annual_report/kegiatan/$1/$2'; // View Kegiatan Laporan Tahunan
$route['kegiatan/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/add'] = 'annual_report/kegiatan/$1/$2/add'; // Add Kegiatan Laporan Tahunan
$route['kegiatan/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)'] = 'annual_report/kegiatan/$1/$2/edit/$3'; // Edit Kegiatan Laporan Tahunan

$route['peserta/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)'] = 'annual_report/peserta/$1/$2/$3'; // View Peserta Kegiatan Laporan Tahunan
$route['peserta/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/add'] = 'annual_report/peserta/$1/$2/$3/add'; // View Peserta Kegiatan Laporan Tahunan
$route['peserta/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/search'] = 'annual_report/peserta/$1/$2/$3/search'; // Search Peserta Kegiatan Laporan Tahunan
$route['peserta/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/import'] = 'annual_report/peserta/$1/$2/$3/import'; // Import Peserta Kegiatan Laporan Tahunan
$route['peserta/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/export'] = 'annual_report/peserta/$1/$2/$3/export'; // Import Peserta Kegiatan Laporan Tahunan
$route['peserta/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/import/upload'] = 'annual_report/peserta/$1/$2/$3/import/upload'; // Import Peserta Kegiatan Laporan Tahunan (Proses upload)
$route['peserta/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)'] = 'annual_report/peserta/$1/$2/$3/edit/$4'; // Edit Peserta Kegiatan Laporan Tahunan
$route['peserta/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/detail'] = 'annual_report/peserta/$1/$2/$3/detail/$4/detail'; // Edit Peserta Kegiatan Laporan Tahunan

$route['kategori'] = 'kategori/tahun'; 
$route['kategori/([a-zA-Z0-9_-]+)'] = 'kategori/lihat_kategori/$1'; // Laporan Tahun Kategori Kegiatan
$route['kategori/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)'] = 'kategori/kegiatan/$1/$2'; // View Kegiatan Laporan Kategori Kegiatan Tahunan
$route['peserta_kategori/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)'] = 'kategori/peserta/$1/$2/$3'; // View Peserta Kegiatan Laporan Kategori Kegiatan Tahunan
$route['peserta_kategori/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/search'] = 'kategori/peserta/$1/$2/$3/search'; // Search Peserta Kegiatan Laporan Tahunan
$route['peserta_kategori/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/([a-zA-Z0-9_-]+)/detail'] = 'kategori/peserta/$1/$2/$3/detail/$4/detail'; // Edit Peserta Kegiatan Laporan Tahunan

/* End of file routes.php */
/* Location: ./application/config/routes.php */
