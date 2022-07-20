<?php

class InfoAkademik extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Info Akademik',
			'content' => 'wali_kelas/contents/info_akademik/v_info_akademik'
		];

		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

    public function fileInfoAkademik()
	{
		$data = [
			'title' => 'File Info Akademik',
		];

		$this->load->view('wali_kelas/contents/info_akademik/pdf_view_info_akademik/v_info_akademik_pdf', $data, FALSE);
	}

	
}

?>