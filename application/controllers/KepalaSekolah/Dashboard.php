<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard Kepala Sekolah';
		$data['content'] = 'kepala_sekolah/contents/dashboard/v_dashboard';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}
}
