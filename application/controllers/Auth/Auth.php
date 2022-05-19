<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel', 'siswa', true);
		$this->load->model('GuruModel', 'guru', true);
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
		show_404();
	}

	public function login()
	{
		checkLoginUser();
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
			[
				'field' => 'hak_akses',
				'label' => 'hak akses',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}'
				]
			]
		]);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Masuk Akun';
			$this->load->view('auth/v_auth', $data, FALSE);
		} else {
			$this->process();
		}
	}

	public function process()
	{
		$data = $this->input->post();
		$siswa = $this->siswa->getWhere(['siswa_nis' => $data['username']]);
		$guru  = $this->guru->getWhere(['guru_username' => $data['username']]);
		if ($siswa) {
			if (password_verify($data['password'], $siswa['siswa_pass'])) {
				if ($data['hak_akses'] != 'siswa') {
					$this->session->set_flashdata('message', 'Pengisian akun tidak sesuai ,silahkan cek kembali');
					return redirect('login');
				} else {
					$set_user = [
						'fullName' => $siswa['siswa_nama'],
						'nis' 	=> $siswa['siswa_nis'],
						'level'		=> 'siswa',
						'logged_in'	=> true
					];
					$this->session->set_userdata($set_user);
					$this->siswa->updateWhere(['status_online' => 'online'], $siswa['siswa_nis']);
					$this->message('Selamat Datang ' . $siswa['siswa_nama'] . ' ! ', 'Semoga hari anda menyenangkan :)', 'success');
					redirect('siswa/jadwal');
				}
			} else {
				$this->session->set_flashdata('message', 'password salah');
				redirect('login');
			}
		} elseif ($guru) {
			if (password_verify($data['password'], $guru['guru_pass'])) {
				if ($data['hak_akses'] == 'guru') {
					$set_user = [
						'fullName' => $guru['guru_nama'],
						'nip' => $guru['guru_nip'],
						'kode' => $guru['guru_kode'],
						'level'		=> 'guru',
						'logged_in'	=> true
					];
					$this->session->set_userdata($set_user);
					$this->guru->updateWhere(['status_online' => 'online'], $guru['guru_nip']);
					redirect('guru/dashboard');
				} elseif ($data['hak_akses'] == 'wali-kelas') {
					$set_user = [
						'fullName' => $guru['guru_nama'],
						'nip' 	=> $guru['guru_nip'],
						'kode' => $guru['guru_kode'],
						'level'		=> 'wali-kelas',
						'logged_in'	=> true
					];
					$this->session->set_userdata($set_user);
					$this->guru->updateWhere(['status_online' => 'online'], $guru['guru_nip']);
					redirect('wali-kelas/dashboard');
				} else {
					$this->session->set_flashdata('message', 'Pengisian akun tidak sesuai ,silahkan cek kembali');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', 'password salah');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', 'username & password tidak tersedia');
			redirect('login');
		}
	}

	// fungsi logout
	public function logout()
	{

		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'success' => false,
			'messages' => []
		];

		if ($this->session->userdata('level') == 'siswa') {

			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => true
			];

			$update_ = [
				'last_login' => date('Y-m-d H:i:s'),
				'status_online'	=> 'offline'
			];
			$this->siswa->updateWhere($update_, $this->session->userdata('nis'));
			$this->session->sess_destroy();
		} elseif ($this->session->userdata('level') == 'guru' or $this->session->userdata('level') == 'wali-kelas') {

			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => true
			];

			$update_ = [
				'last_login' => date('Y-m-d H:i:s'),
				'status_online'	=> 'offline'
			];
			$this->guru->updateWhere($update_, $this->session->userdata('nip'));
			$this->session->sess_destroy();
		}

		echo json_encode($reponse);
	}
}
