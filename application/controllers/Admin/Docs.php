<?php

class Docs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Cetak absensi
    public function formCetakReportAbsensi()
    {
        $data['title'] = 'Form Cetak Reporting Absensi';
        $data['content'] = 'admin/contents/super_visor/v_form_cetak_report_absensi';
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function cetakReportAbsensi()
    {
        $data['title'] = 'Cetak Reporting Absensi';
        $this->load->view('admin/contents/super_visor/v_cetak_report_absensi', $data, FALSE);
    }

    // Cetak Tugas
    public function formCetakReportTugasHarian()
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
    public function formCetakReportEvaluasi()
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
