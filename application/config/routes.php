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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
	custom route
*/

$route['login'] = 'Auth/Auth/login';
$route['auth/logout'] = 'Auth/Auth/logout';

// routing siswa
# 1. Routing jadwal
$route['siswa/jadwal'] = 'Siswa/Jadwal';
$route['siswa/jadwal/(:any)'] = 'Siswa/Jadwal/$1';
$route['siswa/jadwal/(:any)/(:any)'] = 'Siswa/Jadwal/$1/$2';
$route['siswa/jadwal/(:any)/(:any)/(:any)'] = 'Siswa/Jadwal/$1/$2/$3';

# 2. Routing profile
$route['siswa/profile'] = 'Siswa/Profile';
$route['siswa/profile/(:any)'] = 'Siswa/Profile/$1';
$route['siswa/profile/(:any)/(:any)'] = 'Siswa/Profile/$1/$2';
$route['siswa/profile/(:any)/(:any)/(:any)'] = 'Siswa/Profile/$1/$2/$3';

# 3. Routing ruang materi pembelajaran
$route['siswa/materi'] = 'Siswa/Materi';
$route['siswa/materi/(:any)'] = 'Siswa/Materi/$1';
$route['siswa/materi/(:any)/(:any)'] = 'Siswa/Materi/$1/$2';
$route['siswa/materi/(:any)/(:any)/(:any)'] = 'Siswa/Materi/$1/$2/$3';

# 4. Routing ruang absensi
$route['siswa/absensi'] = 'Siswa/Absen';
$route['siswa/absensi/(:any)'] = 'Siswa/Absen/$1';
$route['siswa/absensi/(:any)/(:any)'] = 'Siswa/Absen/$1/$2';
$route['siswa/absensi/(:any)/(:any)/(:any)'] = 'Siswa/Absen/$1/$2/$3';

# 5. Routing ruang tugas
$route['siswa/ruang_tugas'] = 'Siswa/Tugas';
$route['siswa/ruang_tugas/(:any)'] = 'Siswa/Tugas/$1';
$route['siswa/ruang_tugas/(:any)/(:any)'] = 'Siswa/Tugas/$1/$2';
$route['siswa/ruang_tugas/(:any)/(:any)/(:any)'] = 'Siswa/Tugas/$1/$2/$3';

# 6. Routing ruang evaluasi
$route['siswa/evaluasi'] = 'Siswa/Evaluasi';
$route['siswa/evaluasi/(:any)'] = 'Siswa/Evaluasi/index/$1';
$route['siswa/evaluasi/(:any)/(:any)'] = 'Siswa/Evaluasi/$1/$2';
$route['siswa/evaluasi/(:any)/(:any)/(:any)'] = 'Siswa/Evaluasi/$1/$2/$3';

# 7. Routing ruang diskusi
$route['siswa/diskusi'] = 'Siswa/Diskusi';
$route['siswa/diskusi/(:any)'] = 'Siswa/Diskusi/$1';
$route['siswa/diskusi/(:any)/(:any)'] = 'Siswa/Diskusi/$1/$2';
$route['siswa/diskusi/(:any)/(:any)/(:any)'] = 'Siswa/Diskusi/$1/$2/$3';

// routing wali kelas
$route['wali-kelas/dashboard'] = 'WaliKelas/Dashboard/index';

// routing admin
$route['authadmin'] = 'Admin/Login';
$route['authadmin/logout'] = 'Admin/Login/logout';

$route['master/dashboard'] = 'Admin/Dashboard';
$route['master/dashboard/(:any)'] = 'Admin/Dashboard/$1';
$route['master/dashboard/(:any)/(:any)'] = 'Admin/Dashboard/$1/$2';
$route['master/dashboard/(:any)/(:any)/(:any)'] = 'Admin/Dashboard/$1/$2/$3';

