<?php

class Eror extends CI_Controller
{

	public function notFound()
	{
		$data = [
			'title' => '404 Not Found',
			'content' => 'admin/contents/eror/v_not_found'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// Testing notfound page
    	// url test: http://localhost/SiberHyl/Admin/Eror/notFound
	}


    public function accessForbidden()
	{
		$data = [
			'title' => '403 Access Forbidden',
			'content' => 'admin/contents/eror/v_access_forbidden'
		];

		$this->load->view('admin/layout/wrapper', $data, FALSE);

        // Testing notfound page
    	// url test: http://localhost/SiberHyl/Admin/Eror/accessForbidden
	}

	
}

?>