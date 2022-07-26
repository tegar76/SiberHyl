<?php

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GuruModel', 'guru', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
	}

	public function index()
	{
		$data['guru'] = $this->userGuru;
		$data['notif'] = check_new_info();
		$data['title'] = 'Profile Guru ' . $this->userGuru->guru_nama;
		$data['content'] = 'guru/contents/profile/v_profile';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function update_profile()
	{
		$data['guru'] = $this->userGuru;
		$data['notif'] = check_new_info();
		$data['title'] = 'Edit Profile Guru ' . $this->userGuru->guru_nama;
		$data['content'] = 'guru/contents/profile/v_edit_profile';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function process_update_profile()
	{
		$guru = $this->userGuru;
		if ($_FILES['image_teacher']['name']) {
			$this->imageConf('guru');
			if (!$this->upload->do_upload('image_teacher')) :
				$this->message('Oopppsss', $this->upload->display_errors(), 'error');
				redirect('guru/profile');
			else :
				$dataUpload = $this->upload->data();
				$resolution = ['width' => 500, 'height' => 500];
				$this->compreesImage('siswa', $dataUpload['file_name'], $resolution);
				if ($guru->guru_foto != 'default_foto.png') {
					@unlink(FCPATH . './storage/guru/profile/' . $guru->guru_foto);
				}
				$newProfile = $this->upload->data('file_name');
				$this->db->set('guru_foto', $newProfile);
			endif;
		}
		$this->db->where(['guru_nip' => $guru->guru_nip]);
		$this->db->update('guru');
		$this->message('Profile Berhasil Diupdate', 'Selamat' . $guru->guru_nama . ', profile anda berhasil diperbarui', 'success');
		redirect('guru/profile');
	}

	public function update_password()
	{
		$data['guru'] = $this->userGuru;
		$data['notif'] = check_new_info();
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
		if ($this->form_validation->run() == false) :
			$data['title'] = 'Edit Password';
			$data['content'] = 'guru/contents/profile/v_edit_password';
			$this->load->view('guru/layout/wrapper', $data, FALSE);
		else :
			$newPassword = $this->input->post('new_pass', true);
			$passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
			$this->db->where('guru_nip', $data['guru']->guru_nip);
			$this->db->update('guru', ['guru_pass' => $passwordHash]);
			$this->message('Password Berhasil Diupdate', 'Selamat ' .  $data['guru']->guru_nama . ', password anda berhasil diperbarui', 'success');
			redirect('guru/profile');
		endif;
	}

	public function imageConf($dirName = NULL)
	{
		$conf['upload_path']   = './storage/' . $dirName . '/profile/';
		$conf['allowed_types'] = 'gif|jpg|png|jpeg';
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

	public function password_check($str)
	{
		$guru = $this->userGuru;
		if (!password_verify($str, $guru->guru_pass)) {
			$this->form_validation->set_message('password_check', '{field} salah!');
			return false;
		}
		return true;
	}
}
