<?php

/*
 * File ini adalah Controller untuk autentifikasi dari Admin.
*/

class AuthAdmin extends CI_Controller
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

	public function checkToken()
	{
		if ($this->session->userdata('backToken')) {
			if ($this->auth->checkToken($this->session->userdata('backToken'))) {
				redirect('master/dashboard');
			} else {
				$this->session->unset_userdata('backToken');
				redirect('admin/logout');
			}
		}
	}

	public function index()
	{
		$this->checkToken();
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
			$data['title'] = 'Masuk Sebagai Ad Admin';
			$this->load->view('admin/login/v_login');
		} else {
			$this->process();
		}
	}

	public function process()
	{
		$data 	= $this->input->post();
		$admin  = $this->auth->getAdminByUsername($data['username']);
		$data['title'] = 'Masuk Sebagai Admin';
		if ($admin) {
			if (password_verify($data['password'], $admin->password)) {
				if ($admin->role_id === '1') {
					$sess_ = [
						'adminId'	=> $admin->guru_id,
						'fullName'	=> $admin->guru_nama,
						'username'	=> $admin->username,
						'backToken' => crypt($admin->guru_nama, ''),
						'level'		=> 'master',
						'logged_in'	=> true
					];
					$this->session->set_userdata($sess_);
					$this->auth->registToken($forToken = ['access_token' => $sess_['backToken']]);
					$this->message('Selamat datang ' . $admin->guru_nama . '!', 'Semoga hari anda menyenangkan:)', 'success');
					redirect('master/dashboard');
				} else {
					$this->session->set_flashdata('message', 'Hak akses Anda tidak tersedia untuk masuk kedalam sistem Admin!');
					$this->load->view('admin/login/v_login');
				}
			} else {
				$this->session->set_flashdata('message', 'password salah');
				$this->load->view('admin/login/v_login');
			}
		} else {
			$this->session->set_flashdata('message', 'username & password tidak tersedia');
			$this->load->view('admin/login/v_login');
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
/* Location: ./application/controllers/Auth/AuthAmin.php */
