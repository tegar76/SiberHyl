<?php

class JurnalMateri extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		checkAdminLogin();
		$this->load->model('JadwalModel', 'jadwal', true);
		$tahun_ajar = $this->jadwal->get_activate_tahunajar();
		if ($tahun_ajar == null) {
			$this->tahun_ajar = [
				'semester' => 0,
				'tahun' => ''
			];
		} else {
			$this->tahun_ajar = $tahun_ajar;
		}
	}

	public function index()
	{
		$data['title'] = 'Jurnal Materi';
		$data['content'] = 'admin/contents/jurnal_materi/v_jurnal_materi';
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['jurnal'] = $this->jadwal->get_jurnal();
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_jurnal($jurnal_id = false)
	{
		$jurnal_id = $this->secure->decrypt_url($jurnal_id);
		$jurnal = $this->jadwal->getJurnalWhere(['jurnal_id' => $jurnal_id]);
		$data['title'] = 'Jurnal Materi';
		$data['result'] = $jurnal;
		$data['content'] = 'admin/contents/jurnal_materi/v_detail_jurnal_materi';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function show_jurnal()
	{
		$jurnal_id = $this->input->post('jurnal_id', true);
		$jurnal_id = $this->secure->decrypt_url($jurnal_id);
		$this->db->set('status', 1);
		$this->db->where('jurnal_id', $jurnal_id);
		$this->db->update('jurnal');
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus mata pelajaran ini',
			'success' => true
		];
		echo json_encode($reponse);
	}
}
