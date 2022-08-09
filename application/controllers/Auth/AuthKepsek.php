<?php

/*
 * File ini adalah Controller untuk authentifikasi dari Kepala Sekolah 
*/

class AuthKepsek extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel', 'auth', true);
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
		$data['title'] = 'Login Kepala Sekolah';
		$this->form_validation->set_rules([
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'password',
				'label' => 'password',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('kepala_sekolah/login/v_login', $data, FALSE);
		} else {
			$this->process_login();
		}
	}

	public function checkToken()
	{
		if ($this->session->userdata('backToken')) {
			if ($this->auth->checkToken($this->session->userdata('backToken'))) {
				redirect('kepala_sekolah/dashboard');
			} else {
				$this->session->unset_userdata('backToken');
				redirect('kepsek/logout');
			}
		}
	}

	public function process_login()
	{
		$this->checkToken();
		$data = $this->input->post();
		$kepsek = $this->auth->getKepsekByUsername($data['username']);
		$data['title'] = 'Login Kepala Sekolah';
		if ($kepsek) {
			if (password_verify($data['password'], $kepsek->password)) {
				if ($kepsek->role_id === '3') {
					$sess_ = [
						'kepsekId'	=> $kepsek->guru_id,
						'fullName'	=> $kepsek->guru_nama,
						'username'	=> $kepsek->username,
						'backToken' => crypt($kepsek->guru_nama, ''),
						'level'		=> 'kepala_sekolah',
						'logged_in'	=> true
					];
					$this->session->set_userdata($sess_);
					$this->auth->registToken($forToken = ['access_token' => $sess_['backToken']]);
					$this->message('Selamat datang ' . $kepsek->guru_nama . '!', 'Semoga hari anda menyenangkan:)', 'success');
					redirect('kepala_sekolah/dashboard');
				} else {
					$this->session->set_flashdata('message', 'Hak akses Anda tidak tersedia untuk masuk kedalam sistem Kepala Sekolah!');
					$this->load->view('kepala_sekolah/login/v_login', $data, FALSE);
				}
			} else {
				$this->session->set_flashdata('message', 'password salah');
				$this->load->view('kepala_sekolah/login/v_login', $data, FALSE);
			}
		} else {
			$this->session->set_flashdata('message', 'username & password tidak tersedia');
			$this->load->view('kepala_sekolah/login/v_login', $data, FALSE);
		}
	}

	public function logout()
	{
		$this->auth->deleteToken($this->session->userdata('backToken'));
		$this->session->sess_destroy();
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'success' => true
		];
		echo json_encode($reponse);
	}
}

/* End of file AuthAdmin.php */
/* Location: ./application/controllers/Auth/AuthKepsek.php */
