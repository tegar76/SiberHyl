<?php

class Data extends CI_Controller
{
	public function dataSiswa()
	{
		$data['title'] = 'Data Siswa';
		$data['content'] = 'wali_kelas/contents/data/v_data_siswa';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

    public function detailSiswa()
	{
		$data['title'] = 'Detail Siswa';
		$data['content'] = 'wali_kelas/contents/data/v_detail_siswa';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function dataJadwal()
	{
		$data['title'] = 'Data Jadwal';
		$data['content'] = 'wali_kelas/contents/data/v_data_jadwal';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function cetakDataJadwal()
	{
		$data['title'] = 'Cetak Data Jadwal';
		$this->load->view('wali_kelas/contents/data/v_cetak_data_jadwal', $data, FALSE);
	}
}
