<?php

class Absen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$this->load->model('SiswaModel', 'siswa', true);
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
			$infoAbsensi = $this->siswa->infoMulaiAbsensi(['jurnal.jadwal_id' => $jadwalID]);
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
					$absensi['dibuka'] = ($infoAbsensi->absen_mulai != '00:00:00') ? date('H:i', strtotime($infoAbsensi->absen_mulai)) . " WIB" : '-';
					$absensi['ditutup'] = ($infoAbsensi->absen_selesai != '00:00:00') ? date('H:i', strtotime($infoAbsensi->absen_selesai)) . " WIB" : '-';
					$absensi['pertemuan'] = $infoAbsensi->pertemuan;
					$absenSiswa = $this->siswa->get_absen_siswa([
						'siswa_nis' => $siswa->siswa_nis,
						'jurnal_id' => $infoAbsensi->jurnal_id
					]);

					if ($infoAbsensi->absen_mulai == '00:00:00' && $infoAbsensi->absen_selesai == '00:00:00') {
						$absensi['status'] = '<span class="text-danger">Waktu absensi belum dibuka</span>';
					} elseif (strtotime($timeNow) >= strtotime($infoAbsensi->absen_selesai)) {
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
					$absensi['tanggal'] = date('d-m-Y', strtotime($infoAbsensi->tanggal));
					$absensi['dibuka'] = ($infoAbsensi->absen_mulai != '00:00:00') ? date('H:i', strtotime($infoAbsensi->absen_mulai)) . " WIB" : '-';
					$absensi['ditutup'] =  ($infoAbsensi->absen_selesai != '00:00:00') ? date('H:i', strtotime($infoAbsensi->absen_selesai)) . " WIB" : '-';
					$absensi['pertemuan'] =  $infoAbsensi->pertemuan;
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
					$absenSiswa = $this->siswa->riwayatAbsensi($siswa->siswa_nis, $value->jurnal_id);
					$result_absen['nomor'] = $nomor++;
					$result_absen['status'] = 'Belum Absen';
					$result_absen['pembelajaran'] = '-';
					if (!empty($absenSiswa)) :
						$result_absen['status'] = $absenSiswa->status;
						$result_absen['pembelajaran'] = $absenSiswa->metode_absen;
					endif;
					$result_absen['tanggal'] = date('d-m-Y', strtotime($value->tanggal));
					$result_absen['mapel'] = $value->nama_mapel;
					$result_absen['pertemuan'] = $value->pertemuan;
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
					];
				} elseif ($metode_absen === 'online') {
					$this->siswa->process_absensi($metode_absen, $siswa->siswa_nis);
					$response = [
						'csrfName' => $this->security->get_csrf_token_name(),
						'csrfHash' => $this->security->get_csrf_hash(),
						'success' => true,
						'msgabsen' => 'Absensi telah berhasil',
					];
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
}
