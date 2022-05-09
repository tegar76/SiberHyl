<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => 'Jadwal',
			'content' => 'siswa/contents/jadwal/v_jadwal'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}
}
