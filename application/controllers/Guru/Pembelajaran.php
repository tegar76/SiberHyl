<?php

class Pembelajaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isGuruLogin();
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->load->model('MasterModel', 'master', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('GuruModel', 'guru', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
		$this->hariIni = $hari[(int)date('w')];
		$tahun_ajar = $this->master->getActiveTahunAkademik();
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

	// message sweetalert 2 flashdata
	public function message($title = null, $text = null, $type = null)
	{
		return $this->session->set_flashdata([
			'title' => $title,
			'text' => $text,
			'type' => $type,
		]);
	}

	// fungsi menampilkan jadwal pembelajaran dari guru
	public function index()
	{
		$guru = $this->userGuru;
		$data['today'] = $this->hariIni;
		$data['days']  = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
		$timenow = date('H:i');
		$studying = [
			'hari' => $data['today'],
			'jadwal.guru_nip' => $guru->guru_nip,
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
				'jadwal.guru_nip' => $guru->guru_nip,
			])->result();
			$schedule['hari'] = $hari;
			$schedule['sch']  = array();
			if (!empty($study)) {
				$newsch = array();
				foreach ($study as $row => $value) {
					if ($value->hari == $hari) {
						$sch['hari'] = $value->hari;
						$sch['id'] = $value->jadwal_id;
						$sch['foto'] = $value->profile;
						$sch['nama'] = $value->guru_nama;
						$sch['kode'] = $value->guru_kode;
						$sch['mapel'] = $value->nama_mapel;
						$sch['jam'] = date('H:i', strtotime($value->jam_masuk)) . ' - ' . date('H:i', strtotime($value->jam_keluar));
						$sch['ruang'] = ($value->kode_ruang) ? $value->kode_ruang : '-';
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
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// ruang absensi
	public function absensi($id = false)
	{
		$data['guru'] = $this->userGuru;
		if ($id) {
			$jurnal = $this->master->getJurnalAbsensi($id);
			$no = 1;
			$data['absensi'] = array();
			if ($jurnal) {
				foreach ($jurnal as $row) {
					$abs['nomor'] = $no++;
					$abs['hari'] = $row->hari;
					$abs['mapel'] = $row->mapel;
					$abs['jam'] = date('H:i', strtotime($row->masuk)) . ' - ' . date('H:i', strtotime($row->selesai)) . ' WIB';
					$abs['ruang'] = $row->ruang;
					$abs['pert'] = $row->pertemuan;
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
			$data['info'] = $this->master->getInfoJadwal($id);
			$data['content'] = 'guru/contents/pembelajaran/v_absensi';
		} else {
			$data['title'] = 'Absensi';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// tambah pertemuan pembelajaran, absensi sekaligus jurnal materi
	public function tambah_pertemuan($id = false)
	{
		$jadwal = $this->jadwal->getJadwalHariIni(['jadwal_id' => $id])->row();
		$data['guru'] = $this->userGuru;
		if ($jadwal) {
			$data['id_jadwal'] = $id;
			$data['jadwal'] = $jadwal;
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
				$this->load->view('guru/layout/wrapper', $data, false);
			} else {
				$check = $this->db->get_where('jurnal', [
					'jadwal_id' => $this->input->post('jadwal_id', true),
					'pertemuan'    => $this->input->post('pertemuan_ke', true)
				])->num_rows();
				if ($check > 0) {
					$this->message('Pertemuan telah tersedia', 'Pertemuan pembelajaran ' . $_POST['pertemuan_ke'] . ' telah tersedia, masukan kembali', 'error');
					$this->load->view('guru/layout/wrapper', $data, false);
				} else {
					$insert = array(
						'tanggal' =>  $this->input->post('tanggal_pertemuan', true),
						'pertemuan' => $this->input->post('pertemuan_ke', true),
						'jadwal_id' => $this->input->post('jadwal_id', true)
					);
					$this->db->insert('jurnal', $insert);
					$this->message('Pembelajaran telah dimulai', 'Silahkan memulai pembelajaran', 'success');
					redirect('guru/pembelajaran/absensi/' . $id);
				}
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	/*
        Detail ruang absensi pada guru, menampilkan :
        1. Jumlah keterangan siswa yang telah atau belum melakukan absensi
        2. Informasi mengenai pembelajaran yang sedang berlansung
        3. Setting waktu absensi
        4. Menambah jurnal materi
        5. Menampilkan daftar absensi siswa
    */
	public function detail_absensi($id = false)
	{
		$data['guru'] = $this->userGuru;
		$jurnal = $this->master->getJurnalWhere(['jurnal_id' => $id])->row();
		if ($id && $jurnal) {
			$data['H'] =  $this->jadwal->get_absen_siswa($id, 'H');
			$data['A'] =  $this->jadwal->get_absen_siswa($id, 'A');
			$data['I'] =  $this->jadwal->get_absen_siswa($id, 'I');
			$data['S'] =  $this->jadwal->get_absen_siswa($id, 'S');
			$students = $this->master->getSiswaKelas($jurnal->kelas_id);
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
					$bukti = '<a target="_blank" href="' . base_url('guru/pembelajaran/bukti_absen/' . $absx->bukti_absen) . '"><img src="' . base_url('assets/admin/icons/img.png') . '" alt=""></a>';
					$absensi['pembelajaran'] = ($absx->metode_absen) ? $absx->metode_absen : '-';
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
			$data['title'] = 'Detail Absensi';
			$data['content'] = 'guru/contents/pembelajaran/v_detail_absensi';
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// Tambah jurnal materi
	public function tambah_jurnal_materi($id = false)
	{
		$data['guru'] = $this->userGuru;
		$jurnal = $this->master->getJurnalWhere(['jurnal_id' => $id])->row();
		if ($jurnal) {
			$data['jurnal'] = $jurnal;
			$data['H'] =  $this->jadwal->get_absen_siswa($id, 'H');
			$data['A'] =  $this->jadwal->get_absen_siswa($id, 'A');
			$data['I'] =  $this->jadwal->get_absen_siswa($id, 'I');
			$data['S'] =  $this->jadwal->get_absen_siswa($id, 'S');
			$data['students'] = $this->master->getSiswaKelas($jurnal->kelas_id);
			$data['title'] = 'Tambah Jurnal Materi';
			$data['content'] = 'guru/contents/pembelajaran/v_tambah_jurnal_materi';

			if (isset($_POST['submit_jurnal'])) {
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
					$this->load->view('guru/layout/wrapper', $data, false);
				} else {
					$this->guru->addJurnalMateri($id);
					$this->message('Berhasil Mengisi Jurnal', 'Anda telah berhasil mengisi jurnal materi pembelajaran', 'success');
					return redirect('guru/pembelajaran/detail_absensi/' . $id);
				}
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	//  setting waktu absensi
	public function set_waktu_absensi($id = false)
	{
		$data['guru'] = $this->userGuru;
		$jurnal = $this->master->getJurnalWhere(['jurnal_id' => $id])->row();
		if ($jurnal) {
			$data['jurnal'] = $jurnal;
			$data['title'] = 'Edit Jam Absen';
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
				$this->load->view('guru/layout/wrapper', $data, false);
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
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	//  aksi absensi siswa dari guru
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
				'tanggal_absen' => null,
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

	public function bukti_absen($file)
	{
		if ($file) {
			$check = FCPATH . './storage/siswa/absensi/' . $file;
			if (file_exists($check)) {
				$data['alt'] = 'Tugas Siswa';
				$data['img'] = base_url('storage/siswa/absensi/') . $file;
				$this->load->view('img_viewer/img_viewer', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}
	// ruang tugas harian
	public function tugas_harian($id = false)
	{
		$data['guru'] = $this->userGuru;
		if ($id) {
			$tugas = $this->master->getTugasHarian($id);
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
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['info'] = $this->master->getInfoJadwal($id);
			$data['title'] = 'Tugas Harian';
			$data['content'] = 'guru/contents/pembelajaran/v_tugas_harian';
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// tambah tugas harian
	public function tambah_tugas_harian($id = false)
	{
		$data['guru'] = $this->userGuru;
		$jadwal = $this->jadwal->getJadwalHariIni(['jadwal_id' => $id])->row();
		if ($id && $jadwal) {
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
				$this->load->view('guru/layout/wrapper', $data, false);
			} else {
				$check = $this->guru->check_tugas_exist();
				if ($check > 0) {
					$this->message('Tugas Pertemuan ' . $_POST['pertemuan'] . ' telah tersedia', 'tugas pertemuan ini telah tersedia, masukan kembali', 'error');
					$this->load->view('guru/layout/wrapper', $data, false);
				} else {
					$this->guru->tambah_tugas_harian();
					$this->message('Berhasil', 'Tugas Pertemuan ' . $_POST['pertemuan'] . ' berhasil ditambahkan', 'success');
					return redirect('guru/pembelajaran/tugas_harian/' . $_POST['jadwal_id']);
				}
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// detail ruang tugas harian
	public function detail_tugas_harian($id = false)
	{
		$data['guru'] = $this->userGuru;
		$tugas = $this->master->detailTugasHarian($id);
		if ($id && $tugas) {
			$siswa = $this->master->getSiswaKelas($tugas->kelas_id);
			$jumlah_siswa = count($siswa);
			$sm = $this->master->countTugasSiswa($id, 'SM');
			$sn = $this->master->countTugasSiswa($id, 'SN');
			$bm = $jumlah_siswa - ($sm + $sn);
			$no = 1;
			foreach ($siswa as $row => $value) {
				$tugasSiswa = $this->db->get_where('tugassiswa', [
					'siswa_nis' => $value->siswa_nis,
					'tugas_id' => $tugas->tugas_id,
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
					$tugasx['id_tugas'] = $tugas->tugas_id;
				} else {
					$tugasx['upload_time'] = ($tugasSiswa->time_upload) ? date('d - m -Y H:i', strtotime($tugasSiswa->time_upload)) . " WIB" : '-';
					$tugasx['metode_upload'] = ($tugasSiswa->metode) ? $tugasSiswa->metode : '-';
					if ($tugasSiswa->file_type == '.pdf') {
						$icon_tugas = base_url('assets/admin/icons/pdf.png');
						$type = 'pdf';
					} else {
						$icon_tugas = base_url('assets/admin/icons/img.png');
						$type = 'img';
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
						$tugasx['file_tugas'] = '<a target="_blank" href="' . base_url('guru/pembelajaran/file_tugas_siswa/' . $type . '/' . $tugasSiswa->file_tugas_siswa) . '"><img src="' . $icon_tugas . '" alt=""></a>';
					}
					$tugasx['komentar_guru'] = $tugasSiswa->komentar;
					$tugasx['nilai_tugas'] = $tugasSiswa->nilai_tugas;
					$tugasx['keterangan'] = $status;
					$tugasx['tugas_siswa_id'] = $tugasSiswa->tugas_siswa_id;
					$tugasx['id_tugas'] = $tugas->tugas_id;
				}
				$rekap_tugas[] = $tugasx;
			}
			$data['tugas'] = $tugas;
			$data['rekap_tugas'] = $rekap_tugas;
			$data['jumlah_siswa'] = $jumlah_siswa;
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['sm'] = $sm;
			$data['sn'] = $sn;
			$data['bm'] = $bm;
			$data['title'] = 'Detail Tugas Harian';
			$data['content'] = 'guru/contents/pembelajaran/v_detail_tugas_harian';
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}


	// edit deadline tugas harian
	public function editDeadlineTugasHarian()
	{
		$data['title'] = 'Edit Deadline Tugas Harian';
		$data['content'] = 'guru/contents/pembelajaran/v_edit_deadline_tugas_harian';
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// validasi upload soal tugas harian
	public function file_tugas_check()
	{
		if (empty($_FILES['file_tugas']['name'])) {
			$this->form_validation->set_message('file_tugas_check', 'Anda harus upload {field}!');
			return false;
		}
		return true;
	}

	// menampilkan file soal tugas harian
	public function file_soal_tugas_harian($file = null)
	{
		if ($file) {
			$check = FCPATH . './storage/guru/tugas_harian/' . $file;
			if (file_exists($check)) {
				$data['pdf'] = base_url('storage/guru/tugas_harian/') . $file;
				$this->load->view('pdf_viewer/pdf_viewer', $data, false);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	// menampilkan file jawaban siswa tugas harian 
	public function file_tugas_siswa($type = null, $file = null)
	{
		if ($type == 'pdf' || $type == 'img' && $file) {
			$check = FCPATH . './storage/siswa/tugas_harian/' . $file;
			if (file_exists($check)) {
				if ($type == 'pdf') {
					$data['pdf'] = base_url('storage/siswa/tugas_harian/') . $file;
					$this->load->view('pdf_viewer/pdf_viewer', $data, false);
				} elseif ($type == 'img') {
					$data['alt'] = 'Tugas Siswa';
					$data['img'] = base_url('storage/siswa/tugas_harian/') . $file;
					$this->load->view('img_viewer/img_viewer', $data);
				}
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}


	// menampilkan nilai tugas harian dari siswa dan memberikan aksi nilai dan komentar
	public function nilai_tugas_harian()
	{
		$data['guru'] = $this->userGuru;
		$req = $_REQUEST;
		if ($req['nis'] && $req['tugas'] && $req['status']) {
			$status = $this->input->get('status');
			if ($status == 'sm') {
				$tugas_id = $this->input->get('tugas');
				$nilai  = $this->master->nilaiTugasSiswa($tugas_id);
				$jadwal = $this->db->select('jadwal_id')
					->where('tugas_id', $nilai->tugas_id)
					->get('tugasharian')->row();

				$nilai = array(
					'id'    => $nilai->tugas_siswa_id,
					'nis'   => $nilai->siswa_nis,
					'nama'  => $nilai->siswa_nama,
					'upload'    => ($nilai->time_upload) ? date('d - m - Y H:i', strtotime($nilai->time_upload)) . " WIB" : '-',
					'metode'    => ($nilai->metode) ? $nilai->metode : '-',
					'file'      => $nilai->file_tugas_siswa,
					'file_ext'  => $nilai->file_type,
					'nilai'     => $nilai->nilai_tugas,
					'komentar'  => $nilai->komentar,
					'tugas_id'  => $nilai->tugas_id,
					'jadwal_id' => $jadwal->jadwal_id
				);
				$data['result'] = $nilai;
			} elseif ($status == 'bm') {
				$nis = $this->input->get('nis');
				$tugas_id = $this->input->get('tugas');
				$siswa = $this->db->select('siswa_nis, siswa_nama')->where('siswa_nis', $nis)->get('siswa')->row();
				$jadwal = $this->db->select('jadwal_id')->where('tugas_id', $tugas_id)->get('tugasharian')->row();
				$nilai = array(
					'id'    => 0,
					'nis'   => $siswa->siswa_nis,
					'nama'  => $siswa->siswa_nama,
					'upload'    => null,
					'metode'    => null,
					'file'      => null,
					'file_ext'  => null,
					'nilai'     => 0,
					'komentar'  => null,
					'tugas_id'  => $tugas_id,
					'jadwal_id' => $jadwal->jadwal_id
				);
				$data['result'] = $nilai;
			}
			$data['title'] = 'Nilai Tugas Harian';
			$data['content'] = 'guru/contents/pembelajaran/v_nilai_tugas_harian';
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// aksi untuk memberikan nilai tugas harian dari siswa
	public function process_nilai()
	{
		$tugas_siswa_id = $this->input->post('tugas_siswa_id', true);
		$tugas_id = $this->input->post('tugas_id', true);
		if ($tugas_siswa_id == 0) {
			$data = array(
				'time_upload' => null,
				'metode' => '-',
				'nilai_tugas' => htmlspecialchars($this->input->post('nilai')),
				'komentar' => htmlspecialchars($this->input->post('komentar')),
				'siswa_nis' => htmlspecialchars($this->input->post('nis')),
				'status' => 0,
				'tugas_id' => $tugas_id
			);
			$this->db->insert('tugassiswa', $data);
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
			$this->db->update('tugassiswa');
		}
		$this->message('Berhasil', 'Tugas dari siswa ' . $_POST['nama'] . ' telah dinilai', 'success');
		return redirect('guru/pembelajaran/detail_tugas_harian/' . $tugas_id);
	}

	// ruang evaluasi  
	public function evaluasi($id = false)
	{
		$data['guru'] = $this->userGuru;
		if ($id) {
			$data['title'] = 'Evaluasi';
			$data['content'] = 'guru/contents/pembelajaran/v_evaluasi';
			$data['tahun_ajar'] = $this->tahun_ajar;
			$evaluasi = $this->master->getEvaluasi($id);
			$data['evaluasi'] = array();
			if ($evaluasi) {
				$no = 1;
				foreach ($evaluasi as $row => $value) {
					$eval_['nomor'] = $no++;
					$eval_['mapel'] = $value->nama_mapel;
					$eval_['judul'] = $value->judul;
					$eval_['tanggal'] = date('d-m-Y', strtotime($value->tanggal));
					$eval_['ke_'] = $value->evaluasi_ke;
					$eval_['create'] = date('d-m-Y H:i', strtotime($value->create_time)) . " WIB";
					$eval_['id_'] = $value->evaluasi_id;
					$result[] = $eval_;
				}
				$data['evaluasi'] = $result;
			}
			$data['info'] = $this->master->getInfoJadwal($id);
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// tambah evaluasi
	public function tambah_evaluasi($id = false)
	{
		$data['guru'] = $this->userGuru;
		$jadwal = $this->jadwal->getJadwalHariIni(['jadwal_id' => $id])->row();
		if ($id && $jadwal) {
			$data['title'] = 'Tambah Evaluasi';
			$data['content'] = 'guru/contents/pembelajaran/v_tambah_evaluasi';
			$data['jadwal'] = $jadwal;
			$this->form_validation->set_rules([
				[
					'field' => 'judul',
					'label' => 'Judul Evaluasi',
					'rules' => 'trim|required|xss_clean|min_length[8]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)'
					]
				],
				[
					'field' => 'jenis',
					'label' => 'Jenis Soal Evaluasi',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
					]
				],
				[
					'field' => 'tanggal',
					'label' => 'Tanggal',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
					]
				],
				[
					'field' => 'evaluasi_ke',
					'label' => 'Evaluasi ke-',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
					]
				],
			]);
			$this->form_validation->set_rules('file_evaluasi', 'File Tugas Harian', 'callback_file_evaluasi_check');
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, false);
			} else {
				$check = $this->guru->check_evaluasi_exist();
				if ($check > 0) {
					$this->message('Evaluasi ' . $_POST['evaluasi_ke'] . ' telah tersedia', 'Evaluasi ini telah tersedia, masukan kembali', 'error');
					$this->load->view('guru/layout/wrapper', $data, false);
				} else {
					$this->guru->tambah_evaluasi();
					$this->message('Berhasil', 'Evaluasi ' . $_POST['evaluasi_ke'] . 'berhasil ditambahkan', 'success');
					return redirect('guru/pembelajaran/evaluasi/' . $_POST['jadwal_id']);
				}
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// valiasi upload soal evaluasi
	public function file_evaluasi_check()
	{
		if (empty($_FILES['file_evaluasi']['name'])) {
			$this->form_validation->set_message('file_evaluasi_check', 'Anda harus upload {field}!');
			return false;
		}
		return true;
	}

	// detail ruang evaluasi
	public function detail_evaluasi($id)
	{
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$data['guru'] = $this->userGuru;
		$evaluasi = $this->master->evaluasiDetail($id);
		if ($id && $evaluasi) {
			$siswa = $this->master->getSiswaKelas($evaluasi->kelas_id);
			$no = 1;
			foreach ($siswa as $row => $value) {
				$eval_ = $this->db->get_where('evaluasisiswa', [
					'siswa_nis' => $value->siswa_nis,
					'evaluasi_id' => $evaluasi->evaluasi_id,
				])->row();
				$result['nomor'] = $no++;
				$result['nis'] = $value->siswa_nis;
				$result['nama'] = $value->siswa_nama;
				if (empty($eval_)) {
					$result['upload_time'] = '-';
					$result['metode_upload'] = '-';
					$result['file'] = '-';
					$result['komentar'] = '-';
					$result['nilai'] = '-';
					$result['keterangan'] = 'Belum Mengerjakan';
					$result['evaluasi_siswa_id'] = 0;
					$result['evaluasi_id'] = $evaluasi->evaluasi_id;
				} else {
					$result['upload_time'] = ($eval_->time_upload) ? date('d-m-Y H:i', strtotime($eval_->time_upload)) . " WIB" : '-';
					$result['metode_upload'] = ($eval_->metode) ? $eval_->metode : '-';
					if ($eval_->file_type == '.pdf') {
						$icon_file = base_url('assets/admin/icons/pdf.png');
						$type = 'pdf';
					} else {
						$icon_file = base_url('assets/admin/icons/img.png');
						$type = 'img';
					}

					if ($eval_->status == 0) {
						$status = 'Tidak Mengerjakan';
					} elseif ($eval_->status == 1) {
						$status = 'Sudah Mengerjakan';
					} elseif ($eval_->status == 2) {
						$status = 'Sudah Dinilai';
					} elseif ($eval_->status == 3) {
						$status = 'Menunggu Konfirmasi';
					} elseif ($eval_->status == 4) {
						$status = 'Sudah Diterima dan Sudah Dinilai';
					}

					$result['file_evaluasi_siswa'] = '-';
					if ($eval_->file_evaluasi_siswa) {
						$result['file'] = '<a target="_blank" href="' . base_url('guru/pembelajaran/file_evaluasi_siswa/' . $type . '/' . $eval_->file_evaluasi_siswa) . '"><img src="' . $icon_file . '" alt=""></a>';
					}
					$result['komentar'] = $eval_->komentar;
					$result['nilai'] = $eval_->nilai;
					$result['keterangan'] = $status;
					$result['evaluasi_siswa_id'] = $eval_->evaluasi_siswa_id;
					$result['evaluasi_id'] = $evaluasi->evaluasi_id;
				}
				$rekap_eval[] = $result;
			}
			$data['rekap'] = $rekap_eval;
			$jumlah_siswa = count($siswa);
			$sm = $this->master->countEvaluasiSiswa($id, 'SM');
			$sn = $this->master->countEvaluasiSiswa($id, 'SN');
			$bm = $jumlah_siswa - ($sm + $sn);
			$data['jumlah_siswa'] = $jumlah_siswa;
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['sm'] = $sm;
			$data['sn'] = $sn;
			$data['bm'] = $bm;
			$data['detail'] = $evaluasi;
			$data['hariEval'] = $hari[(int)date('w', strtotime($evaluasi->tanggal))];
			$data['info'] = $this->master->getInfoJadwal($evaluasi->jadwal_id);
			$data['title'] = 'Detail Evaluasi';
			$data['content'] = 'guru/contents/pembelajaran/v_detail_evaluasi';
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// menampilkan file soal evaluasi
	public function file_soal_evaluasi($file)
	{
		if ($file) {
			$check = FCPATH . './storage/guru/evaluasi/' . $file;
			if (file_exists($check)) {
				$data['pdf'] = base_url('storage/guru/evaluasi/') . $file;
				$this->load->view('pdf_viewer/pdf_viewer', $data, false);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	// menampilkan file jawaban evaluasi dari siswa
	public function file_evaluasi_siswa($type = null, $file = null)
	{
		if ($type && $file) {
			$check = FCPATH . './storage/siswa/evaluasi/' . $file;
			if (file_exists($check)) {
				if ($type == 'pdf') {
					$data['pdf'] = base_url('storage/siswa/evaluasi/') . $file;
					$this->load->view('pdf_viewer/pdf_viewer', $data, false);
				} elseif ($type == 'img') {
					$data['alt'] = 'Tugas Siswa';
					$data['img'] = base_url('storage/siswa/evaluasi/') . $file;
					$this->load->view('img_viewer/img_viewer', $data);
				}
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	// nilai evaluasi siswa
	public function nilai_evaluasi()
	{
		$data['guru'] = $this->userGuru;
		$status = $this->input->get('status');
		if ($status == 'sm') {
			$evaluasiId = $this->input->get('evaluasi');
			$evaluasi = $this->master->nilaiEvaluasiSiswa($evaluasiId);
			$jadwalId = $this->db->select('jadwal_id')->where('evaluasi_id', $evaluasi->evaluasi_id)->get('evaluasi')->row();
			$nilai = array(
				'id'    => $evaluasi->id,
				'nis'   => $evaluasi->siswa_nis,
				'nama'  => $evaluasi->siswa_nama,
				'upload'    => ($evaluasi->time_upload) ? date('d-m-Y H:i', strtotime($evaluasi->time_upload)) . " WIB" : '-',
				'metode'    => ($evaluasi->metode) ? $evaluasi->metode : '-',
				'file'      => $evaluasi->file,
				'file_ext'  => $evaluasi->file_type,
				'nilai'     => $evaluasi->nilai,
				'komentar'  => $evaluasi->komentar,
				'evaluasi_id'   => $evaluasi->evaluasi_id,
				'jadwal_id' => $jadwalId->jadwal_id
			);
			$data['result'] = $nilai;
		} elseif ($status == 'bm') {
			$evaluasi_id = $this->input->get('evaluasi');
			$nis = $this->input->get('nis');
			$siswa = $this->db->select('siswa_nis, siswa_nama')->where('siswa_nis', $nis)->get('siswa')->row_array();
			$jadwalId = $this->db->select('jadwal_id')->where('evaluasi_id', $evaluasi_id)->get('evaluasi')->row();
			$nilai = array(
				'id'        => 0,
				'nis'       => $siswa['siswa_nis'],
				'nama'      => $siswa['siswa_nama'],
				'upload'    => null,
				'metode'    => null,
				'file'      => null,
				'file_ext'  => null,
				'nilai'     => 0,
				'komentar'  => null,
				'evaluasi_id'   => $evaluasi_id,
				'jadwal_id' => $jadwalId->jadwal_id
			);
			$data['result'] = $nilai;
		}
		$data['title'] = 'Nilai Evaluasi';
		$data['content'] = 'guru/contents/pembelajaran/v_nilai_evaluasi';
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// aksi untuk proses nilai evaluasi
	public function process_nilai_evaluasi()
	{
		$evaluasi_siswa_id = $this->input->post('evaluasi_siswa_id', true);
		$evaluasi_id = $this->input->post('evaluasi_id', true);
		if ($evaluasi_siswa_id == 0) {
			$data = array(
				'time_upload' => null,
				'metode' => '-',
				'nilai' => htmlspecialchars($this->input->post('nilai')),
				'komentar' => htmlspecialchars($this->input->post('komentar')),
				'siswa_nis' => htmlspecialchars($this->input->post('nis')),
				'status' => 0,
				'evaluasi_id' => $evaluasi_id
			);
			$this->db->insert('evaluasisiswa', $data);
		} else {
			$metode = $this->input->post('metode', true);
			if ($metode == 'online') {
				$status = 2;
			} elseif ($metode == 'langsung') {
				$status = 4;
			}
			$data = array(
				'nilai' => htmlspecialchars($this->input->post('nilai')),
				'komentar' => htmlspecialchars($this->input->post('komentar')),
				'status' => $status
			);
			$this->db->set($data);
			$this->db->where('evaluasi_siswa_id', $evaluasi_siswa_id);
			$this->db->update('evaluasisiswa');
		}
		$this->message('Berhasil', 'Evaluasi dari siswa ' . $_POST['nama'] . ' telah dinilai', 'success');
		return redirect('guru/pembelajaran/detail_evaluasi/' . $evaluasi_id);
	}

	// setting deadline evaluasi
	public function set_deadline_evaluasi($id = false)
	{
		$data['guru'] = $this->userGuru;
		$evaluasi = $this->master->evaluasiDetail($id);
		if ($id && $evaluasi) {
			$data['eval'] = $evaluasi;
			$data['title'] = 'Edit Jam Evaluasi';
			$data['content'] = 'guru/contents/pembelajaran/v_edit_jam_evaluasi';
			$this->form_validation->set_rules([
				[
					'field' => 'mulai',
					'label' => 'Waktu Mulai',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
				[
					'field' => 'selesai',
					'label' => 'Waktu Selesai',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				],
				[
					'field' => 'deadline',
					'label' => 'Batas Pengumpulan',
					'rules' => 'trim|required|xss_clean',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}'
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, false);
			} else {
				$set_time = array(
					'waktu_mulai' => htmlspecialchars($this->input->post('mulai', true)),
					'waktu_selesai' => htmlspecialchars($this->input->post('selesai', true)),
					'waktu_deadline' => htmlspecialchars($this->input->post('deadline', true))
				);
				$this->db->update('evaluasi', $set_time, ['evaluasi_id' => $this->input->post('evaluasi_id', true)]);
				$this->message('Berhasil', 'Waktu Evaluasi berhasil di setting', 'success');
				return redirect('guru/pembelajaran/detail_evaluasi/' . $id);
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	// ruang forum diskusi
	public function diskusi($id = false)
	{
		$data['guru'] = $this->userGuru;
		if ($id) {
			$forum = $this->master->getDiskusi($id);
			$data['forum'] = array();
			if ($forum) {
				foreach ($forum as $row => $value) {
					$reply = $this->master->getReplyForum($value->forum_id);
					$frm['id'] = $value->forum_id;
					$frm['author'] = $value->pembuat;
					$frm['title'] = $value->judul;
					$frm['desc'] = $value->deskripsi;
					$frm['create'] = date('d-m-Y H:i', strtotime($value->create_time)) . " WIB";
					$frm['reply'] = count($reply);
					$forum_[] = $frm;
				}
				$data['forum'] = $forum_;
			}
			$data['info'] = $this->master->getInfoJadwal($id);
			$data['title'] = 'Diskusi';
			$data['content'] = 'guru/contents/pembelajaran/v_diskusi';
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	public function forum_diskusi($id = false)
	{
		$data['guru'] = $this->userGuru;
		$diskusi = $this->master->detailForum($id);
		if ($id and $diskusi) {
			$data['title'] = 'Forum Diskusi';
			$data['content'] = 'guru/contents/pembelajaran/v_detail_diskusi';
			$data['forum'] = $diskusi;
			$data['info'] = $this->master->getInfoJadwal($diskusi->jadwal_id);
			$data['reply'] = $this->master->getReplyForum($diskusi->forum_id);
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	public function tambah_forum_diskusi($id)
	{
		$data['guru'] = $this->userGuru;
		if ($id) {
			$data['title'] = 'Tambah Diskusi';
			$data['content'] = 'guru/contents/pembelajaran/v_tambah_diskusi';
			$data['jadwal'] = $this->jadwal->getJadwalHariIni(['jadwal_id' => $id])->row();
			$this->form_validation->set_rules([
				[
					'field' => 'judul_diskusi',
					'label' => 'Judul Diskusi',
					'rules' => 'trim|required|xss_clean|min_length[8]|max_length[50]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)',
						'max_length' => '{field} terlalu panjang (maksimal 50 karakter)'
					]
				],
				[
					'field' => 'deskripsi',
					'label' => 'Deskripsi',
					'rules' => 'trim|required|xss_clean|min_length[8]',
					'errors' => [
						'required' => '{field} harus diisi',
						'xss_clean' => 'cek kembali pada {field}',
						'min_length' => '{field} terlalu pendek (minimal 8 karakter)',
					]
				]
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, false);
			} else {
				$this->master->addForumDiskusi();
				$this->message('Berhasil', 'Forum diskusi telah dibuat', 'success');
				return redirect('guru/pembelajaran/diskusi/' . $_POST['jadwal_id']);
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}

		$this->load->view('guru/layout/wrapper', $data, false);
	}

	public function get_komentar()
	{
		$output = '';
		$id_forum = $this->input->get('id', true);
		$where = array(
			'parent_id' => '0',
			'forum_id' => $id_forum,
		);
		$query     = $this->db->order_by('create_time', 'DESC')->get_where('detaildiskusi', $where);
		$result    = $query->result();
		foreach ($result as $key => $val) {
			$user = $this->get_user_diskusi($val->user_id);
			$output .= '
				<div class="media mb-2">
					<img src="' . $user['img'] . '" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px;">
					<div class="media-body">
							<div class="row">
							<div class="col-sm-10">
								<div class="nama-small">' . $user['name'] . '</div>
								<div class="post-on mb-2">Posted on ' . date('d-m-Y H:i', strtotime($val->create_time)) . ' WIB</div>
								<div class="komen">' . $val->message . '</div>
								<a href="javascript:void(0)" class="balas" id-komen="' . $val->diskusi_id . '">Balas</a>
							</div>
						</div>
					</div>
				</div>
			<hr>';
			$output .= $this->ambil_reply($val->diskusi_id);
		}
		echo json_encode([$output]);
	}

	public function ambil_reply($parent_id = 0, $marginleft = 0)
	{
		$output = '';
		$reply = $this->master->getReplyDiskusi($parent_id, 'parent_id', 'DESC');
		$count = $reply->num_rows();
		if ($parent_id == 0) {
			$marginleft = 0;
		} else {
			$marginleft = $marginleft + 48;
		}
		$tingkat = $marginleft / 48 + 1;
		if ($count > 0) {
			foreach ($reply->result() as $value) {
				$user = $this->get_user_diskusi($value->user_id);
				$output .= '
				<div class="media mb-2" style="margin-left:' . $marginleft . 'px">
					<img src="' . $user['img'] . '" alt="foto-user" class="mr-3 mt-6 rounded-circle" style="width:40px;">
					<div class="media-body">
						<div class="row">
							<div class="col-sm-10">
								<div class="nama-small">' . $user['name'] . '</div>
								<div class="post-on mb-2">Posted on ' . date('d-m-Y H:i', strtotime($value->create_time)) . ' WIB</div>
								<div class="komen">' . $value->message . '</div>';

				if ($tingkat < 2) {
					$output .= '<a href="javascript:void(0)" class="balas" id-komen="' . $value->diskusi_id . '">Balas</a>';
				}
				$output .= '</div>
						</div>
					</div>
				</div><hr>';
				$output .= $this->ambil_reply($value->diskusi_id, $marginleft);
			}
		}
		return $output;
	}

	public function get_user_diskusi($iduser)
	{
		$siswa    = $this->master->getUserSiswa($iduser);
		$guru    = $this->master->getUserGuru($iduser);
		if ($siswa) {
			if ($siswa->siswa_foto == 'default_foto.png') {
				$foto = base_url('assets/siswa/img/profile.png');
				$nama = $siswa->siswa_nama;
			} else {
				$foto = base_url('storage/siswa/profile/' . $siswa->siswa_foto);
				$nama = $siswa->siswa_nama;
			}
		} elseif ($guru) {
			if ($guru->profile == 'default_profile.png') {
				$foto = base_url('assets/siswa/img/profile.png');
				$nama = $guru->guru_nama;
			} else {
				$foto = base_url('storage/guru/profile/' . $guru->profile);
				$nama = $guru->guru_nama;
			}
		} else {
			$foto = base_url('assets/siswa/img/profile.png');
			$nama = 'User';
		}

		$data = array(
			'name' => $nama,
			'img' => $foto,
		);
		return $data;
	}

	public function submit_diskusi()
	{
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'success' => false,
			'messages' => []
		];

		$this->form_validation->set_rules('message', 'Diskusi', 'trim|required|xss_clean', [
			'required' => '{field} harus diisi',
			'xss_clean' => 'cek kembali pada {field}'
		]);
		if ($this->form_validation->run() == false) {
			$reponse['messages'] = '<div class="alert alert-danger" role="alert">' . validation_errors() . '</div>';
		} else {
			$this->master->insertDiskusi();
			$reponse = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => true
			];
		}
		echo json_encode($reponse);
	}


	public function jurnal($id = false)
	{
		$data['guru'] = $this->userGuru;
		if ($id) {
			$jurnal = $this->master->jurnalPembelajaran($id);
			$data['jurnal'] = array();
			if ($jurnal) {
				$no = 1;
				foreach ($jurnal as $val) {
					$jurnal_['nomor'] = $no++;
					$jurnal_['hari'] = $val->hari;
					$jurnal_['tanggal'] = date('d-m-Y', strtotime($val->tanggal));
					$jurnal_['guru'] = $val->guru_kode;
					$jurnal_['mapel'] = $val->nama_mapel;
					$jurnal_['kelas'] = $val->nama_kelas;
					$jurnal_['pertemuan'] = $val->pertemuan;
					$jurnal_['pembahasan'] = $val->pembahasan;
					$jurnal_['id'] = $val->jurnal_id;
					$new_jurnal[] = $jurnal_;
				}
				$data['jurnal'] = $new_jurnal;
			}
			$data['jadwal'] = $this->master->getInfoJadwal($id);
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['title'] = 'Jurnal Materi';
			$data['content'] = 'guru/contents/pembelajaran/v_jurnal_materi';
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	public function detail_jurnal_materi($id = false)
	{
		$data['guru'] = $this->userGuru;
		$req = $_REQUEST;
		$jurnal = $this->master->getJurnalWhere(['jurnal_id' => $req['id']])->row();
		if ($req['id'] and $jurnal) {
			$data['jurnal'] = $jurnal;
			$data['title'] = 'Detail Jurnal Materi';
			$data['content'] = 'guru/contents/pembelajaran/v_detail_jurnal_materi';
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	public function surat()
	{
		$data['guru'] = $this->userGuru;
		$data['surat'] = $this->guru->getPengajuanSurat($data['guru']->guru_nip);
		$data['title'] = 'Surat - Surat';
		$data['content'] = 'guru/contents/pembelajaran/v_surat';
		$this->load->view('guru/layout/wrapper', $data, false);
	}

	public function acction_show_surat()
	{
		$this->db->set('status', 1);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('penerimasurat');
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah Melihat Surat Ini',
			'success' => true
		];
		echo json_encode($reponse);
	}

	public function view_surat()
	{
		$file = $this->input->get('file');
		if ($file) {
			$check = FCPATH . './storage/siswa/surat/' . $file;
			if (file_exists($check)) {
				$data['title'] = 'File Surat';
				$data['alt'] = 'File Surat';
				$data['img'] = base_url('storage/siswa/surat/' . $file);
				$this->load->view('img_viewer/img_viewer', $data);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}
}
