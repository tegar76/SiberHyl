<?php

class MateriPelajaran extends CI_Controller
{
	public function dataMateriAdmin()
	{
		$data['title'] = 'Data Materi (Admin)';
		$data['content'] = 'kepala_sekolah/contents/materi_pelajaran/v_data_materi_admin';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function detailDataMateriAdmin()
	{
		$data['title'] = 'Detail Data Materi (Admin)';
		$data['content'] = 'kepala_sekolah/contents/materi_pelajaran/v_detail_data_materi_admin';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function dataMateriGuru()
	{
		$data['title'] = 'Data Materi (Guru)';
		$data['content'] = 'kepala_sekolah/contents/materi_pelajaran/v_data_materi_guru';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

    public function detailDataMateriGuru()
	{
		$data['title'] = 'Detail Materi (Guru)';
		$data['content'] = 'kepala_sekolah/contents/materi_pelajaran/v_detail_data_materi_guru';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function tampilFileMateri()
	{
		$data['title'] = 'File Materi';
		$this->load->view('kepala_sekolah/contents/materi_pelajaran/tampil_file_materi/v_materi_pdf', $data, FALSE);
	}
}
