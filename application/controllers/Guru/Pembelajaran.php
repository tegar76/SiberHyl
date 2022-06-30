<?php

class Pembelajaran extends CI_Controller
{
	public function mengajar()
	{
		$data['title'] = 'Mengajar';
		$data['content'] = 'guru/contents/pembelajaran/v_mengajar';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function absensi()
	{
		$data['title'] = 'Absensi';
		$data['content'] = 'guru/contents/pembelajaran/v_absensi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function formCetakReportAbsensi()
	{
		$data['title'] = 'Form Cetak Reporting Absensi';
		$data['content'] = 'guru/contents/pembelajaran/v_form_cetak_report_absensi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function cetakReportAbsensi()
	{
		$data['title'] = 'Cetak Reporting Absensi';
		$this->load->view('guru/contents/pembelajaran/v_cetak_report_absensi', $data, FALSE);
	}


	public function tambahPertemuan()
	{
		$data['title'] = 'Tambah Pertemuan';
		$data['content'] = 'guru/contents/pembelajaran/v_tambah_pertemuan';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detailAbsensi()
	{
		$data['title'] = 'Detail Absensi';
		$data['content'] = 'guru/contents/pembelajaran/v_detail_absensi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tambahJurnalMateri()
	{
		$data['title'] = 'Tambah Jurnal Materi';
		$data['content'] = 'guru/contents/pembelajaran/v_tambah_jurnal_materi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function editJamAbsen()
	{
		$data['title'] = 'Edit Jam Absen';
		$data['content'] = 'guru/contents/pembelajaran/v_edit_jam_absen';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function editStatusAbsen()
	{
		$data['title'] = 'Edit Status Absen';
		$data['content'] = 'guru/contents/pembelajaran/v_edit_status_absen';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tugasHarian()
	{
		$data['title'] = 'Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}


	public function formCetakReportTugasHarian()
	{
		$data['title'] = 'Form Cetak Reporting Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_form_cetak_report_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function cetakReportTugasHarian()
	{
		$data['title'] = 'Cetak Reporting Tugas Harian';
		$this->load->view('guru/contents/pembelajaran/v_cetak_report_tugas_harian', $data, FALSE);
	}

	public function tambahTugasHarian()
	{
		$data['title'] = 'Tambah Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_tambah_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detailTugasHarian()
	{
		$data['title'] = 'Detail Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_detail_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function fileSoalTugasHarian()
	{
		$data['title'] = 'File Soal Tugas Harian';
		$this->load->view('guru/contents/pembelajaran/file_soal_tugas_harian_pdf/v_file_soal_tugas_harian_pdf', $data, FALSE);
	}

	public function fileJawabanTugasHarianImg()
	{
		$data['title'] = 'File Jawaban Tugas Harian Img';
		$this->load->view('guru/contents/pembelajaran/v_file_jawaban_tugas_harian_img', $data, FALSE);
	}

	public function fileJawabanTugasHarianPdf()
	{
		$data['title'] = 'File Jawaban Tugas Harian Pdf';
		$this->load->view('guru/contents/pembelajaran/file_jawaban_tugas_harian_pdf/v_file_jawaban_tugas_harian_pdf', $data, FALSE);
	}

	public function nilaiTugasHarian()
	{
		$data['title'] = 'Nilai Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_nilai_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}








	public function lihatFileSurat()
	{
		$data['title'] = 'File Surat';
		$this->load->view('guru/contents/surat/v_file_surat_img', $data, FALSE);
	}
}
