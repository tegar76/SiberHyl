<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
		$this->load->model('MasterModel', 'master', true);
		$tahun_ajar = $this->master->getActiveTahunAkademik();
		if ($tahun_ajar == null) {
			$this->tahun_ajar = [
				'tahun_id' => 0,
				'semester' => 0,
				'tahun' => ''
			];
		} else {
			$this->tahun_ajar = $tahun_ajar;
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard Wali Kelas';
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['guru'] = $this->userGuru;
		$data['wali'] = $this->guru->getWaliKelas($data['guru']->guru_nip);
		$data['jurnal'] = array();
		// $jurnal = $this->jadwal->get_jurnal_materi(27);
		// var_dump($jurnal);
		// die;
		// if ($jurnal) {
		$data['jurnal'] = array();
		// }
		$data['content'] = 'wali_kelas/contents/dashboard/v_dashboard';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}
}
