<?php

class Data extends CI_Controller
{
	public function dataSiswa()
	{
		$data['title'] = 'Data Siswa';
		$data['content'] = 'guru/contents/data/v_data_siswa';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function detailSiswa()
	{
		$data['title'] = 'Data Siswa';
		$data['content'] = 'guru/contents/data/v_detail_siswa';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function dataMateriGuru()
	{
		$data['title'] = 'Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_data_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function detailDataMateriGuru()
	{
		$data['title'] = 'Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_detail_data_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function tambahDataMateriGuru()
	{
		$data['title'] = 'Tambah Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_tambah_data_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function editDataMateriGuru()
	{
		$data['title'] = 'Edit Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_edit_data_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function editFileMateriGuru()
	{
		$data['title'] = 'Edit File Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_edit_file_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

    public function editVideoMateriGuru()
	{
		$data['title'] = 'Edit Video Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_edit_video_materi_guru';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tampilFileMateri()
	{
		$data['title'] = 'File Materi';
		$this->load->view('guru/contents/data/tampil_file_materi/v_materi_pdf', $data, FALSE);
	}

	public function dataMateriAdmin()
	{
		$data['title'] = 'Data Materi (Admin)';
		$data['content'] = 'guru/contents/data/v_data_materi_admin';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detailDataMateriAdmin()
	{
		$data['title'] = 'Detail Data Materi (Admin)';
		$data['content'] = 'guru/contents/data/v_detail_data_materi_admin';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	
}
