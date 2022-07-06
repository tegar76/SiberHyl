<?php

class Eror extends CI_Controller
{

	public function notFound()
	{
		$data = [
			'title' => '404 Not Found',
			'content' => 'wali_kelas/contents/eror/v_not_found'
		];

		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
		// Testing notfound page
    	// url test: http://localhost/SiberHyl/WaliKelas/Eror/notFound
	}


    public function accessForbidden()
	{
		$data = [
			'title' => '403 Access Forbidden',
			'content' => 'wali_kelas/contents/eror/v_access_forbidden'
		];

		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);

        // Testing notfound page
    	// url test: http://localhost/SiberHyl/WaliKelas/Eror/accessForbidden
	}

	
}

?>