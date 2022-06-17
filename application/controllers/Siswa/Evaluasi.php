<?php

class Evaluasi extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Evaluasi',
			'content' => 'siswa/contents/evaluasi/v_evaluasi'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function pengumpulanOnline()
	{
		$data = [
			'title' => 'Pengumpulan Online',
			'content' => 'siswa/contents/evaluasi/v_pengumpulan_online'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function soalEvaluasiPdf()
	{
		$data = [
			'title' => 'Soal Evaluasi Pdf',
		];

		$this->load->view('siswa/contents/evaluasi/soal_evaluasi_pdf/v_soal_evaluasi_pdf', $data, FALSE);
	}

	public function jawabanEvaluasiPdf()
	{
		$data = [
			'title' => 'Jawaban Evaluasi Pdf',
		];

		$this->load->view('siswa/contents/evaluasi/jawaban_evaluasi_pdf/v_jawaban_evaluasi_pdf', $data, FALSE);
	}

	public function jawabanEvaluasiImg()
	{
		$data = [
			'title' => 'Jawaban Evaluasi Img',
		];

		$this->load->view('siswa/contents/evaluasi/v_jawaban_evaluasi_img', $data, FALSE);
	}


	public function panduanPengumpulanEvaluasi()
	{
		$data = [
			'title' => 'Panduan Pengumpulan Evaluasi',
		];

		$this->load->view('siswa/contents/evaluasi/panduan_pengumpulan_evaluasi/v_panduan', $data, FALSE);
	}

}

?>