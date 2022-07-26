<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		checkAdminLogin();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
		$tahun_ajar = $this->jadwal->get_activate_tahunajar();
		if ($tahun_ajar == null) {
			$this->tahun_ajar = [
				'semester' => 0,
				'tahun' => ''
			];
		} else {
			$this->tahun_ajar = $tahun_ajar;
		}
	}

	public function index()
	{
		isAdmin();
		$data['no'] = 1;
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['teacherRow'] = $this->master->get_row_data('guru', ['role_id !=' => 1]);
		$data['studentRow'] = $this->master->get_row_data('siswa');
		$data['classRow'] = $this->master->get_row_data('kelas');
		$data['pesan'] = $this->master->get_pesan();
		$data['jurnal'] = $this->jadwal->get_jurnal(null, 5);
		$data['info_akademik'] = $this->jadwal->get_infolimit(5);
		$data['title'] = 'Dashboard Admin';
		$data['content'] = 'admin/contents/dashboard/v_dashboard';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
