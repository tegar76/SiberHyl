<?php

class Data extends CI_Controller
{
	public function dataJadwal()
	{
		$data['title'] = 'Dashboard Wali Kelas';
		$data['content'] = 'wali_kelas/contents/data/v_data_jadwal';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}
}
