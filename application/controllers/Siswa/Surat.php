<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$this->load->model('SiswaModel', 'siswa', true);
		$this->userSiswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
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

	public function index()
	{
		$siswa = $this->userSiswa;
		$data['siswa'] = $siswa;
		$data['title'] = 'Surat';
		$data['content'] = 'siswa/contents/surat/v_surat';
		$riwayat = $this->siswa->pengajuanSurat($siswa->siswa_nis);
		$data['riwayat'] = array();
		if ($riwayat) {
			$no = 1;
			foreach ($riwayat as $row) {
				$res['nomor'] = $no++;
				$res['hari'] = $row->hari;
				$res['tanggal'] =  date('d-m-Y', strtotime($row->tanggal));
				$res['nama'] =  $row->siswa_nama;
				$res['kelas'] =  $siswa->nama_kelas;
				$res['jenis'] =  $row->jenis;
				$res['file'] = $row->file_surat;
				$res['id'] = $row->surat_id;
				// $guru = $this->siswa->recive_surat($row->surat_id);
				// foreach ($guru as $g) {
				// 	$gr[] = $g->guru_nama;
				// 	$guru_[] = $gr;
				// }
				// $res['guru'] = $guru_;
				$riwayat_[] = $res;
			}
			$data['riwayat'] = $riwayat_;
		}
		$data['days']  = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
		$data['guru'] = $this->db->where('role_id !=', 1)->order_by('guru_nama', 'ASC')->get('guru');

		// jika ada aksi submit surat
		if (isset($_POST['send'])) {
			$this->form_validation->set_rules('files', 'File Surat', 'callback_file_surat_check');
			$this->form_validation->set_rules([
				[
					'field' => 'hari',
					'label' => 'Hari',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
				[
					'field' => 'tanggal',
					'label' => 'Tanggal Surat',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
				[
					'field' => 'jenis_surat',
					'label' => 'Jenis Surat',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
				[
					'field' => 'guru_pengajar[]',
					'label' => 'Guru Pengajar',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('siswa/layout/wrapper', $data, FALSE);
			} else {
				$this->process_surat();
				$this->message('Berhasil', 'Pengajuan surat berhasil', 'success');
				return redirect('siswa/surat');
			}
		}

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function process_surat()
	{
		$this->db->trans_start();
		$file_surat = $_FILES['files']['name'];
		if ($file_surat) {
			$config['upload_path']	= './storage/siswa/surat/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']		= '2048';
			$config['overwrite']	= TRUE;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$dir = $this->siswa->check_storage_siswa('surat');
			$_FILES['file']['name']		= $_FILES['files']['name'];
			$_FILES['file']['type'] 	= $_FILES['files']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'];
			$_FILES['file']['error'] 	= $_FILES['files']['error'];
			$_FILES['file']['size'] 	= $_FILES['files']['size'];
			if (!$this->upload->do_upload('files')) {
				if (!$dir) {
					rmdir('/storage/siswa/surat');
				}
				$result = array(
					'status' => false,
					'errors' => $this->upload->display_errors()
				);
				$this->message('Pengajuan Surat Gagal', $result['errors'], 'error');
				return redirect('siswa/surat');
			} else {
				$surat	= $this->upload->data();
				$upload = array(
					'hari' => htmlspecialchars($this->input->post('hari', true)),
					'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
					'jenis' => htmlspecialchars($this->input->post('jenis_surat', true)),
					'file_surat' => $surat['file_name'],
					'file_type'	=> $surat['file_ext'],
					'file_size' => $surat['file_size'],
					'siswa_nis' => htmlspecialchars($this->input->post('nis', true))
				);
				$this->db->insert('pengajuansurat', $upload);
				$surat_id = $this->db->insert_id();
				if (isset($_POST['guru_pengajar'])) {
					$kelas = $_POST['guru_pengajar'];
					foreach ($kelas as $row => $value) {
						$upload = array(
							'guru_nip'	=> $_POST['guru_pengajar'][$row],
							'surat_id' => $surat_id
						);
						$this->db->insert('penerimasurat', $upload);
					}
				}
				$this->db->trans_complete();
			}
		}
	}

	public function file_surat_check()
	{
		if (empty($_FILES['files']['name'])) {
			$this->form_validation->set_message('file_surat_check', 'Anda harus upload {field}!');
			return false;
		}
		return true;
	}

	public function file_surat()
	{
		$files = $this->input->get('file');
		if ($files) {
			$data['title'] = 'File Surat';
			$data['surat'] = base_url('storage/siswa/surat/') . $files;
			$this->load->view('siswa/contents/surat/v_file_surat_img', $data, FALSE);
		}
	}
}
