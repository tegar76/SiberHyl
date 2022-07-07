<?php

class Data extends CI_Controller
{
	public function dataKelas()
	{
		$data['title'] = 'Data Kelas';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_kelas';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function dataMapel()
	{
		$data['title'] = 'Data Mapel';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_mapel';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function dataRuangan()
	{
		$data['title'] = 'Data Ruangan';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_ruangan';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function dataSiswa()
	{
		$data['title'] = 'Data Siswa';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_siswa';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

    public function detailSiswa()
	{
		$data['title'] = 'Detail Siswa';
		$data['content'] = 'kepala_sekolah/contents/data/v_detail_siswa';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

	public function dataGuru()
	{
		$data['title'] = 'Data Guru';
		$data['content'] = 'kepala_sekolah/contents/data/v_data_guru';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}

    public function detailGuru()
	{
		$data['title'] = 'Detail Guru';
		$data['content'] = 'kepala_sekolah/contents/data/v_detail_guru';
		$this->load->view('kepala_sekolah/layout/wrapper', $data, FALSE);
	}


	
}
