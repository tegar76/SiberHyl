<?php

class Docs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Cetak absensi
    public function print_absensi($id = null)
    {
        if ($id) {
            $data['jadwal'] = $this->master->getInfoJadwal($id);
            $data['title'] = 'Form Cetak Reporting Absensi';
            $data['content'] = 'admin/contents/super_visor/v_form_cetak_report_absensi';
            if ($_POST['print']) {
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
            }
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/layout/wrapper', $data, FALSE);
            } else {
                $this->export_absensi();
            }
        } else {
            $data['title'] = 'Not Found';
            $data['content'] = 'guru/contents/eror/v_not_found';
        }
        $this->load->view('admin/layout/wrapper', $data, FALSE);
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
        $format = $this->input->post('format_export', true);
        $jadwal_id  = $this->input->post('jadwal_id', true);
        $pert_awal  = $this->input->post('pert_awal', true);
        $pert_akhir = $this->input->post('pert_akhir', true);
        $jadwal = $this->master->getInfoJadwal($jadwal_id);
        if ($format == 'pdf') {
            $siswa = $this->master->getDataSiswaExport($jadwal->kelas_id);
            $nomor = 1;
            foreach ($siswa as $value) {
                $absen = $this->master->getAbsensiSiswa($jadwal_id, $value->nis, $pert_awal, $pert_akhir);
                $absensi['nomor'] = $nomor++;
                $absensi['nis'] = $value->nis;
                $absensi['nama'] = $value->nama;
                $absensi['absens'] = $absen;
                $absensi['H'] = $this->master->count_absensi_siswa('H', $value->siswa_nis, $jadwal->jadwal_id);
                $absensi['A'] = $this->master->count_absensi_siswa('A', $value->siswa_nis, $jadwal->jadwal_id);
                $absensi['I'] = $this->master->count_absensi_siswa('I', $value->siswa_nis, $jadwal->jadwal_id);
                $absensi['S'] = $this->master->count_absensi_siswa('S', $value->siswa_nis, $jadwal->jadwal_id);
                $rekapAbsensi[] = $absensi;
            }
            $data['export_date'] = '';
        }
    }

    public function cetakReportAbsensi()
    {
        $data['title'] = 'Cetak Reporting Absensi';
        $this->load->view('admin/contents/super_visor/v_cetak_report_absensi', $data, FALSE);
    }

    // Cetak Tugas
    public function export_tugas_harian()
    {
        $data['title'] = 'Form Cetak Reporting Tugas Harian';
        $data['content'] = 'admin/contents/super_visor/v_form_cetak_report_tugas_harian';
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function cetakReportTugasHarian()
    {
        $data['title'] = 'Cetak Reporting Tugas Harian';
        $this->load->view('admin/contents/super_visor/v_cetak_report_tugas_harian', $data, FALSE);
    }

    // Cetak Evaluasi
    public function export_evaluasi()
    {
        $data['title'] = 'Form Cetak Reporting Evaluasi';
        $data['content'] = 'admin/contents/super_visor/v_form_cetak_report_evaluasi';
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function cetakReportEvaluasi()
    {
        $data['title'] = 'Cetak Reporting Evaluasi';
        $this->load->view('admin/contents/super_visor/v_cetak_report_evaluasi', $data, FALSE);
    }

    // Cetak Jurnal
    public function cetakReportJurnalMateri()
    {
        $data['title'] = 'Cetak Reporting Jurnal Materi';
        $this->load->view('admin/contents/super_visor/v_cetak_report_jurnal_materi', $data, FALSE);
    }
}