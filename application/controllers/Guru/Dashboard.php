<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
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
		$guru = $this->userGuru;
		$jadwal_guru = $this->jadwal->getJadwalGuru($guru->guru_kode);
		$no = 1;
		foreach ($jadwal_guru as $row => $value) {
			$sum = 0;
			$kompetensi = $this->jadwal->getKelasJadwal($value->mapel_id, $value->guru_kode);
			foreach ($kompetensi as $row => $komp) {
				$mapel = $komp->mapel_id;
				$sum += $komp->jumlah_jam;
			}
			$result['nomor'] = $no++;
			$result['mapel'] = $value->nama_mapel;
			$result['guru_kode'] = $value->guru_kode;
			$result['mapel_id'] = $mapel;
			$result['jumlah_rombel'] = count($kompetensi);
			$result['jumlah_jam'] = $sum;
			$result['total_jam'] = count($kompetensi) * $sum;
			$jadwalGuru[]	= $result;
		}

		$data['guru'] = $guru;
		$data['jadwal'] = $jadwalGuru;
		$data['tahun_ajar'] = $this->tahun_ajar;
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
