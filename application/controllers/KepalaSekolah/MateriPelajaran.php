<?php

class MateriPelajaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		checkKepsekLogin();
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('JadwalModel', 'jadwal', true);
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

	public function materi_guru()
	{
		$data['title']	= 'Materi (Guru)';
		$data['content'] = 'kepala_sekolah/contents/materi_pelajaran/v_data_materi_guru';
		$data['tahun_ajar']	= $this->tahun_ajar;
		$data['materi']	= $this->master->materiGuru();
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function detail_materi_guru()
	{
		$id = $this->input->get('id');
		$materi = $this->master->getDetailMateriGuru($id);
		if ($id && $materi) {
			$data['title'] = 'Materi (Guru)';
			$data['content'] = 'admin/contents/jadwal/v_detail_materi_guru';
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['materi'] = $materi;
			$data['pdf'] = $this->master->modulMateri('file', $materi->id);
			$data['video'] = $this->master->modulMateri('link', $materi->id);
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function view_materi_guru($file = null)
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
