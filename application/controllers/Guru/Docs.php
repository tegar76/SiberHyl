<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Docs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
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

	public function export_absensi_siswa($id = false)
	{
		$data['info'] = $this->guru->get_jadwal_mapel($id);
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
		$info = $this->guru->get_jadwal_mapel($jadwal_id);
		if ($format == 'pdf') {
			$siswa = $this->db->select('siswa_nis, siswa_nama')->from('siswa')->where('kelas_id', $info->kelas_id)->get()->result();
			$nomor = 1;
			foreach ($siswa as $row) {
				$absen = $this->guru->print_riwayat_absen($jadwal_id, $row->siswa_nis, $pert_awal, $pert_akhir);
				$rekap['nomor'] = $nomor++;
				$rekap['nis']	= $row->siswa_nis;
				$rekap['nama']  = $row->siswa_nama;
				$rekap['absen'] = $absen;
				$rekap['H'] = $this->guru->count_absensi_siswa('H', $row->siswa_nis, $info->jadwal_id);
				$rekap['A'] = $this->guru->count_absensi_siswa('A', $row->siswa_nis, $info->jadwal_id);
				$rekap['I'] = $this->guru->count_absensi_siswa('I', $row->siswa_nis, $info->jadwal_id);
				$rekap['S'] = $this->guru->count_absensi_siswa('S', $row->siswa_nis, $info->jadwal_id);
				$rekapAbsensi[] = $rekap;
			}
			$data['dateExport']	= date('Y-m-d H:i:s');
			$data['teacherCode'] = $info->guru_kode;
			$data['className']	= $info->nama_kelas;
			$data['lessonName']	= $info->nama_mapel;
			$data['pertKe'] = $pert_awal . ' s/d ' . $pert_akhir;
			$data['totalPert'] = $pert_akhir;
			$data['rekapAbsensi'] = $rekapAbsensi;
			$data['title'] = 'LAPORAN HASIL ABSENSI SISWA';
			$this->load->view('guru/contents/pembelajaran/v_cetak_report_absensi', $data, FALSE);

			// $this->load->library('pdf');
			// $this->pdf->filename = 'rekap_absensi_siswa_' . time() . '_download';
			// $this->pdf->setPaper('A4', 'portrait');
			// $this->pdf->load_view('guru/contents/pembelajaran/v_cetak_report_absensi', $data, FALSE);
		} elseif ($format == 'excel') {
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();
			$styleJudul = [
				'font' => [
					'bold' => true,
					'size' => 14,
				],
				'alignment' => [
					'vertical' => Alignment::VERTICAL_CENTER,
					'horizontal' => Alignment::HORIZONTAL_CENTER,
					'wrap' => true,
				],
			];
			$sheet->setCellValue('A1', 'LAPORAN HASIL ABSENSI SISWA ');
			$sheet->mergeCells('A1:H2');
			$sheet->getStyle('A1')->applyFromArray($styleJudul);

			$tahunAjar = $this->tahun_ajar;
			$semester = 'Semester' . $semester = ($tahunAjar['semester'] == 0) ? '-' : (($tahunAjar['semester'] % 2 == 0) ? 'Genap' : 'Gasal');
			$tahun = ' Tahun Pelajaran' . ($tahunAjar['tahun'] == '') ? '-' : $tahunAjar['tahun'];
			$sheet->setCellValue('A3', $semester . $tahun);
			$sheet->mergeCells('A3:H3');

			$sheet->setCellValue('A4', 'SMK KESATRIAN PURWOKERTO');
			$sheet->mergeCells('A4:H4');

			$sheet->setCellValue('B6', 'Kode Guru : ' . $info->guru_kode . '');
			$sheet->setCellValue('B7', 'Kelas     : ' . $info->nama_kelas . '');
			$sheet->setCellValue('B8', 'Mata Pelajaran : ' .  $info->nama_mapel . '');
			$sheet->setCellValue('B9', 'Pertemuan Ke   : ' . $pert_awal . ' s.d. ' . $pert_akhir . '');

			$sheet->setCellValue('G6', 'Tanggal Cetak : ' . date('Y-m-d H:i:s') . '');
			$sheet->mergeCells('G6:E6');

			$stylefield = [
				'font' => [
					'bold' => true,
					'size' => 12,
				],
				'alignment' => [
					'horizontal' => Alignment::HORIZONTAL_CENTER,
					'wrap' => true,
				],
			];

			$sheet->setCellValue('A11', 'No');
			$sheet->mergeCells('A11:A12');
			$sheet->setCellValue('B11', 'NIS');
			$sheet->mergeCells('B11:B12');
			$sheet->setCellValue('C11', 'Nama');
			$sheet->mergeCells('C11:C12');
			$sheet->setCellValue('D11', 'Pertemuan Ke');

			$column = 'D';
			$lastRow = $sheet->getHighestRow();
			for ($row = 12; $row <= $lastRow; $row++) {
				$cell = $sheet->getCell($column . $row);
				$sheet->setCellValue($cell, '1');
			}
			// $sheet->getStyle('A11:D')->applyFromArray($stylefield);

			$writer = new Xlsx($spreadsheet);
			$filename = 'laporan_absensi_siswa_' . time() . '_download';

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
			header('Cache-Control: max-age=0');

			$writer->save('php://output');
		}
	}
}
