<?php

class Profile extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Profile';
		$data['content'] = 'guru/contents/profile/v_profile';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function editProfile()
	{
		$data['title'] = 'Edit Profile';
		$data['content'] = 'guru/contents/profile/v_edit_profile';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function editPassword()
	{
		$data['title'] = 'Edit Password';
		$data['content'] = 'guru/contents/profile/v_edit_password';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function logout() 
	{

	}
}
