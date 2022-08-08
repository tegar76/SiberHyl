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
		$siswa = $this->siswa;
		$req = $_REQUEST;
		if ($req) {
			if ($req['search'] == '') {
				$data['jadwal'] = null;
			} else {
				$array = array(
					'nama_mapel' => $req['search'],
				);
				$result = $this->jadwal->getSearchJadwal($siswa->kelas_id, $array)->result();
				$data['jadwal'] = null;
				if ($result) {
					$data['jadwal'] = $result;
				}
			}
			$data['today'] = $this->hariIni;
			$data['title'] = 'jadwal Pelajaran';
			$data['content'] = 'siswa/contents/jadwal/v_search_jadwal';
			$this->load->view('siswa/layout/wrapper', $data);
		} else {
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
}
