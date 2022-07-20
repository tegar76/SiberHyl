<?php

class Data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('MasterModel', 'master', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('SiswaModel', 'siswa', true);
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

	public function data_siswa($kode = false)
	{
		if ($kode == false) {
			$kode = '';
		}
		$guru	= $this->userGuru;
		$no = 1;
		$students = $this->siswa->getWhere(['kode_kelas' => $kode]);
		$data['students'] = array();
		$data['wali'] = array();
		if (!empty($students)) {
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
			$data['wali']  = $this->master->getDetailKelas($kode);
		}
		$data['title'] = 'Data Siswa';
		$data['guru'] = $guru;
		$data['kelas'] =  $this->guru->get_kelas_guru($guru->guru_kode);
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['content'] = 'guru/contents/data/v_data_siswa';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detail_siswa()
	{
		$nis = $this->input->get('nis');
		$student = $this->siswa->getWhere(['siswa_nis' => $nis]);
		if ($student) {
			$data['student'] = $student;
			$data['guru'] = $this->userGuru;
			$data['title'] = 'Detail Siswa ' . (!empty($student)) ? $student->siswa_nama : '';
			$data['content'] = 'guru/contents/data/v_detail_siswa';
		} else {
			$data['title'] = '404 Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function dataMateriGuru()
	{
		$data['title'] = 'Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_data_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detailDataMateriGuru()
	{
		$data['title'] = 'Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_detail_data_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tambahDataMateriGuru()
	{
		$data['title'] = 'Tambah Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_tambah_data_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function editDataMateriGuru()
	{
		$data['title'] = 'Edit Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_edit_data_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function editFileMateriGuru()
	{
		$data['title'] = 'Edit File Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_edit_file_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function editVideoMateriGuru()
	{
		$data['title'] = 'Edit Video Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_edit_video_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tampilFileMateri()
	{
		$data['title'] = 'File Materi';
		$this->load->view('guru/contents/data/tampil_file_materi/v_materi_pdf', $data, FALSE);
	}

	public function dataMateriAdmin()
	{
		$data['title'] = 'Data Materi (Admin)';
		$data['content'] = 'guru/contents/data/v_data_materi_admin';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detailDataMateriAdmin()
	{
		$data['title'] = 'Detail Data Materi (Admin)';
		$data['content'] = 'guru/contents/data/v_detail_data_materi_admin';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}
}
