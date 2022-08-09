<?php

class Tugas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isSiswaLogin();
		$this->load->model('SiswaModel', 'siswa', true);
		$this->load->model('MasterModel', 'master', true);
		$days = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		$this->today = $days[(int)date('w')];
		$this->datenow = date('Y-m-d');
		$this->userSiswa = $this->siswa->getWhere(['siswa_nis' => $this->session->userdata('nis')]);
	}

	public function message($title = NULL, $text = NULL, $type = NULL)
	{
		return $this->session->set_flashdata([
			'title' => $title,
			'text' => $text,
			'type' => $type,
		]);
	}

	public function tugas_harian($id = false)
	{
		$siswa = $this->userSiswa;
		$dateNow = date('Y-m-d H:i:s');
		if ($id) {
			$id = $this->secure->decrypt_url($id);
			$tugas = $this->master->getTugasHarian($id);
			$data['tugas'] = array();
			if ($tugas) {
				foreach ($tugas as $key => $value) {
					$tgs['jadwalid'] = $value->jadwal_id;
					$tgs['id_'] = $value->tugas_id;
					$tgs['title'] = $value->judul_tugas;
					$tgs['desc'] = $value->deskripsi;
					$tgs['file'] = base_url('siswa/ruang_tugas/soal_tugas_harian/') . $value->file_tugas;
					$tgs['deadline'] = date('d - m - Y, H : i', strtotime($value->deadline));
					$tgs['create'] = date('d-m-Y,  H:i', strtotime($value->create_time));
					$tgs['update'] = ($value->create_time == $value->update_time) ? '-' : date('d-m-Y,  H:i', strtotime($value->update_time));
					$tugass_ = $this->siswa->get_tugas_siswa($siswa->siswa_nis, $value->tugas_id);
					$tgs['status'] = 0;
					if ($tugass_) {
						$tgs['status'] = 1;
					}
					$tugas_[] = $tgs;
				}
				$data['tugas'] = $tugas_;
			}

			$result = $this->siswa->get_result_tugas($id);
			$data['nilai'] = array();
			if ($result) {
				$no = 1;
				foreach ($result as $row) {
					$n['nomor'] = $no++;
					$nilai_ = $this->siswa->get_tugas_siswa($siswa->siswa_nis, $row->tugas_id);
					if (empty($nilai_)) {
						$n['ket'] = 'Tugas Belum Dikumpulkan';
						$n['mapel'] = $row->nama_mapel;
						$n['pert'] = $row->pertemuan;
						$n['judul'] = $row->judul_tugas;
						$n['upload'] = '-';
						$n['metode'] = '-';
						$n['file'] = '-';
						$n['komentar'] = '-';
						$n['nilai'] = '-';
						$n['id'] = 0;
					} else {
						if ($nilai_->status == 1) {
							if (strtotime($row->deadline) <= strtotime($dateNow) && strtotime($dateNow) > strtotime($row->deadline)) {
								$n['ket'] = 'Waktu Sudah Lewat';
							} else {
								$n['ket'] = '<a href="' . base_url('siswa/ruang_tugas/edit_tugas/' . $this->secure->encrypt_url($nilai_->tugas_siswa_id)) . '" class="btn btn-sm btn-success text-white px-4 py-1">Edit</a>';
							}
						} elseif ($nilai_->status == 2 || $nilai_->status == 4) {
							$n['ket'] = 'Tugas Sudah Dinilai';
						} elseif ($nilai_->status == 3) {
							$n['ket'] = 'Menunggu Konfirmasi';
						} else {
							$n['ket'] = 'Tidak Mengerjakan';
						}

						$n['mapel'] = $row->nama_mapel;
						$n['pert'] = $row->pertemuan;
						$n['judul'] = $row->judul_tugas;
						$n['upload'] = date('Y-m-d H:i:s', strtotime($nilai_->time_upload));
						$n['metode'] = $nilai_->metode;

						if ($nilai_->file_type == '.pdf') {
							$n['icon'] = base_url('assets/admin/icons/pdf-md.png');
						} else {
							$n['icon'] = base_url('assets/admin/icons/img-md.png');
						}

						$n['file'] = base_url('siswa/ruang_tugas/file_tugas/') . $nilai_->file_tugas_siswa;
						$n['komentar'] = $nilai_->komentar;
						$n['nilai'] = $nilai_->nilai_tugas;
						$n['id'] = $nilai_->tugas_siswa_id;
					}
					$nilai_tgs[] = $n;
				}
				$data['nilai'] = $nilai_tgs;
			}
			$data['title'] = 'Tugas Harian';
			$data['content'] = 'siswa/contents/tugas/v_tugas';
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function check_deadline()
	{
		$date_now = date('Y-m-d H:i:s');
		$id_ = $this->secure->decrypt_url($this->input->get('id'));
		$deadline = $this->db->select('deadline')->where('tugas_id', $id_)->get('tugasharian')->row();
		if (empty($deadline->deadline)) {
			$response = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => true,
				'msgabsen' => '<div class="alert alert-success text-center" role="alert">Waktu Pengumpulan Tugas</div>'
			];
		} else {
			if (strtotime($deadline->deadline) <= strtotime($date_now) && strtotime($date_now) > strtotime($deadline->deadline)) {
				$response = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'success' => false,
					'msgabsen' => '<div class="alert alert-danger text-center" role="alert">Waktu Pengumpulan Sudah Berakhir</div>'
				];
			} elseif (strtotime($date_now) <= strtotime($deadline->deadline)) {
				$response = [
					'csrfName' => $this->security->get_csrf_token_name(),
					'csrfHash' => $this->security->get_csrf_hash(),
					'success' => true,
					'msgabsen' => '<div class="alert alert-success text-center" role="alert">Waktu Pengumpulan Tugas</div>'
				];
			}
		}
		echo json_encode($response);
	}

	public function pengumpulan_online($id_ = false)
	{
		if ($id_) {
			$id_ = $this->secure->decrypt_url($id_);
			$data['siswa'] = $this->userSiswa;
			$data['tugas'] = $this->siswa->get_info_tugas($id_);
			$data['title'] = 'Pengumpulan Tugas Harian Online';
			$data['content'] = 'siswa/contents/tugas/v_pengumpulan_online';
			$this->form_validation->set_rules('file_tugas', 'File Jawaban Tugas Harian', 'callback_file_tugas_check');
			if ($this->form_validation->run() == false) {
				$this->load->view('siswa/layout/wrapper', $data, FALSE);
			} else {
				$id_jadwal = $this->secure->encrypt_url($data['tugas']->jadwal_id);
				$this->siswa->process_assignment();
				$this->message('Berhasil', 'Tugas Pertemuan ' . $data['tugas']->pertemuan . ' berhasil dikumpulkan', 'success');
				return redirect('siswa/ruang_tugas/tugas_harian/' . $id_jadwal);
			}
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function file_tugas_check()
	{
		if (empty($_FILES['file_tugas']['name'])) {
			$this->form_validation->set_message('file_tugas_check', 'Anda harus upload {field}!');
			return false;
		}
		return true;
	}

	public function pengumpulan_langsung()
	{
		$siswa_ = $this->userSiswa;
		$tugasid = $this->input->post('tugas_id', true);
		$tugasid = $this->secure->decrypt_url($tugasid);
		$assignment = array(
			'time_upload' => date('Y-m-d H:i:s'),
			'metode' => 'langsung',
			'file_tugas_siswa' => '-',
			'file_type' => '-',
			'file_size' => 0,
			'status' => 3,
			'siswa_nis' => $siswa_->siswa_nis,
			'tugas_id' => $tugasid
		);
		$this->db->insert('tugassiswa', $assignment);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'success' => true,
			'message' => 'Tugas sudah dikumpulkan secara lansung'
		];
		echo json_encode($reponse);
	}

	public function soal_tugas_harian($soal = false)
	{
		if ($soal) {
			$check = FCPATH . './storage/guru/tugas_harian/' . $soal;
			if (file_exists($check)) {
				$data['pdf'] = base_url('storage/guru/tugas_harian/') . $soal;
				$this->load->view('pdf_viewer/pdf_viewer', $data, FALSE);
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function file_tugas($id = false)
	{
		$tugas = $this->db->get_where('tugassiswa', ['file_tugas_siswa' => $id])->row();
		if ($id && $tugas) {
			$check = FCPATH . './storage/siswa/tugas_harian/' . $tugas->file_tugas_siswa;
			if ($tugas && file_exists($check)) {
				if ($tugas->file_type == '.pdf') {
					$data['title'] = 'Jawaban Tugas';
					$data['pdf'] = base_url('storage/siswa/tugas_harian/') . $tugas->file_tugas_siswa;
					$this->load->view('pdf_viewer/pdf_viewer', $data, FALSE);
				} else {
					$data['alt'] = 'Tugas Siswa';
					$data['img'] = base_url('storage/siswa/tugas_harian/') .  $tugas->file_tugas_siswa;
					$this->load->view('img_viewer/img_viewer', $data);
				}
			} else {
				show_404();
			}
		} else {
			show_404();
		}
	}

	public function edit_tugas($id_)
	{
		if ($id_) {
			$id_ = $this->secure->decrypt_url($id_);
			$tugas = $this->siswa->get_update_tugas($id_);
			$data['siswa'] = $this->userSiswa;
			$data['tugas'] = $tugas;
			$data['title'] = 'Edit Tugas';
			$data['content'] = 'siswa/contents/tugas/v_edit_tugas';
			$this->form_validation->set_rules('update_tugas', 'File Jawaban Tugas Harian', 'callback_update_tugas_check');
			if ($this->form_validation->run() == false) {
				$this->load->view('siswa/layout/wrapper', $data, FALSE);
			} else {
				$id_jadwal = $this->secure->encrypt_url($tugas->jadwal_id);
				$this->siswa->update_assignment();
				$this->message('Berhasil', 'Tugas Pertemuan ' . $tugas->pertemuan . ' berhasil diupdate', 'success');
				return redirect('siswa/ruang_tugas/tugas_harian/' . $id_jadwal);
			}
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function update_tugas_check()
	{
		if (empty($_FILES['update_tugas']['name'])) {
			$this->form_validation->set_message('update_tugas_check', 'Anda harus upload {field}!');
			return false;
		}
		return true;
	}

	public function panduan_pengumpulan_tugas()
	{
		$data['title'] = 'Panduan Pengumpulan Tugas';
		$this->load->view('siswa/contents/tugas/panduan_pengumpulan_tugas/v_panduan', $data, FALSE);
	}
}
