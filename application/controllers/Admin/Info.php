<?php

class Info extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		checkAdminLogin();
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$tahun_ajar = $this->jadwal->get_activate_tahunajar();
		if ($tahun_ajar == null) {
			$this->tahun_ajar = [
				'thnakd_id' => 0,
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
		$data['infoakd'] = $this->jadwal->get_info_akademik();
		$no = 1;
		foreach ($data['infoakd'] as $row => $value) {
			$info_akd['nomor'] = $no++;
			$info_akd['infoakd_id'] = $value->infoakd_id;
			if ($value->kelas_id != 0) {
				$kelas = $this->jadwal->get_info_akademik_kelas($value->infoakd_id);
				foreach ($kelas as $kls) {
					$cls[] = $kls->nama_kelas;
				}
				$info_akd['kelas'] = $cls;
			} elseif ($value->index_kelas == 'all' && (empty($value->kode_jurusan) && $value->kelas_id == 0)) {
				$info_akd['kelas'] = "Semua Kelas";
			} elseif (!empty($value->kode_jurusan) && ($value->index_kelas == 'all' && $value->kelas_id == 0)) {
				$jurusan =  ($value->kode_jurusan == 'all') ? 'Semua Jurusan' : $value->kode_jurusan;
				$info_akd['kelas'] = "Kelas " . $jurusan . " (X, XI, XII)";
			} elseif ($value->index_kelas != 'all' and (empty($value->kode_jurusan) and $value->kelas_id == 0)) {
				$info_akd['kelas'] =  "Kelas " . $value->index_kelas;
			} elseif ($value->index_kelas != 'all' and (!empty($value->kode_jurusan) and $value->kelas_id == 0)) {
				$info_akd['kelas'] =  "Kelas " . $value->index_kelas . " " . $value->kode_jurusan;
			}
			$info_akd['judul'] = $value->judul_info;
			$info_akd['slug'] = $value->slug_judul;
			$info_akd['deskripsi'] = $value->deskripsi_info;
			$info_akd['file']	= $value->file_info;
			$info_akd['create']	= date('d-m-Y H:i', strtotime($value->create_time)) . " WIB";
			$info_akd['update']	= ($value->create_time == $value->update_time) ? '-' : date('d-m-Y H:i', strtotime($value->update_time)) . " WIB";
			$info[] = $info_akd;
		}
		if (!empty($info)) {
			$data['info_akademik'] = $info;
		} else {
			$data['info_akademik'] = null;
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_info_akademik($params)
	{
		$info = $this->db->get_where('info_akademik', ['file_info' => $params])->row();
		$data['title'] = $info->judul_info;
		$data['file_info'] = base_url('storage/info/') . $info->file_info;
		$this->load->view('admin/contents/info/pdf_view_info_akademik/v_info_akademik_pdf', $data, FALSE);
	}

	public function tambah_info_akademik()
	{
		$data['title'] = 'Tambah Info Akademik';
		$data['content'] = 'admin/contents/info/v_tambah_info_akademik';
		$data['jurusan'] = $this->master->get_tablewhere('jurusan');
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
			[
				'field' => 'deskripsi_info',
				'label' => 'Deskripsi Info Akademik',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			]
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

	public function process_info()
	{
		$tahun_ajar = $this->tahun_ajar;
		$this->db->trans_start();
		$path_upload = './storage/info/';
		$uploadInfo = $_FILES['file_info']['name'];
		if ($uploadInfo) {
			$config['upload_path'] = $path_upload;
			$config['allowed_types'] = 'pdf';
			$config['max_size']	= '2048';
			$config['encrypt_name'] = true;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
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
					'deskripsi_info' => htmlspecialchars($this->input->post('deskripsi_info', true)),
					'file_info' => $file_info['file_name'],
					'tipe_file' => $file_info['file_ext'],
					'ukuran_file' => $file_info['file_size'],
					'thnakd_id' => $tahun_ajar['thnakd_id']
				);
				$this->db->insert('info_akademik', $upload);
				$infoakd_id = $this->db->insert_id();
			}

			if (isset($_POST['kelas_jurusan'])) {
				$kelas = $_POST['kelas_jurusan'];
				foreach ($kelas as $row => $value) {
					$upload = array(
						'index_kelas' => htmlspecialchars($this->input->post('index_kelas', true)),
						'kode_jurusan' => (isset($_POST['jurusan'])) ? $_POST['jurusan'] : null,
						'kelas_id'	=> $_POST['kelas_jurusan'][$row],
						'infoakd_id' => $infoakd_id
					);
					$this->db->insert('infoakd_kelas', $upload);
				}
				$this->db->trans_complete();
			} else {
				$upload = array(
					'index_kelas' => htmlspecialchars($this->input->post('index_kelas', true)),
					'kode_jurusan' => (isset($_POST['jurusan'])) ? $_POST['jurusan'] : null,
					'kelas_id'	=> 0,
					'infoakd_id' => $infoakd_id
				);
				$this->db->insert('infoakd_kelas', $upload);
				$this->db->trans_complete();
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

	public function update_info_akademik($params)
	{
		$infoakd_id = $this->secure->decrypt_url($params);
		$info	= $this->jadwal->get_info_akademik_detail($infoakd_id);
		if ($info->kelas_id != 0) {
			$kelas = $this->jadwal->get_info_akademik_kelas($info->infoakd_id);
			foreach ($kelas as $kls) {
				$cls[] = $kls->nama_kelas;
			}
			$clss = $cls;
		} elseif ($info->index_kelas == 'all' && (empty($info->kode_jurusan) && $info->kelas_id == 0)) {
			$clss = "Semua Kelas";
		} elseif (!empty($info->kode_jurusan) && ($info->index_kelas == 'all' && $info->kelas_id == 0)) {
			$clss = "Kelas " . $info->kode_jurusan . " (X, XI, XII)";
		} elseif ($info->index_kelas != 'all' and (empty($info->kode_jurusan) and $info->kelas_id == 0)) {
			$clss =  "Kelas " . $info->index_kelas;
		} elseif ($info->index_kelas != 'all' and (!empty($info->kode_jurusan) and $info->kelas_id == 0)) {
			$clss =  "Kelas " . $info->index_kelas . " " . $info->kode_jurusan;
		}
		$data['kelas'] = $clss;
		$data['infoakd'] = $info;
		$data['title'] = 'Edit Info Akademik';
		$data['content'] = 'admin/contents/info/v_edit_info_akademik';

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
			[
				'field' => 'deskripsi_info_update',
				'label' => 'Deskripsi Info Akademik',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			]
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$this->process_update_info();
			$this->message('Berhasil', 'Info Akademik Berhasil Diupdate', 'success');
			return redirect('master/info/info-akademik');
		}
	}

	public function process_update_info()
	{
		$infoakdID = $this->input->post('infoakd_id', true);
		$infoakd   = $this->jadwal->get_info_akademik_detail($infoakdID);
		$path_upload = './storage/info/';
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
				$infoLama = $infoakd->file_info;
				$infoBaru = $this->upload->data();
				if ($infoLama != 'default.pdf') {
					@unlink(FCPATH . $path_upload . $infoLama);
				}
				$updateInfo = [
					'file_info' => $infoBaru['file_name'],
					'tipe_file' => $infoBaru['file_ext'],
					'ukuran_file' => $infoBaru['file_size'],
				];
				$this->db->set($updateInfo);
			}
		}

		$setInfo = [
			'judul_info' => htmlspecialchars($this->input->post('judul_info_update', true)),
			'slug_judul' => url_title($_POST['judul_info_update'], 'dash', true),
			'deskripsi_info' => htmlspecialchars($this->input->post('deskripsi_info_update', true)),
			'update_time' => date('Y-m-d H:i:s')
		];
		$this->db->set($setInfo);
		$this->db->where('infoakd_id', $infoakdID);
		$this->db->update('info_akademik');
	}

	public function delete_info_akademik()
	{
		$infoakd_id = $this->input->post('infoakd_id', true);
		$infoakd_id = $this->secure->decrypt_url($infoakd_id);
		// delete kelas
		$this->db->where_in('infoakd_id', $infoakd_id);
		$this->db->delete('infoakd_kelas');
		// delete file info
		$infoakd   = $this->db->get_where('info_akademik', ['infoakd_id' => $infoakd_id])->row();
		if (!empty($infoakd)) {
			@unlink(FCPATH . './storage/info/' . $infoakd->file_info);
			$this->db->where('infoakd_id', $infoakd_id);
			$this->db->delete('info_akademik');
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

	public function tahunPembelajaran()
	{
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['tahun_akademik'] = $this->jadwal->get_tahun_akademik();
		$data['title'] = 'Tahun Pembelajaran';
		$data['content'] = 'admin/contents/info/v_tahun_pembelajaran';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function check_tahun_akademik()
	{
		$thnakd_id = $this->input->post('tahunakd_id');
		$status	= $this->input->post('status');
		$check = $this->db->get_where('tahun_akademik', ['status' => 1])->row();

		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda gagal  merubah tahun akademik',
			'success' => false
		];
		if (!empty($check)) {
			$this->jadwal->activate_tahunajar($check->thnakd_id, 0);
			if ($status == 1) {
				$this->jadwal->activate_tahunajar($thnakd_id, 0);
				$reponse = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'message' => 'Anda telah merubah tahun akademik',
					'success' => true
				];
			} else if ($status == 0) {
				$this->jadwal->activate_tahunajar($thnakd_id, 1);
				$reponse = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'message' => 'Anda telah merubah tahun akademik',
					'success' => true
				];
			}
		} else {
			$this->jadwal->activate_tahunajar($thnakd_id, 1);
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Anda telah merubah tahun akademik',
				'success' => true
			];
		}

		echo json_encode($reponse);
	}

	public function tambah_tahunajar()
	{
		$data['title'] = 'Tambah Tahun Pembelajaran';
		$data['content'] = 'admin/contents/info/v_tambah_tahun_pembelajaran';
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
			$this->db->insert('tahun_akademik', [
				'tahun' => $this->input->post('tahun_ajar', true),
				'semester' => $this->input->post('semester', true)
			]);
			$this->message('Berhasil', 'Tahun Pembelajaran Berhasil Ditambahkan', 'success');
			return redirect('master/info/tahun-ajar');
		}
	}
}
