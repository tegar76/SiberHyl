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

    public function detailJadwal()
	{
		$data = [
			'title' => 'Detail Jadwal',
			'content' => 'admin/contents/jadwal/v_detail_jadwal'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahJadwal()
	{
		$data = [
			'title' => 'Tambah Jadwal',
			'content' => 'admin/contents/jadwal/v_tambah_jadwal'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function editJadwal()
	{
		$data = [
			'title' => 'Tambah Jadwal',
			'content' => 'admin/contents/jadwal/v_edit_jadwal'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

?>