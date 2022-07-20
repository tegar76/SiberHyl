<?php

class InfoAkademik extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Info Akademik',
			'content' => 'kepala_sekolah/contents/info_akademik/v_info_akademik'
		];

		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

    public function fileInfoAkademik()
	{
		$data = [
			'title' => 'File Info Akademik',
		];

		$this->load->view('kepala_sekolah/contents/info_akademik/pdf_view_info_akademik/v_info_akademik_pdf', $data, FALSE);
	}

	
}

?>