<?php

function checkLoginUser()
{
	$CI = &get_instance();
	if ($CI->session->userdata('level') == 'siswa') {
		return redirect('siswa/jadwal');
	} elseif ($CI->session->userdata('level') == 'guru') {
		return redirect('guru/dashboard');
	} elseif ($CI->session->userdata('level') == 'wali-kelas') {
		return redirect('wali-kelas/dashboard');
	}
}

function isSiswaLogin()
{
	$CI = &get_instance();
	$CI->load->model('SiswaModel', 'siswa', true);
	$nisSiswa = $CI->session->userdata('nis');
	$userSiswa = $CI->siswa->getWhere(['siswa_nis' => $nisSiswa]);

	if (!$CI->session->userdata('logged_in')) {
		return redirect('login');
	} elseif (empty($userSiswa)) {
		$CI->session->sess_destroy();
		return redirect('login');
	}
}

function isSiswa()
{
	$CI = &get_instance();
	$levelUser = $CI->session->userdata('level');

	if ($levelUser != "siswa") {
		return redirect('block');
	}
}

function checkAdminLogin()
{
	$CI = &get_instance();
	$CI->load->model('GuruModel', 'guru', true);
	$admin = $CI->guru->getWhere(['guru_id' => $CI->session->userdata('adminId')]);
	if (empty($admin)) {
		return redirect('authadmin');
	}
}

function isAdmin()
{
	$CI = &get_instance();
	if ($CI->session->userdata('level') != 'admin') {
		return redirect('block');
	}
}

// untuk menampilkan icon notifikasi informasi akademik
function check_new_info()
{
	$CI = &get_instance();
	$CI->load->model('JadwalModel', 'jadwal', true);
	$new_info = $CI->jadwal->get_new_info()->row();
	$date = date('Y-m-d H:i:s');
	if (strtotime($new_info->date) < strtotime($date)) {
		$notif = '<span class="badge-info-ak"></span>';
	} else {
		$notif = '';
	}
	return $notif;
}

function isGuruLogin()
{
	$CI = &get_instance();
	$CI->load->model('GuruModel', 'guru', true);
	$nipGuru = $CI->session->userdata('nip');
	$userGuru = $CI->guru->getWhere(['guru_nip' => $nipGuru]);

	if (!$CI->session->userdata('logged_in')) {
		return redirect('login');
	} elseif (empty($userGuru)) {
		$CI->session->sess_destroy();
		return redirect('login');
	}
}
