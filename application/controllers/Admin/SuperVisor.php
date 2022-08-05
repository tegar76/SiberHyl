<?php

class SuperVisor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
		$tahun_ajar = $this->master->getActiveTahunAkademik();
		if ($tahun_ajar == null) {
			$this->tahun_ajar = [
				'semester' => 0,
				'tahun' => ''
			];
		} else {
			$this->tahun_ajar = $tahun_ajar;
		}
		$hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->hariIni = $hari[(int)date('w')];
		checkAdminLogin();
	}

	public function index()
	{
		$kelas = $this->input->get('kelas');
		$kelas = $this->db->get_where('kelas', ['kode_kelas' => $kelas])->row();
		$data['title'] = 'Super Visor';
		$data['content'] = 'admin/contents/super_visor/v_super_visor';
		$data['classes'] = $this->master->get_masterdata('kelas');
		$data['kelas'] = $kelas;
		$days = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		if ($kelas) {
			$today =  $this->hariIni;
			$timenow = date('H:i');
			$studying = [
				'hari' => $today,
				'jadwal.kelas_id' => $kelas->kelas_id,
			];

			$studying = $this->jadwal->getJadwalHariIni($studying)->result();
			$data['studying'] = null;
			foreach ($studying as $key => $row) {
				if (
					strtotime($timenow) >= strtotime($row->jam_masuk)
					&& strtotime($timenow) <= strtotime($row->jam_keluar)
				) {
					if (!empty($row)) {
						$data['studying'] = $row;
					}
				}
			}

			foreach ($days as $day) {
				$jadwal = $this->jadwal->getJadwalHariIni([
					'hari' => $day,
					'jadwal.kelas_id' => $kelas->kelas_id
				])->result();
				$jadwal_['hari'] = $day;
				$jadwal_['sch']  = array();
				if (!empty($jadwal)) {
					$newsch = array();
					foreach ($jadwal as $row => $value) {
						if ($value->hari == $day) {
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
					$jadwal_['sch'] = $newsch;
				}
				$newjadwal[] = $jadwal_;
			}
			$data['schedule'] = $newjadwal;
		} else {
			$data['schedule'] = null;
			$data['days'] = $days;
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function absensi($id = false)
	{
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
			$data['title'] = 'Absensi';
			$data['content'] = 'admin/contents/super_visor/v_absensi';
			$data['jadwal'] = $this->master->getInfoJadwal($id);
			$data['tahun_ajar'] = $this->tahun_ajar;
		} else {
			$data['title'] = 'Absensi';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_absensi($id)
	{
		$jurnal = $this->master->getJurnalWhere(['jurnal_id' => $id])->row();
		if ($id and $jurnal) {
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
				if ($absx) {
					$bukti = '<a target="_blank" href="' . base_url('guru/bukt_absensi_siswa/fileJawabanTugasHarianImg') . '"><img src="' . base_url('assets/admin/icons/img.png') . '" alt=""></a>';
					$absensi['pembelajaran'] = ($absx->metode_absen) ? $absx->metode_absen : '-';
					$absensi['bukti'] = ($absx->bukti_absen) ? $bukti : '-';
					$absensi['status_absen'] = $absx->status;
					$absensi['absensi_id'] = $absx->absensi_id;
					$absensi['jurnal_id'] = $id;
				}
				$rekap_abs[] = $absensi;
			}
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['setting_abs'] = $jurnal;
			$data['rekap_absen'] = $rekap_abs;
			$data['title'] = 'Detail Absensi';
			$data['content'] = 'admin/contents/super_visor/v_detail_absensi';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tugas_harian($id = null)
	{
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

			$data['title'] = 'Tugas Harian';
			$data['content'] = 'admin/contents/super_visor/v_tugas_harian';
			$data['jadwal'] = $this->master->getInfoJadwal($id);
			$data['tahun_ajar'] = $this->tahun_ajar;
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_tugas_harian($id)
	{
		$tugas = $this->master->detailTugasHarian($id);
		if ($id and $tugas) {
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
					$tugasx['upload_time'] = date('d - m -Y H:i', strtotime($tugasSiswa->time_upload)) . " WIB";
					$tugasx['metode_upload'] = $tugasSiswa->metode;
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
						$tugasx['file_tugas'] = '<a target="_blank" href="' . base_url('master/super-visor/file_tugas_siswa/'. $type . '/'. $tugasSiswa->file_tugas_siswa) . '"><img src="' . $icon_tugas . '" alt=""></a>';
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
			$data['jadwal'] = $this->master->getInfoJadwal($tugas->jadwal_id);
			$data['sm'] = $sm;
			$data['sn'] = $sn;
			$data['bm'] = $bm;
			$data['title'] = 'Detail Tugas Harian';
			$data['content'] = 'admin/contents/super_visor/v_detail_tugas_harian';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function file_soal_tugas_harian($file = null) 
	{
		if ($file) {
			$check = FCPATH . './storage/guru/tugas_harian/' . $file;
			if(file_exists($check)) {
				$data['pdf'] = base_url('storage/guru/tugas_harian/') . $file;
				$this->load->view('pdf_viewer/pdf_viewer', $data, FALSE);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}
	public function file_tugas_siswa($type = null, $file = null)
	{
		if($type && $file) {
			$check = FCPATH . './storage/siswa/tugas_harian/' . $file;
			if(file_exists($check)) {
				if($type == 'pdf') {
					$data['pdf'] = base_url('storage/siswa/tugas_harian/') . $file;
					$this->load->view('pdf_viewer/pdf_viewer', $data, FALSE);
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

	public function evaluasi($id = null)
	{
		if ($id) {
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
			$data['jadwal'] = $this->master->getInfoJadwal($id);
			$data['tahun_ajar'] = $this->tahun_ajar;
			$data['title'] = 'Evaluasi';
			$data['content'] = 'admin/contents/super_visor/v_evaluasi';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_evaluasi($id)
	{
		$evaluasi = $this->master->evaluasiDetail($id);
		if ($id and $evaluasi) {
			$siswa = $this->master->getSiswaKelas($evaluasi->kelas_id);
			$no = 1;
			foreach ($siswa as $row => $value) {
				$eval_ = $this->db->get_where('evaluasi_siswa', [
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
					$result['upload_time'] = date('d-m-Y H:i', strtotime($eval_->time_upload)) . " WIB";
					$result['metode_upload'] = $eval_->metode;
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
						$result['file'] = '<a target="_blank" href="' . base_url('master/super-visor/file_evaluasi_siswa/' . $type . '/' . $eval_->file_evaluasi_siswa) . '"><img src="' . $icon_file . '" alt=""></a>';
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
			$data['evaluasi'] = $evaluasi;
			$data['jadwal'] = $this->master->getInfoJadwal($evaluasi->jadwal_id);
			$data['title'] = 'Detail Evaluasi';
			$data['content'] = 'admin/contents/super_visor/v_detail_evaluasi';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function file_soal_evaluasi($file)
	{
		if ($file) {
			$check = FCPATH . './storage/guru/evaluasi/' . $file;
			if(file_exists($check)) {
				$data['pdf'] = base_url('storage/guru/evaluasi/') . $file;
				$this->load->view('pdf_viewer/pdf_viewer', $data, FALSE);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function file_evaluasi_siswa($type = null, $file = null)
	{
		if($type && $file) {
			$check = FCPATH . './storage/siswa/evaluasi/' . $file;
			if(file_exists($check)) {
				if($type == 'pdf') {
					$data['pdf'] = base_url('storage/siswa/evaluasi/') . $file;
					$this->load->view('pdf_viewer/pdf_viewer', $data, FALSE);
				} elseif ($type == 'img') {
					$data['alt'] = 'Tugas Siswa';
					$data['img'] = base_url('storage/siswa/evaluasi/') . $file;
					$this->load->view('image_viewer/image_viewer', $data);
				}
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function diskusi($id)
	{
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
			$data['jadwal'] = $this->master->getInfoJadwal($id);
			$data['title'] = 'Diskusi';
			$data['content'] = 'admin/contents/super_visor/v_diskusi';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_diskusi($id)
	{
		$diskusi = $this->master->detailForum($id);
		if ($id and $diskusi) {
			$data['title'] = 'Forum Diskusi';
			$data['content'] = 'admin/contents/super_visor/v_detail_diskusi';
			$data['diskusi'] = $diskusi;
			$data['jadwal'] = $this->master->getInfoJadwal($diskusi->jadwal_id);
			$data['reply'] = $this->master->getReplyForum($diskusi->forum_id);
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function get_komentar()
	{
		$output = '';
		$req = $_REQUEST;
		$where = array(
			'parent_id' => '0',
			'forum_id' => $req['id'],
		);
		$query 	= $this->db->order_by('create_time', 'DESC')->get_where('detaildiskusi', $where);
		$result	= $query->result();
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
								<div class="komen">' . $value->message . '</div>
							</div>
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
		$siswa	= $this->master->getUserSiswa($iduser);
		$guru	= $this->master->getUserGuru($iduser);
		if ($siswa) {
			if ($siswa->siswa_foto == 'default_foto.png') {
				$foto = base_url('assets/siswa/img/profile.png');
				$nama = $siswa->siswa_nama;
			} else {
				$foto = base_url('storage/guru/profile/' . $siswa->siswa_foto);
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

	public function jurnal($id = false)
	{
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
			$data['content'] = 'admin/contents/super_visor/v_jurnal_materi';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_jurnal()
	{
		$req = $_REQUEST;
		$jurnal = $this->master->getJurnalWhere(['jurnal_id' => $req['id']])->row();
		if ($req['id'] and $jurnal) {
			$data['jurnal'] = $jurnal;
			$data['title'] = 'Detail Jurnal Materi';
			$data['content'] = 'admin/contents/super_visor/v_detail_jurnal_materi';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
