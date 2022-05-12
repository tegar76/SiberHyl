<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
	public function index()
	{
		$data = array(
			'content' => 'siswa/contents/jadwal/v_jadwal',
		);
		$this->load->view('siswa/layout/wrapper', $data);
	}
}
