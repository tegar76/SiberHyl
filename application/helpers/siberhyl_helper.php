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
