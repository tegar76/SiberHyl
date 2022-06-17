<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$this->load->model('SiswaModel', 'siswa', true);
		$this->siswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
	}

	public function index()
	{
		$data['siswa'] = $this->siswa;
		$data['title'] = 'Profile Siswa' . $data['siswa']->siswa_nama;
		$data['content'] = 'siswa/contents/profile/v_profile';
		$this->load->view('siswa/layout/wrapper', $data);
	}

	public function editProfile()
	{
		$data['siswa'] = $this->siswa;
		if ($data['siswa']->siswa_email == htmlspecialchars($this->input->post('email'))) {
			$rule_username = 'trim|xss_clean|valid_email';
		} else {
			$rule_username = 'trim|xss_clean|valid_email|is_unique[siswa.siswa_email]';
		}
		$this->form_validation->set_rules([
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => $rule_username,
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}',
					'valid_email' => '{field} yang Anda masukan harus valid',
					'is_unique' => '{field} telah tersedia, silahkan masukan kembali'
				]
			],
			[
				'field' => 'telepon',
				'label' => 'Nomor Telepon',
				'rules' => 'trim|xss_clean|numeric',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}',
					'numeric' => '{field} harus berupa angka'
				]
			],
			[
				'field' => 'alaamt',
				'label' => 'Alamat',
				'rules' => 'trim|xss_clean',
				'errors' => [
					'xss_clean' => 'cek kembali pada {field}'
				]
			]
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Update Profile Siswa' . $data['siswa']->siswa_nama;
			$data['content'] = 'siswa/contents/profile/v_edit_profile';
			$this->load->view('siswa/layout/wrapper', $data);
		} else {
			$this->process_update();
		}
	}

	public function process_update()
	{
		$siswa = $this->siswa;
		if ($_FILES['image']['name']) {
			$this->imageConf('siswa');
			if (!$this->upload->do_upload('image')) :
				$this->message('Oopppsss', $this->upload->display_errors(), 'error');
				redirect('siswa/profile');
			else :
				$dataUpload = $this->upload->data();
				$resolution = ['width' => 500, 'height' => 500];
				$this->compreesImage('siswa', $dataUpload['file_name'], $resolution);
				if ($siswa->siswa_foto != 'default_foto.png') {
					@unlink(FCPATH . './storage/siswa/profile/' . $siswa->siswa_foto);
				}
				$newProfile = $this->upload->data('file_name');
				$this->db->set('siswa_foto', $newProfile);
			endif;
		}
		$updateSiswa = [
			'siswa_email' => $this->input->post('email', true),
			'siswa_telp' => $this->input->post('telepon', true),
			'siswa_alamat' => $this->input->post('alamat', true)
		];
		$this->db->set($updateSiswa);
		$this->db->where(['siswa_nis' => $siswa->siswa_nis]);
		$this->db->update('siswa');
		$this->message('Profile Berhasil Diupdate', 'Selamat' . $siswa->siswa_nama . ', profile anda berhasil diperbarui', 'success');
		redirect('siswa/profile');
	}

	public function imageConf($dirName = NULL)
	{
		$conf['upload_path']   = './storage/' . $dirName . '/profile/';
		$conf['allowed_types'] = 'gif|jpg|png|jpeg|mp3';
		$conf['max_size']      = 2000;
		$conf['overwrite']     = TRUE;
		$conf['encrypt_name'] = TRUE;
		$this->load->library('upload', $conf);
	}

	public function compreesImage($dirName, $fileName, $resolution)
	{
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = './storage/' . $dirName . '/profile/' . $fileName;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']     = $resolution['width'];
		$config['height']   = $resolution['height'];

		$this->image_lib->clear();
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
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

	public function editPassword()
	{
		$data['siswa'] = $this->siswa;
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'callback_password_check');
		$this->form_validation->set_rules([
			[
				'field' => 'new_pass',
				'label' => 'Password Baru',
				'rules' => 'required|trim|xss_clean|min_length[8]|matches[conf_pass]',
				'errors' => [
					'matches' => 'konfirmasi password tidak sama!',
					'min_length' => '{field} terlalu pendek! (minimal 8 karakter)',
					'required' => '{field} harus diisi!'
				]
			],
			[
				'field' => 'conf_pass',
				'label' => 'Konfirmasi Password',
				'rules' => 'required|trim|xss_clean|min_length[8]|matches[new_pass]',
				'errors' => [
					'matches' => 'konfirmasi password tidak sama!',
					'min_length' => '{field} terlalu pendek! (minimal 8 karakter)',
					'required' => '{field} harus diisi!'
				]
			]
		]);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Update Password';
			$data['content'] = 'siswa/contents/profile/v_edit_password';
			$this->load->view('siswa/layout/wrapper', $data);
		} else {
			$newPassword = $this->input->post('new_pass', true);
			$passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
			$this->db->where('siswa_nis', $data['siswa']->siswa_nis);
			$this->db->update('siswa', ['siswa_pass' => $passwordHash]);
			$this->message('Password Berhasil Diupdate', 'Selamat' .  $data['siswa']->siswa_nama . ', password anda berhasil diperbarui', 'success');
			redirect('siswa/profile');
		}
	}


	public function password_check($str)
	{
		$siswa = $this->siswa;
		if (!password_verify($str, $siswa->siswa_pass)) {
			$this->form_validation->set_message('password_check', '{field} salah!');
			return false;
		}
		return true;
	}
}
