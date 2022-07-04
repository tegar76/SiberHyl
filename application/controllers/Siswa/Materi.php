<?php

class Materi extends CI_Controller
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
	}

	public function ruang_materi($kode = NULL)
	{
		$siswa = $this->siswa;

		$jadwal = $this->jadwal->getJadwalHariIni(['jadwal.kode_jadwal' => $kode])->row();
		$materi_info = $this->db->get_where('materi_info', [
			'index_kelas' => $siswa->index_kelas,
			'mapel_id'	=> $jadwal->mapel_id
		])->row();
		var_dump($materi_info);
		die;
		$data['title'] = 'Ruang Materi';
		$data['content'] = 'siswa/contents/materi/v_materi';
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function materiPdf()
	{
		$data = [
			'title' => 'Materi Pdf',
		];

		$this->load->view('siswa/contents/materi/materi_pdf/v_materi_pdf', $data, FALSE);
	}
}
