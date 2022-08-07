<?php

class Materi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->load->model('SiswaModel', 'siswa', true);
		$this->load->model('MasterModel', 'master', true);
		$this->userSiswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
		$this->hariIni = $hari[(int)date('w')];
	}

	public function index()
	{
	}

	public function ruang_materi($id = false)
	{
		if ($id) {
			$id = $this->secure->decrypt_url($id);
			$jadwal = $this->master->getInfoJadwal($id);
			$data['materi_pdf'] = $this->siswa->getMateriGuru('file', $jadwal->kelas_id, $jadwal->mapel_id);
			$data['materi_video'] = $this->siswa->getMateriGuru('link', $jadwal->kelas_id, $jadwal->mapel_id);
			$data['title'] = 'Ruang Materi';
			$data['content'] = 'siswa/contents/materi/v_materi';
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function view_materi($file = null)
	{
		if ($file) {
			$pdf = FCPATH . './storage/guru/materi/' . $file;
			if (file_exists($pdf)) {
				$data['pdf'] = base_url('storage/guru/materi/') . $file;
				$this->load->view('pdf_viewer/pdf_viewer', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}
}
