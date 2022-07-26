<?php

class JurnalMateri extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isGuruLogin();
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
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
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['guru'] = $this->userGuru;
		$data['wali'] = $this->guru->get_wali_kelas($data['guru']->guru_kode);
		$data['jurnal'] = array();
		$jurnal = $this->jadwal->getJurnalWhere(['jadwal.kelas_id' => $data['wali']->kelas_id]);
		if ($jurnal) {
			$data['jurnal'] = $jurnal;
		}
		$data['title'] = 'Jurnal Materi';
		$data['content'] = 'wali_kelas/contents/jurnal_materi/v_jurnal_materi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function detail_jurnal($jurnal_id = false)
	{
		$jurnal_id = $this->secure->decrypt_url($jurnal_id);
		$jurnal = $this->jadwal->getJurnalWhere(['jurnal_id' => $jurnal_id]);
		$data['title'] = 'Jurnal Materi';
		$data['result'] = $jurnal;
		$data['guru'] = $this->userGuru;
		$data['title'] = 'Detail Jurnal Materi';
		$data['content'] = 'wali_kelas/contents/jurnal_materi/v_detail_jurnal_materi';
		$this->load->view('wali_kelas/layout/wrapper', $data, FALSE);
	}

	public function show_jurnal()
	{
		$jurnal_id = $this->input->post('jurnal_id', true);
		$jurnal_id = $this->secure->decrypt_url($jurnal_id);
		$jurnal = $this->db->select('status')->where('jurnal_id', $jurnal_id)->get('jurnal')->row();
		$status = $jurnal->status;
		$status = $status + 1;
		$this->db->set('status', $status);
		$this->db->where('jurnal_id', $jurnal_id);
		$this->db->update('jurnal');
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah Melihat Jurnal Materi ini',
			'success' => true
		];
		echo json_encode($reponse);
	}
}
