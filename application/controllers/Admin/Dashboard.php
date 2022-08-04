<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		checkAdminLogin();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->hariIni = $hari[(int)date('w')];
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
		isAdmin();

		$jadwal = $this->master->jadwalBerlangsung($this->hariIni);
		$timenow = date('H:i');
		$data['study'] = array();
		if ($jadwal) {
			foreach ($jadwal as $key => $row) {
				if (
					strtotime($timenow) >= strtotime($row->jam_masuk)
					&& strtotime($timenow) <= strtotime($row->jam_keluar)
				) {
					$study[] = $row;
				}
			}
			$data['study'] = $study;
		}
		$data['no'] = 1;
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['teacherRow'] = $this->master->get_row_data('guru', ['role_id !=' => 1]);
		$data['studentRow'] = $this->master->get_row_data('siswa');
		$data['classRow'] = $this->master->get_row_data('kelas');
		$data['pesan'] = $this->master->get_pesan();
		$data['info_akademik'] = $this->master->getInfoAkademik(5);
		$data['title'] = 'Dashboard Admin';
		$data['content'] = 'admin/contents/dashboard/v_dashboard';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}