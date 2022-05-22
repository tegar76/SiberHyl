<?php 

class Jadwal extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Jadwal',
			'content' => 'admin/contents/jadwal/v_jadwal'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function DetailJadwal()
	{
		$data = [
			'title' => 'Detail Jadwal',
			'content' => 'admin/contents/jadwal/v_detail_jadwal'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

?>