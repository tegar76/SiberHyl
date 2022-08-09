<?php

class Data extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isGuruLogin();
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('SiswaModel', 'siswa', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
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

	public function data_siswa($kode = false)
	{
		$guru	= $this->userGuru;
		$kelas = $this->input->get('kelas');
		$data['kelas'] =  $this->guru->kelasGuruPengajar($guru->guru_nip);
		if ($kelas) {
			$no = 1;
			$students = $this->master->getDataSiswa(['kode_kelas' => $kelas]);
			if (!empty($students)) {
				foreach ($students as $row => $value) {
					$siswa['nomor'] = $no++;
					$siswa['kelas']	= $value->kode_kelas;
					$siswa['nis']	= $value->siswa_nis;
					$siswa['nisn']	= $value->siswa_nisn;
					$siswa['nama']	= $value->siswa_nama;
					$siswa['jk']	= $value->siswa_kelamin;
					$siswa['asal']	= $value->asal_kelas;
					$siswa['status'] = $value->status;
					$siswa['online'] = ($value->status_online == 'online') ? '<p class="text-success">Online</p>' : '<p class="text-danger">Offline</p>';
					$data_siswa[] = $siswa;
				}
				$data['students'] = $data_siswa;
				$data['wali']  = $this->master->getDetailKelas($kode);
			}
		} else {
			$data['students'] = array();
			$data['wali'] = array();
		}
		$data['title'] = 'Data Siswa';
		$data['guru'] = $guru;
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['content'] = 'guru/contents/data/v_data_siswa';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detail_siswa()
	{
		$data['guru'] = $this->userGuru;
		$nis = $this->input->get('nis');
		$student = $this->siswa->getWhere(['siswa_nis' => $nis]);
		if ($student) {
			$data['student'] = $student;
			$data['title'] = 'Detail Siswa ' . (!empty($student)) ? $student->siswa_nama : '';
			$data['content'] = 'guru/contents/data/v_detail_siswa';
		} else {
			$data['title'] = '404 Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function data_materi()
	{
		$data['guru'] = $this->userGuru;
		$data['notif'] = 'check_new_info()';
		$data['tahun_ajar'] = $this->tahun_ajar;
		$user = $this->input->get('user');
		if ($user == 'guru') {
			$data['title'] = 'Data Materi';
			$data['content'] = 'guru/contents/data/v_data_materi_guru';
			$data['materi'] = $this->guru->getMateriGuru($data['guru']->guru_id);
		} elseif ($user == 'admin') {
			$data['title'] = 'Data Materi (Admin)';
			$data['content'] = 'guru/contents/data/v_data_materi_admin';
			$data['materi'] = $this->master->materiPembelajaranAdmin();
		} else {
			$data['title'] = '404 Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detail_materi()
	{
		$data['guru'] = $this->userGuru;
		$data['tahun_ajar'] = $this->tahun_ajar;
		$user = $this->input->get('user');
		$id = $this->input->get('id');
		if ($user == 'guru') {
			$data['title'] = 'Data Materi (Guru)';
			$data['content'] = 'guru/contents/data/v_detail_data_materi_guru';
			$data['detailMateri'] = $this->master->getDetailMateriGuru($id);
			$data['bahanMateri'] = $this->master->modulMateri('file', $id);
			$data['videoMateri'] = $this->master->modulMateri('link', $id);
		} elseif ($user == 'admin') {
			$data['title'] = 'Detail Data Materi (Admin)';
			$data['content'] = 'guru/contents/data/v_detail_data_materi_admin';
			$data['detailMateri'] = $this->master->detailMateri($id);
			$data['bahanMateri'] = $this->master->modulMateri('file', $id);
			$data['videoMateri'] = $this->master->modulMateri('link', $id);
		} else {
			$data['title'] = '404 Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tambah_materi()
	{
		$data['guru'] = $this->userGuru;
		$data['notif'] = 'check_new_info()';
		$data['kelas'] =  $this->guru->kelasGuruPengajar($data['guru']->guru_nip);
		$data['mapel'] =  $this->guru->mapelGuruPengajar($data['guru']->guru_nip);
		$data['title'] = 'Tambah Data Materi (Guru)';
		$data['content'] = 'guru/contents/data/v_tambah_data_materi_guru';
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules([
				[
					'field' => 'kelas',
					'label' => 'Kelas',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
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
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, FALSE);
			} else {
				$this->process_materi();
				$this->message('Berhasil', 'Data Materi berhasil ditambahkan', 'success');
				return redirect('guru/data/data_materi?user=guru');
			}
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function process_materi()
	{
		$this->db->trans_start();
		$kelas	= $this->guru->jurusanKelas($this->input->post('kelas', true));
		$data	= array(
			'index_kelas' => $kelas->index,
			'mapel_id'	=> $this->input->post('mapel', true),
			'jurusan_id' => $kelas->j_id,
			'guru_id' => $this->session->userdata('id_'),
			'kelas_id' => $kelas->k_id,
			'status' => 2
		);
		$this->db->insert('detailmateri', $data);
		$materi_id = $this->db->insert_id();
		$file_	= $_FILES['file_materi']['name'];
		$url_	= $_POST['link_video'];
		$this->processMateri($file_, $materi_id);
		$this->processLinkVideo($url_, $materi_id);
		$this->db->trans_complete();
	}

	public function edit_materi($id)
	{
		$data['guru'] = $this->userGuru;
		$data['notif'] = ' check_new_info()';
		$materi = $this->master->getDetailMateriGuru($id);
		if ($id && $materi) {
			$data['title'] = 'Edit Data Materi (Guru)';
			$data['content'] = 'guru/contents/data/v_edit_data_materi_guru';
			$data['detailMateri'] = $materi;
			$data['bahanMateri'] = $this->master->modulMateri('file', $id);
			$data['videoMateri'] = $this->master->modulMateri('link', $id);

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
					$this->load->view('guru/layout/wrapper', $data, FALSE);
				} else {
					$infoMateriID = $this->input->post('detailmateri_id', true);
					$this->db->set('update_time', date('Y-m-d H:i:s'));
					$this->db->where('detailmateri_id', $infoMateriID);
					$this->db->update('detailmateri');
					$file_	= $_FILES['file_materi']['name'];
					$url_	= $_POST['link_video'];
					$this->processMateri($file_, $infoMateriID);
					$this->processLinkVideo($url_, $infoMateriID);
					$this->message('Berhasil', 'Data Materi berhasil diupdate', 'success');
					return redirect('guru/data/edit_materi/' . $id);
				}
			}
		} else {
			$data['title'] = '404 Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function processMateri($file_, $detailmateri_id)
	{
		if (isset($file_)) {
			$config['upload_path'] = './storage/guru/materi/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']	= '2048';
			$config['encrypt_name'] = true;
			$config['overwrite'] = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->guru->check_storage_guru('materi');

			$jumlahMateri = count($file_);
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
							'detailmateri_id' => $detailmateri_id
						];
						$this->db->insert('materipembelajaran', $data);
					}
				}
			}
		}
	}

	public function processLinkVideo($url_, $detailmateri_id)
	{
		if (array_filter($url_)) {
			$url_video = $this->input->post('link_video', true);
			if (isset($url_video)) {
				for ($i = 0; $i < count($url_video); $i++) {
					$youtube = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url_video[$i], $url_match);
					$embed_url[$i] = 'https://www.youtube.com/embed/' . $url_match[1];
					$dataVideo = [
						'judul' => $_POST['judul_video'][$i],
						'jenis'	=> 'link',
						'file_materi' => $embed_url[$i],
						'detailmateri_id' => $detailmateri_id
					];
					$this->db->insert('materipembelajaran', $dataVideo);
				}
			}
		}
	}

	public function update_bahan_materi()
	{
		$type = $this->input->get('type');
		$id	= $this->input->get('id');
		$data['guru'] = $this->userGuru;
		$data['notif'] = 'check_new_info()';
		if ($type && $id) {
			$materi =  $this->db->get_where('materipembelajaran', ['materi_id' => $id])->row();
			if ($type == 'pdf' && $materi) {
				$data['title'] = 'Edit File Materi (Guru)';
				$data['content'] = 'guru/contents/data/v_edit_file_materi_guru';
				$data['materi'] = $materi;
			} elseif ($type == 'video' && $materi) {
				$data['title'] = 'Edit Video Materi (Guru)';
				$data['content'] = 'guru/contents/data/v_edit_video_materi_guru';
				$data['materi'] = $materi;
			}
		} else {
			$data['title'] = '404 Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function process_update_pdf()
	{
		$materiID = $this->input->post('materi_id', true);
		$this->form_validation->set_rules([
			[
				'field' => 'judul_materi',
				'label' => 'Judul Materi Pembelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
		]);
		if ($this->form_validation->run() == false) {
			redirect('guru/data/update_bahan_materi?type=pdf&id=' . $materiID);
		} else {
			$materi = $this->master->getMateri($materiID);
			$updateMateri = $_FILES['file_materi_update']['name'];
			if ($updateMateri) {
				$config['upload_path'] = './storage/guru/materi/';
				$config['allowed_types'] = 'pdf';
				$config['max_size']	= '2048';
				$config['encrypt_name'] = true;
				$config['overwrite'] = true;
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
					if ($materiLama) {
						@unlink(FCPATH . './storage/guru/materi/' . $materiLama);
					}
					$updateMata = [
						'file_materi' => $materiBaru['file_name'],
						'file_type' => $materiBaru['file_ext'],
						'file_size' => $materiBaru['file_size'],
						'update_time' => date('Y-m-d H:i:s')
					];
					$this->db->set($updateMata);
				}
			}
		}
		$this->db->set('judul', $this->input->post('judul_materi', true));
		$this->db->where('materi_id', $this->input->post('materi_id', true));
		$this->db->update('materipembelajaran');
		return redirect('guru/data/edit_materi/' . $materi->detail_id);
	}

	public function process_update_video()
	{
		$materi_id = $this->input->post('materi_id', true);
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
			redirect('guru/data/update_bahan_materi?type=video&id=' . $materi_id);
		} else {
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
			return redirect('guru/data/edit_materi/' . $materi->detail_id);
		}
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

	public function delete_materi_pdf()
	{
		$materi_id  = $this->input->get('materi_id');
		$fileMateri = $this->db->get_where('materipembelajaran', ['materi_id' => $materi_id])->row();
		if (!empty($fileMateri)) {
			@unlink(FCPATH . './storage/guru/materi/' . $fileMateri->materi);
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

	public function delete_materi_video()
	{
		$materi_id  = $this->input->get('materi_id');
		$fileMateri = $this->db->get_where('materipembelajaran', ['materi_id' => $materi_id])->row();
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

	public function delete_all_materi()
	{
		$materi_id = $this->input->get('id');
		$materi = $this->master->detailMateri($materi_id);

		// hapus file materi pembelajaran
		$pdf = $this->master->modulMateri('file', $materi->id);
		if (!empty($pdf)) {
			foreach ($pdf as $row) {
				@unlink(FCPATH . '.storage/guru/materi/' . $row->file_materi);
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
}
