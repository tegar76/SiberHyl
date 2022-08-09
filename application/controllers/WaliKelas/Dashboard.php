<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		isWaliKelasLogin();
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
		$days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$data['title'] = 'Dashboard Wali Kelas';
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['guru'] = $this->userGuru;
		$data['wali'] = $this->guru->getWaliKelas($data['guru']->guru_nip);
		$data['jurnal'] = array();
		$jurnal = $this->guru->getJurnalWali($data['wali']->kelas_id, 8);
		if ($jurnal) {
			$no = 1;
			foreach ($jurnal as $value) {
				$result['nomor'] = $no++;
				$result['hari']  =   $days[(int)date("w", strtotime($value->tanggal))];
				$result['tanggal'] = date('d-m-Y', strtotime($value->tanggal));
				$result['guru'] = $value->guru_kode;
				$result['mapel'] = $value->nama_mapel;
				$result['kelas'] = $value->nama_kelas;
				$result['pert'] = $value->pertemuan;
				$result['pembahasan'] = $value->pembahasan;
				$result['id'] = $value->jurnal_id;
				if ($value->status == 0) {
					$bg = 'btn-outline-danger text-danger';
					$st = 'Belum Dilihat';
					$s = $value->status;
				} else {
					$bg = 'btn-outline-success text-success';
					$st = 'Sudah Dilihat';
					$s = $value->status;
				}
				$result['status'] = ['bg' => $bg, 'st' => $st, 's' => $s];
				$ress_[] = $result;
			}
			$data['jurnal'] = $ress_;
		}
		$data['content'] = 'wali_kelas/contents/dashboard/v_dashboard';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}
}
