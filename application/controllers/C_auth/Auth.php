<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $data = [
            'title' => 'Masuk Akun',
        ];

		$this->load->view('auth/v_auth', $data, FALSE);
	}
}
