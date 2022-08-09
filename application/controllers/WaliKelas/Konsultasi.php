<?php

class Konsultasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isWaliKelasLogin();
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('SiswaModel', 'siswa', true);
		$this->load->model('MasterModel', 'master', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
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
		$guru = $this->userGuru;
		$data['guru'] = $guru;
		$data['wali'] = $this->guru->getWaliKelas($guru->guru_nip);
		$data['forum'] = array();
		$konsultasi = $this->siswa->getKonsultasi($data['wali']->kelas_id);
		if ($konsultasi) {
			foreach ($konsultasi as $row => $value) {
				$reply = $this->siswa->getReplyForum($value->forum_id);
				$frm['id'] = $value->forum_id;
				$frm['author'] = $value->pembuat;
				$frm['title'] = $value->judul;
				$frm['desc'] = $value->deskripsi;
				$frm['create'] = date('d-m-Y H:i', strtotime($value->create_time)) . " WIB";
				$frm['reply'] = count($reply);
				$forum_[] = $frm;
			}
			$data['forum'] = $forum_;
		}
		$data['title'] = 'Konsultasi';
		$data['content'] = 'wali_kelas/contents/konsultasi/v_konsultasi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function detail_konsultasi($id = false)
	{
		$guru = $this->userGuru;
		$id = $this->secure->decrypt_url($id);
		$konsul = $this->siswa->detailForum($id);
		if ($id && $konsul) {
			$data['title'] = 'Forum Konsultasi';
			$data['content'] = 'wali_kelas/contents/konsultasi/v_detail_konsultasi';
			$data['detail'] = $konsul;
			$data['wali'] = $this->guru->getWaliKelas($guru->guru_nip);
			$data['reply'] = $this->master->getReplyForum($konsul->forum_id);
		} else {
			$data['title'] = '404 Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$data['guru'] = $guru;
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function konsultasi_baru()
	{
		$data['guru'] = $this->userGuru;
		$data['wali'] = $this->guru->getWaliKelas($data['guru']->guru_nip);
		$data['title'] = 'Tambah Konsultasi';
		$data['content'] = 'wali_kelas/contents/konsultasi/v_tambah_konsultasi';
		if (isset($_POST['send'])) {
			$this->form_validation->set_rules([
				[
					'field' => 'judul',
					'label' => 'Judul Pembahasan',
					'rules' => 'trim|required|xss_clean|min_length[8]|max_length[50]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)',
						'max_length' => '{field} terlalu panjang (maksimal 50 karakter)'
					]
				],
				[
					'field' => 'deskripsi',
					'label' => 'Deskripsi Pembahasan',
					'rules' => 'trim|required|xss_clean|min_length[8]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)',
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
			} else {
				$data = array(
					'pembuat' => htmlspecialchars($this->input->post('nama_guru', true)),
					'judul' => htmlspecialchars($this->input->post('judul', true)),
					'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
					'kelas_id' => htmlspecialchars($this->input->post('kelas_id', true)),
				);
				$this->db->insert('forumdiskusi', $data);
				$this->message('Berhasil', 'Konsultasi telah dibuat', 'success');
				return redirect('wali-kelas/konsultasi');
			}
		}
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function get_komentar()
	{
		$output = '';
		$req = $_REQUEST;
		$where = array(
			'parent_id' => '0',
			'forum_id' => $req['id'],
		);
		$query 	= $this->db->order_by('create_time', 'DESC')->get_where('detaildiskusi', $where);
		$result	= $query->result();
		foreach ($result as $key => $val) {
			$user = $this->get_user_diskusi($val->user_id);
			$output .= '
				<div class="media mb-2">
					<img src="' . $user['img'] . '" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px; height:40px;">
					<div class="media-body">
							<div class="row">
							<div class="col-sm-10">
								<div class="nama-small">' . $user['name'] . '</div>
								<div class="post-on mb-2">Posted on ' . date('d-m-Y H:i', strtotime($val->create_time)) . ' WIB</div>
								<div class="komen">' . $val->message . '</div>
								<a href="javascript:void(0)" class="balas" id-komen="' . $val->diskusi_id . '">Balas</a>
							</div>
						</div>
					</div>
				</div>
			<hr>';
			$output .= $this->ambil_reply($val->diskusi_id);
		}
		echo json_encode([$output]);
	}

	public function ambil_reply($parent_id = 0, $marginleft = 0)
	{
		$output = '';
		$reply = $this->master->getReplyDiskusi($parent_id, 'parent_id', 'DESC');
		$count = $reply->num_rows();
		if ($parent_id == 0) {
			$marginleft = 0;
		} else {
			$marginleft = $marginleft + 48;
		}
		$tingkat = $marginleft / 48 + 1;
		if ($count > 0) {
			foreach ($reply->result() as $value) {
				$user = $this->get_user_diskusi($value->user_id);
				$output .= '
				<div class="media mb-2" style="margin-left:' . $marginleft . 'px">
					<img src="' . $user['img'] . '" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px; height:40px">
					<div class="media-body">
						<div class="row">
							<div class="col-sm-10">
								<div class="nama-small">' . $user['name'] . '</div>
								<div class="post-on mb-2">Posted on ' . date('d-m-Y H:i', strtotime($value->create_time)) . ' WIB</div>
								<div class="komen">' . $value->message . '</div>';
				if ($tingkat < 2) {
					$output .= '<a href="javascript:void(0)" class="balas" id-komen="' . $value->diskusi_id . '">Balas</a>';
				}
				$output .= '</div>
						</div>
					</div>
				</div><hr>';
				$output .= $this->ambil_reply($value->diskusi_id, $marginleft);
			}
		}
		return $output;
	}

	public function get_user_diskusi($iduser)
	{
		$siswa	= $this->master->getUserSiswa($iduser);
		$guru	= $this->master->getUserGuru($iduser);
		if ($siswa) {
			if ($siswa->siswa_foto == 'default_foto.png') {
				$foto = base_url('assets/siswa/img/profile.png');
				$nama = $siswa->siswa_nama;
			} else {
				$foto = base_url('storage/siswa/profile/' . $siswa->siswa_foto);
				$nama = $siswa->siswa_nama;
			}
		} elseif ($guru) {
			if ($guru->profile == 'default_profile.png') {
				$foto = base_url('assets/siswa/img/profile.png');
				$nama = $guru->guru_nama;
			} else {
				$foto = base_url('storage/guru/profile/' . $guru->profile);
				$nama = $guru->guru_nama;
			}
		} else {
			$foto = base_url('assets/siswa/img/profile.png');
			$nama = 'User';
		}

		$data = array(
			'name' => $nama,
			'img' => $foto,
		);
		return $data;
	}

	public function submit_konsultasi()
	{
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'success' => False,
			'messages' => []
		];

		$this->form_validation->set_rules('message', 'Diskusi', 'trim|required|xss_clean', [
			'required' => '{field} harus diisi',
			'xss_clean' => 'cek kembali pada {field}'
		]);
		if ($this->form_validation->run() == FALSE) {
			$reponse['messages'] = '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
		} else {
			$this->master->insertDiskusi();
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => true
			];
		}
		echo json_encode($reponse);
	}
}
