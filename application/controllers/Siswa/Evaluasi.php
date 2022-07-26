<?php

class Evaluasi extends CI_Controller
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

	public function message($title = NULL, $text = NULL, $type = NULL)
	{
		return $this->session->set_flashdata([
			'title' => $title,
			'text' => $text,
			'type' => $type,
		]);
	}

	public function index($id = false)
	{
		$siswa_ = $this->userSiswa;
		if ($id) {
			$data['title'] = 'Evaluasi';
			$data['content'] = 'siswa/contents/evaluasi/v_evaluasi';
			$data['siswa'] = $siswa_;
			$date_now = date('Y-m-d H:i:s');
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$id_ = $this->secure->decrypt_url($id);
			$mapel = $this->siswa->get_mapel($id_);
			$evaluasi = $this->siswa->get_evaluasi($id_);
			$data['evaluasi'] = array();
			if ($evaluasi) {
				$no1 = 1;
				foreach ($evaluasi as $key => $value) {
					$eval['nomor'] = $no1++;
					$eval['mapel'] = $mapel->nama_mapel;
					$eval['ke_'] = $value->evaluasi_ke;
					$eval['judul'] = $value->judul;
					$eval['tanggal'] = date('d-m-Y', strtotime($value->tanggal));
					$eval['mulai'] = date('H:i', strtotime($value->waktu_mulai)) . " WIB";
					$eval['selesai'] = date('H:i', strtotime($value->waktu_selesai)) . " WIB";
					$eval['deadline'] = date('H:i', strtotime($value->waktu_deadline))  . " WIB";
					$eval['jenis'] = $value->jenis_soal;
					$eval['_id'] = $value->evaluasi_id;
					$eval['jadwal_'] = $id_;

					$check = $this->siswa->get_evaluasi_siswa($siswa_->siswa_nis, $value->evaluasi_id);
					$deadline = date('Y-m-d', strtotime($value->tanggal)) . ' ' . date('H:i:s', strtotime($value->waktu_deadline));
					if ($check) {
						$eval['action'] = '<a role="button" class="btn btn-sm btn-outline-success disabled text-success mx-auto d-block">Sudah Mengerjakan</a>';
					} else {
						if (strtotime($deadline) <= strtotime($date_now) && strtotime($date_now) > strtotime($deadline)) {
							$eval['action'] = '<a role="button" class="btn btn-sm btn-outline-danger disabled text-danger mx-auto d-block">Waktu Sudah Lewat</a>';
						} else if (strtotime($date) == strtotime($value->tanggal)) {
							if (strtotime($value->waktu_selesai) <= strtotime($time) && strtotime($time) > strtotime($value->waktu_selesai)) {
								$eval['action'] = '<a class="btn btn-sm btn-primary text-white mx-auto d-block submit-evaluasi" role="button" data-toggle="popover" data-placement="bottom" evaluasi-id="' . $this->secure->encrypt_url($value->evaluasi_id) . '">Kumpulkan</a>';
							} else {
								$eval['action'] = '<a target="_blank" href="' . base_url('siswa/evaluasi/soal_evaluasi/' . $value->file_evaluasi) . '" class="btn btn-success text-white mx-auto d-block mb-3">Mulai</a><a class="btn btn-sm btn-primary text-white mx-auto d-block submit-evaluasi" role="button" data-toggle="popover" data-placement="bottom" evaluasi-id="' . $this->secure->encrypt_url($value->evaluasi_id) . '">Kumpulkan</a>';
							}
						}
					}
					$evals[] = $eval;
				}
				$data['evaluasi'] = $evals;

				$no2 = 1;
				foreach ($evaluasi as $row) {
					$result['nomor'] = $no2++;
					$result['mapel'] = $mapel->nama_mapel;
					$result['ke_'] = $row->evaluasi_ke;
					$result['judul'] = $row->judul;
					$nilai_ = $this->siswa->get_evaluasi_siswa($siswa_->siswa_nis, $row->evaluasi_id);
					if ($nilai_) {
						$result['status'] = 'Sudah Mengerjakan';
						if ($nilai_->status == 2) $result['status'] = 'Sudah Dinilai';
						$result['upload'] = date('d-m-Y H:i', strtotime($nilai_->time_upload)) . " WIB";
						$result['metode'] = $nilai_->metode;
						if ($nilai_->file_type == '.pdf') {
							$result['icon'] = base_url('assets/admin/icons/pdf-md.png');
						} else {
							$result['icon'] = base_url('assets/admin/icons/img-md.png');
						}
						$result['file'] = base_url('siswa/evaluasi/file_evaluasi_siswa/' . $nilai_->file_evaluasi_siswa);
						$result['komentar'] = $nilai_->komentar;
						$result['nilai'] = $nilai_->nilai;
					} else {
						$result['status'] = 'Belum Mengerjakan';
						$result['upload'] = '-';
						$result['metode'] = '-';
						$result['file'] = '-';
						$result['komentar'] = '-';
						$result['nilai'] = '-';
					}
					$nilai[] = $result;
				}
				$data['nilai'] = $nilai;
			}
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function pengumpulan_online($id_)
	{
		if ($id_) {
			$id_ = $this->secure->decrypt_url($id_);
			$data['siswa'] = $this->userSiswa;
			$data['evaluasi'] = $this->siswa->get_info_evaluasi($id_);
			$data['title'] = 'Pengumpulan Evaluasi Online';
			$data['content'] = 'siswa/contents/evaluasi/v_pengumpulan_online';
			$this->form_validation->set_rules('file_evaluasi', 'File Jawaban Evaluasi', 'callback_file_evaluasi_check');
			if ($this->form_validation->run() == false) {
				$this->load->view('siswa/layout/wrapper', $data, FALSE);
			} else {
				$id_jadwal = $this->secure->encrypt_url($data['evaluasi']->jadwal_id);
				$this->siswa->process_evaluasi();
				$this->message('Berhasil', 'Evaluasi berhasil dikumpulkan', 'success');
				return redirect('siswa/evaluasi/' . $id_jadwal);
			}
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
		}
		$this->load->view('siswa/layout/wrapper', $data, FALSE);
	}

	public function file_evaluasi_check()
	{
		if (empty($_FILES['file_evaluasi']['name'])) {
			$this->form_validation->set_message('file_evaluasi_check', 'Anda harus upload {field}!');
			return false;
		}
		return true;
	}

	public function submit_evaluasi($string)
	{
		$siswa_ = $this->userSiswa;
		$evalId = $this->input->post('evaluasiId', true);
		$evaluasi = array(
			'time_upload' => date('Y-m-d H:i:s'),
			'metode' => 'langsung',
			'file_evaluasi_siswa' => '-',
			'file_type' => '-',
			'file_size' => 0,
			'status' => 3,
			'siswa_nis' => $siswa_->siswa_nis,
			'evaluasi_id' => $evalId
		);
		$this->db->insert('evaluasi_siswa', $evaluasi);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'success' => true,
			'message' => 'Evaluasi sudah dikumpulkan secara lansung'
		];
		echo json_encode($reponse);
	}


	public function soal_evaluasi($soal = false)
	{
		$date = date('Y-m-d');
		$time = date('H:i:s');
		if ($soal) {
			$data['title'] = 'Soal Evaluasi';
			$data['file_soal'] = base_url('storage/guru/evaluasi/') . $soal;
			$eval = $this->db->where('`file_evaluasi`', $soal)->get('evaluasi')->row();
			if (strtotime($date) < strtotime($eval->tanggal)) {
				$this->message('Waktu Berakhir', 'waktu liat soal telah berakhir', 'warning');
				redirect('siswa/evaluasi/' . $this->secure->encrypt_url($eval->jadwal_id));
			} elseif (strtotime($date) == strtotime($eval->tanggal)) {
				if (strtotime($time) > strtotime($eval->waktu_selesai)) {
					$this->message('Waktu Berakhir', 'waktu liat soal telah berakhir', 'warning');
					redirect('siswa/evaluasi/' . $this->secure->encrypt_url($eval->jadwal_id));
				} else {
					$this->load->view('siswa/contents/evaluasi/soal_evaluasi_pdf/v_soal_evaluasi_pdf', $data, FALSE);
				}
			}
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
			$this->load->view('siswa/layout/wrapper', $data, FALSE);
		}
	}

	public function file_evaluasi_siswa($id = false)
	{
		if ($id) {
			$eval = $this->db->get_where('evaluasi_siswa', ['file_evaluasi_siswa' => $id])->row();
			if ($eval) {
				if ($eval->file_type == '.pdf') {
					$data['title'] = 'Jawaban Evaluasi';
					$data['file_'] = base_url('storage/siswa/evaluasi/') . $eval->file_evaluasi_siswa;
					$this->load->view('siswa/contents/evaluasi/jawaban_evaluasi_pdf/v_jawaban_evaluasi_pdf', $data, FALSE);
				} else {
					$data['title'] = 'Jawaban Evaluasi';
					$data['file_'] = base_url('storage/siswa/evaluasi/') . $eval->file_evaluasi_siswa;
					$this->load->view('siswa/contents/evaluasi/v_jawaban_evaluasi_img', $data, FALSE);
				}
			}
		} else {
			$data['content'] = 'siswa/contents/errors/404_notfound';
			$this->load->view('siswa/layout/wrapper', $data, FALSE);
		}
	}

	public function panduan_pengumpulan_evaluasi($string)
	{
		$data['title'] = 'Panduan Pengumpulan Evaluasi';
		$this->load->view('siswa/contents/evaluasi/panduan_pengumpulan_evaluasi/v_panduan', $data, FALSE);
	}
}
