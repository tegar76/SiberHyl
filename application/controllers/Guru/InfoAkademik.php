<?php

class InfoAkademik extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Info Akademik',
			'content' => 'guru/contents/info_akademik/v_info_akademik'
		];

		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function fileInfoAkademik()
	{
		$data = [
			'title' => 'File Info Akademik',
		];

		$this->load->view('guru/contents/info_akademik/pdf_view_info_akademik/v_info_akademik_pdf', $data, FALSE);
	}

	
}

?>