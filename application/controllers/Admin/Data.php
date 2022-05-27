<?php 

class Data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
	}

	public function dataKelas()
	{
		$data = [
			'title' => 'Data Kelas',
			'content' => 'admin/contents/data/v_data_kelas'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahKelas()
	{
		$data = [
			'title' => 'Tambah Kelas',
			'content' => 'admin/contents/data/v_tambah_kelas'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editKelas()
	{
		$data = [
			'title' => 'Edit Kelas',
			'content' => 'admin/contents/data/v_edit_kelas'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function dataMapel()
	{
		$data = [
			'title' => 'Data Mapel',
			'content' => 'admin/contents/data/v_data_mapel'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahMapel()
	{
		$data = [
			'title' => 'Tambah Mapel',
			'content' => 'admin/contents/data/v_tambah_mapel'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editMapel()
	{
		$data = [
			'title' => 'Edit Mapel',
			'content' => 'admin/contents/data/v_edit_mapel'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function dataRuangan()
	{
		$data = [
			'title' => 'Data Mapel',
			'content' => 'admin/contents/data/v_data_ruangan'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahRuangan()
	{
		$data = [
			'title' => 'Tambah Mapel',
			'content' => 'admin/contents/data/v_tambah_ruangan'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editRuangan()
	{
		$data = [
			'title' => 'Edit Mapel',
			'content' => 'admin/contents/data/v_edit_ruangan'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
    
}

?>