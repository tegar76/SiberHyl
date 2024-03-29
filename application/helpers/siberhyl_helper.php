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
	$admin = $CI->guru->getWhere([
		'username' => $CI->session->userdata('username'),
		'role_id' => 1
	]);
	if (empty($admin)) {
		return redirect('admin/login');
	}
}

function isAdmin()
{
	$CI = &get_instance();
	if ($CI->session->userdata('level') != 'master') {
		return redirect('block');
	}
}


function isGuruLogin()
{
	$CI = &get_instance();
	$CI->load->model('GuruModel', 'guru', true);
	$nipGuru = $CI->session->userdata('nip');
	$userGuru = $CI->guru->getWhere([
		'guru_nip' => $nipGuru,
		'role_id' => 2
	]);

	if (!$CI->session->userdata('logged_in')) {
		return redirect('login');
	} elseif (empty($userGuru)) {
		$CI->session->sess_destroy();
		return redirect('login');
	}
}

function isWaliKelasLogin()
{
	$CI = &get_instance();
	$wali = $CI->session->userdata('level');
	if (!$CI->session->userdata('logged_in')) {
		return redirect('login');
	} elseif ($wali != 'wali-kelas') {
		$CI->session->sess_destroy();
		return redirect('login');
	}
}

function checkKepsekLogin()
{
	$CI = &get_instance();
	$CI->load->model('AuthModel', 'auth', true);
	$kepsek = $CI->auth->getKepsekByUsername($CI->session->userdata('username'));
	if (empty($kepsek)) {
		return redirect('kepsek/login');
	}
}
