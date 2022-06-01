<?php

class Materi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MasterModel', 'master', true);
	}

	public function message($title = NULL, $text = NULL, $type = NULL)
	{
		return $this->session->set_flashdata([
			'title' => $title,
			'text' => $text,
			'type' => $type,
		]);
	}

	public function index()
	{
		$data['title'] = 'Materi';
		$data['content'] = 'admin/contents/jadwal/v_materi';
		$data['materi'] = $this->master->get_materi()->result();
		// var_dump($data['materi']);
		// die;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detailMateri($idMateri)
	{
		$data['title'] = 'Detail Materi';
		$data['content'] = 'admin/contents/jadwal/v_detail_materi';
		$data['detailMateri'] = $this->master->getDetailMateri($idMateri);
		$data['bahanMateri'] = $this->db->get_where('materi_kbm', ['materi_info_id' => $idMateri, 'jenis' => 'file'])->result();
		$data['videoMateri'] = $this->db->get_where('materi_kbm', ['materi_info_id' => $idMateri, 'jenis' => 'link'])->result();
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambahMateri()
	{
		$this->form_validation->set_rules([
			[
				'field' => 'index_kelas',
				'label' => 'Kelas',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			[
				'field' => 'jurusan',
				'label' => 'Jurusan',
				'rules' => 'trim|xss_clean',
				'errors' => []
			],
			[
				'field' => 'mapel',
				'label' => 'Mata Pelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			[
				'field' => 'judul_materi[]',
				'label' => 'Judul Materi Pembelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			[
				'field' => 'judul_video[]',
				'label' => 'Judul Video',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			[
				'field' => 'link_video[]',
				'label' => 'Link Video Pembelajaran',
				'rules' => 'trim|xss_clean',
				'errors' => []
			]
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Materi';
			$data['content'] = 'admin/contents/jadwal/v_tambah_materi';
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {

			$jurusanID = $this->input->post('jurusan', true);
			$infoMateri = [
				'index_kelas' => $this->input->post('index_kelas', true),
				'mapel_id'	=> $this->input->post('mapel', true),
				'jurusan_id'  => (isset($jurusanID)) ? $jurusanID : 0,
			];
			$this->db->insert('materi_info', $infoMateri);
			$infoMateriID = $this->db->insert_id();
			$this->processMateri($infoMateriID);
			$this->processLinkVideo($infoMateriID);
			$this->message('Berhasil', 'Data Materi Berhasil Ditambah', 'success');
			return redirect('master/materi');
		}
	}

	public function editMateri()
	{
		$data['title'] = 'Edit Materi';
		$data['content'] = 'admin/contents/jadwal/v_edit_materi';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function processMateri($infoMateriID)
	{
		$this->db->trans_start();
		$kelas	= $this->input->post('index_kelas', true);
		$jurusan = $this->input->post('jurusan', true);
		$dirKelas = 'kelas-' . $kelas;
		$pathUpload = './storage/materi/';
		if (!empty($jurusan)) {
			$jurusan = $this->db->get_where('jurusan', ['jurusan_id' => $jurusan])->row();
			$pathUpload = './storage/materi/' . $dirKelas . '/' . $jurusan->kode_jurusan . '/';
		} else {
			$pathUpload = './storage/materi/' . $dirKelas . '/';
		}

		$uploadMateri = $_FILES['file_materi']['name'];
		if ($uploadMateri) {
			$config['allowed_types'] = 'pdf';
			$config['max_size']	= '2048';
			$config['encrypt_name'] = true;
			$config['upload_path'] = $pathUpload;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$jumlahMateri = count($uploadMateri);
			for ($i = 0; $i < $jumlahMateri; $i++) {
				if (!empty($_FILES['file_materi']['name'][$i])) {
					$_FILES['file']['name']		= $_FILES['file_materi']['name'][$i];
					$_FILES['file']['type'] 	= $_FILES['file_materi']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['file_materi']['tmp_name'][$i];
					$_FILES['file']['error'] 	= $_FILES['file_materi']['error'][$i];
					$_FILES['file']['size'] 	= $_FILES['file_materi']['size'][$i];
					if ($this->upload->do_upload('file')) {
						$materi = $this->upload->data();
						$data = [
							'judul' => $_POST['judul_materi'][$i],
							'jenis'	=> 'file',
							'materi' => $materi['file_name'],
							'tipe_file' => $materi['file_ext'],
							'ukuran_file' => $materi['file_size'],
							'materi_info_id' => $infoMateriID
						];
						$this->db->insert('materi_kbm', $data);
					}
				}
			}
		}
		$this->db->trans_complete();
	}

	public function processLinkVideo($infoMateriID)
	{
		$url_video = $this->input->post('link_video', true);
		if ($url_video) {
			for ($i = 0; $i < count($url_video); $i++) {
				$youtube = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url_video[$i], $url_match);
				$embed_url[$i] = 'https://www.youtube.com/embed/' . $url_match[1];
				$dataVideo = [
					'judul' => $_POST['judul_video'][$i],
					'jenis'	=> 'link',
					'materi' => $embed_url[$i],
					'materi_info_id' => $infoMateriID
				];
				$this->db->insert('materi_kbm', $dataVideo);
			}
		}
	}
}
