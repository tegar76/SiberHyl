<?php

class Eror extends CI_Controller
{

	public function notFound()
	{
		$data = [
			'title' => '404 Not Found',
			'content' => 'guru/contents/eror/v_not_found'
		];

		$this->load->view('guru/layout/wrapper', $data, FALSE);
		// Testing notfound page
    	// url test: http://localhost/SiberHyl/Guru/Eror/notFound
	}


    public function accessForbidden()
	{
		$data = [
			'title' => '403 Access Forbidden',
			'content' => 'guru/contents/eror/v_access_forbidden'
		];

		$this->load->view('guru/layout/wrapper', $data, FALSE);

        // Testing notfound page
    	// url test: http://localhost/SiberHyl/Guru/Eror/accessForbidden
	}

	
}

?>