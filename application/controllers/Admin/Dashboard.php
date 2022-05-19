<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data = array(
			'content' => 'admin/contents/dashboard/v_dashboard',
		);
		$this->load->view('admin/layout/wrapper', $data);
	}
}
