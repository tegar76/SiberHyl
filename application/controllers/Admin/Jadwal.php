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
			'title' => 'Edit Jadwal',
			'content' => 'admin/contents/jadwal/v_edit_jadwal'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function pratinjauJadwal()
	{
		$data = [
			'title' => 'PratinjauJadwal',
			'content' => 'admin/contents/jadwal/v_pratinjau_jadwal'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function materi()
	{
		$data = [
			'title' => 'Materi',
			'content' => 'admin/contents/jadwal/v_materi'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detailMateri()
	{
		$data = [
			'title' => 'Materi',
			'content' => 'admin/contents/jadwal/v_detail_materi'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambahMateri()
	{
		$data = [
			'title' => 'Tambah Materi',
			'content' => 'admin/contents/jadwal/v_tambah_materi'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function editMateri()
	{
		$data = [
			'title' => 'Edit Materi',
			'content' => 'admin/contents/jadwal/v_edit_materi'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	


}

?>