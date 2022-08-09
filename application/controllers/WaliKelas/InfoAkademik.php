<?php

class InfoAkademik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('MasterModel', 'master', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
	}

	public function index()
	{
		$data['guru'] = $this->userGuru;
		$data['infoAkademik'] = $this->master->getInfoAkademik();
		$data['title'] = 'Info Akademik';
		$data['content'] = 'wali_kelas/contents/info_akademik/v_info_akademik';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function file_view($slug = false)
	{
		$infoAkademik = $this->db->get_where('infoakademik', ['slug_judul' => $slug])->row();
		if ($slug && $infoAkademik) {
			$pdf = FCPATH . './storage/info_akademik/' . $infoAkademik->file_info;
			if (file_exists($pdf)) {
				$data['pdf'] = base_url('storage/info_akademik/') . $infoAkademik->file_info;
				$this->load->view('pdf_viewer/pdf_viewer', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}
}