$route['master/jadwal'] = 'Admin/Jadwal';
$route['master/jadwal/(:any)'] = 'Admin/Jadwal/$1';
$route['master/jadwal/(:any)/(:any)'] = 'Admin/Jadwal/$1/$2';
$route['master/jadwal/(:any)/(:any)/(:any)'] = 'Admin/Jadwal/$1/$2/$3';


$route['master/data/kelas'] = 'Admin/Data/dataKelas';
$route['master/data/kelas/(:any)'] = 'Admin/Data/$1';
$route['master/data/kelas/(:any)/(:any)'] = 'Admin/Data/$1/$2';

$route['master/data/mata-pelajaran'] = 'Admin/Data/dataMapel';
$route['master/data/mata-pelajaran/(:any)'] = 'Admin/Data/$1';
$route['master/data/mata-pelajaran/(:any)/(:any)'] = 'Admin/Data/$1/$2';

$route['master/data/ruangan'] = 'Admin/Data/dataRuangan';
$route['master/data/ruangan/(:any)'] = 'Admin/Data/$1';
$route['master/data/ruangan/(:any)/(:any)'] = 'Admin/Data/$1/$2';

$route['master/data/siswa'] = 'Admin/Data/dataSiswa';
$route['master/data/siswa/kelas/(:any)'] = 'Admin/Data/dataSiswa/$1';
$route['master/data/siswa/(:any)'] = 'Admin/Data/$1';
$route['master/data/siswa/(:any)/(:any)'] = 'Admin/Data/$1/$2';
$route['master/data/siswa/(:any)/(:any)/(:any)'] = 'Admin/Data/$1/$2/$3';

$route['master/data/guru'] = 'Admin/Data/dataGuru';
$route['master/data/guru/(:any)'] = 'Admin/Data/$1';
$route['master/data/guru/(:any)/(:any)'] = 'Admin/Data/$1/$2';

$route['master/materi'] = 'Admin/Materi';
$route['master/materi/(:any)'] = 'Admin/Materi/$1';
$route['master/materi/(:any)/(:any)'] = 'Admin/Materi/$1/$2';
$route['master/materi/(:any)/(:any)/'] = 'Admin/Materi/$1/$2';

$route['master/jurnal'] = 'Admin/JurnalMateri';
$route['master/jurnal/(:any)'] = 'Admin/JurnalMateri/$1';
$route['master/jurnal/(:any)/(:any)'] = 'Admin/JurnalMateri/$1/$2';
$route['master/jurnal/(:any)/(:any)/(:any)'] = 'Admin/JurnalMateri/$1/$2/$3';

$route['master/info/info-akademik'] = 'Admin/Info/infoAkademik';
$route['master/info/tahun-ajar'] = 'Admin/Info/tahunPembelajaran';
$route['master/info/(:any)'] = 'Admin/Info/$1';
$route['master/info/(:any)/(:any)'] = 'Admin/Info/$1/$2';
$route['master/info/(:any)/(:any)/(:any)'] = 'Admin/Info/$1/$2/$3';

// routing guru
$route['guru/dashboard'] = 'Guru/Dashboard/index';

$route['guru/profile'] = 'Guru/Profile';
$route['guru/profile/(:any)'] = 'Guru/Profile/$1';
$route['guru/profile/(:any)/(:any)'] = 'Guru/Profile/$1/$2';

$route['guru/data'] = 'Guru/Data';
$route['guru/data/(:any)'] = 'Guru/Data/$1';
$route['guru/data/(:any)/(:any)'] = 'Guru/Data/$1/$2';
$route['guru/data/(:any)/kelas/(:any)'] = 'Guru/Data/$1/$2';

$route['guru/pembelajaran'] = 'Guru/Pembelajaran';
$route['guru/pembelajaran/(:any)'] = 'Guru/Pembelajaran/$1';
$route['guru/pembelajaran/(:any)/(:any)'] = 'Guru/Pembelajaran/$1/$2';


$route['guru/export/absensi_siswa/(:any)'] = 'Guru/Docs/export_absensi_siswa/$1';
