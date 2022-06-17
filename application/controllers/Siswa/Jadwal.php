<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->load->model('SiswaModel', 'siswa', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->siswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
		$this->hariIni = $hari[(int)date('w')];
	}

	public function index()
	{
		$data['today'] = $this->hariIni;
		$data['siswa'] = $this->siswa;
		$data['days']  = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
		$timeNow = date('H:i');
		$jadwalAktif = [
			'hari' => $data['today'],
			'jadwal.kelas_id' => $data['siswa']->kelas_id,
		];

		$jadwal = $this->jadwal->getJadwalHariIni($jadwalAktif)->result();
		foreach ($jadwal as $key => $value) :
			if (
				strtotime($timeNow) >= strtotime($value->jam_masuk)
				&& strtotime($timeNow) <= strtotime($value->jam_keluar)
			) {
				if (!empty($value)) {
					$data['nowStudying'] = $value;
				} else {
					$data['nowStudying'] = '';
				}
			}
		endforeach;
		$data['title'] = 'Daftar Jadwal Pelajaran Kelas ' . $data['siswa']->nama_kelas;
		$data['content'] = 'siswa/contents/jadwal/v_jadwal';
		$this->load->view('siswa/layout/wrapper', $data);
	}
}
