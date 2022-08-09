<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Docs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		isGuruLogin();
		$this->load->model('GuruModel', 'guru', true);
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
		$this->userGuru = $this->guru->getWhere(['guru_nip' => $this->session->userdata('nip')]);
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

	public function message($title = NULL, $text = NULL, $type = NULL)
	{
		return $this->session->set_flashdata([
			'title' => $title,
			'text' => $text,
			'type' => $type,
		]);
	}

	public function export_absensi_siswa($id = false)
	{
		$data['guru'] = $this->userGuru;
		$info = $this->master->getInfoJadwal($id);
		if ($id && $info) {
			$data['info'] = $info;
			$data['pertemuan'] = count($this->master->jurnalPembelajaran($id));
			$data['title'] = 'Form Cetak Reporting Absensi';
			$data['content'] = 'guru/contents/pembelajaran/v_form_cetak_report_absensi';
			$this->form_validation->set_rules('pert_awal', 'Pertemuan Awal', 'required|trim|xss_clean|callback_validate_pertemuan_awal', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			$this->form_validation->set_rules('pert_akhir', 'Pertemuan Akhir', 'required|trim|xss_clean|callback_validate_pertemuan_akhir', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			$this->form_validation->set_rules('format_export', 'Format Export', 'required|trim|xss_clean', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, FALSE);
			} else {
				$this->export_absensi();
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
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
			$siswa = $this->master->getSiswaKelas($info->kelas_id);
			$nomor = 1;
			foreach ($siswa as $row) {
				$rekap['nomor'] = $nomor++;
				$rekap['nis']	= $row->siswa_nis;
				$rekap['nama']  = $row->siswa_nama;
				$rekap['idJ'] = $jadwal_id;;
				$rekap['H'] = $this->guru->count_absensi_siswa('H', $row->siswa_nis, $info->jadwal_id);
				$rekap['A'] = $this->guru->count_absensi_siswa('A', $row->siswa_nis, $info->jadwal_id);
				$rekap['I'] = $this->guru->count_absensi_siswa('I', $row->siswa_nis, $info->jadwal_id);
				$rekap['S'] = $this->guru->count_absensi_siswa('S', $row->siswa_nis, $info->jadwal_id);
				$rekapAbsensi[] = $rekap;
			}
			$data['absen'] = $this->guru->getExportData('jurnal', $this->input->post('jadwal_id', true));
			$data['dateExport']	= date('Y-m-d H:i:s');
			$data['teacherCode'] = $info->guru_kode;
			$data['className']	= $info->nama_kelas;
			$data['lessonName']	= $info->nama_mapel;
			$data['pertKe'] = $pert_awal . ' s/d ' . $pert_akhir;
			$data['totalPert'] = $pert_akhir;
			$data['rekapAbsensi'] = $rekapAbsensi;
			$data['title'] = 'LAPORAN HASIL ABSENSI SISWA';
			$data['tahun_ajar'] = $this->tahun_ajar;
			$this->load->library('pdf');
			$this->pdf->filename = 'rekap_absensi_siswa_' . time() . '_download';
			$this->pdf->setPaper('A4', 'portrait');
			$this->pdf->load_view('guru/contents/pembelajaran/v_cetak_report_absensi', $data, FALSE);
		}
	}

	public function tugas_harian($id)
	{
		$data['guru'] = $this->userGuru;
		$info = $this->master->getInfoJadwal($id);
		if ($id && $info) {
			$data['info'] = $info;
			$data['title'] = 'Form Cetak Reporting Tugas Harian';
			$data['content'] = 'guru/contents/pembelajaran/v_form_cetak_report_tugas_harian';
			$data['tugas'] = count($this->master->getTugasHarian($id));
			$this->form_validation->set_rules('pert_awal', 'Pertemuan Awal', 'required|trim|xss_clean|callback_validate_pertemuan_awal', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			$this->form_validation->set_rules('pert_akhir', 'Pertemuan Akhir', 'required|trim|xss_clean|callback_validate_pertemuan_akhir', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			$this->form_validation->set_rules('format_export', 'Format Export', 'required|trim|xss_clean', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, FALSE);
			} else {
				// $tugas = $this->guru->getExportData('tugasharian', $id, $_POST['pert_awal'], $_POST['pert_akhir']);
				// $siswa = $this->db->get_where('siswa', ['kelas_id' => $info->kelas_id])->num_rows();
				// $sum = 0;
				// $siswa = $siswa * count($tugas);
				// foreach ($tugas as $row) {
				// 	$nilai = $this->db->get_where('tugassiswa', ['tugas_id' => $row->tugas_id])->num_rows();
				// 	$sum += $nilai;
				// }
				// $nilai = $sum;
				// if ($siswa != $nilai) {
				// 	$this->message('Cetak Gagal', 'pastikan semua Siswa telah dinilai pada masing-masing tugas', 'error');
				// 	return redirect('guru/pembelajaran/tugas_harian/' . $id);
				// } else {
				$this->export_tugas();
				// }
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, FALSE);
	}

	public function export_tugas()
	{
		$format	= $this->input->post('format_export', true);
		$jadwal_id	= $this->input->post('jadwal_id', true);
		$pert_awal	= $this->input->post('pert_awal', true);
		$pert_akhir	= $this->input->post('pert_akhir', true);
		$info = $this->master->getInfoJadwal($jadwal_id);
		if ($format == 'pdf') {
			$siswa = $this->master->getSiswaKelas($info->kelas_id);
			$nomor = 1;
			foreach ($siswa as $row) {
				$rekap['nomor'] = $nomor++;
				$rekap['nis']	= $row->siswa_nis;
				$rekap['nama']  = $row->siswa_nama;
				$rekap['idJ'] = $jadwal_id;
				$rekap['sum'] = $this->guru->getNilaiTugasSiswa('sum', $info->jadwal_id, $row->siswa_nis)->nilai_tugas;
				$rekap['avg'] = $this->guru->getNilaiTugasSiswa('avg', $info->jadwal_id, $row->siswa_nis)->nilai_tugas;
				$rekap_nilai[] = $rekap;
			}

			$data['tugas'] = $this->guru->getExportData('tugasharian', $jadwal_id);
			$data['dateExport']	= date('Y-m-d H:i:s');
			$data['teacherCode'] = $info->guru_kode;
			$data['className']	= $info->nama_kelas;
			$data['lessonName']	= $info->nama_mapel;
			$data['pertKe'] = $pert_awal . ' s/d ' . $pert_akhir;
			$data['totalPert'] = $pert_akhir;
			$data['rekapTugas'] = $rekap_nilai;
			$data['title'] = 'LAPORAN TUGAS SISWA';
			$data['tahun_ajar'] = $this->tahun_ajar;
			$this->load->library('pdf');
			$this->pdf->filename = 'rekap_nilai_tugas_siswa_' . time() . '_download';
			$this->pdf->setPaper('A4', 'portrait');
			$this->pdf->load_view('guru/contents/pembelajaran/v_cetak_report_tugas_harian', $data, FALSE);
		}
	}


	public function evaluasi($id)
	{
		$data['guru'] = $this->userGuru;
		$info = $this->master->getInfoJadwal($id);
		if ($id && $info) {
			$data['info'] = $info;
			$data['title'] = 'Form Cetak Reporting Evaluasi';
			$data['content'] = 'guru/contents/pembelajaran/v_form_cetak_report_evaluasi';
			$data['evaluasi'] = count($this->master->getEvaluasi($id));
			$this->form_validation->set_rules('pert_awal', 'Pertemuan Awal', 'required|trim|xss_clean|callback_validate_pertemuan_awal', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			$this->form_validation->set_rules('pert_akhir', 'Pertemuan Akhir', 'required|trim|xss_clean|callback_validate_pertemuan_akhir', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			$this->form_validation->set_rules('format_export', 'Format Export', 'required|trim|xss_clean', [
				'required' => '{field} harus diisi',
				'xss_clean' => 'cek kembali pada {field}'
			]);
			if ($this->form_validation->run() == false) {
				$this->load->view('guru/layout/wrapper', $data, FALSE);
			} else {
				$this->export_evaluasi();
			}
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('guru/layout/wrapper', $data, false);
	}


	public function export_evaluasi()
	{
		$format	= $this->input->post('format_export', true);
		$jadwal_id	= $this->input->post('jadwal_id', true);
		$pert_awal	= $this->input->post('pert_awal', true);
		$pert_akhir	= $this->input->post('pert_akhir', true);
		$info = $this->master->getInfoJadwal($jadwal_id);
		if ($format == 'pdf') {
			$siswa = $this->master->getSiswaKelas($info->kelas_id);
			$nomor = 1;
			foreach ($siswa as $row) {
				$rekap['nomor'] = $nomor++;
				$rekap['nis']	= $row->siswa_nis;
				$rekap['nama']  = $row->siswa_nama;
				$rekap['idJ'] = $jadwal_id;
				$rekap['sum'] = $this->guru->getAvgSumEvaluasi('sum', $info->jadwal_id, $row->siswa_nis)->nilai;
				$rekap['avg'] = $this->guru->getAvgSumEvaluasi('avg', $info->jadwal_id, $row->siswa_nis)->nilai;
				$rekap_nilai[] = $rekap;
			}
			$data['evaluasi'] = $this->guru->getExportEvaluasi($jadwal_id);
			$data['dateExport']	= date('Y-m-d H:i:s');
			$data['teacherCode'] = $info->guru_kode;
			$data['className']	= $info->nama_kelas;
			$data['lessonName']	= $info->nama_mapel;
			$data['pertKe'] = $pert_awal . ' s/d ' . $pert_akhir;
			$data['totalPert'] = $pert_akhir;
			$data['rekapEvaluasi'] = $rekap_nilai;
			$data['title'] = 'LAPORAN TUGAS SISWA';
			$data['tahun_ajar'] = $this->tahun_ajar;
			$this->load->library('pdf');
			$this->pdf->filename = 'rekap_nilai_evaluasi_siswa_' . time() . '_download';
			$this->pdf->setPaper('A4', 'portrait');
			$this->pdf->load_view('guru/contents/pembelajaran/v_cetak_report_evaluasi', $data, FALSE);
		}
	}

	public function jurnal($id)
	{
		$data['guru'] = $this->userGuru;
		$data['tahun_ajar'] = $this->tahun_ajar;
		$info = $this->master->getInfoJadwal($id);
		if ($id && $info) {
			$data['info'] = $info;
			$jurnal = $this->master->jurnalPembelajaran($id);
			$data['jurnal'] = array();
			if ($jurnal) {
				$no = 1;
				foreach ($jurnal as $val) {
					$jurnal_['nomor'] = $no++;
					$jurnal_['tanggal'] = date('d-m-Y', strtotime($val->tanggal));
					$jurnal_['pertemuan'] = 'Pertemuan ' . $val->pertemuan;
					$jurnal_['kd_materi'] = $val->kd_materi;
					$jurnal_['pembahasan'] = $val->pembahasan;
					$jurnal_['catatan_kbm'] = $val->catatan_kbm;
					$jurnal_['id'] = $val->jurnal_id;
					$new_jurnal[] = $jurnal_;
				}
				$data['jurnal'] = $new_jurnal;
			}
			$data['dateExport']	= date('Y-m-d H:i:s');
			$data['teacherCode'] = $info->guru_kode;
			$data['className']	= $info->nama_kelas;
			$data['lessonName']	= $info->nama_mapel;
			$this->load->library('pdf');
			$this->pdf->filename = 'rekap_nilai_evaluasi_siswa_' . time() . '_download';
			$this->pdf->setPaper('A4', 'portrait');
			$this->pdf->load_view('guru/contents/pembelajaran/v_cetak_report_jurnal_materi', $data, false);
		} else {
			$data['title'] = '404 Halaman Tidak Ditemukan';
			$data['content'] = 'guru/contents/eror/v_not_found';
			$this->load->view('guru/layout/wrapper', $data, false);
		}
	}
}
