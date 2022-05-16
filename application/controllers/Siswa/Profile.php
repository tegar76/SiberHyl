<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function index()
	{
		$data = array(
			'content' => 'siswa/contents/profile/v_profile',
		);
		$this->load->view('siswa/layout/wrapper', $data);
	}

	public function editProfile()
	{
		$data = array(
			'content' => 'siswa/contents/profile/v_edit_profile',
		);
		$this->load->view('siswa/layout/wrapper', $data);
	}

	public function editPassword()
	{
		$data = array(
			'content' => 'siswa/contents/profile/v_edit_password',
		);
		$this->load->view('siswa/layout/wrapper', $data);
	}
	
}
