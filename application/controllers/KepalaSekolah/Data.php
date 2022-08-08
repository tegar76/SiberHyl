<?php

class Data extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		checkKepsekLogin();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('SiswaModel', 'siswa', true);
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

	public function kelas()
	{
		$data['classes'] = $this->master->getWaliKelas();
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['title'] = 'Data Kelas';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_kelas';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function mata_pelajaran()
	{
		$data['mapel'] = $this->master->get_datatable('mapel');
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['title'] = 'Data Mapel';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_mapel';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function ruangan()
	{
		$data['ruangan'] = $this->master->get_datatable('ruangan');
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['title'] = 'Data Ruangan';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_ruangan';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function siswa()
	{
		$kode = $this->input->get('kelas');
		$data['classes'] = $this->master->get_masterdata('kelas');
		if ($kode) {
			$data['students'] = $this->master->getDataSiswa(['kode_kelas' => $kode]);
			$data['walikelas'] = $this->master->getDetailKelas($kode);
		} else {
			$data['students'] = array();
			$data['walikelas'] = null;
		}
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['title'] = 'Data Siswa';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_siswa';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function detail_siswa()
	{
		$nis = $this->input->get('nis');
		if ($nis) {
			$siswa = $this->siswa->getWhere(['siswa_nis' => $nis]);
			if (empty($siswa)) {
				$data['title'] = 'Not Found';
				$data['content'] = 'guru/contents/eror/v_not_found';
			} else {
				$data['student'] = $siswa;
				$data['title'] = 'Detail Siswa';
				$data['content'] = 'kepala_sekolah/contents/data/v_detail_siswa';
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function guru()
	{
		$data['guru'] = array();
		$guru = $this->db->get_where('guru', [
			'role_id !=' => 1,
			'role_id !=' => 3
		])->result();
		if ($guru) {
			$data['guru'] = $guru;
		}
		$data['title'] = 'Data Guru';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_guru';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function detail_guru()
	{
		$nip = $this->input->get('nip');
		$guru = $this->guru->getWhere(['guru_nip' => $nip]);
		if ($nip && $guru) {
			$jadwal_guru = $this->jadwal->getJadwalGuru($guru->guru_nip);
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
				$result['mapel_id'] = $mapel;
				$result['jumlah_rombel'] = count($kompetensi);
				$result['jumlah_jam'] = $sum;
				$result['total_jam'] = count($kompetensi) * $sum;
				$jadwalGuru[]	= $result;
			}
			if (empty($jadwalGuru)) {
				$data['jadwal'] = null;
			} else {
				$data['jadwal'] = $jadwalGuru;
			}
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['guru'] = $guru;
			$data['title'] = 'Detail Guru';
			$data['content'] = 'kepala_sekolah/contents/data/v_detail_guru';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}
}
