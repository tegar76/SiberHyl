<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$this->load->model('SiswaModel', 'siswa', true);
		$this->userSiswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
	}

	public function index()
	{
		$siswa = $this->userSiswa;
		$infoAll = $this->siswa->getInfoAkademik([
			'index_kelas' => 'all',
			'kode_jurusan' => 'all',
			'kelas_id' => 0
		]);
		if ($infoAll) {
			foreach ($infoAll as $row) {
				$val['id'] = $row->info_id;
				$val['judul'] = $row->judul_info;
				$val['slug'] = $row->slug_judul;
				$val['file'] = $row->file_info;
				$val['create'] = date('d-m-Y H:i', strtotime($row->create_time)) . " WIB";
				$result[] = $val;
			}
		}

		$infoKelas = $this->siswa->getInfoAkademik([
			'index_kelas' => $siswa->index_kelas,
			'kode_jurusan' => '',
			'kelas_id' => 0
		]);
		if ($infoKelas) {
			foreach ($infoKelas as $row) {
				$val['id'] = $row->info_id;
				$val['judul'] = $row->judul_info;
				$val['slug'] = $row->slug_judul;
				$val['file'] = $row->file_info;
				$val['create'] = date('d-m-Y H:i', strtotime($row->create_time)) . " WIB";
				$result[] = $val;
			}
		}

		$infoKelasJurusan = $this->siswa->getInfoAkademik([
			'index_kelas' => $siswa->index_kelas,
			'kode_jurusan' => $siswa->kode_jurusan,
			'kelas_id' => 0
		]);
		if ($infoKelasJurusan) {
			foreach ($infoKelasJurusan as $row) {
				$val['id'] = $row->info_id;
				$val['judul'] = $row->judul_info;
				$val['slug'] = $row->slug_judul;
				$val['file'] = $row->file_info;
				$val['create'] = date('d-m-Y H:i', strtotime($row->create_time)) . " WIB";
				$result[] = $val;
			}
		}

		$infoSpesifikKelas = $this->siswa->getInfoAkademik([
			'index_kelas' => $siswa->index_kelas,
			'kode_jurusan' => $siswa->kode_jurusan,
			'kelas_id' => $siswa->kelas_id
		]);
		if ($infoSpesifikKelas) {
			foreach ($infoSpesifikKelas as $row) {
				$val['id'] = $row->info_id;
				$val['judul'] = $row->judul_info;
				$val['slug'] = $row->slug_judul;
				$val['file'] = $row->file_info;
				$val['create'] = date('d-m-Y H:i', strtotime($row->create_time)) . " WIB";
				$result[] = $val;
			}
		}

		$data['info'] = $result;
		$data['siswa'] = $siswa;
		$data['title'] = 'Informasi Akademik';
		$data['content'] = 'siswa/contents/info/v_info';
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function info_akademik($file = null)
	{
		if ($file) {
			$check = FCPATH . './storage/info_akademik/' . $file;
			if (file_exists($check)) {
				$data['pdf'] = base_url('storage/info_akademik/') . $file;
				$this->load->view('pdf_viewer/pdf_viewer', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}
}
