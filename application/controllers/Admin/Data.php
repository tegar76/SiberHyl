<?php

class Data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('SiswaModel', 'siswa', true);
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
		checkAdminLogin();
	}
	// message sweetalert 2 flashdata
	public function message($title = NULL, $text = NULL, $type = NULL)
	{
		return $this->session->set_flashdata([
			'title' => $title,
			'text' => $text,
			'type' => $type,
		]);
	}

	public function dataKelas()
	{
		$data['title'] = 'Data Kelas';
		$data['content'] = 'admin/contents/data/v_data_kelas';
		$data['classes'] = $this->master->getWaliKelas();
		$data['tahun_ajar'] = $this->tahun_ajar;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_kelas()
	{
		$data['title'] = 'Admin Siberhyl - Tambah Kelas';
		$data['content'] = 'admin/contents/data/v_tambah_kelas';
		$data['jurusan'] = $this->master->get_tablewhere('jurusan');
		$data['guru'] = $this->master->get_masterdata('guru');
		$this->form_validation->set_rules([
			[
				'field' => 'index_kelas',
				'label' => 'Index Kelas',
				'rules' => 'trim|required|xss_clean|in_list[X,XI,XII]',
				'errors' => [
					'required' => '{field} harus diisi',
					'in_list' => '{field} harus sesuai pada daftar'
				]
			],
			[
				'field' => 'kode_jurusan',
				'label' => 'Jurusan',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi',
				]
			],
			[
				'field' => 'kelas_ke',
				'label' => 'Kelas',
				'rules' => 'trim|required|xss_clean|numeric',
				'errors' => [
					'required' => '{field} harus diisi',
					'numeric' => '{field} harus berupa angka'
				]
			],
		]);
		$this->form_validation->set_rules('kode_guru', 'Wali Kelas', 'required|callback_walikelas_check');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$indexKelas	= $this->input->post('index_kelas', true);
			$kodeJurusan = $this->input->post('kode_jurusan', true);
			$waliKelas	= $this->input->post('kode_guru', true);
			$kelasKe	= $this->input->post('kelas_ke', true);
			$namaKelas = $indexKelas . ' ' . $kodeJurusan . ' ' . $kelasKe;
			$kodeKelas = url_title($namaKelas, 'dash',  true);
			if ($this->master->check_kodekelas($kodeKelas) == false) {
				$this->session->set_flashdata('kode_kelas', 'kelas sudah tersedia');
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$insertKelas = array(
					'kode_kelas'	=> $kodeKelas,
					'index_kelas'	=> $indexKelas,
					'nama_kelas'	=> $namaKelas,
					'guru_nip'		=> $waliKelas,
					'kode_jurusan'	=> $kodeJurusan
				);
				$this->db->insert('kelas', $insertKelas);
				$this->message('Berhasil', 'Anda telah menambah kelas baru', 'success');
				return redirect('master/data/kelas');
			}
		}
	}

	public function walikelas_check($str)
	{
		$check_wali = $this->master->check_walikelas($str);

		if ($check_wali == false) {
			$this->form_validation->set_message('walikelas_check', '{field} tersebut sudah menjadi wali kelas dikelas lain, silangkan pilih kembali');
			return false;
		}
		return true;
	}

	public function update_kelas($kode_kelas = null)
	{
		$kelas = $this->master->getDetailKelas($kode_kelas);
		if ($kode_kelas and $kelas) {
			$data['title']	= 'Edit Kelas';
			$data['content'] = 'admin/contents/data/v_edit_kelas';
			$data['kelas'] = $kelas;
			$data['jurusan'] = $this->master->get_tablewhere('jurusan');
			$data['guru'] = $this->master->get_masterdata('guru');
			$this->form_validation->set_rules('wali_kelas_edit', 'Wali Kelas', 'required');
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$nip_guru	= $this->input->post('wali_kelas_edit', true);
				$check_wali = $this->db->get_where('kelas', ['guru_nip' => $nip_guru])->row();
				if (!empty($check_wali)) {
					if ($data['kelas']->guru_nip == $check_wali->guru_nip) {
						$this->db->set('update_time',  date('Y-m-d H:i:s'));
						$this->db->where('kode_kelas', $data['kelas']->kode_kelas);
						$this->db->update('kelas');
						$this->message('Berhasil', 'Anda telah mengupdate kelas', 'success');
						return redirect('master/data/kelas');
					} else {
						$this->session->set_flashdata('wali_kelas', 'Wali Kelas sudah sudah tersedia');
						$this->load->view('admin/layout/wrapper', $data, FALSE);
					}
				} else {
					$this->db->set('guru_nip', $nip_guru);
					$this->db->set('update_time',  date('Y-m-d H:i:s'));
					$this->db->where('kode_kelas', $kelas->kode_kelas);
					$this->db->update('kelas');
					$this->message('Berhasil', 'Anda telah mengupdate kelas', 'success');
					return redirect('master/data/kelas');
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete_kelas()
	{
		$kodeKelas = $this->input->post('kode_kelas', true);
		$this->db->delete('kelas', ['kode_kelas' => $kodeKelas]);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus kelas ini',
			'success' => true
		];
		echo json_encode($reponse);
	}

	public function dataMapel()
	{
		$data['title'] = 'Data Mata Pelajaran';
		$data['content'] = 'admin/contents/data/v_data_mapel';
		$data['mapel'] = $this->master->get_datatable('mapel');
		$data['tahun_ajar'] = $this->tahun_ajar;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_mapel()
	{
		$data['title'] = 'Tambah Mata Pelajaran';
		$data['content'] = 'admin/contents/data/v_tambah_mapel';
		$this->form_validation->set_rules([
			[
				'field' => 'nama_mapel',
				'label' => 'Mata Pelajaran',
				'rules' => 'trim|required|xss_clean|min_length[4]',
				'errors' => [
					'required' => '{field} harus diisi',
					'min_length' => '{field} terlalu pendek'
				]
			]
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$mapel = $this->input->post('nama_mapel', true);
			$slug  = url_title($mapel, 'dash', true);
			$check_mapel = $this->db->get_where('mapel', ['slug_mapel' => $slug])->num_rows();
			if ($check_mapel == 1) {
				$this->session->set_flashdata('check_mapel', 'Mata Pelajaran sudah sudah tersedia');
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$data = array(
					'slug_mapel' => $slug,
					'nama_mapel' => $mapel
				);
				$this->db->insert('mapel', $data);
				$this->message('Berhasil', 'Anda telah menambahkan mata pelajaran', 'success');
				return redirect('master/data/mata-pelajaran');
			}
		}
	}

	public function update_mapel($slug = null)
	{
		$mapel = $this->db->get_where('mapel', ['slug_mapel' => $slug])->row();
		if ($slug && $mapel) {
			$data['title'] = 'Data Ruangan';
			$data['content'] = 'admin/contents/data/v_edit_mapel';
			$data['mapel'] = $mapel;
			$this->form_validation->set_rules([
				[
					'field' => 'nama_mapel_edit',
					'label' => 'Mata Pelajaran',
					'rules' => 'trim|required|xss_clean|min_length[4]',
					'errors' => [
						'required' => '{field} harus diisi',
						'min_length' => '{field} terlalu pendek'
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$mapel = $this->input->post('nama_mapel_edit', true);
				$slug  = url_title($mapel, 'dash', true);
				$check_mapel = $this->db->get_where('mapel', ['slug_mapel' => $slug])->row();
				if (!empty($check_mapel)) {
					if ($slug === $check_mapel->slug_mapel) {
						$this->db->set('update_time',  date('Y-m-d H:i:s'));
						$this->db->where('mapel_id', $this->input->post('mapel_id', true));
						$this->db->update('mapel');
						$this->message('Berhasil', 'Anda telah mengupdate mata pelajaran', 'success');
						return redirect('master/data/mata-pelajaran');
					} else {
						$this->session->set_flashdata('check_mapel', 'Mata Pelajaran sudah sudah tersedia');
						$this->load->view('admin/layout/wrapper', $data, FALSE);
					}
				} else {
					$data = array(
						'slug_mapel' => $slug,
						'nama_mapel' => $mapel,
						'update_time' => date('Y-m-d H:i:s')
					);
					$this->db->set($data);
					$this->db->where('mapel_id', $this->input->post('mapel_id', true));
					$this->db->update('mapel');
					$this->message('Berhasil', 'Anda telah mengupdate mata pelajaran', 'success');
					return redirect('master/data/mata-pelajaran');
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete_mapel()
	{
		$mapel_id = $this->input->post('mapel_id', true);
		$this->db->delete('mapel', ['mapel_id' => $mapel_id]);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus mata pelajaran ini',
			'success' => true
		];
		echo json_encode($reponse);
	}


	public function dataRuangan()
	{
		$data['title'] = 'Data Ruangan';
		$data['content'] = 'admin/contents/data/v_data_ruangan';
		$data['ruangan'] = $this->master->get_datatable('ruangan');
		$data['tahun_ajar'] = $this->tahun_ajar;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_ruangan()
	{
		$data['title'] = 'Tambah Data Ruangan';
		$data['content'] = 'admin/contents/data/v_tambah_ruangan';
		$this->form_validation->set_rules([
			[
				'field' => 'kode_ruangan',
				'label' => 'Kode Ruangan',
				'rules' => 'trim|required|xss_clean|max_length[8]|is_unique[ruangan.kode_ruang]',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah tersedia',
					'max_length' => '{field} terlalu panjang (maksimal 8 karakter)'
				]
			]
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$this->db->insert('ruangan', ['kode_ruang' => htmlspecialchars($this->input->post('kode_ruangan', true))]);
			$this->message('Berhasil', 'Anda telah menambahkan ruangan', 'success');
			return redirect('master/data/ruangan');
		}
	}

	public function update_ruangan($ruang = null)
	{
		$ruangan = $this->db->get_where('ruangan', ['ruang_id' => $ruang])->row();
		if ($ruang && $ruangan) {
			$data['title'] = 'Data Ruangan';
			$data['content'] = 'admin/contents/data/v_edit_ruangan';
			$data['ruangan'] = $ruangan;
			$kode_ruang = $this->input->post('kode_ruang_edit', true);
			if ($data['ruangan']->kode_ruang == $kode_ruang) {
				$this->form_validation->set_rules('kode_ruang_edit', 'Kode Ruangan', 'trim|required|xss_clean', [
					'required' => '{field} harus diisi'
				]);
			} else {
				$this->form_validation->set_rules('kode_ruang_edit', 'Kode Ruangan', 'trim|required|xss_clean|is_unique[ruangan.kode_ruang]', [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah tersedia'
				]);
			}
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$data = array(
					'kode_ruang' => htmlspecialchars($this->input->post('kode_ruang_edit', true)),
					'update_time' => date('Y-m-d H:i:s')
				);
				$this->db->set($data);
				$this->db->where('ruang_id', $this->input->post('ruang_id', true));
				$this->db->update('ruangan');
				$this->message('Berhasil', 'Anda telah menambahkan ruangan', 'success');
				return redirect('master/data/ruangan');
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete_ruangan()
	{
		$ruang_id = $this->input->post('ruang_id', true);
		$this->db->delete('ruangan', ['ruang_id' => $ruang_id]);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus mata pelajaran ini',
			'errcode' => 0,
			'success' => true
		];

		echo json_encode($reponse);
	}

	public function dataSiswa()
	{
		$kode = $this->input->get('kelas');
		$data['classes'] = $this->master->get_masterdata('kelas');
		if ($kode) {
			$data['students'] = $this->master->getDataSiswa(['kode_kelas' => $kode]);
			$data['walikelas'] = $this->master->getDetailKelas($kode);
		} else {
			$data['students'] = array();
			$data['walikelas'] = null;
		}
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['title'] = 'Data Siswa';
		$data['content'] = 'admin/contents/data/v_data_siswa';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function select_kelas_siswa()
	{
		$search = $this->input->get('search');
		$typesend = $this->input->get('type');
		if ($typesend == 'class') {
			$classes = $this->master->get_select2($typesend, $search);
			foreach ($classes as $class) {
				$result[] = [
					'id' => $class->kode_kelas,
					'text'	   => $class->nama_kelas
				];
			}
		}
		echo json_encode($result);
	}

	public function detail_siswa()
	{
		$nis = $this->input->get('nis');
		if ($nis) {
			$siswa = $this->siswa->getWhere(['siswa_nis' => $nis]);
			if (empty($siswa)) {
				$data['title'] = 'Not Found';
				$data['content'] = 'guru/contents/eror/v_not_found';
			} else {
				$data['siswa'] = $siswa;
				$data['title'] = 'Data Siswa';
				$data['content'] = 'admin/contents/data/v_detail_siswa';
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_siswa()
	{
		$data['title'] = 'Tambah Siswa';
		$data['content'] = 'admin/contents/data/v_tambah_siswa';
		$this->form_validation->set_rules([
			[
				'field' => 'nis',
				'label' => 'Nomor Induk Siswa',
				'rules' => 'trim|required|xss_clean|numeric|max_length[12]|is_unique[siswa.siswa_nis]',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}',
					'numeric' => '{field} harus angka',
					'max_length' => '{field} terlalu panjang'
				]
			],
			[
				'field' => 'nisn',
				'label' => 'Nomor Induk Siswa Nasional',
				'rules' => 'trim|required|xss_clean|numeric|min_length[4]|is_unique[siswa.siswa_nisn]',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}',
					'numeric' => '{field} harus angka',
					'min_length' => '{field} terlalu pendek'
				]
			],
			[
				'field' => 'nama_siswa',
				'label' => 'Nama Siswa',
				'rules' => 'trim|required|xss_clean|min_length[4]',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}',
					'min_length' => '{field} terlalu pendek'
				]
			],
			[
				'field' => 'tempat_lahir',
				'label' => 'Tempat Lahir',
				'rules' => 'trim|xss_clean',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}',
				]
			],
			[
				'field' => 'tanggal_lahir',
				'label' => 'Tanggal Lahir',
				'rules' => 'trim|xss_clean',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}',
				]
			],
			[
				'field' => 'jenis_kelamin',
				'label' => 'Jenis Kelamin',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'trim|xss_clean|valid_email',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}',
					'valid_email' => '{field} harus valid'
				]
			],
			[
				'field' => 'no_telp',
				'label'	=> 'Nomor Telepon',
				'rules' => 'trim|xss_clean|numeric|min_length[6]|max_length[15]',
				'errors' => [
					'required' => '{field} harus diisi',
					'numeric' => '{field} harus angka',
					'min_length' => '{field} terlalu pendek',
					'max_length' => '{field} terlalu panjang'
				]
			],
			[
				'field' => 'alamat',
				'label' => 'Alamat',
				'rules' => 'trim|xss_clean',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jurusan',
				'label' => 'Jurusan',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}',
					'required' => '{field} harus diisi'
				]
			],
			[
				'field' => 'kelas',
				'label' => 'Kelas',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}',
					'required' => '{field} harus diisi'
				]
			],
			[
				'field' => 'asal_kelas',
				'label' => 'Asal Kelas',
				'rules' => 'trim|xss_clean',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}',
				]
			]
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$data_siswa = array(
				'siswa_nis' => htmlspecialchars($this->input->post('nis', true)),
				'siswa_nisn' => htmlspecialchars($this->input->post('nisn', true)),
				'siswa_nama' => htmlspecialchars($this->input->post('nama_siswa', true)),
				'siswa_tempatlahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
				'siswa_tanggallahir' => htmlspecialchars($this->input->post('tanggal_lahir', true)),
				'siswa_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'siswa_alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'siswa_telp' => htmlspecialchars($this->input->post('no_telp', true)),
				'siswa_email' => htmlspecialchars($this->input->post('email', true)),
				'asal_kelas' => htmlspecialchars($this->input->post('asal_kelas', true)),
				'kelas_id' => htmlspecialchars($this->input->post('kelas', true))
			);
			$kelas = $this->db->get_where('kelas', ['kelas_id' => $this->input->post('kelas', true)])->row();
			$this->db->insert('siswa', $data_siswa);
			$this->message('Berhasil', 'Anda telah menambahkan Data Siswa', 'success');
			return redirect('master/data/siswa?kelas=' . $kelas->kode_kelas);
		}
	}

	public function update_siswa($nis = false)
	{
		$student = $this->siswa->getWhere(['siswa_nis' => $nis]);
		if ($nis == false && empty($student)) {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		} else {
			$data['student'] = $student;
			$data['title'] = 'Edit Siswa';
			$data['content'] = 'admin/contents/data/v_edit_siswa';

			if (isset($_POST['update'])) {

				if ($data['student']->siswa_nis != $this->input->post('nis_edit', true)) {
					$rules = 'trim|required|xss_clean|numeric|max_length[12]|is_unique[siswa.siswa_nis]';
					$errors = ['is_unique' => '{field} sudah tersedia'];
				} else {
					$rules = 'trim|required|xss_clean|numeric|max_length[12]';
					$errors = [];
				}

				if ($data['student']->siswa_nisn != $this->input->post('nisn_edit', true)) {
					$rules = 'trim|required|xss_clean|numeric|max_length[12]|is_unique[siswa.siswa_nisn]';
					$errors = ['is_unique' => '{field} sudah tersedia'];
				} else {
					$rules = 'trim|required|xss_clean|numeric|max_length[12]';
					$errors = [];
				}

				$this->form_validation->set_rules([
					[
						'field' => 'nis_edit',
						'label' => 'Nomor Induk Siswa',
						'rules' => $rules,
						'errors' => [
							'required' => '{field} harus diisi',
							'xss_clean' => 'cek kembali pada {field}',
							'numeric' => '{field} harus angka',
							'max_length' => '{field} terlalu panjang',
							$errors
						]
					],
					[
						'field' => 'nisn_edit',
						'label' => 'Nomor Induk Siswa Nasional',
						'rules' => $rules,
						'errors' => [
							'required' => '{field} harus diisi',
							'xss_clean' => 'cek kembali pada {field}',
							'numeric' => '{field} harus angka',
							'min_length' => '{field} terlalu pendek',
							$errors
						]
					],
					[
						'field' => 'nama_siswa_edit',
						'label' => 'Nama Siswa',
						'rules' => 'trim|required|xss_clean|min_length[4]',
						'errors' => [
							'required' => '{field} harus diisi',
							'xss_clean' => 'cek kembali pada {field}',
							'min_length' => '{field} terlalu pendek'
						]
					],
					[
						'field' => 'tempat_lahir_edit',
						'label' => 'Tempat Lahir',
						'rules' => 'trim|xss_clean',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
						]
					],
					[
						'field' => 'tanggal_lahir_edit',
						'label' => 'Tanggal Lahir',
						'rules' => 'trim|xss_clean',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
						]
					],
					[
						'field' => 'jenis_kelamin_edit',
						'label' => 'Jenis Kelamin',
						'rules' => 'trim|required|xss_clean',
						'errors' => [
							'required' => '{field} harus diisi',
							'xss_clean' => 'cek kembali pada {field}'
						]
					],
					[
						'field' => 'email_edit',
						'label' => 'Email',
						'rules' => 'trim|xss_clean|valid_email',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
							'valid_email' => '{field} harus valid'
						]
					],
					[
						'field' => 'no_telp_edit',
						'label'	=> 'Nomor Telepon',
						'rules' => 'trim|xss_clean|numeric|min_length[6]|max_length[15]',
						'errors' => [
							'required' => '{field} harus diisi',
							'numeric' => '{field} harus angka',
							'min_length' => '{field} terlalu pendek',
							'max_length' => '{field} terlalu panjang'
						]
					],
					[
						'field' => 'alamat_edit',
						'label' => 'Alamat',
						'rules' => 'trim|xss_clean',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}'
						]
					],
					[
						'field' => 'jurusan_edit',
						'label' => 'Jurusan',
						'rules' => 'trim|xss_clean',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
						]
					],
					[
						'field' => 'kelas_edit',
						'label' => 'Kelas',
						'rules' => 'trim|xss_clean',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
						]
					],
					[
						'field' => 'asal_kelas_edit',
						'label' => 'Asal Kelas',
						'rules' => 'trim|xss_clean',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
						]
					],
					[
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'trim|xss_clean|min_length[8]',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
							'min_length' => '{field} terlalu pendek'
						]
					],
					[
						'field' => 'conf_pass',
						'label' => 'Konfirmasi Password',
						'rules' => 'trim|xss_clean|min_length[8]|matches[password]',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
							'min_length' => '{field} terlalu pendek',
							'matches' => '{field} tidak sesuai'
						]
					],
					[
						'field' => 'status_siswa',
						'label' => 'Status Siswa',
						'rules' => 'trim|xss_clean',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
						]
					]
				]);
				if ($this->form_validation->run() == false) {
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				} else {
					$this->process_update_siswa();
					$this->message('Berhasil', 'Anda telah Update Data Siswa', 'success');
					return redirect('master/data/siswa/detail_siswa?nis=' . $this->input->post('nis_edit'));
				}
			}
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function process_update_siswa()
	{
		$siswa_nis = $this->input->post('siswa_nis', true);
		$siswa = $this->db->get_where('siswa', ['siswa_nis' => $siswa_nis])->row();
		$kelas_edit	= $this->input->post('kelas_edit', true);
		$kelas_id	= $this->input->post('kelas_id', true);
		if (isset($kelas_edit)) {
			$kelas_id = $kelas_edit;
		}

		$pass	= htmlspecialchars($this->input->post('conf_pass', true));
		$newpass = password_hash($pass, PASSWORD_DEFAULT);
		if ($siswa->siswa_pass != $newpass) {
			$this->db->set('siswa_pass', $newpass);
		}
		$updateSiswa = array(
			'siswa_nis' => htmlspecialchars($this->input->post('nis_edit', true)),
			'siswa_nisn' => htmlspecialchars($this->input->post('nisn_edit', true)),
			'siswa_nama' => htmlspecialchars($this->input->post('nama_siswa_edit', true)),
			'siswa_tempatlahir' => htmlspecialchars($this->input->post('tempat_lahir_edit', true)),
			'siswa_tanggallahir' => htmlspecialchars($this->input->post('tanggal_lahir_edit', true)),
			'siswa_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin_edit', true)),
			'siswa_alamat' => htmlspecialchars($this->input->post('alamat_edit', true)),
			'siswa_telp' => htmlspecialchars($this->input->post('no_telp_edit', true)),
			'siswa_email' => htmlspecialchars($this->input->post('email_edit', true)),
			'asal_kelas' => htmlspecialchars($this->input->post('asal_kelas_edit', true)),
			'kelas_id' => $kelas_id,
			'status' => htmlspecialchars($this->input->post('status_siswa', true)),
			'update_time' => date('Y-m-d H:i:s')
		);
		$this->db->set($updateSiswa);
		$this->db->where('siswa_nis', $this->input->post('siswa_nis', true));
		$this->db->update('siswa');
	}

	public function delete_siswa()
	{
		$siswa_nis = $this->input->post('siswa_nis', true);
		$siswa_nis = $this->secure->decrypt_url($siswa_nis);
		$this->db->delete('siswa', ['siswa_nis' => $siswa_nis]);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus data siswa',
			'success' => true
		];
		echo json_encode($reponse);
	}


	public function dataGuru()
	{
		$data['title'] = 'Admin Siberyl - Data Guru';
		$data['content'] = 'admin/contents/data/v_data_guru';
		$data['guru'] = array();
		$guru = $this->db->get_where('guru', ['role_id !=' => 1, 'role_id !=' => 3])->result();
		if ($guru) {
			$data['guru'] = $guru;
		}
		$data['tahun_ajar'] = $this->tahun_ajar;
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_guru()
	{
		$nip = $this->input->get('nip');
		$guru = $this->guru->getWhere(['guru_nip' => $nip]);
		if ($nip && $guru) {
			$jadwal_guru = $this->jadwal->getJadwalGuru($guru->guru_nip);
			$no = 1;
			foreach ($jadwal_guru as $row => $value) {
				$sum = 0;
				$kompetensi = $this->jadwal->getKelasJadwal($value->mapel_id, $value->guru_nip);
				foreach ($kompetensi as $row => $komp) {
					$mapel = $komp->mapel_id;
					$sum += $komp->jumlah_jam;
				}
				$result['nomor'] = $no++;
				$result['mapel'] = $value->nama_mapel;
				$result['mapel_id'] = $mapel;
				$result['jumlah_rombel'] = count($kompetensi);
				$result['jumlah_jam'] = $sum;
				$result['total_jam'] = count($kompetensi) * $sum;
				$jadwalGuru[]	= $result;
			}
			if (empty($jadwalGuru)) {
				$data['jadwal'] = null;
			} else {
				$data['jadwal'] = $jadwalGuru;
			}
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['guru'] = $guru;
			$data['title'] = 'Detail Guru';
			$data['content'] = 'admin/contents/data/v_detail_guru';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_guru()
	{
		$data['title'] = 'Tambah Guru';
		$data['content'] = 'admin/contents/data/v_tambah_guru';
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules([
				[
					'field' => 'kode_guru',
					'label' => 'Kode Guru',
					'rules' => 'trim|required|xss_clean|max_length[6]|is_unique[guru.guru_kode]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'max_length' => '{field} terlalu panjang',
						'is_unique' => '{field} sudah tersedia'
					]
				],
				[
					'field' => 'guru_nip',
					'label' => 'NIP',
					'rules' => 'trim|required|xss_clean|numeric|min_length[8]|max_length[20]|is_unique[guru.guru_nip]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'numeric' => '{field} harus angka',
						'min_length' => '{field} terlalu pendek',
						'max_length' => '{field} terlalu panjang',
						'is_unique' => '{field} sudah tersedia'
					]
				],
				[
					'field' => 'nama_guru',
					'label' => 'Nama Guru',
					'rules' => 'trim|required|xss_clean|min_length[4]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek'
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$kode	= htmlspecialchars($this->input->post('kode_guru', true));
				$nip	= htmlspecialchars($this->input->post('guru_nip', true));
				$nama	= htmlspecialchars($this->input->post('nama_guru', true));
				$username = $kode . "-" . substr($nip, 0, 4);
				$data_guru = array(
					'guru_nip' => $nip,
					'guru_kode' => $kode,
					'guru_nama'	=> $nama,
					'username' => $username,
					'role_id' => 2
				);
				$this->guru->insert_guru($data_guru);
				$this->message('Berhasil', 'Anda Telah Menambahkan Guru Pengajar', 'success');
				return redirect('master/data/guru');
			}
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function update_guru($nip = false)
	{
		$guru = $this->guru->getWhere(['guru_nip' => $nip]);
		if ($nip && $guru) {
			$data['title'] = 'Tambah Guru';
			$data['content'] = 'admin/contents/data/v_edit_guru';
			$data['guru'] = $guru;
			if (isset($_POST['update'])) {
				if ($guru->guru_nip != $this->input->post('guru_nip_edit')) {
					$this->form_validation->set_rules([
						[
							'field' => 'guru_nip_edit',
							'label' => 'NIP',
							'rules' => 'trim|required|xss_clean|numeric|min_length[8]|max_length[20]|is_unique[guru.guru_nip]',
							'errors' => [
								'required' => '{field} harus diisi',
								'xss_clean' => 'cek kembali pada {field}',
								'numeric' => '{field} harus angka',
								'min_length' => '{field} terlalu pendek',
								'max_length' => '{field} terlalu panjang',
								'is_unique' => '{field} sudah tersedia'
							]
						],
					]);
				} else {
					$this->form_validation->set_rules([
						[
							'field' => 'guru_nip_edit',
							'label' => 'NIP',
							'rules' => 'trim|required|xss_clean|numeric|min_length[8]',
							'errors' => [
								'required' => '{field} harus diisi',
								'xss_clean' => 'cek kembali pada {field}',
								'numeric' => '{field} harus angka',
								'min_length' => '{field} terlalu pendek',
								'max_length' => '{field} terlalu panjang'
							]
						],
					]);
				}
				$this->form_validation->set_rules([
					[
						'field' => 'nama_guru_edit',
						'label' => 'Nama Guru',
						'rules' => 'trim|required|xss_clean|min_length[4]',
						'errors' => [
							'required' => '{field} harus diisi',
							'xss_clean' => 'cek kembali pada {field}',
							'min_length' => '{field} terlalu pendek'
						]
					],
					[
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'trim|xss_clean|min_length[8]',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
							'min_length' => '{field} terlalu pendek'
						]
					],
					[
						'field' => 'conf_pass',
						'label' => 'Konfirmasi Password',
						'rules' => 'trim|xss_clean|min_length[8]|matches[password]',
						'errors' => [
							'xss_clean' => 'cek kembali pada {field}',
							'min_length' => '{field} terlalu pendek',
							'matches' => '{field} tidak sesuai'
						]
					]
				]);
				if ($this->input->post('kode_guru_edit') === $guru->guru_kode) {
					$this->form_validation->set_rules([
						[
							'field' => 'kode_guru_edit',
							'label' => 'Kode Guru',
							'rules' => 'trim|required|xss_clean|max_length[6]',
							'errors' => [
								'required' => '{field} harus diisi',
								'xss_clean' => 'cek kembali pada {field}',
								'max_length' => '{field} terlalu panjang',
							]
						],
					]);
				} else {
					$this->form_validation->set_rules([
						[
							'field' => 'kode_guru_edit',
							'label' => 'Kode Guru',
							'rules' => 'trim|required|xss_clean|max_length[6]|is_unique[guru.guru_kode]',
							'errors' => [
								'required' => '{field} harus diisi',
								'xss_clean' => 'cek kembali pada {field}',
								'max_length' => '{field} terlalu panjang',
								'is_unique' => '{field} sudah tersedia'
							]
						],
					]);
				}

				if ($this->form_validation->run() == false) {
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				} else {
					$kode	= htmlspecialchars($this->input->post('kode_guru_edit', true));
					$nip	= htmlspecialchars($this->input->post('guru_nip_edit', true));
					$nama	= htmlspecialchars($this->input->post('nama_guru_edit', true));
					$pass	= htmlspecialchars($this->input->post('conf_pass', true));
					$newpass = password_hash($pass, PASSWORD_DEFAULT);
					if ($guru->password != $newpass) {
						$this->db->set('password', $newpass);
					}
					if ($guru->guru_kode != $kode) {
						$username = $kode . "-" . substr($nip, 0, 4);
						$this->db->set('username', $username);
					}
					$update_guru = [
						'guru_nip' => $nip,
						'guru_kode' => $kode,
						'guru_nama'	=> $nama,
						'update_time' => date('Y-m-d H:i:s')
					];
					$this->db->set($update_guru);
					$this->db->where('guru_id', $this->input->post('guru_id', true));
					$this->db->update('guru');
					$this->message('Berhasil', 'Anda telah mengupdate data Guru', 'success');
					return redirect('master/data/guru');
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function delete_guru()
	{
		$guru_nip = $this->input->post('guru_nip', true);
		$this->db->delete('guru', ['guru_nip' => $guru_nip]);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus mata pelajaran ini',
			'success' => true
		];
		echo json_encode($reponse);
	}


	public function select_data()
	{
		$type = $this->input->get('type');
		$jurusan = $this->input->get('jurusan');
		if ($type == 'jurusan') {
			$query = $this->db->select("kode_jurusan, nama_jurusan")
				->from('jurusan')->order_by('nama_jurusan', 'ASC')->get();
			$results = $query->result();
			foreach ($results as $row) {
				$result[] = [
					'id' => $row->kode_jurusan,
					'text' => $row->kode_jurusan
				];
			}
		} elseif ($type == 'kelas') {
			$this->db->select("kelas_id, nama_kelas, kode_jurusan");
			$this->db->from('kelas');
			$query = $this->db->where('kode_jurusan', $jurusan)->get();
			$results = $query->result();
			foreach ($results as $row) {
				$result[] = [
					'id' => $row->kelas_id,
					'text' => $row->nama_kelas
				];
			}
		}
		echo json_encode($result);
	}

	public function select_asal_kelas()
	{
		$id_kelas = $this->input->get('id_kelas');
		$kelas	= $this->db->get_where('kelas', ['kelas_id' => $id_kelas])->row();
		var_dump($kelas);
		$roman  = $kelas->index_kelas;
		$romans = array(
			'M' => 1000,
			'CM' => 900,
			'D' => 500,
			'CD' => 400,
			'C' => 100,
			'XC' => 90,
			'L' => 50,
			'XL' => 40,
			'X' => 10,
			'IX' => 9,
			'V' => 5,
			'IV' => 4,
			'I' => 1,
		);

		$roman = $roman;
		$result = 0;

		foreach ($romans as $key => $value) {
			while (strpos($roman, $key) === 0) {
				$result += $value;
				$roman = substr($roman, strlen($key));
			}
		}

		if ($result > 10) {
			$this->db->select('kode_kelas', 'nama_kelas');
			$this->db->from('kelas');
		}
		echo $result;
	}
}
