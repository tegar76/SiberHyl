<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		isGuruLogin();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('MasterModel', 'master', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
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
		$guru = $this->userGuru;
		$jadwal_guru = $this->jadwal->getJadwalGuru($guru->guru_nip);
		$data['jadwal'] = array();
		if ($jadwal_guru) {
			$no = 1;
			foreach ($jadwal_guru as $row => $value) {
				$sum = 0;
				$kompetensi = $this->jadwal->getKelasJadwal($value->mapel_id, $value->guru_nip);
				foreach ($kompetensi as $row => $komp) {
					$mapel = $komp->mapel_id;
					$sum += $komp->jumlah_jam;
				}
				$result['nomor'] = $no++;
				$result['mapel'] = $value->nama_mapel;
				$result['guru_nip'] = $value->guru_nip;
				$result['mapel_id'] = $mapel;
				$result['jumlah_rombel'] = count($kompetensi);
				$result['jumlah_jam'] = $sum;
				$result['total_jam'] = count($kompetensi) * $sum;
				$jadwalGuru[]	= $result;
			}
			$data['jadwal'] = $jadwalGuru;
		}
		$data['guru'] = $guru;
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['surat'] = $this->guru->getPengajuanSurat($guru->guru_nip, 8);
		$data['title'] = 'Dashboard Guru';
		$data['content'] = 'guru/contents/dashboard/v_dashboard';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}
}
