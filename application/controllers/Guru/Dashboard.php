<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard Guru';
		$data['content'] = 'guru/contents/dashboard/v_dashboard';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}


	public function lihatFileSurat()
	{
		$data['title'] = 'Dashboard Guru';
		$this->load->view('guru/contents/dashboard/v_dashboard', $data, FALSE);
	}
}
