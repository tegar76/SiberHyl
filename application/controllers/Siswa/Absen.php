<?php

class Absen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('SiswaModel', 'siswa', true);
		isSiswaLogin();
		$days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->today = $days[(int)date('w')];
		$this->datenow = date('Y-m-d');
		$this->userSiswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
	}

	public function index()
	{
		show_404();
	}

	public function ruang_absensi($jadwalID = false)
	{
		$jadwalID = $this->secure->decrypt_url($jadwalID);
		$siswa = $this->userSiswa;
		$timeNow = date('H:i');
		$dateNow = $this->datenow;
		$data['title'] = 'Absensi Pelajaran';
		if ($jadwalID == false) {
			$data['content'] = 'siswa/contents/errors/404_notfound';
		} else {
			$infoJadwal = $this->siswa->get_jadwal_mapel($jadwalID);
			$infoAbsensi = $this->siswa->get_mulai_absen(['jurnal.jadwal_id' => $jadwalID]);
			if (empty($infoAbsensi)) {
				$absensi['jurnalID'] = 0;
				$absensi['jadwalID'] = $infoJadwal->jadwal_id;
				$absensi['kelas'] = $siswa->nama_kelas;
				$absensi['mapel'] = $infoJadwal->nama_mapel;
				$absensi['tanggal'] = '-';
				$absensi['dibuka'] = '-';
				$absensi['ditutup'] = '-';
				$absensi['pertemuan'] = '-';
				$absensi['status'] = '<span class="text-danger">Belum Dimulai</span>';
				$data['is_absen'] = false;
				$data['timeout_absen'] = false;
				$data['riwayat'] = array();
			} else {
				if (strtotime($infoAbsensi->tanggal) == strtotime($this->datenow)) {
					$absensi['jurnalID'] = $infoAbsensi->jurnal_id;
					$absensi['jadwalID'] = $infoAbsensi->jadwal_id;
					$absensi['kelas'] = $siswa->nama_kelas;
					$absensi['mapel'] = $infoAbsensi->nama_mapel;
					$absensi['tanggal'] = date('d-m-Y', strtotime($infoAbsensi->tanggal));
					$absensi['dibuka'] = date('H:i', strtotime($infoAbsensi->absen_mulai)) . " WIB";
					$absensi['ditutup'] = date('H:i', strtotime($infoAbsensi->absen_selesai)) . " WIB";
					$absensi['pertemuan'] = $infoAbsensi->pert_ke;
					$absenSiswa = $this->siswa->get_absen_siswa([
						'siswa_nis' => $siswa->siswa_nis,
						'jurnal_id' => $infoAbsensi->jurnal_id
					]);

					if (strtotime($timeNow) >= strtotime($infoAbsensi->absen_selesai)) {
						$absensi['status'] = '<span class="text-danger">Absen Sudah Ditutup</span>';
					} else {
						if (empty($absenSiswa)) {
							$absensi['status'] = '<span class="text-warning">Belum Absen</span>';
						} else {
							$absensi['status'] = '<span class="text-success">Sudah Absen</span>';
						}
					}
				} else {
					$absensi['jurnalID'] = $infoAbsensi->jurnal_id;
					$absensi['jadwalID'] = $infoAbsensi->jadwal_id;
					$absensi['kelas'] = $siswa->nama_kelas;
					$absensi['mapel'] = $infoAbsensi->nama_mapel;
					$absensi['tanggal'] = '-';
					$absensi['dibuka'] = '-';
					$absensi['ditutup'] = '-';
					$absensi['pertemuan'] = '-';
					$absensi['status'] = '<span class="text-danger">Belum Dimulai</span>';
				}

				$check_absen = $this->siswa->check_absensi_siswa($siswa->siswa_nis, $infoAbsensi->jurnal_id);
				if ($check_absen > 0) {
					$data['is_absen'] = true;
				} else {
					$data['timeout_absen'] = false;
					if (strtotime($dateNow) == strtotime($infoAbsensi->tanggal) and strtotime($timeNow) >= strtotime($infoAbsensi->absen_selesai)) {
						$data['timeout_absen'] = true;
					}
					$data['is_absen'] = false;
				}
			}

			$nomor = 1;
			$riwayatJurnal = $this->siswa->get_riwayat_jurnal($jadwalID);
			$data['riwayat'] = array();
			if ($riwayatJurnal) {
				foreach ($riwayatJurnal as $key => $value) {
					$absenSiswa = $this->siswa->get_riwayat_absen($siswa->siswa_nis, $value->jurnal_id);
					$result_absen['nomor'] = $nomor++;
					$result_absen['status'] = 'Belum Absen';
					$result_absen['pembelajaran'] = '-';
					if (!empty($absenSiswa)) :
						$result_absen['status'] = $absenSiswa->status;
						$result_absen['pembelajaran'] = $absenSiswa->metode_kbm;
					endif;
					$result_absen['tanggal'] = date('d-m-Y', strtotime($value->tanggal));
					$result_absen['mapel'] = $value->nama_mapel;
					$result_absen['pertemuan'] = $value->pert_ke;
					$result_absen['pembahasan'] = $value->pembahasan;
					$riwayatAbsen[] = $result_absen;
				}
				$data['riwayat'] = $riwayatAbsen;
			}
			$data['absensi'] = $absensi;
			$data['content'] = 'siswa/contents/absen/v_absen';
		}

		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function process_absensi()
	{
		$siswa = $this->userSiswa;
		$timeNow = date('H:i');
		$dateNow = $this->datenow;
		$jurnal_id = $this->input->post('jurnal_id', true);
		$absensi = $this->siswa->check_absensi($jurnal_id);
		if (strtotime($dateNow) == strtotime($absensi->tanggal)) :
			if (strtotime($timeNow) < strtotime($absensi->absen_mulai)) :
				$response = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'success' => false,
					'msgabsen' => 'Absensi belum dimulai'
				];
			elseif (strtotime($timeNow) >= strtotime($absensi->absen_mulai) && strtotime($timeNow) <= strtotime($absensi->absen_selesai)) :
				$metode_absen = $this->input->post('metode_absen', true);
				if ($metode_absen === 'offline') {
					$this->siswa->process_absensi($metode_absen, $siswa->siswa_nis);
					$response = [
						'csrfName' => $this->security->get_csrf_token_name(),
						'csrfHash' => $this->security->get_csrf_hash(),
						'success' => true,
						'msgabsen' => 'Absensi telah berhasil',
						'errorupload' => 'Absensi Berhasil'
					];
				} elseif ($metode_absen === 'online') {
					$result_absen = $this->siswa->process_absensi($metode_absen, $siswa->siswa_nis);
					$response = $result_absen;
				}
			endif;
		else :
			$response = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => false,
				'msgabsen' => 'Belum waktunya melakukan absen'
			];
		endif;
		echo json_encode($response);
	}

	public function cetak_absensi($jadwalID)
	{
		$jadwalID = $this->secure->decrypt_url($jadwalID);
		$data['title'] = 'Form Cetak Absensi';
		$data['content'] = 'siswa/contents/absen/v_form_cetak_absensi';
		$data['result'] = $this->siswa->get_jadwal_mapel($jadwalID);
		$this->form_validation->set_rules('pert_awal', 'Pertemuan Awal', 'required|trim|xss_clean|callback_validate_pertemuan_awal', [
			'required' => '{field} harus diisi',
			'xss_clean' => 'cek kembali pada {field}'
		]);
		$this->form_validation->set_rules('pert_akhir', 'Pertemuan Akhir', 'required|trim|xss_clean|callback_validate_pertemuan_akhir', [
			'required' => '{field} harus diisi',
			'xss_clean' => 'cek kembali pada {field}'
		]);
		if ($this->form_validation->run() == false) :
			$this->load->view('siswa/layout/wrapper', $data, FALSE);
		else :
			$this->load->library('pdf');
			$jadwal_id = $this->input->post('jadwal_id', true);
			$siswa_nis = $this->input->post('siswa_nis', true);
			$pert_awal = $this->input->post('pert_awal', true);
			$pert_akhir = $this->input->post('pert_akhir', true);
			$rekap_absen = $this->siswa->print_riwayat_absen($jadwal_id, $siswa_nis, $pert_awal, $pert_akhir);
			$siswa = $this->db->select('siswa_nis, siswa_nama')->from('siswa')->where('siswa_nis', $siswa_nis)->get()->row();
			$print = [
				'tanggal_cetak' => date('Y-m-d H:i:s'),
				'kode_guru' => $this->input->post('kode_guru', true),
				'kelas' => $this->input->post('kelas', true),
				'mapel' => $this->input->post('mapel', true),
				'pertemuan' => $pert_awal . ' s/d ' . $pert_akhir,
				'siswa_nis' => $siswa->siswa_nis,
				'siswa_nama' => $siswa->siswa_nama,
				'rekap_absen' => $rekap_absen
			];
			$data['print'] = $print;
			$this->load->view('siswa/contents/absen/v_cetak_absensi', $data, FALSE);

		endif;
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

	public function cetak_riwayat_absensi($params)
	{
		$this->pdf->filename = 'rekap_absensi_siswa_' . time() . '_download';
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->load_view('siswa/contents/absen/v_cetak_absensi', $params);
	}

	public function cetakAbsensiPdf()
	{
		$data = [
			'title' => 'Cetak Absensi Pdf',
		];

		$this->load->view('siswa/contents/absen/cetak_absensi_pdf/v_cetak_absensi_pdf', $data, FALSE);
	}
}
