<?php

class Docs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$this->load->model('SiswaModel', 'siswa', true);
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('GuruModel', 'guru', true);
		$tahun_ajar = $this->master->getActiveTahunAkademik();
		$this->userSiswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
		if ($tahun_ajar == null) {
			$this->tahun_ajar = [
				'tahun_id' => 0,
				'semester' => 0,
				'tahun' => ''
			];
		} else {
			$this->tahun_ajar = $tahun_ajar;
		}
	}

	public function absensi($id = false)
	{
		$id = $this->secure->decrypt_url($id);
		$data['result'] = $this->master->getInfoJadwal($id);
		$data['pertemuan'] = count($this->master->jurnalPembelajaran($id));
		$data['title'] = 'Form Cetak Reporting Absensi';
		$data['content'] = 'siswa/contents/absen/v_form_cetak_absensi';
		$this->form_validation->set_rules('pert_awal', 'Pertemuan Awal', 'required|trim|xss_clean|callback_validate_pertemuan_awal', [
			'required' => '{field} harus diisi',
			'xss_clean' => 'cek kembali pada {field}'
		]);
		$this->form_validation->set_rules('pert_akhir', 'Pertemuan Akhir', 'required|trim|xss_clean|callback_validate_pertemuan_akhir', [
			'required' => '{field} harus diisi',
			'xss_clean' => 'cek kembali pada {field}'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('siswa/layout/wrapper', $data, FALSE);
		} else {
			$this->export_absensi();
		}
	}

	public function validate_pertemuan_awal($str)
	{
		if ($str > $_POST['pert_akhir']) {
			$this->form_validation->set_message('validate_pertemuan_awal', '{field} lebih besar dari Pertemuan Akhir');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function validate_pertemuan_akhir($str)
	{
		if ($str < $_POST['pert_awal']) {
			$this->form_validation->set_message('validate_pertemuan_akhir', '{field} lebih kecil dari Pertemuan Awal');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function export_absensi()
	{
		$format	= $this->input->post('format_export', true);
		$jadwal_id	= $this->input->post('jadwal_id', true);
		$pert_awal	= $this->input->post('pert_awal', true);
		$pert_akhir	= $this->input->post('pert_akhir', true);
		$info = $this->master->getInfoJadwal($jadwal_id);
		if ($format == 'pdf') {
			$siswa = $this->userSiswa;
			if ($siswa) {
				$rekap['nomor'] = 1;
				$rekap['nis']	= $siswa->siswa_nis;
				$rekap['nama']	= $siswa->siswa_nama;
				$absen = $this->guru->getExportData('jurnal', $jadwal_id);
				foreach ($absen	as $row) {
					$status = $this->guru->getAbsensiSiswa($row->jurnal_id, $siswa->siswa_nis);
					if ($status) {
						$sts['ket'] = $status->status;
					} else {
						$sts['ket'] = '';
					}
					$sts_[] = $sts;
				}
				$rekap['status'] = $sts_;
				$rekap['H'] = $this->guru->count_absensi_siswa('H', $siswa->siswa_nis, $info->jadwal_id);
				$rekap['A'] = $this->guru->count_absensi_siswa('A', $siswa->siswa_nis, $info->jadwal_id);
				$rekap['I'] = $this->guru->count_absensi_siswa('I', $siswa->siswa_nis, $info->jadwal_id);
				$rekap['S'] = $this->guru->count_absensi_siswa('S', $siswa->siswa_nis, $info->jadwal_id);
				$data['reporting'] = $rekap;
			}
			$data['absen'] = $this->guru->getExportData('jurnal', $jadwal_id);
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['dateExport']	= date('Y-m-d H:i:s');
			$data['teacherCode'] = $info->guru_kode;
			$data['className']	= $info->nama_kelas;
			$data['lessonName']	= $info->nama_mapel;
			$data['pertKe'] = $pert_awal . ' s/d ' . $pert_akhir;
			$data['totalPert'] = $pert_akhir;
			$data['title'] = 'LAPORAN HASIL ABSENSI SISWA';

			$this->load->library('pdf');
			$this->pdf->filename = 'rekap_absensi_siswa_' . time() . '_download';
			$this->pdf->setPaper('A4', 'portrait');
			$this->pdf->load_view('siswa/contents/absen/v_cetak_absensi', $data, FALSE);
		}
	}
}
