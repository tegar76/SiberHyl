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
			'title' => 'Data Ruangan',
			'content' => 'admin/contents/data/v_data_mapel'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahMapel()
	{
		$data = [
			'title' => 'Tambah Ruangan',
			'content' => 'admin/contents/data/v_tambah_mapel'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editMapel()
	{
		$data = [
			'title' => 'Edit Ruangan',
			'content' => 'admin/contents/data/v_edit_mapel'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function dataRuangan()
	{
		$data = [
			'title' => 'Data Ruangan',
			'content' => 'admin/contents/data/v_data_ruangan'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahRuangan()
	{
		$data = [
			'title' => 'Tambah Ruangan',
			'content' => 'admin/contents/data/v_tambah_ruangan'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editRuangan()
	{
		$data = [
			'title' => 'Edit Ruangan',
			'content' => 'admin/contents/data/v_edit_ruangan'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function dataSiswa()
	{
		$data = [
			'title' => 'Data Siswa',
			'content' => 'admin/contents/data/v_data_siswa'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detailSiswa()
	{
		$data = [
			'title' => 'Data Siswa',
			'content' => 'admin/contents/data/v_detail_siswa'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahSiswa()
	{
		$data = [
			'title' => 'Tambah Siswa',
			'content' => 'admin/contents/data/v_tambah_siswa'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editSiswa()
	{
		$data = [
			'title' => 'Edit Siswa',
			'content' => 'admin/contents/data/v_edit_siswa'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function dataGuru()
	{
		$data = [
			'title' => 'Data Guru',
			'content' => 'admin/contents/data/v_data_guru'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detailGuru()
	{
		$data = [
			'title' => 'Data Guru',
			'content' => 'admin/contents/data/v_detail_guru'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function tambahGuru()
	{
		$data = [
			'title' => 'Tambah Guru',
			'content' => 'admin/contents/data/v_tambah_guru'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

    public function editGuru()
	{
		$data = [
			'title' => 'Edit Guru',
			'content' => 'admin/contents/data/v_edit_guru'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
  
    
}

?>