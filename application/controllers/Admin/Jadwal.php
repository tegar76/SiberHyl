<?php

class Jadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('JadwalModel', 'jadwal', true);
		$this->load->model('MasterModel', 'master', true);
	}

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
		$data['title'] = 'Jadwal Pelajaran';
		$data['jadwal'] = $this->jadwal->getJadwal()->result_array();
		$data['kode'] = $this->jadwal->generateKodeJadwal();
		$data['content'] = 'admin/contents/jadwal/v_jadwal';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detailJadwal($kodeJadwal = null)
	{
		$data['title'] = 'Detail Jadwal Pelajaran';
		$data['content'] = 'admin/contents/jadwal/v_detail_jadwal';
		$jadwal = $this->jadwal->getJadwalHariIni(['kode_jadwal' => $kodeJadwal])->row();
		if (!empty($jadwal)) {
			$data['jadwalDetail'] = $jadwal;
		} else {
			show_404();
		}

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambahJadwal()
	{

		$this->form_validation->set_rules([
			[
				'field' => 'kelas[]',
				'label' => 'Kelas',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'hari[]',
				'label' => 'Hari',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'mapel[]',
				'label' => 'Mata Pelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'guru[]',
				'label' => 'Guru Pengajar',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jam_mulai[]',
				'label' => 'Jam Masuk',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jam_selesai[]',
				'label' => 'Jam Selesai',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'ruangan[]',
				'label' => 'Ruangan',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jumlah_jam[]',
				'label' => 'Jumlah Jam Pelajaran',
				'rules' => 'trim|required|xss_clean|numeric',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}',
					'numeric' => 'masukan angka pada {field}'
				]
			]
		]);

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Tambah Jadwal Pelajaran';
			$data['content'] = 'admin/contents/jadwal/v_tambah_jadwal';
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$dataJadwal = $this->input->post();
			$jumlahForm = $dataJadwal['jumlah_form'];
			for ($i = 0; $i < $jumlahForm; $i++) {
				$result = [
					'kode_jadwal' => $this->jadwal->generateKodeJadwal(),
					'hari' => $dataJadwal['hari'][$i],
					'jam_masuk' => $dataJadwal['jam_mulai'][$i],
					'jam_keluar' => $dataJadwal['jam_selesai'][$i],
					'mapel_id' => $dataJadwal['mapel'][$i],
					'kelas_id' => $dataJadwal['kelas'][$i],
					'guru_kode' => $dataJadwal['guru'][$i],
					'ruang_id' => $dataJadwal['ruangan'][$i],
					'jumlah_jam' => $dataJadwal['jumlah_jam'][$i],
				];
				$this->db->insert('jadwal', $result);
			}
			$this->message('Berhasil', 'Data Jadwal Pelajaran Berhasil Ditambahkan', 'success');
			return redirect('master/jadwal');
		}
	}

	public function editJadwal($kodeJadwal = null)
	{
		$data['title'] = 'Update Jadwal Pelajaran';
		$data['content'] = 'admin/contents/jadwal/v_edit_jadwal';
		$data['classes'] = $this->master->get_masterdata('kelas');
		$data['lessons'] = $this->master->get_masterdata('mapel');
		$data['teachers'] = $this->master->get_masterdata('guru');
		$data['rooms'] = $this->master->get_masterdata('ruangan');
		$data['days'] = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
		$jadwal = $this->jadwal->getJadwalHariIni(['kode_jadwal' => $kodeJadwal])->row();
		if (!empty($jadwal)) {
			$data['jadwalDetail'] = $jadwal;
		} else {
			$data['jadwalDetail'] = '';
		}

		$this->form_validation->set_rules([
			[
				'field' => 'kelas_edit',
				'label' => 'Kelas',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'hari_edit',
				'label' => 'Hari',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'mapel_edit',
				'label' => 'Mata Pelajaran',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'guru_edit',
				'label' => 'Guru Pengajar',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jam_masuk_edit',
				'label' => 'Jam Masuk',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jam_keluar_edit',
				'label' => 'Jam Selesai',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'ruangan_edit',
				'label' => 'Ruangan',
				'rules' => 'trim|required|xss_clean',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}'
				]
			],
			[
				'field' => 'jam_mengajar_edit',
				'label' => 'Jumlah Jam Pelajaran',
				'rules' => 'trim|required|xss_clean|numeric',
				'errors' => [
					'required' => '{field} harus diisi!',
					'xss_clean' => 'cek kembali pada {field}',
					'numeric' => 'masukan angka pada {field}'
				]
			]
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$updateJadwal = [
				'hari' => $this->input->post('hari_edit', true),
				'jumlah_jam' => $this->input->post('jam_mengajar_edit', true),
				'jam_masuk' => $this->input->post('jam_masuk_edit', true),
				'jam_keluar' => $this->input->post('jam_keluar_edit', true),
				'update_time' => date('Y-m-d H:i:s'),
				'mapel_id' => $this->input->post('mapel_edit', true),
				'kelas_id' => $this->input->post('kelas_edit', true),
				'guru_kode' => $this->input->post('guru_edit', true),
				'ruang_id' => $this->input->post('ruangan_edit', true)
			];
			$this->db->set($updateJadwal)
				->where('kode_jadwal', $this->input->post('kode_jadwal', true))
				->update('jadwal');
			$this->message('Berhasil', 'Data Jadwal Pelajaran Berhasil Diupdate', 'success');
			return redirect('master/jadwal');
		}
	}

	public function get_data()
	{
		$search = $this->input->get('search');
		$typesend = $this->input->get('type');
		if ($typesend == 'class') {
			$classes = $this->master->get_select2($typesend, $search);
			foreach ($classes as $class) {
				$result[] = [
					'id' => $class->kelas_id,
					'text'	   => $class->nama_kelas
				];
			}
		} elseif ($typesend == 'days') {
			$days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
			foreach ($days as $day) {
				$result[] = [
					'id'	=> $day,
					'text'	   => $day
				];
			}
		} elseif ($typesend == 'lesson') {
			$lessons = $this->master->get_select2($typesend, $search);
			foreach ($lessons as $lesson) {
				$result[] = [
					'id'	=> $lesson->mapel_id,
					'text'		=> $lesson->nama_mapel
				];
			}
		} elseif ($typesend == 'teacher') {
			$teachers = $this->master->get_select2($typesend, $search);
			foreach ($teachers as $teacher) {
				$result[] = [
					'id'		=> $teacher->guru_kode,
					'text'		=> $teacher->guru_kode,
				];
			}
		} elseif ($typesend == 'room') {
			$rooms = $this->master->get_select2($typesend, $search);
			foreach ($rooms as $room) {
				$result[] = [
					'id'	=> $room->ruang_id,
					'text'	=> $room->nama_ruang,
				];
			}
		} elseif ($typesend == 'jurusan') {
			$rooms = $this->master->get_select2($typesend, $search);
			foreach ($rooms as $room) {
				$result[] = [
					'id'	=> $room->jurusan_id,
					'text'	=> $room->nama_jurusan,
				];
			}
		}
		echo json_encode($result);
	}

	public function hapusJadwal()
	{
		$this->db->delete('jadwal', ['kode_jadwal' => $this->input->post('kodeJadwal', true)]);
		$reponse = [
			'csrfName' => $this->security->get_csrf_token_name(),
			'csrfHash' => $this->security->get_csrf_hash(),
			'message' => 'Anda telah menghapus jadwal pelajaran',
			'success' => true
		];
		echo json_encode($reponse);
	}

	public function pratinjauJadwal($class = null)
	{
		$data['days']  = ["Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
		$data['title'] = 'Pratinjau Jadwal';
		$data['class']	= $this->db->get_where('kelas', ['kode_kelas' => $class])->row();
		$data['classes'] = $this->master->get_masterdata('kelas');
		$data['content'] = 'admin/contents/jadwal/v_pratinjau_jadwal';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
