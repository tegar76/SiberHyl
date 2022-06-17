<?php

class Tugas extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Tugas',
			'content' => 'siswa/contents/tugas/v_tugas'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function pengumpulanOnline()
	{
		$data = [
			'title' => 'Pengumpulan Online',
			'content' => 'siswa/contents/tugas/v_pengumpulan_online'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function soalTugasPdf()
	{
		$data = [
			'title' => 'Soal Tugas Pdf',
		];

		$this->load->view('siswa/contents/tugas/soal_tugas_pdf/v_soal_tugas_pdf', $data, FALSE);
	}

	public function jawabanTugasPdf()
	{
		$data = [
			'title' => 'Jawaban Tugas Pdf',
		];

		$this->load->view('siswa/contents/tugas/jawaban_tugas_pdf/v_jawaban_tugas_pdf', $data, FALSE);
	}

	public function jawabanTugasImg()
	{
		$data = [
			'title' => 'Jawaban Tugas Img',
		];

		$this->load->view('siswa/contents/tugas/v_jawaban_tugas_img', $data, FALSE);
	}

	public function editTugas()
	{
		$data = [
			'title' => 'Edit Tugas',
			'content' => 'siswa/contents/tugas/v_edit_tugas'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function panduanPengumpulanTugas()
	{
		$data = [
			'title' => 'Panduan Pengumpulan Tugas',
		];

		$this->load->view('siswa/contents/tugas/panduan_pengumpulan_tugas/v_panduan', $data, FALSE);
	}

}

?>