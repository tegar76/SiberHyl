<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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
		$data['title'] = 'Siberhyl | Sistem Informasi Berbasis Hybrid Learning';
		$this->form_validation->set_rules([
			[
				'field' => 'nama_lengkap',
				'label' => 'Nama Lengkap',
				'rules' => 'trim|required|xss_clean|min_length[4]',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}',
					'min_length' => '{field} terlalu pendek'
				]
			],
			[
				'filed' => 'email_user',
				'label' => 'Email',
				'rules' => 'trim|required|xss_clean|valid_email',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}',
					'valid_email' => '{field} harus valid'
				]
			],
			[
				'field' => 'subject',
				'label' => 'Subjek',
				'rules' => 'trim|required|xss_clean|min_length[6]',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}',
					'min_length' => '{field} terlalu pendek'
				]

			],
			[
				'field' => 'no_phone',
				'label' => 'Nomor Telepon',
				'rules' => 'trim|required|xss_clean|numeric|max_length[15]',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}',
					'numeric' => '{field} harus angka',
					'max_length' => '{field} terlalu panjang'
				]
			],
			[
				'field' => 'message',
				'label' => 'Pesan',
				'rules' => 'trim|required|xss_clean|min_length[8]',
				'errors' => [
					'required' => '{field} harus diisi',
					'xss_clean' => 'cek kembali pada {field}',
					'min_length' => '{field} terlalu pendek'
				]
			]
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('home/v_home', $data);
		} else {
			$data = array(
				'full_name' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'email'		=> htmlspecialchars($this->input->post('email_user', true)),
				'phone'		=> htmlspecialchars($this->input->post('no_phone', true)),
				'subject'	=> htmlspecialchars($this->input->post('subject', true)),
				'message'	=> htmlspecialchars($this->input->post('message'))
			);
			$this->db->insert('pesan_aduan', $data);
			$this->message('Pesan Aduan Tersampaikan', 'Terima Kasih telah mengirimkan pesan aduan kepada kami', 'success');
			return redirect(base_url());
		}
	}

}
