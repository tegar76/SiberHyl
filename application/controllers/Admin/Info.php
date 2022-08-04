<?php

class Info extends CI_Controller
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

	public function infoAkademik()
	{
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['title'] = 'Info Akademik';
		$data['content'] = 'admin/contents/info/v_info_akademik';
		$infoakademik = $this->master->getInfoAkademik();
		if ($infoakademik) {
			$no = 1;
			foreach ($infoakademik as $row => $value) {
				$info_['nomor'] = $no++;
				$info_['id'] = $value->id;

				if ($value->kelas_id != 0) {
					$kelas = $this->master->getPenerimaKelasInfo($value->id);
					foreach ($kelas as $kls) {
						$cls[] = $kls->kelas;
					}
					$info_['kelas'] = $cls;
				} elseif ($value->index == 'all' && (empty($value->jurusan) && $value->kelas_id == 0)) {
					$info_['kelas'] = "Semua Kelas";
				} elseif (!empty($value->jurusan) && ($value->index == 'all' && $value->kelas_id == 0)) {
					$jurusan =  ($value->jurusan == 'all') ? 'Semua Jurusan' : $value->jurusan;
					$info_['kelas'] = "Kelas " . $jurusan . " (X, XI, XII)";
				} elseif ($value->index != 'all' and (empty($value->jurusan) and $value->kelas_id == 0)) {
					$info_['kelas'] =  "Kelas " . $value->index;
				} elseif ($value->index != 'all' and (!empty($value->jurusan) and $value->kelas_id == 0)) {
					$info_['kelas'] =  "Kelas " . $value->index . " " . $value->jurusan;
				}

				$info_['judul'] = $value->judul;
				$info_['slug'] = $value->slug;
				$info_['file']	= $value->file;
				$info_['create'] = date('d-m-Y H:i', strtotime($value->create)) . " WIB";
				$info_['update'] = ($value->create == $value->update) ? '-' : date('d-m-Y H:i', strtotime($value->update)) . " WIB";
				$info[] = $info_;
			}
			$data['info_akademik'] = $info;
		} else {
			$data['info_akademik'] = null;
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_info_akademik($file = null)
	{
		if ($file) {
			$check = FCPATH . './storage/info_akademik/' . $file;
			if(file_exists($check)) {
				$data['pdf'] = base_url('storage/info_akademik/') . $file;
				$this->load->view('pdf_viewer/pdf_viewer', $data, FALSE);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function tambah_info_akademik()
	{
		$data['title'] = 'Tambah Info Akademik';
		$data['content'] = 'admin/contents/info/v_tambah_info_akademik';
		$data['jurusan'] = $this->master->get_tablewhere('jurusan');
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules([
				[
					'field' => 'index_kelas',
					'label' => 'Kelas',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi!',
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
					'field' => 'kelas_jurusan[]',
					'label' => 'Kelas Jurusan',
					'rules' => 'trim|xss_clean',
					'errors' => [
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
				[
					'field' => 'judul_info',
					'label' => 'Judul Info Akedemik',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi!',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
			]);
			if (empty($_FILES['file_info']['name'])) {
				$this->form_validation->set_rules('file_info', 'File Info Akademik', 'required', [
					'required' => 'Anda harus upload {field}'
				]);
			}

			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$this->process_info();
				$this->message('Berhasil', 'Info Akademik Berhasil Ditambah', 'success');
				return redirect('master/info/info-akademik');
			}
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function process_info()
	{
		$tahun_ajar = $this->tahun_ajar;
		$this->db->trans_start();
		$path_upload = './storage/info_akademik/';
		$uploadInfo = $_FILES['file_info']['name'];
		$file_name = url_title($_POST['judul_info'], 'dash', true);
		if ($uploadInfo) {
			$config['upload_path'] = $path_upload;
			$config['allowed_types'] = 'pdf';
			$config['max_size']	= '2048';
			$config['overwrite']	= true;
			$config['file_name'] = $file_name . '-' . time();

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->check_storage_info('info_akademik');

			$_FILES['file']['name']		= $_FILES['file_info']['name'];
			$_FILES['file']['type'] 	= $_FILES['file_info']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['file_info']['tmp_name'];
			$_FILES['file']['error'] 	= $_FILES['file_info']['error'];
			$_FILES['file']['size'] 	= $_FILES['file_info']['size'];

			if ($this->upload->do_upload('file')) {
				$file_info = $this->upload->data();
				$upload = array(
					'judul_info' => htmlspecialchars($this->input->post('judul_info', true)),
					'slug_judul' => url_title($_POST['judul_info'], 'dash', true),
					'file_info' => $file_info['file_name'],
					'file_type' => $file_info['file_ext'],
					'file_size' => $file_info['file_size'],
					'tahun_id' => $tahun_ajar['tahun_id']
				);
				$this->db->insert('infoakademik', $upload);
				$infoakd_id = $this->db->insert_id();
				if (isset($_POST['kelas_jurusan'])) {
					$kelas = $_POST['kelas_jurusan'];
					foreach ($kelas as $row => $value) {
						$upload = array(
							'index_kelas' => htmlspecialchars($this->input->post('index_kelas', true)),
							'kode_jurusan' => (isset($_POST['jurusan'])) ? $_POST['jurusan'] : null,
							'kelas_id'	=> $_POST['kelas_jurusan'][$row],
							'info_id' => $infoakd_id
						);
						$this->db->insert('penerimainfo', $upload);
					}
					$this->db->trans_complete();
				} else {
					$upload = array(
						'index_kelas' => htmlspecialchars($this->input->post('index_kelas', true)),
						'kode_jurusan' => (isset($_POST['jurusan'])) ? $_POST['jurusan'] : null,
						'kelas_id'	=> 0,
						'info_id' => $infoakd_id
					);
					$this->db->insert('penerimainfo', $upload);
					$this->db->trans_complete();
				}
			}
		}
	}

	public function get_kelas()
	{
		$index_kelas = $this->input->get('index_kelas');
		$kode_jurusan = $this->input->get('kode_jurusan');
		if ($index_kelas != 'all') {
			$this->db->where('index_kelas', $index_kelas);
		}
		$this->db->like('kode_jurusan', $kode_jurusan);
		$this->db->order_by('nama_kelas', 'ASC');
		$query	= $this->db->get('kelas');
		$result	= $query;
		foreach ($result->result() as $row) {
			$outputs[] = array(
				'id' => $row->kelas_id,
				'text' => $row->nama_kelas
			);
		}
		echo json_encode($outputs);
	}

	public function update_info_akademik($id = null)
	{
		$info	= $this->master->detailInfoAkademik($id);
		if ($id and $info) {
			if ($info->kelas_id != 0) {
				$kelas = $this->master->getPenerimaKelasInfo($info->id);
				foreach ($kelas as $kls) {
					$cls[] = $kls->kelas;
				}
				$clss = $cls;
			} elseif ($info->index == 'all' and (empty($info->jurusan) and $info->kelas_id == 0)) {
				$clss = "Semua Kelas";
			} elseif (!empty($info->jurusan) and ($info->index == 'all' and $info->kelas_id == 0)) {
				$clss = "Kelas " . $info->jurusan . " (X, XI, XII)";
			} elseif ($info->index != 'all' and (empty($info->jurusan) and $info->kelas_id == 0)) {
				$clss =  "Kelas " . $info->index;
			} elseif ($info->index != 'all' and (!empty($info->jurusan) and $info->kelas_id == 0)) {
				$clss =  "Kelas " . $info->index . " " . $info->jurusan;
			}

			$data['kelas'] = $clss;
			$data['info'] = $info;
			$data['title'] = 'Update Info Akademik';
			$data['content'] = 'admin/contents/info/v_edit_info_akademik';

			if (isset($_POST['update'])) {
				$this->form_validation->set_rules([
					[
						'field' => 'judul_info_update',
						'label' => 'Judul Info Akedemik',
						'rules' => 'trim|required|xss_clean',
						'errors' => [
							'required' => '{field} harus diisi!',
							'xss_clean' => 'cek kembali pada {field}'
						]
					],
				]);

				if ($this->form_validation->run() == false) {
					$this->load->view('admin/layout/wrapper', $data, FALSE);
				} else {
					$this->process_update_info();
					$this->message('Berhasil', 'Info Akademik Berhasil Diupdate', 'success');
					return redirect('master/info/info-akademik');
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function process_update_info()
	{
		$info_id = $this->input->post('id', true);
		$info	= $this->master->detailInfoAkademik($info_id);
		$path_upload = './storage/info_akademik/';
		$uploadInfo = $_FILES['file_info_update']['name'];
		if ($uploadInfo) {
			$config['allowed_types'] = 'pdf';
			$config['max_size']	= '2048';
			$config['encrypt_name'] = true;
			$config['upload_path'] = $path_upload;
			// 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			// 
			$_FILES['file']['name']		= $_FILES['file_info_update']['name'];
			$_FILES['file']['type'] 	= $_FILES['file_info_update']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['file_info_update']['tmp_name'];
			$_FILES['file']['error'] 	= $_FILES['file_info_update']['error'];
			$_FILES['file']['size'] 	= $_FILES['file_info_update']['size'];
			if ($this->upload->do_upload('file')) {
				$infoLama = $info->file;
				$infoBaru = $this->upload->data();
				if ($infoLama != 'default.pdf') {
					@unlink(FCPATH . $path_upload . $infoLama);
				}
				$updateInfo = [
					'file_info' => $infoBaru['file_name'],
					'file_type' => $infoBaru['file_ext'],
					'file_size' => $infoBaru['file_size'],
				];
				$this->db->set($updateInfo);
			}
		}

		$setInfo = [
			'judul_info' => htmlspecialchars($this->input->post('judul_info_update', true)),
			'slug_judul' => url_title($_POST['judul_info_update'], 'dash', true),
			'update_time' => date('Y-m-d H:i:s')
		];
		$this->db->set($setInfo);
		$this->db->where('info_id', $info_id);
		$this->db->update('infoakademik');
	}

	public function delete_info_akademik()
	{
		$info_id = $this->input->post('info_id', true);
		$info	= $this->master->detailInfoAkademik($info_id);
		if (!empty($info)) {
			// delete file info
			@unlink(FCPATH . './storage/info_akademik/' . $info->file);
			$this->db->where('info_id', $info_id);
			$this->db->delete('infoakademik');

			$this->db->where_in('info_id', $info_id);
			$this->db->delete('penerimainfo');
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Anda telah menghapus info akademik',
				'success' => true
			];
		} else {
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Anda gagal menghapus info akademik',
				'success' => false
			];
		}

		echo json_encode($reponse);
	}

	public function tahunAkademik()
	{
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['tahun_akademik'] = $this->master->getTahunAkademik();
		$data['title'] = 'Tahun Pembelajaran';
		$data['content'] = 'admin/contents/info/v_tahun_pembelajaran';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function check_tahun_akademik()
	{
		$tahun_id = $this->input->post('tahun_id');
		$status	= $this->input->post('status');
		$check = $this->db->get_where('tahunakademik', ['status' => 1])->row();

		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda gagal merubah tahun akademik',
			'success' => false
		];

		if (!empty($check)) {
			$this->master->activateTahunAkademik($check->tahun_id, 0);
			if ($status == 1) {
				$this->master->activateTahunAkademik($tahun_id, 0);
				$reponse = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'message' => 'Anda telah merubah tahun akademik',
					'success' => true
				];
			} else if ($status == 0) {
				$this->master->activateTahunAkademik($tahun_id, 1);
				$reponse = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'message' => 'Anda telah merubah tahun akademik',
					'success' => true
				];
			}
		} else {
			$this->master->activateTahunAkademik($tahun_id, 1);
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Anda telah merubah tahun akademik',
				'success' => true
			];
		}

		echo json_encode($reponse);
	}

	public function tambah_tahun_akademik()
	{
		$data['title'] = 'Tambah Tahun Pembelajaran';
		$data['content'] = 'admin/contents/info/v_tambah_tahun_pembelajaran';
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules([
				[
					'field' => 'tahun_ajar',
					'label' => 'Tahun Pembelajaran',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi!',
					]
				],
				[
					'field' => 'semester',
					'label' => 'Semester',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi!',
					]
				]
			]);

			if ($this->form_validation->run() == false) {
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$this->db->insert('tahunakademik', [
					'tahun' => $this->input->post('tahun_ajar', true),
					'semester' => $this->input->post('semester', true)
				]);
				$this->message('Berhasil', 'Tahun Pembelajaran Berhasil Ditambahkan', 'success');
				return redirect('master/info/tahun-akademik');
			}
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function check_storage_info($dir = null)
	{
		if (!is_dir('storage')) :
			mkdir('./storage', 0777, true);
		endif;

		$dir_exist = true;
		if (!is_dir('storage/' . $dir)) :
			mkdir('./storage/' . $dir, 0777, true);
			$dir_exist = false; // dir not exist
		endif;
		return $dir_exist;
	}
}
