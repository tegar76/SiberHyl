<?php

class InfoAkademik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
	}

	public function index()
	{
		$data['guru'] = $this->userGuru;
		$data['infoakd'] = $this->jadwal->get_info_akademik();
		$data['notif'] = check_new_info();
		$data['title'] = 'Info Akademik';
		$data['content'] = 'guru/contents/info_akademik/v_info_akademik';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function file_view($slug = false)
	{
		$info_akd = $this->db->get_where('info_akademik', ['slug_judul' => $slug])->row();
		$data['title'] = $info_akd->judul_info;
		$data['files'] = base_url('storage/info/') . $info_akd->file_info;
		$this->load->view('guru/contents/info_akademik/pdf_view_info_akademik/v_info_akademik_pdf', $data, FALSE);
	}
}
