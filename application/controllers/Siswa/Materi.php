<?php

class Materi extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Materi',
			'content' => 'siswa/contents/materi/v_materi'
		];

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

?>