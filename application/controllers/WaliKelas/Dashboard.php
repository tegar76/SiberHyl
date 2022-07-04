<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Dashboard Wali Kelas';
		$data['content'] = 'wali_kelas/contents/dashboard/v_dashboard';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}
}
