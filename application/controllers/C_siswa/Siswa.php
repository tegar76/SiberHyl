<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
        $data = [
            'title' => 'Jadwal',
            'content' => 'siswa/contents/jadwal/v_jadwal'
        ];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}
}
