<?php

class Absen extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Absen',
			'content' => 'siswa/contents/absen/v_absen'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

    public function formCetakAbsensi()
	{
		$data = [
			'title' => 'Cetak Absensi',
		];

		$this->load->view('siswa/contents/absen/v_cetak_absensi', $data, FALSE);
	}

	public function CetakAbsensi()
	{
		$data = [
			'title' => 'Form Cetak Absensi',
			'content' => 'siswa/contents/absen/v_form_cetak_absensi'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}



	public function cetakAbsensiPdf()
	{
		$data = [
			'title' => 'Cetak Absensi Pdf',
		];

		$this->load->view('siswa/contents/absen/cetak_absensi_pdf/v_cetak_absensi_pdf', $data, FALSE);
	}

	
}

?>