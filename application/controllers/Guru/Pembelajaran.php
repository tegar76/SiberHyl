<?php

class Pembelajaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
		$this->hariIni = $hari[(int)date('w')];
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

	// message sweetalert 2 flashdata
	public function message($title = NULL, $text = NULL, $type = NULL)
	{
		return $this->session->set_flashdata([
			'title' => $title,
			'text' => $text,
			'type' => $type,
		]);
	}

	public function index()
	{
		$guru = $this->userGuru;
		$data['today'] = $this->hariIni;
		$data['days']  = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
		$timenow = date('H:i');
		$studying = [
			'hari' => $data['today'],
			'jadwal.guru_kode' => $guru->guru_kode,
		];

		$studying = $this->jadwal->getJadwalHariIni($studying)->result();
		$data['studying'] = null;
		foreach ($studying as $key => $value) :
			if (
				strtotime($timenow) >= strtotime($value->jam_masuk)
				&& strtotime($timenow) <= strtotime($value->jam_keluar)
			) :
				if (!empty($value)) {
					$data['studying'] = $value;
				}
			endif;
		endforeach;

		foreach ($data['days'] as $hari) {
			$study = $this->jadwal->getJadwalHariIni([
				'hari' => $hari,
				'jadwal.guru_kode' => $guru->guru_kode,
			])->result();
			$schedule['hari'] = $hari;
			$schedule['sch']  = array();
			if (!empty($study)) {
				$newsch = array();
				foreach ($study as $row => $value) {
					if ($value->hari == $hari) {
						$sch['hari'] = $value->hari;
						$sch['id'] = $value->jadwal_id;
						$sch['foto'] = $value->guru_foto;
						$sch['nama'] = $value->guru_nama;
						$sch['kode'] = $value->guru_kode;
						$sch['mapel'] = $value->nama_mapel;
						$sch['jam'] = date('H:i', strtotime($value->jam_masuk)) . ' - ' . date('H:i', strtotime($value->jam_keluar));
						$sch['ruang'] = ($value->nama_ruang) ? $value->nama_ruang : '-';
						$sch['kelas'] =  $value->nama_kelas;
						$newsch[] = $sch;
					}
				}
				$schedule['sch'] = $newsch;
			}
			$new_schedule[] = $schedule;
		}
		$data['title'] = 'Mengajar';
		$data['guru'] = $this->userGuru;
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['study'] = $new_schedule;
		$data['content'] = 'guru/contents/pembelajaran/v_mengajar';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function absensi($id = false)
	{
		if ($id) {
			$jurnal = $this->guru->jurnal_absensi($id);
			$no = 1;
			$data['absensi'] = array();
			if ($jurnal) {
				foreach ($jurnal as $row) {
					$abs['nomor'] = $no++;
					$abs['hari'] = $row->hari;
					$abs['mapel'] = $row->nama_mapel;
					$abs['jam'] = date('H:i', strtotime($row->jam_masuk)) . ' - ' . date('H:i', strtotime($row->jam_keluar)) . ' WIB';
					$abs['ruang'] = $row->nama_ruang;
					$abs['pert'] = $row->pert_ke;
					$abs['tanggal'] = date('d-m-Y', strtotime($row->tanggal));
					$abs['jadwalid'] = $row->jadwal_id;
					$abs['jurnalid'] = $row->jurnal_id;
					$absx[] = $abs;
				}
				$data['absensi'] = $absx;
			}
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['id_jadwal'] = $id;
			$data['title'] = 'Absensi';
			$data['guru'] = $this->userGuru;
			$data['info'] = $this->guru->get_jadwal_mapel($id);
			$data['content'] = 'guru/contents/pembelajaran/v_absensi';
		} else {
			$data['title'] = 'Absensi';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tambah_pertemuan($id = false)
	{
		$jadwal = $this->jadwal->getJadwalHariIni(['jadwal_id' => $id])->row();
		if ($jadwal) {
			$data['id_jadwal'] = $id;
			$data['jadwal'] = $jadwal;
			$data['guru'] = $this->userGuru;
			$data['title'] = 'Tambah Pertemuan';
			$data['content'] = 'guru/contents/pembelajaran/v_tambah_pertemuan';
			$this->form_validation->set_rules([
				[
					'field' => 'tanggal_pertemuan',
					'label' => 'Tanggal Pertemuan',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
				[
					'field' => 'pertemuan_ke',
					'label' => 'Pertemuan',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, FALSE);
			} else {
				$check = $this->db->get_where('jurnal', [
					'jadwal_id' => $this->input->post('jadwal_id', true),
					'pert_ke'	=> $this->input->post('pertemuan_ke', true)
				])->num_rows();
				if ($check > 0) {
					$this->message('Pertemuan telah tersedia', 'Pertemuan pembelajaran telah tersedia, masukan kembali', 'error');
					$this->load->view('guru/layout/wrapper', $data, FALSE);
				} else {
					$insert = array(
						'tanggal' =>  $this->input->post('tanggal_pertemuan', true),
						'pert_ke' => $this->input->post('pertemuan_ke', true),
						'jadwal_id' => $this->input->post('jadwal_id', true)
					);
					$this->db->insert('jurnal', $insert);
					$this->message('Pembelajaran telah dimulai', 'Silahkan memulai pembelajaran', 'success');
					redirect('guru/pembelajaran/absensi/' . $id);
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detail_absensi($id = false)
	{
		$jurnal = $this->jadwal->getJurnalWhere(['jurnal_id' => $id]);
		if ($jurnal) {
			$data['H'] =  $this->jadwal->get_absen_siswa($id, 'H');
			$data['A'] =  $this->jadwal->get_absen_siswa($id, 'A');
			$data['I'] =  $this->jadwal->get_absen_siswa($id, 'I');
			$data['S'] =  $this->jadwal->get_absen_siswa($id, 'S');
			$students = $this->db->get_where('siswa', ['kelas_id' => $jurnal->kelas_id])->result();
			$no = 1;

			foreach ($students as $siswa) {
				$absx = $this->db->get_where('absensi', [
					'siswa_nis' => $siswa->siswa_nis,
					'jurnal_id' => $id
				])->row();
				$absensi['nomor'] = $no++;
				$absensi['nis']   = $siswa->siswa_nis;
				$absensi['nama']  = $siswa->siswa_nama;
				$absensi['jk']  = $siswa->siswa_kelamin;
				$absensi['status'] = $siswa->status;
				$absensi['pembelajaran'] = '-';
				$absensi['bukti'] = '-';
				$absensi['status_absen'] = 'Belum Absen';
				$absensi['absensi_id'] = 0;
				$absensi['jurnal_id'] = $id;
				$absensi['url_absen'] = 'guru/pembelajaran/edit_status_absen/' . $id . '/' . $siswa->siswa_nis;
				if ($absx) {
					$bukti = '<a target="_blank" href="' . base_url('guru/bukt_absensi_siswa/fileJawabanTugasHarianImg') . '"><img src="' . base_url('assets/admin/icons/img.png') . '" alt=""></a>';
					$absensi['pembelajaran'] = $absx->metode_kbm;
					$absensi['bukti'] = ($absx->bukti_absen) ? $bukti : '-';
					$absensi['status_absen'] = $absx->status;
					$absensi['absensi_id'] = $absx->absensi_id;
					$absensi['jurnal_id'] = $id;
					$absensi['url_absen'] = 'guru/pembelajaran/edit_status_absen/' . $absx->absensi_id . '/' . $siswa->siswa_nis;
				}
				$rekap_abs[] = $absensi;
			}
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['setting_abs'] = $jurnal;
			$data['rekap_absen'] = $rekap_abs;
			$data['guru'] = $this->userGuru;
			$data['title'] = 'Detail Absensi';
			$data['content'] = 'guru/contents/pembelajaran/v_detail_absensi';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tambah_jurnal_materi($id = false)
	{
		$jurnal = $this->jadwal->getJurnalWhere(['jurnal_id' => $id]);
		if ($jurnal) {
			$data['jurnal'] = $jurnal;
			$data['H'] =  $this->jadwal->get_absen_siswa($id, 'H');
			$data['A'] =  $this->jadwal->get_absen_siswa($id, 'A');
			$data['I'] =  $this->jadwal->get_absen_siswa($id, 'I');
			$data['S'] =  $this->jadwal->get_absen_siswa($id, 'S');
			$data['guru'] = $this->userGuru;
			$data['students'] = $this->db->get_where('siswa', ['kelas_id' => $jurnal->kelas_id])->num_rows();
			$data['title'] = 'Tambah Jurnal Materi';
			$data['content'] = 'guru/contents/pembelajaran/v_tambah_jurnal_materi';

			$this->form_validation->set_rules([
				[
					'field' => 'kd_materi',
					'label' => 'KD Materi',
					'rules' => 'trim|required|xss_clean|min_length[8]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)'
					]
				],
				[
					'field' => 'pembahasan',
					'label' => 'Pembahasan Pembelajaran',
					'rules' => 'trim|required|xss_clean|min_length[8]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)'
					]
				],
				[
					'field' => 'catatan_kbm',
					'label' => 'Catatan Pembelajaran',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, FALSE);
			} else {
				$this->guru->addJurnalMateri($id);
				$this->message('Berhasil Mengisi Jurnal', 'Anda telah berhasil mengisi jurnal materi pembelajaran', 'success');
				return redirect('guru/pembelajaran/detail_absensi/' . $id);
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function set_waktu_absensi($id = false)
	{
		$jurnal = $this->jadwal->getJurnalWhere(['jurnal_id' => $id]);
		if ($jurnal) {
			$data['jurnal'] = $jurnal;
			$data['title'] = 'Edit Jam Absen';
			$data['guru'] = $this->userGuru;
			$data['content'] = 'guru/contents/pembelajaran/v_edit_jam_absen';
			$this->form_validation->set_rules([
				[
					'field' => 'absen_masuk',
					'label' => 'Waktu Absen Mulai',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
				[
					'field' => 'absen_selesai',
					'label' => 'Waktu Absen Selesai',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, FALSE);
			} else {
				$set_time = array(
					'absen_mulai' => htmlspecialchars($this->input->post('absen_masuk', true)),
					'absen_selesai' => htmlspecialchars($this->input->post('absen_selesai', true))
				);
				$this->db->update('jurnal', $set_time, ['jurnal_id' => $this->input->post('jurnal_id', true)]);
				$this->message('Berhasil', 'Waktu absensi berhasil di setting', 'success');
				return redirect('guru/pembelajaran/detail_absensi/' . $id);
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function process_absen_siswa()
	{
		$siswaNis = $this->input->post('nisSiswa', true);
		$jurnalId = $this->input->post('jurnalId', true);
		$status = $this->input->post('status', true);
		$check_abs = $this->db->get_where('absensi', [
			'siswa_nis' => $siswaNis,
			'jurnal_id' => $jurnalId
		])->row();
		if (empty($check_abs)) {
			$absensi = array(
				'tanggal_absen' => date('Y-m-d H:i:s'),
				'status' => $status,
				'bukti_absen' => null,
				'siswa_nis' => $siswaNis,
				'jurnal_id' => $jurnalId
			);
			$this->db->insert('absensi', $absensi);
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Siswa telah diabsen',
				'success' => true
			];
		} else {
			$absensiId = $this->input->post('absensiId', true);
			$absensi = array(
				'status' => $status,
				'bukti_absen' => null,
			);
			$this->db->update('absensi', $absensi, ['absensi_id' => $absensiId]);
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'message' => 'Siswa telah diabsen',
				'success' => true
			];
		}

		echo json_encode($reponse);
	}

	// public function edit_status_absen($id = false, $nis = false)
	// {
	// 	$data['title'] = 'Edit Status Absen';
	// 	$data['content'] = 'guru/contents/pembelajaran/v_edit_status_absen';
	// 	$this->load->view('guru/layout/wrapper', $data, FALSE);
	// }

	public function tugas_harian($id = false)
	{
		if ($id) {
			$tugas = $this->guru->get_info_tugas($id);
			$no = 1;
			$data['tugas'] = array();
			if ($tugas) {
				foreach ($tugas as $row) {
					$info['nomor'] = $no++;
					$info['mapel'] = $row->nama_mapel;
					$info['judul'] = $row->judul_tugas;
					$info['pert'] = $row->pertemuan;
					$info['create'] = date('d-m-Y H:i', strtotime($row->create_time)) . " WIB";
					$info['update'] = ($row->create_time == $row->update_time) ? '-' : date('d-m-Y H:i', strtotime($row->update_time)) . " WIB";
					$info['idTugas'] = $row->tugas_id;
					$tugasx[] = $info;
				}
				$data['tugas'] = $tugasx;
			}
			$data['guru'] = $this->userGuru;
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['info'] = $this->guru->get_jadwal_mapel($id);
			$data['title'] = 'Tugas Harian';
			$data['content'] = 'guru/contents/pembelajaran/v_tugas_harian';
		} else {
			$data['title'] = 'Absensi';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}


	public function formCetakReportTugasHarian()
	{
		$data['title'] = 'Form Cetak Reporting Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_form_cetak_report_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function cetakReportTugasHarian()
	{
		$data['title'] = 'Cetak Reporting Tugas Harian';
		$this->load->view('guru/contents/pembelajaran/v_cetak_report_tugas_harian', $data, FALSE);
	}

	public function tambah_tugas_harian($id = false)
	{
		$jadwal = $this->jadwal->getJadwalHariIni(['jadwal_id' => $id])->row();
		if ($jadwal) {
			$data['guru'] = $this->userGuru;
			$data['title'] = 'Tambah Tugas Harian';
			$data['content'] = 'guru/contents/pembelajaran/v_tambah_tugas_harian';
			$data['jadwal'] = $jadwal;
			$this->form_validation->set_rules([
				[
					'field' => 'judul_tugas',
					'label' => 'Judul Tugas Harian',
					'rules' => 'trim|required|xss_clean|min_length[8]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)'
					]
				],
				[
					'field' => 'pertemuan',
					'label' => 'Pertemuan Tugas',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
					]
				],
				[
					'field' => 'deskripsi',
					'label' => 'Deskripsi Tugas',
					'rules' => 'trim|required|xss_clean|min_length[18]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 18 karakter)'
					]
				],
				[
					'field' => 'tanggal',
					'label' => 'Tanggal Deadline',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
					]
				],
				[
					'field' => 'jam',
					'label' => 'Jam Deadline',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
					]
				],
			]);
			$this->form_validation->set_rules('file_tugas', 'File Tugas Harian', 'callback_file_tugas_check');

			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, FALSE);
			} else {
				$check = $this->guru->check_tugas_exist();
				if ($check > 0) {
					$this->message('Tugas Pertemuan ' . $_POST['pertemuan'] . 'telah tersedia', 'tugas pertemuan ini telah tersedia, masukan kembali', 'error');
					$this->load->view('guru/layout/wrapper', $data, FALSE);
				} else {
					$this->guru->tambah_tugas_harian();
					$this->message('Berhasil', 'Tugas Pertemuan ' . $_POST['pertemuan'] . 'berhasil ditambahkan', 'success');
					return redirect('guru/pembelajaran/tugas_harian/' . $_POST['jadwal_id']);
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detail_tugas_harian($id = false)
	{
		if ($id) {
			$data['guru'] = $this->userGuru;
			$data['detail'] = $this->guru->get_detail_tugas($id);
			$siswa = $this->db->get_where('siswa', ['kelas_id' => $data['detail']->kelas_id])->result();
			$jumlah_siswa = count($siswa);
			$sm = $this->guru->get_count_tugas($id, 'SM');
			$sn = $this->guru->get_count_tugas($id, 'SN');
			$bm = $jumlah_siswa - ($sm + $sn);
			$no = 1;
			foreach ($siswa as $row => $value) {
				$tugasSiswa = $this->db->get_where('tugas_siswa', [
					'siswa_nis' => $value->siswa_nis,
					'tugas_id' => $data['detail']->tugas_id,
				])->row();
				$tugasx['nomor'] = $no++;
				$tugasx['nis'] = $value->siswa_nis;
				$tugasx['nama'] = $value->siswa_nama;
				if (empty($tugasSiswa)) {
					$tugasx['upload_time'] = '-';
					$tugasx['metode_upload'] = '-';
					$tugasx['file_tugas'] = '-';
					$tugasx['komentar_guru'] = '-';
					$tugasx['nilai_tugas'] = '-';
					$tugasx['keterangan'] = 'Belum Mengerjakan';
					$tugasx['tugas_siswa_id'] = 0;
					$tugasx['id_tugas'] = $data['detail']->tugas_id;
				} else {
					$tugasx['upload_time'] = date('d - m -Y H:i', strtotime($tugasSiswa->time_upload)) . " WIB";
					$tugasx['metode_upload'] = $tugasSiswa->metode;
					if ($tugasSiswa->file_type == '.pdf') {
						$icon_tugas = base_url('assets/admin/icons/pdf.png');
					} else {
						$icon_tugas = base_url('assets/admin/icons/img.png');
					}

					if ($tugasSiswa->status == 0) {
						$status = 'Tidak Mengerjakan';
					} elseif ($tugasSiswa->status == 1) {
						$status = 'Sudah Mengerjakan';
					} elseif ($tugasSiswa->status == 2) {
						$status = 'Sudah Dinilai';
					} elseif ($tugasSiswa->status == 3) {
						$status = 'Menunggu Konfirmasi';
					} elseif ($tugasSiswa->status == 4) {
						$status = 'Sudah Diterima dan Sudah Dinilai';
					}

					$tugasx['file_tugas'] = '-';
					if ($tugasSiswa->file_tugas_siswa) {
						$tugasx['file_tugas'] = '<a target="_blank" href="' . base_url('guru/pembelajaran/file_tugas_siswa/' . $tugasSiswa->tugas_siswa_id) . '"><img src="' . $icon_tugas . '" alt=""></a>';
					}
					$tugasx['komentar_guru'] = $tugasSiswa->komentar;
					$tugasx['nilai_tugas'] = $tugasSiswa->nilai_tugas;
					$tugasx['keterangan'] = $status;
					$tugasx['tugas_siswa_id'] = $tugasSiswa->tugas_siswa_id;
					$tugasx['id_tugas'] = $data['detail']->tugas_id;
				}

				$rekap_tugas[] = $tugasx;
			}
			$data['rekap_tugas'] = $rekap_tugas;
			$data['jumlah_siswa'] = $jumlah_siswa;
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['sm'] = $sm;
			$data['sn'] = $sn;
			$data['bm'] = $bm;
			$data['title'] = 'Detail Tugas Harian';
			$data['content'] = 'guru/contents/pembelajaran/v_detail_tugas_harian';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}

		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}
	
	public function editDeadlineTugasHarian()
	{
		$data['title'] = 'Edit Deadline Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_edit_deadline_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function file_tugas_check()
	{
		if (empty($_FILES['file_tugas']['name'])) {
			$this->form_validation->set_message('file_tugas_check', 'Anda harus upload {field}!');
			return false;
		}
		return true;
	}

	public function file_soal_tugas_harian($id = false)
	{
		if ($id) {
			$query	= $this->db->get_where('tugas', ['file_tugas' => $id]);
			$result	= $query->row();
			if ($result) {
				$data['title'] = 'File Soal Tugas Harian';
				$data['file_soal'] = base_url('storage/guru/tugas_harian/') . $result->file_tugas;
				$this->load->view('guru/contents/pembelajaran/file_soal_tugas_harian_pdf/v_file_soal_tugas_harian_pdf', $data, FALSE);
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
			$this->load->view('guru/layout/wrapper', $data, FALSE);
		}
	}

	public function file_tugas_siswa($id = false)
	{
		if ($id) {
			$tugas_siswa = $this->db->get_where('tugas_siswa', ['tugas_siswa_id' => $id])->row();
			if ($tugas_siswa->file_type == '.pdf') {
				$data['title'] = 'File Jawaban Tugas Harian Pdf';
				$data['file_tugas'] = base_url('storage/siswa/tugas_harian/') . $tugas_siswa->file_tugas_siswa;
				$this->load->view('guru/contents/pembelajaran/file_jawaban_tugas_harian_pdf/v_file_jawaban_tugas_harian_pdf', $data, FALSE);
			} else {
				$data['title'] = 'File Jawaban Tugas Harian Img';
				$data['file_tugas'] = base_url('storage/siswa/tugas_harian/') . $tugas_siswa->file_tugas_siswa;
				$this->load->view('guru/contents/pembelajaran/v_file_jawaban_tugas_harian_img', $data, FALSE);
			}
		}
	}

	public function nilai_tugas_harian()
	{
		$data['guru'] = $this->userGuru;
		$status = $this->input->get('status');
		if ($status == 'sm') {
			$tugasId = $this->input->get('tugas');
			$result = $this->guru->get_nilai_siswa($tugasId);
			$jadwalId = $this->db->select('jadwal_id')->where('tugas_id', $result['tugas_id'])->get('tugas')->row();
			$nilai = array(
				'id' => $result['tugas_siswa_id'],
				'nis' => $result['siswa_nis'],
				'nama' => $result['siswa_nama'],
				'upload' => date('d - m - Y H:i', strtotime($result['time_upload'])) . " WIB",
				'metode' => $result['metode'],
				'file' => $result['file_tugas_siswa'],
				'file_ext' => $result['file_type'],
				'nilai' => $result['nilai_tugas'],
				'komentar' => $result['komentar'],
				'tugas_id' => $result['tugas_id'],
				'jadwal_id' => $jadwalId->jadwal_id
			);
			$data['result'] = $nilai;
		} elseif ($status == 'bm') {
			$tugas_id = $this->input->get('tugas');
			$nis = $this->input->get('nis');
			$siswa = $this->db->select('siswa_nis, siswa_nama')->where('siswa_nis', $nis)->get('siswa')->row_array();
			$jadwalId = $this->db->select('jadwal_id')->where('tugas_id', $tugas_id)->get('tugas')->row();
			$nilai = array(
				'id' => 0,
				'nis' => $siswa['siswa_nis'],
				'nama' => $siswa['siswa_nama'],
				'upload' => null,
				'metode' => null,
				'file' => null,
				'file_ext' => null,
				'nilai' => 0,
				'komentar' => null,
				'tugas_id' => $tugas_id,
				'jadwal_id' => $jadwalId->jadwal_id
			);
			$data['result'] = $nilai;
		}
		$data['title'] = 'Nilai Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_nilai_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function process_nilai()
	{
		$tugas_siswa_id = $this->input->post('tugas_siswa_id', true);
		$tugas_id = $this->input->post('tugas_id', true);
		if ($tugas_siswa_id == 0) {
			$data = array(
				'time_upload' => date('Y-m-d H:i:s'),
				'metode' => '-',
				'nilai_tugas' => htmlspecialchars($this->input->post('nilai')),
				'komentar' => htmlspecialchars($this->input->post('komentar')),
				'siswa_nis' => htmlspecialchars($this->input->post('nis')),
				'status' => 2,
				'tugas_id' => $tugas_id
			);
			$this->db->insert('tugas_siswa', $data);
		} else {
			$metode = $this->input->post('metode', true);
			if ($metode == 'online') {
				$status = 2;
			} elseif ($metode == 'langsung') {
				$status = 4;
			}
			$data = array(
				'nilai_tugas' => htmlspecialchars($this->input->post('nilai')),
				'komentar' => htmlspecialchars($this->input->post('komentar')),
				'status' => $status
			);
			$this->db->set($data);
			$this->db->where('tugas_siswa_id', $tugas_siswa_id);
			$this->db->update('tugas_siswa');
		}
		$this->message('Berhasil', 'Tugas dari siswa ' . $_POST['nama'] . ' telah dinilai', 'success');
		return redirect('guru/pembelajaran/detail_tugas_harian/' . $tugas_id);
	}

	public function evaluasi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Evaluasi';
		$data['content'] = 'guru/contents/pembelajaran/v_evaluasi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}


	public function formCetakReportEvaluasi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Form Cetak Reporting Evaluasi';
		$data['content'] = 'guru/contents/pembelajaran/v_form_cetak_report_evaluasi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function cetakReportEvaluasi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Cetak Reporting Evaluasi';
		$this->load->view('guru/contents/pembelajaran/v_cetak_report_evaluasi', $data, FALSE);
	}

	public function tambahEvaluasi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Tambah Evaluasi';
		$data['content'] = 'guru/contents/pembelajaran/v_tambah_evaluasi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detailEvaluasi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Detail Evaluasi';
		$data['content'] = 'guru/contents/pembelajaran/v_detail_evaluasi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function fileSoalEvaluasi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'File Soal Evaluasi';
		$this->load->view('guru/contents/pembelajaran/file_soal_evaluasi_pdf/v_file_soal_evaluasi_pdf', $data, FALSE);
	}

	public function fileJawabanEvaluasiImg()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'File Jawaban Evaluasi Img';
		$this->load->view('guru/contents/pembelajaran/v_file_jawaban_evaluasi_img', $data, FALSE);
	}

	public function fileJawabanEvaluasiPdf()
	{
		$data['title'] = 'File Jawaban Evaluasi Pdf';
		$this->load->view('guru/contents/pembelajaran/file_jawaban_evaluasi_pdf/v_file_jawaban_evaluasi_pdf', $data, FALSE);
	}

	public function nilaiEvaluasi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Nilai Evaluasi';
		$data['content'] = 'guru/contents/pembelajaran/v_nilai_evaluasi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function editJamEvaluasi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Edit Jam Evaluasi';
		$data['content'] = 'guru/contents/pembelajaran/v_edit_jam_evaluasi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function diskusi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Diskusi';
		$data['content'] = 'guru/contents/pembelajaran/v_diskusi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function detailDiskusi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Forum Diskusi';
		$data['content'] = 'guru/contents/pembelajaran/v_detail_diskusi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function tambahDiskusi()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Tambah Diskusi';
		$data['content'] = 'guru/contents/pembelajaran/v_tambah_diskusi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function jurnal()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Jurnal Materi';
		$data['content'] = 'guru/contents/pembelajaran/v_jurnal_materi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function formCetakReportJurnalMateri()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Detail Jurnal Materi';
		$data['content'] = 'guru/contents/pembelajaran/v_form_cetak_report_jurnal_materi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function cetakReportJurnalMateri()
	{
		$data['title'] = 'Cetak Reporting Jurnal Materi';
		$this->load->view('guru/contents/pembelajaran/v_cetak_report_	jurnal_materi', $data, FALSE);
	}

	public function detailJurnalMateri()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Detail Jurnal Materi';
		$data['content'] = 'guru/contents/pembelajaran/v_detail_jurnal_materi';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function surat()
	{
		$data['guru'] = $this->userGuru;

		$data['title'] = 'Surat - Surat';
		$data['content'] = 'guru/contents/pembelajaran/v_surat';
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function lihatFileSurat()
	{
		$data['title'] = 'File Surat';
		$this->load->view('guru/contents/pembelajaran/v_file_surat_img', $data, FALSE);
	}
}
