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
	public function index()
	{
		show_404();
	}

	public function login()
	{
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
		$guru  = $this->guru->getWhere(['guru_nip' => $data['username']]);
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
					$this->siswa->updateWhere(['siswa_status' => 'online'], $siswa['siswa_nis']);
					redirect('siswa/dashboard');
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
						'level'		=> 'guru',
						'logged_in'	=> TRUE
					];
					$this->session->set_userdata($set_user);
					$this->guru->updateWhere(['guru_status' => 'online'], $guru['guru_nip']);
					redirect('guru/dashboard');
				} elseif ($data['hak_akses'] == 'wali-kelas') {
					$set_user = [
						'fullName' => $guru['guru_nama'],
						'nip' 	=> $guru['guru_nip'],
						'level'		=> 'wali-kelas',
						'logged_in'	=> true
					];
					$this->session->set_userdata($set_user);
					$this->guru->updateWhere(['guru_status' => 'online'], $guru['guru_nip']);
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
}
