<?php

class Data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('SiswaModel', 'siswa', true);
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

	public function data_siswa()
	{
		$guru	= $this->userGuru;
		$wali 	= $this->guru->getWaliKelas($guru->guru_nip);
		$students = $this->siswa->getWhere(['siswa.kelas_id' => $wali->kelas_id]);
		$data['students'] = array();
		if (!empty($students)) {
			$no = 1;
			foreach ($students as $row => $value) {
				$siswa['nomor'] = $no++;
				$siswa['kelas']	= $value->kode_kelas;
				$siswa['nis']	= $value->siswa_nis;
				$siswa['nisn']	= $value->siswa_nisn;
				$siswa['nama']	= $value->siswa_nama;
				$siswa['jk']	= $value->siswa_kelamin;
				$siswa['asal']	= $value->asal_kelas;
				$siswa['status'] = $value->status;
				$siswa['online'] = ($value->status_online == 'online') ? '<p class="text-success">Online</p>' : '<p class="text-danger">Offline</p>';
				$data_siswa[] = $siswa;
			}
			$data['students'] = $data_siswa;
		}
		$data['title'] = 'Data Siswa';
		$data['guru'] = $guru;
		$data['wali'] = $wali;
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['content'] = 'wali_kelas/contents/data/v_data_siswa';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function detail_siswa()
	{
		$nis = $this->input->get('nis');
		$student = $this->siswa->getWhere(['siswa_nis' => $nis]);
		if ($student) {
			$data['student'] = $student;
			$data['guru'] = $this->userGuru;
			$data['title'] = 'Detail Siswa ' . (!empty($student)) ? $student->siswa_nama : '';
			$data['content'] = 'wali_kelas/contents/data/v_detail_siswa';
		} else {
			$data['title'] = '404 Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function jadwal_pelajaran()
	{
		$guru = $this->userGuru;
		$wali 	= $this->guru->getWaliKelas($guru->guru_nip);
		$data['days']  = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
		foreach ($data['days'] as $hari) {
			$study = $this->jadwal->getJadwalHariIni([
				'hari' => $hari,
				'jadwal.kelas_id' => $wali->kelas_id,
			])->result();
			$schedule['hari'] = $hari;
			$schedule['sch']  = array();
			if (!empty($study)) {
				$newsch = array();
				foreach ($study as $row => $value) {
					if ($value->hari == $hari) {
						$sch['hari'] = $value->hari;
						$sch['id'] = $value->jadwal_id;
						$sch['foto'] = $value->profile;
						$sch['nama'] = $value->guru_nama;
						$sch['kode'] = $value->guru_kode;
						$sch['mapel'] = $value->nama_mapel;
						$sch['jam'] = date('H:i', strtotime($value->jam_masuk)) . ' - ' . date('H:i', strtotime($value->jam_keluar));
						$sch['ruang'] = ($value->kode_ruang) ? $value->kode_ruang : '-';
						$sch['kelas'] =  $value->nama_kelas;
						$newsch[] = $sch;
					}
				}
				$schedule['sch'] = $newsch;
			}
			$new_schedule[] = $schedule;
		}
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['wali'] = $wali;
		$data['guru'] = $guru;
		$data['study'] = $new_schedule;
		$data['title'] = 'Data Jadwal';
		$data['content'] = 'wali_kelas/contents/data/v_data_jadwal';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	// public function cetakDataJadwal()
	// {
	// 	$data['title'] = 'Cetak Data Jadwal';
	// 	$this->load->view('wali_kelas/contents/data/v_cetak_data_jadwal', $data, FALSE);
	// }
}
