<?php

class Login extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Login Kepala Sekolah';
		$this->load->view('kepala_sekolah/login/v_login', $data, FALSE);
	}
}
