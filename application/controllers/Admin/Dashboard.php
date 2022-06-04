<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
		checkAdminLogin();
	}

	public function index()
	{
		isAdmin();
		$data['title'] = 'Dashboard Admin';
		$data['content'] = 'admin/contents/dashboard/v_dashboard';
		$data['teacherRow'] = $this->master->get_row_data('guru');
		$data['studentRow'] = $this->master->get_row_data('siswa');
		$data['classRow'] = $this->master->get_row_data('kelas');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
