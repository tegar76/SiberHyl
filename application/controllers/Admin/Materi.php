<?php

class Materi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$tahun_ajar = $this->jadwal->get_activate_tahunajar();
		if ($tahun_ajar == null) {
			$this->tahun_ajar = [
				'semester' => 0,
				'tahun' => ''
			];
		} else {
			$this->tahun_ajar = $tahun_ajar;
		}
		checkAdminLogin();
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
		$data['title'] = 'Materi (Admin)';
		$data['content'] = 'admin/contents/jadwal/v_materi';
		$data['materi'] = $this->master->get_materi()->result();
		$data['tahun_ajar'] = $this->tahun_ajar;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detailMateri($idMateri)
	{
		$idMateri = $this->secure->decrypt_url($idMateri);
		$data['title'] = 'Detail Materi (Admin)';
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
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jurusan',
				'label' => 'Jurusan',
				'rules' => 'trim|xss_clean',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'mapel',
				'label' => 'Mata Pelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			// [
			// 	'field' => 'judul_materi[]',
			// 	'label' => 'Judul Materi Pembelajaran',
			// 	'rules' => 'trim|required|xss_clean',
			// 	'errors' => [
			// 		'required' => '{field} harus diisi'
			// 	]
			// ],
			// [
			// 	'field' => 'judul_video[]',
			// 	'label' => 'Judul Video',
			// 	'rules' => 'trim|required|xss_clean',
			// 	'errors' => [
			// 		'required' => '{field} harus diisi'
			// 	]
			// ],
			// [
			// 	'field' => 'link_video[]',
			// 	'label' => 'Link Video Pembelajaran',
			// 	'rules' => 'trim|xss_clean',
			// 	'errors' => []
			// ]
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Materi (Admin)';
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
			$file_	= $_FILES['file_materi']['name'];
			$title_	= $_POST['judul_video'];
			$url_	= $_POST['link_video'];

			if (isset($file_)) {
				$this->processMateri($infoMateriID);
			}

			if (array_filter($url_)) {
				$this->processLinkVideo($infoMateriID);
			}

			$this->message('Berhasil', 'Data Materi Berhasil Ditambah', 'success');
			return redirect('master/materi');
		}
	}

	public function processMateri($infoMateriID)
	{
		$this->db->trans_start();
		$kelas	= $this->input->post('index_kelas', true);
		$jurusan = $this->input->post('jurusan', true);
		$kelas = strtolower($kelas);
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
		if (isset($url_video)) {
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

	public function editMateri($idMateri)
	{
		$idMateri = $this->secure->decrypt_url($idMateri);
		$data['title'] = 'Edit Materi (Admin)';
		$data['content'] = 'admin/contents/jadwal/v_edit_materi';
		$data['materi'] = $this->master->getDetailMateri($idMateri);
		$data['bahanMateri'] = $this->db->get_where('materi_kbm', ['materi_info_id' => $idMateri, 'jenis' => 'file'])->result();
		$data['videoMateri'] = $this->db->get_where('materi_kbm', ['materi_info_id' => $idMateri, 'jenis' => 'link'])->result();

		$this->form_validation->set_rules([
			[
				'field' => 'judul_materi[]',
				'label' => 'Judul Materi Pembelajaran',
				'rules' => 'trim|xss_clean',
				'errors' => []
			],
		]);

		if (isset($_POST['link_video[]']) || isset($_POST['judul_video[]'])) {
			$this->form_validation->set_rules([
				[
					'field' => 'judul_video[]',
					'label' => 'Judul Video',
					'rules' => 'trim|xss_clean',
					'errors' => []
				],
				[
					'field' => 'link_video[]',
					'label' => 'Link Video Materi Pembelajaran',
					'rules' => 'trim|required|xss_clean|valid_url',
					'errors' => [
						'required' => '{field} harus diisi',
						'valid_url' => '{field} harus valid!'
					]
				]
			]);
		}

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$infoMateriID = $this->input->post('materi_info_id', true);
			$this->db->set('update_time', date('Y-m-d H:i:s'));
			$this->db->where('materi_info_id', $infoMateriID);
			$this->db->update('materi_info');

			$url_	= $_POST['link_video'];
			$this->processMateri($infoMateriID);
			if (array_filter($url_)) {
				$this->processLinkVideo($infoMateriID);
			}
			$this->message('Berhasil', 'Data Materi Berhasil Diupdate', 'success');
			return redirect('master/materi/editMateri/' . $this->secure->encrypt_url($infoMateriID));
		}
	}

	public function hapusAllMateri()
	{
		$materiInfoID	= $this->input->post('materi_info_id', true);
		$materi = $this->master->getDetailMateri($materiInfoID);
		$kelas = strtolower($materi->index_kelas);
		$dirKelas = 'kelas-' . $kelas;
		$pathMateri = './storage/materi/';
		if ($materi->jurusan_id == 0) {
			$pathMateri = './storage/materi/' . $dirKelas . '/';
		} else {
			$pathMateri = './storage/materi/' . $dirKelas . '/' . $materi->kode_jurusan . '/';
		}

		// hapus file materi pembelajaran
		$materiKBM = $this->master->getMateriKBM($materi->materi_info_id, 'file');
		if (!empty($materiKBM)) {
			foreach ($materiKBM as $row) {
				@unlink(FCPATH . $pathMateri . $row->materi);
				$this->db->where_in('materi_id', $row->materi_id);
				$this->db->delete('materi_kbm');
			}
		}

		// hapus video pembelajaran
		$materiVideo = $this->master->getMateriKBM($materi->materi_info_id, 'link');
		if (!empty($materiVideo)) {
			foreach ($materiVideo as $row) {
				$this->db->where_in('materi_id', $row->materi_id);
				$this->db->delete('materi_kbm');
			}
		}
		$this->db->where('materi_info_id', $materi->materi_info_id);
		$this->db->delete('materi_info');

		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus materi pembelajaran',
			'success' => true
		];
		echo json_encode($reponse);
	}

	public function deleteMateri()
	{
		$materiID 		= $this->input->post('materi_id', true);
		$materiInfoID	= $this->input->post('materi_info_id', true);
		$materiID		= $this->secure->decrypt_url($materiID);
		$materiInfoID	= $this->secure->decrypt_url($materiInfoID);
		$materi		= $this->master->getDetailMateri($materiInfoID);
		$kelas	= strtolower($materi->index_kelas);
		$dirKelas = 'kelas-' . $kelas;
		$pathMateri	= './storage/materi/';
		if ($materi->jurusan_id == 0) {
			$pathMateri = './storage/materi/' . $dirKelas . '/';
		} else {
			$pathMateri = './storage/materi/' . $dirKelas . '/' . $materi->kode_jurusan . '/';
		}

		$fileMateri = $this->db->get_where('materi_kbm', ['materi_id' => $materiID])->row();
		if (!empty($fileMateri)) {
			@unlink(FCPATH . $pathMateri . $fileMateri->materi);
			$this->db->where_in('materi_id', $fileMateri->materi_id);
			$this->db->delete('materi_kbm');
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Anda telah menghapus materi pembelajaran',
				'success' => true
			];
		} else {
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Gagal menghapus materi pembelajaran',
				'success' => false
			];
		}
		echo json_encode($reponse);
	}

	public function deleteVideoMateri()
	{
		$materiID	= $this->input->post('materi_id');
		$materiID	= $this->secure->decrypt_url($materiID);
		$fileMateri = $this->db->get_where('materi_kbm', ['materi_id' => $materiID])->row();
		if (!empty($fileMateri)) {
			$this->db->where_in('materi_id', $fileMateri->materi_id);
			$this->db->delete('materi_kbm');
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Anda telah menghapus materi pembelajaran',
				'success' => true
			];
		} else {
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Gagal menghapus materi pembelajaran',
				'success' => false
			];
		}
		echo json_encode($reponse);
	}


	public function updateFileMateri($materiID)
	{
		$materiID = $this->secure->decrypt_url($materiID);
		$data['title'] = 'Edit Materi Pembelajaran';
		$data['content'] = 'admin/contents/jadwal/materi_pdf/v_edit_materi_pdf';
		$data['materi']	= $this->db->get_where('materi_kbm', ['materi_id' => $materiID])->row();
		$this->form_validation->set_rules([
			[
				'field' => 'judul_materi_update',
				'label' => 'Judul Materi Pembelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$this->process_update_file();
			$this->message('Berhasil', 'Data Materi Berhasil Diupdate', 'success');
			$materiInfoID	= $data['materi']->materi_info_id;
			return redirect('master/materi/editMateri/' . $this->secure->encrypt_url($materiInfoID));
		}
	}


	public function process_update_file()
	{
		$materiID = $this->input->post('materi_id', true);
		$materi = $this->master->getFileMateri($materiID);
		$kelas = strtolower($materi->index_kelas);
		$dirKelas	= 'kelas-' . $kelas;
		$pathMateri = './storage/materi/';
		if ($materi->kode_jurusan == null) {
			$pathMateri = './storage/materi/' . $dirKelas . '/';
		} else {
			$pathMateri = './storage/materi/' . $dirKelas . '/' . $materi->kode_jurusan . '/';
		}
		$this->db->set('update_time', date('Y-m-d H:i:s'));
		$this->db->where('materi_info_id', $materi->materi_info_id);
		$this->db->update('materi_info');
		$updateMateri = $_FILES['file_materi_update']['name'];
		if ($updateMateri) {
			$config['allowed_types'] = 'pdf';
			$config['max_size']	= '2048';
			$config['encrypt_name'] = true;
			$config['upload_path'] = $pathMateri;
			// 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			// 
			$_FILES['file']['name']		= $_FILES['file_materi_update']['name'];
			$_FILES['file']['type'] 	= $_FILES['file_materi_update']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['file_materi_update']['tmp_name'];
			$_FILES['file']['error'] 	= $_FILES['file_materi_update']['error'];
			$_FILES['file']['size'] 	= $_FILES['file_materi_update']['size'];
			if ($this->upload->do_upload('file')) {
				$materiLama = $materi->materi;
				$materiBaru = $this->upload->data();
				if ($materiLama != 'default.pdf') {
					@unlink(FCPATH . $pathMateri . $materiLama);
				}
				$updateMata = [
					'materi' => $materiBaru['file_name'],
					'tipe_file' => $materiBaru['file_ext'],
					'ukuran_file' => $materiBaru['file_size'],
				];
				$this->db->set($updateMata);
			}
		}
		$this->db->set('judul', $this->input->post('judul_materi_update', true));
		$this->db->where('materi_id', $this->input->post('materi_id', true));
		$this->db->update('materi_kbm');
	}


	public function editMateriVideo($materiID)
	{
		$materiID = $this->secure->decrypt_url($materiID);
		$data['title'] = 'Edit Video Pembelajaran';
		$data['content'] = 'admin/contents/jadwal/v_edit_materi_video';
		$data['materi']	= $this->db->get_where('materi_kbm', ['materi_id' => $materiID])->row();
		$this->form_validation->set_rules([
			[
				'field' => 'judul_video_update',
				'label' => 'Judul Materi Pembelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			[
				'field' => 'link_video_update',
				'label' => 'Link Video Materi Pembelajaran',
				'rules' => 'trim|required|xss_clean|valid_url',
				'errors' => [
					'required' => '{field} harus diisi',
					'valid_url' => '{field} harus Valid!'
				]
			]
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$this->process_upadte_video();
			$this->message('Berhasil', 'Data Materi Berhasil Diupdate', 'success');
			$materiInfoID	= $data['materi']->materi_info_id;
			return redirect('master/materi/editMateri/' . $this->secure->encrypt_url($materiInfoID));
		}
	}

	public function process_upadte_video()
	{
		$materiID = $this->input->post('materi_id', true);
		$materi = $this->db->get_where('materi_kbm', ['materi_id' => $materiID])->row();
		$judul_video = $this->input->post('judul_video_update', true);
		$url_video = $this->input->post('link_video_update', true);
		$this->db->set('update_time', date('Y-m-d H:i:s'));
		$this->db->where('materi_info_id', $materi->materi_info_id);
		$this->db->update('materi_info');
		if ($materi->materi == $url_video) {
			$this->db->set('materi', $url_video);
		} else {
			$youtube = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url_video, $url_match);
			$embed_url = 'https://www.youtube.com/embed/' . $url_match[1];
			$this->db->set('materi', $embed_url);
		}
		$this->db->set('judul', $judul_video);
		$this->db->where('materi_id', $materiID);
		$this->db->update('materi_kbm');
	}

	public function view_materi_pdf($materiID)
	{
		$materiID = $this->secure->decrypt_url($materiID);
		$materiPDF = $this->db->get_where('materi_kbm', ['materi_id' => $materiID])->row();
		$infoMateri = $this->master->getDetailMateri($materiPDF->materi_info_id);
		$kelas = strtolower($infoMateri->index_kelas);
		$dirKelas = 'kelas-' . $kelas;
		$path_pdf = '/storage/materi/';
		if ($infoMateri->kode_jurusan == null) {
			$path_pdf = '/storage/materi/' . $dirKelas . '/';
		} else {
			$path_pdf = '/storage/materi/' . $dirKelas . '/' . $infoMateri->kode_jurusan . '/';
		}
		$data['file_materi'] = base_url($path_pdf . $materiPDF->materi);
		$this->load->view('admin/contents/jadwal/materi_pdf/v_materi_pdf', $data);
	}


	public function materiGuru()
	{
		$data['title'] = 'Materi (Guru)';
		$data['content'] = 'admin/contents/jadwal/v_materi_guru';
		$data['materi'] = $this->master->get_materi()->result();
		$data['tahun_ajar'] = $this->tahun_ajar;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detailMateriGuru()
	{
		$data['title'] = 'Materi (Guru)';
		$data['content'] = 'admin/contents/jadwal/v_detail_materi_guru';
		$data['tahun_ajar'] = $this->tahun_ajar;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
