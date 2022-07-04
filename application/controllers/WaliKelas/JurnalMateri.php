<?php

class JurnalMateri extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Jurnal Materi';
		$data['content'] = 'wali_kelas/contents/jurnal_materi/v_jurnal_materi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

    public function detailJurnalMateri()
	{
		$data['title'] = 'Detail Jurnal Materi';
		$data['content'] = 'wali_kelas/contents/jurnal_materi/v_detail_jurnal_materi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}
}
