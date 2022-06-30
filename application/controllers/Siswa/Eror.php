<?php

class Eror extends CI_Controller
{

	public function notFound()
	{
		$data = [
			'title' => '404 Not Found',
			'content' => 'siswa/contents/eror/v_not_found'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
		// Testing notfound page
    	// url test: http://localhost/SiberHyl/Siswa/Eror/notFound
	}


    public function accessForbidden()
	{
		$data = [
			'title' => '403 Access Forbidden',
			'content' => 'siswa/contents/eror/v_access_forbidden'
		];

		$this->load->view('siswa/layout/wrapper', $data, FALSE);

        // Testing notfound page
    	// url test: http://localhost/SiberHyl/Siswa/Eror/accessForbidden
	}

	
}

?>