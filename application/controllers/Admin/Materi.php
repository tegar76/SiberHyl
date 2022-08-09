<?php

class Materi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		checkAdminLogin();
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$tahun_ajar = $this->master->getActiveTahunAkademik();
		if ($tahun_ajar == null) {
			$this->tahun_ajar = [
				'tahun_id' => 0,
				'semester' => 0,
				'tahun' => ''
			];
		} else {
			$this->tahun_ajar = $tahun_ajar;
		}
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
		$data['materi'] = $this->master->materiPembelajaranAdmin();
		$data['tahun_ajar'] = $this->tahun_ajar;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_materi()
	{
		$id = $this->input->get('id');
		$materi = $this->master->detailMateri($id);
		if ($id && $materi) {
			$data['title'] = 'Detail Materi (Admin)';
			$data['content'] = 'admin/contents/jadwal/v_detail_materi';
			$data['materi'] = $materi;
			$data['pdf'] = $this->master->modulMateri('file', $materi->id);
			$data['video'] = $this->master->modulMateri('link', $materi->id);
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_materi()
	{
		$data['title'] = 'Tambah Materi (Admin)';
		$data['content'] = 'admin/contents/jadwal/v_tambah_materi';
		if (isset($_POST['upload'])) {
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
				]
			]);

			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$jurusanID = $this->input->post('jurusan', true);
				$detailMateri = [
					'index_kelas' => $this->input->post('index_kelas', true),
					'mapel_id'	=> $this->input->post('mapel', true),
					'jurusan_id'  => (isset($jurusanID)) ? $jurusanID : 0,
					'guru_id' => $this->session->userdata('adminId'),
					'kelas_id' => 0,
					'status' => 1
				];
				$this->db->insert('detailmateri', $detailMateri);
				$detailMateriID = $this->db->insert_id();
				$file_	= $_FILES['file_materi']['name'];
				$url_	= $_POST['link_video'];

				if (isset($file_)) {
					$this->processMateri($detailMateriID);
				}

				if (array_filter($url_)) {
					$this->processLinkVideo($detailMateriID);
				}

				$this->message('Berhasil', 'Data Materi Berhasil Ditambah', 'success');
				return redirect('master/materi');
			}
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
			$this->check_storage_materi($dirKelas, $jurusan->kode_jurusan);
		} else {
			$pathUpload = './storage/materi/' . $dirKelas . '/';
			$this->check_storage_materi($dirKelas);
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
							'file_materi' => $materi['file_name'],
							'file_type' => $materi['file_ext'],
							'file_size' => $materi['file_size'],
							'detailmateri_id' => $infoMateriID
						];
						$this->db->insert('materipembelajaran', $data);
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
					'file_materi' => $embed_url[$i],
					'detailmateri_id' => $infoMateriID
				];
				$this->db->insert('materipembelajaran', $dataVideo);
			}
		}
	}

	public function update_materi($id = false)
	{
		$materi = $this->master->detailMateri($id);
		if ($id && $materi) {
			$data['title'] = 'Edit Materi (Admin)';
			$data['content'] = 'admin/contents/jadwal/v_edit_materi';
			$data['materi'] = $materi;
			$data['pdf'] = $this->master->modulMateri('file', $materi->id);
			$data['video'] = $this->master->modulMateri('link', $materi->id);

			if (isset($_POST['update'])) {
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
					$this->db->where('detailmateri_id', $infoMateriID);
					$this->db->update('detailmateri');

					$url_	= $_POST['link_video'];
					$this->processMateri($infoMateriID);
					if (array_filter($url_)) {
						$this->processLinkVideo($infoMateriID);
					}
					$this->message('Berhasil', 'Data Materi Berhasil Diupdate', 'success');
					return redirect('master/materi/update_materi/' . $infoMateriID);
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function hapusAllMateri()
	{
		$materiInfoID	= $this->input->post('materi_info_id', true);
		$materi = $this->master->detailMateri($materiInfoID);
		$kelas = strtolower($materi->kelas);
		$dirKelas = 'kelas-' . $kelas;
		$pathMateri = './storage/materi/';
		if ($materi->jurusan == null) {
			$pathMateri = './storage/materi/' . $dirKelas . '/';
		} else {
			$pathMateri = './storage/materi/' . $dirKelas . '/' . $materi->kode . '/';
		}

		// hapus file materi pembelajaran
		$pdf = $this->master->modulMateri('file', $materi->id);
		if (!empty($pdf)) {
			foreach ($pdf as $row) {
				@unlink(FCPATH . $pathMateri . $row->file_materi);
				$this->db->where_in('materi_id', $row->materi_id);
				$this->db->delete('materipembelajaran');
			}
		}

		// hapus video pembelajaran
		$video = $this->master->modulMateri('link', $materi->id);
		if (!empty($video)) {
			foreach ($video as $row) {
				$this->db->where_in('materi_id', $row->materi_id);
				$this->db->delete('materipembelajaran');
			}
		}
		$this->db->where('detailmateri_id', $materi->id);
		$this->db->delete('detailmateri');

		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus materi pembelajaran',
			'success' => true
		];
		echo json_encode($reponse);
	}

	public function delete_file_materi()
	{
		$materiID = $this->input->post('materi_id', true);
		$materi = $this->master->getMateri($materiID);
		$kelas	= strtolower($materi->kelas);
		$dirKelas = 'kelas-' . $kelas;
		$pathMateri	= './storage/materi/';
		if ($materi->jurusan == null) {
			$pathMateri = './storage/materi/' . $dirKelas . '/';
		} else {
			$pathMateri = './storage/materi/' . $dirKelas . '/' . $materi->jurusan . '/';
		}

		if (!empty($materi)) {
			@unlink(FCPATH . $pathMateri . $materi->file);
			$this->db->where_in('materi_id', $materi->materi_id);
			$this->db->delete('materipembelajaran');
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

	public function delete_materi_video()
	{
		$materiID	= $this->input->post('materi_id');
		$fileMateri = $this->db->get_where('materipembelajaran	', ['materi_id' => $materiID])->row();
		if (!empty($fileMateri)) {
			$this->db->where_in('materi_id', $fileMateri->materi_id);
			$this->db->delete('materipembelajaran');
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


	public function update_file_materi($id)
	{
		$materi = $this->master->getMateri($id);
		if ($id and $materi) {
			$data['title'] = 'Edit Materi Pembelajaran';
			$data['content'] = 'admin/contents/jadwal/materi_pdf/v_edit_materi_pdf';
			$data['materi'] = $materi;
			if (isset($_POST['update_file'])) {
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
			}
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$this->process_update_file();
				$this->message('Berhasil', 'Data Materi Berhasil Diupdate', 'success');
				return redirect('master/materi/update_materi/' . $materi->detail_id);
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}


	public function process_update_file()
	{
		$materi_id = $this->input->post('materi_id', true);
		$materi	= $this->master->getMateri($materi_id);
		$dirKelas = strtolower('kelas-' . $materi->kelas);
		$pathMateri = './storage/materi/';
		if ($materi->jurusan == null) {
			$pathMateri = './storage/materi/' . $dirKelas . '/';
		} else {
			$pathMateri = './storage/materi/' . $dirKelas . '/' . $materi->jurusan . '/';
		}

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
				$materiLama = $materi->file;
				$materiBaru = $this->upload->data();
				if ($materiLama != 'default.pdf') {
					@unlink(FCPATH . $pathMateri . $materiLama);
				}
				$updateMata = [
					'file_materi' => $materiBaru['file_name'],
					'file_type' => $materiBaru['file_ext'],
					'file_size' => $materiBaru['file_size'],
				];
				$this->db->set($updateMata);
			}
		}
		$this->db->set('judul', $this->input->post('judul_materi_update', true));
		$this->db->set('update_time', date('Y-m-d H:i:s'));
		$this->db->where('materi_id', $this->input->post('materi_id', true));
		$this->db->update('materipembelajaran');
	}


	public function update_materi_video($id)
	{
		$materi = $this->master->getMateri($id);
		if ($id and $materi) {
			$data['title'] = 'Edit Video Pembelajaran';
			$data['content'] = 'admin/contents/jadwal/v_edit_materi_video';
			$data['materi'] = $materi;
			if (isset($_POST['update_video'])) {
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
					$this->process_upadate_video();
					$this->message('Berhasil', 'Data Materi Berhasil Diupdate', 'success');
					return redirect('master/materi/update_materi/' . $materi->detail_id);
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function process_upadate_video()
	{
		$materi_id = $this->input->post('materi_id', true);
		$materi	= $this->master->getMateri($materi_id);
		$url_video = $this->input->post('link_video_update', true);
		if ($materi->file == $url_video) {
			$this->db->set('file_materi', $url_video);
		} else {
			$youtube = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url_video, $url_match);
			$embed_url = 'https://www.youtube.com/embed/' . $url_match[1];
			$this->db->set('file_materi', $embed_url);
		}
		$this->db->set('judul', $this->input->post('judul_video_update', true));
		$this->db->set('update_time',  date('Y-m-d H:i:s'));
		$this->db->where('materi_id', $materi_id);
		$this->db->update('materipembelajaran');
	}

	public function view_materi($id = null, $file = null)
	{
		$materi = $this->master->getMateri($id);
		if ($id && $file && $materi) {
			$dirKelas = strtolower('kelas-' . $materi->kelas);
			$path_pdf = 'storage/materi/';
			if ($materi->jurusan == null) {
				$path_pdf = 'storage/materi/' . $dirKelas . '/';
			} else {
				$path_pdf = 'storage/materi/' . $dirKelas . '/' . $materi->jurusan . '/';
			}
			$pdf = FCPATH . './' . $path_pdf . $materi->file;
			if (file_exists($pdf)) {
				$data['pdf'] =  base_url($path_pdf . $materi->file);
				$this->load->view('pdf_viewer/pdf_viewer', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function view_materi_guru($file = null)
	{
		if ($file) {
			$pdf = FCPATH . './storage/guru/materi/' . $file;
			if (file_exists($pdf)) {
				$data['pdf'] = base_url('storage/guru/materi/') . $file;
				$this->load->view('pdf_viewer/pdf_viewer', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function check_storage_materi($dir1 = null, $dir2 = null)
	{
		if (!is_dir('storage')) :
			mkdir('./storage', 0777, true);
		endif;

		$dir_exist = true;
		if (!is_dir('storage/materi')) :
			mkdir('./storage/materi', 0777, true);
			$dir_exist = false; // dir not exist
		endif;

		if ($dir1) {
			if (!is_dir('storage/materi/' . $dir1)) :
				mkdir('./storage/materi/' . $dir1, 0777, true);
				$dir_exist = false; // dir not exist
			endif;
		}

		if ($dir2) {
			if (!is_dir('storage/materi/' . $dir1 . '/' . $dir2)) :
				mkdir('./storage/materi/' . $dir1 . '/' . $dir2, 0777, true);
				$dir_exist = false; // dir not exist
			endif;
		}

		return $dir_exist;
	}

	public function materi_guru()
	{
		$data['title']	= 'Materi (Guru)';
		$data['content']	= 'admin/contents/jadwal/v_materi_guru';
		$data['tahun_ajar']	= $this->tahun_ajar;
		$data['materi']	= $this->master->materiGuru();
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_materi_guru()
	{
		$id = $this->input->get('id');
		$materi = $this->master->getDetailMateriGuru($id);
		if ($id && $materi) {
			$data['title'] = 'Detail Materi (Guru)';
			$data['content'] = 'admin/contents/jadwal/v_detail_materi_guru';
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['materi'] = $materi;
			$data['pdf'] = $this->master->modulMateri('file', $materi->id);
			$data['video'] = $this->master->modulMateri('link', $materi->id);
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
