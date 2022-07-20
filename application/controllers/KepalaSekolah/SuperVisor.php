<?php

class SuperVisor extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Super Visor',
			'content' => 'kepala_sekolah/contents/super_visor/v_super_visor'
		];

		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function absensi()
	{
		$data = [
			'title' => 'Absensi',
			'content' => 'kepala_sekolah/contents/super_visor/v_absensi'
		];

		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function formCetakReportAbsensi()
	{
		$data['title'] = 'Form Cetak Reporting Absensi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_form_cetak_report_absensi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function cetakReportAbsensi()
	{
		$data['title'] = 'Cetak Reporting Absensi';
		$this->load->view('kepala_sekolah/contents/super_visor/v_cetak_report_absensi', $data, FALSE);
	}

	public function detailAbsensi()
	{
		$data['title'] = 'Detail Absensi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_detail_absensi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function tugasHarian()
	{
		$data['title'] = 'Tugas Harian';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_tugas_harian';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function formCetakReportTugasHarian()
	{
		$data['title'] = 'Form Cetak Reporting Tugas Harian';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_form_cetak_report_tugas_harian';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function cetakReportTugasHarian()
	{
		$data['title'] = 'Cetak Reporting Tugas Harian';
		$this->load->view('kepala_sekolah/contents/super_visor/v_cetak_report_tugas_harian', $data, FALSE);
	}

	public function detailTugasHarian()
	{
		$data['title'] = 'Detail Tugas Harian';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_detail_tugas_harian';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function fileSoalTugasHarian()
	{
		$data['title'] = 'File Soal Tugas Harian';
		$this->load->view('kepala_sekolah/contents/super_visor/file_soal_tugas_harian_pdf/v_file_soal_tugas_harian_pdf', $data, FALSE);
	}

	public function fileJawabanTugasHarianImg()
	{
		$data['title'] = 'File Jawaban Tugas Harian Img';
		$this->load->view('kepala_sekolah/contents/super_visor/v_file_jawaban_tugas_harian_img', $data, FALSE);
	}

	public function fileJawabanTugasHarianPdf()
	{
		$data['title'] = 'File Jawaban Tugas Harian Pdf';
		$this->load->view('kepala_sekolah/contents/super_visor/file_jawaban_tugas_harian_pdf/v_file_jawaban_tugas_harian_pdf', $data, FALSE);
	}

	public function evaluasi()
	{
		$data['title'] = 'Evaluasi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_evaluasi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function formCetakReportEvaluasi()
	{
		$data['title'] = 'Form Cetak Reporting Evaluasi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_form_cetak_report_evaluasi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function cetakReportEvaluasi()
	{
		$data['title'] = 'Cetak Reporting Evaluasi';
		$this->load->view('kepala_sekolah/contents/super_visor/v_cetak_report_evaluasi', $data, FALSE);
	}

	public function detailEvaluasi()
	{
		$data['title'] = 'Detail Evaluasi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_detail_evaluasi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function fileSoalEvaluasi()
	{
		$data['title'] = 'File Soal Evaluasi';
		$this->load->view('kepala_sekolah/contents/super_visor/file_soal_evaluasi_pdf/v_file_soal_evaluasi_pdf', $data, FALSE);
	}

	public function fileJawabanEvaluasiImg()
	{
		$data['title'] = 'File Jawaban Evaluasi Img';
		$this->load->view('kepala_sekolah/contents/super_visor/v_file_jawaban_evaluasi_img', $data, FALSE);
	}

	public function fileJawabanEvaluasiPdf()
	{
		$data['title'] = 'File Jawaban Evaluasi Pdf';
		$this->load->view('kepala_sekolah/contents/super_visor/file_jawaban_evaluasi_pdf/v_file_jawaban_evaluasi_pdf', $data, FALSE);
	}

	public function diskusi()
	{
		$data['title'] = 'Diskusi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_diskusi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function detailDiskusi()
	{
		$data['title'] = 'Forum Diskusi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_detail_diskusi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function jurnalMateri()
	{
		$data['title'] = 'Jurnal Materi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_jurnal_materi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function cetakReportJurnalMateri()
	{
		$data['title'] = 'Cetak Reporting Jurnal Materi';
		$this->load->view('kepala_sekolah/contents/super_visor/v_cetak_report_jurnal_materi', $data, FALSE);
	}

	public function detailJurnalMateri()
	{
		$data['title'] = 'Detail Jurnal Materi';
		$data['content'] = 'kepala_sekolah/contents/super_visor/v_detail_jurnal_materi';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	
}

?>