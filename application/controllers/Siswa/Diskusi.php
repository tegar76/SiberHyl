<?php

class Diskusi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel', 'siswa', true);
		$this->load->model('GuruModel', 'guru', true);
		isSiswaLogin();
		$days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->today = $days[(int)date('w')];
		$this->datenow = date('Y-m-d');
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

	public function ruang_diskusi($id = false)
	{
		$data['siswa'] = $this->userSiswa;
		if ($id) {
			$id = $this->secure->decrypt_url($id);
			$data['title'] = 'Diskusi';
			$data['content'] = 'siswa/contents/diskusi/v_diskusi';
			$data['info'] = $this->guru->get_jadwal_mapel($id);
			$forum = $this->guru->get_diskusi($id);
			$data['forum'] = array();
			if ($forum) {
				foreach ($forum as $row => $value) {
					$reply = $this->guru->get_reply_forum($value->forum_diskusi_id);
					$frm['id'] = $value->forum_diskusi_id;
					$frm['author'] = $value->pembuat;
					$frm['title'] = $value->judul;
					$frm['desc'] = $value->deskripsi;
					$frm['create'] = date('d-m-Y H:i', strtotime($value->create_time)) . " WIB";
					$frm['reply'] = count($reply);
					$forum_[] = $frm;
				}
				$data['forum'] = $forum_;
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}


	public function tambah_diskusi($id = false)
	{
		$data['siswa'] = $this->userSiswa;
		if ($id) {
			$id = $this->secure->decrypt_url($id);
			$data['title'] = 'Tambah Diskusi';
			$data['content'] = 'siswa/contents/diskusi/v_tambah_diskusi';
			$data['info'] = $this->guru->get_jadwal_mapel($id);
			$this->form_validation->set_rules([
				[
					'field' => 'judul_diskusi',
					'label' => 'Judul Diskusi',
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
					'label' => 'Deskripsi',
					'rules' => 'trim|required|xss_clean|min_length[8]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)',
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('siswa/layout/wrapper', $data, FALSE);
			} else {
				$this->siswa->add_forum_diskusi();
				$this->message('Berhasil', 'Forum diskusi telah dibuat', 'success');
				return redirect('siswa/diskusi/ruang_diskusi/' . $this->secure->encrypt_url($id));
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function forum_diskusi($id = false)
	{
		$data['siswa'] = $this->userSiswa;
		if ($id) {
			$id = $this->secure->decrypt_url($id);
			$data['title'] = 'Forum Diskusi';
			$data['content'] = 'siswa/contents/diskusi/v_detail_diskusi';
			$data['forum'] = $this->db->get_where('forum_diskusi', ['forum_diskusi_id' => $id])->row();
			$data['info'] = $this->guru->get_jadwal_mapel($data['forum']->jadwal_id);
			$data['reply'] = $this->guru->get_reply_forum($id);
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function get_komentar()
	{
		$output = '';
		$id_forum = $this->input->get('id', true);
		$where_diskusi = array(
			'parent_diskusi_id' => '0',
			'forum_diskusi_id' => $id_forum,
		);
		$query 	= $this->db->order_by('create_time', 'DESC')->get_where('diskusi_siswa', $where_diskusi);
		$result	= $query->result();
		foreach ($result as $key => $val) {
			$siswa	= $this->guru->get_siswa($val->user_id);
			$guru	= $this->guru->get_guru($val->user_id);
			if ($siswa) {
				if ($siswa->siswa_foto == 'default_foto.png') {
					$foto = base_url('assets/siswa/img/profile.png');
					$nama = $siswa->siswa_nama;
				} else {
					$foto = base_url('storage/guru/profile/' . $siswa->siswa_foto);
					$nama = $siswa->siswa_nama;
				}
			} elseif ($guru) {
				if ($guru->guru_foto == 'default_profile.png') {
					$foto = base_url('assets/siswa/img/profile.png');
					$nama = $guru->guru_nama;
				} else {
					$foto = base_url('storage/guru/profile/' . $guru->guru_foto);
					$nama = $guru->guru_nama;
				}
			} else {
				$foto = base_url('assets/siswa/img/profile.png');
				$nama = 'User';
			}
			$output .= '
				<div class="media mb-2">
					<img src="' . $foto . '" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px;">
					<div class="media-body">
							<div class="row">
							<div class="col-sm-10">
								<div class="nama-small">' . $nama . '</div>
								<div class="post-on mb-2">Posted on ' . date('d-m-Y H:i', strtotime($val->create_time)) . ' WIB</div>
								<div class="komen">' . $val->message . '</div>
								<a href="javascript:void(0)" class="balas" id-komen="' . $val->diskusi_siswa_id . '">Balas</a>
							</div>
						</div>
					</div>
				</div>
			<hr>';
			$output .= $this->ambil_reply($val->diskusi_siswa_id);
		}
		echo json_encode([$output]);
	}

	public function ambil_reply($parent_id = 0, $marginleft = 0)
	{
		$output = '';
		$where = array(
			'parent_diskusi_id' => $parent_id
		);
		$query 	= $this->guru->get_reply_diskusi($where, 'parent_diskusi_id', 'DESC');
		// var_dump($query->result());
		$count = $query->num_rows();
		if ($parent_id == 0) {
			$marginleft = 0;
		} else {
			$marginleft = $marginleft + 48;
		}
		$tingkat = $marginleft / 48 + 1;
		if ($count > 0) {
			foreach ($query->result() as $value) {
				$siswa	= $this->guru->get_siswa($value->user_id);
				$guru	= $this->guru->get_guru($value->user_id);
				if ($siswa) {
					if ($siswa->siswa_foto == 'default_foto.png') {
						$foto = base_url('assets/siswa/img/profile.png');
						$nama = $siswa->siswa_nama;
					} else {
						$foto = base_url('storage/guru/profile/' . $siswa->siswa_foto);
						$nama = $siswa->siswa_nama;
					}
				} elseif ($guru) {
					if ($guru->guru_foto == 'default_profile.png') {
						$foto = base_url('assets/siswa/img/profile.png');
						$nama = $guru->guru_nama;
					} else {
						$foto = base_url('storage/guru/profile/' . $guru->guru_foto);
						$nama = $guru->guru_nama;
					}
				} else {
					$foto = base_url('assets/siswa/img/profile.png');
					$nama = 'User';
				}
				$output .= '
				<div class="media mb-2" style="margin-left:' . $marginleft . 'px">
					<img src="' . $foto . '" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px;">
					<div class="media-body">
						<div class="row">
							<div class="col-sm-10">
								<div class="nama-small">' . $nama . '</div>
								<div class="post-on mb-2">Posted on ' . date('d-m-Y H:i', strtotime($value->create_time)) . ' WIB</div>
								<div class="komen">' . $value->message . '</div>';

				if ($tingkat < 2) {
					$output .= '<a href="javascript:void(0)" class="balas" id-komen="' . $value->diskusi_siswa_id . '">Balas</a>';
				}
				$output .= '</div>
						</div>
					</div>
				</div><hr>';
				$output .= $this->ambil_reply($value->diskusi_siswa_id, $marginleft);
			}
		}
		return $output;
	}

	public function submit_diskusi()
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
			$this->guru->insert_diskusi();
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => true
			];
		}
		echo json_encode($reponse);
	}
}
