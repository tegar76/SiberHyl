<?php

class Jadwal extends CI_Controller
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
		checkAdminLogin();
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
		$data['tahun_ajar'] = $this->tahun_ajar;
		$data['jadwal'] = $this->jadwal->getJadwal()->result();
		$data['content'] = 'admin/contents/jadwal/v_jadwal';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail_jadwal()
	{
		$jadwal_id = $this->input->get('id');
		$jadwal = $this->jadwal->getJadwalHariIni(['jadwal_id' => $jadwal_id])->row();
		if (!empty($jadwal_id) && !empty($jadwal)) {
			$data['title'] = 'Detail Jadwal Pelajaran';
			$data['content'] = 'admin/contents/jadwal/v_detail_jadwal';
			$data['jadwalDetail'] = $jadwal;
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah_jadwal_pelajaran()
	{
		$data['title'] = 'Tambah Jadwal Pelajaran';
		$data['content'] = 'admin/contents/jadwal/v_tambah_jadwal';
		if (isset($_POST['submit_jadwal'])) {
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
				$this->load->view('admin/layout/wrapper', $data, FALSE);
			} else {
				$dataJadwal = $this->input->post();
				$jumlahForm = $dataJadwal['jumlah_form'];
				for ($i = 0; $i < $jumlahForm; $i++) {
					$result = [
						'hari' => $dataJadwal['hari'][$i],
						'jam_masuk' => $dataJadwal['jam_mulai'][$i],
						'jam_keluar' => $dataJadwal['jam_selesai'][$i],
						'mapel_id' => $dataJadwal['mapel'][$i],
						'kelas_id' => $dataJadwal['kelas'][$i],
						'guru_nip' => $dataJadwal['guru'][$i],
						'ruang_id' => $dataJadwal['ruangan'][$i],
						'jumlah_jam' => $dataJadwal['jumlah_jam'][$i],
					];
					$this->db->insert('jadwal', $result);
				}
				$this->message('Berhasil', 'Data Jadwal Pelajaran Berhasil Ditambahkan', 'success');
				return redirect('master/jadwal');
			}
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function update_jadwal($jadwal_id = null)
	{
		$jadwal = $this->jadwal->getJadwalHariIni(['jadwal_id' => $jadwal_id])->row();
		if (!empty($jadwal_id) && !empty($jadwal)) {
			$data['title'] = 'Update Jadwal Pelajaran';
			$data['content'] = 'admin/contents/jadwal/v_edit_jadwal';
			$data['classes'] = $this->master->get_masterdata('kelas');
			$data['lessons'] = $this->master->get_masterdata('mapel');
			$data['teachers'] = $this->master->get_masterdata('guru');
			$data['rooms'] = $this->master->get_masterdata('ruangan');
			$data['days'] = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
			$data['jadwal'] = $jadwal;

			if (isset($_POST['update'])) {
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
					$this->jadwal->update_jadwal();
					$this->message('Berhasil', 'Data Jadwal Pelajaran Berhasil Diupdate', 'success');
					return redirect('master/jadwal');
				}
			}
		} else {
			$data['title'] = 'Not Found';
			$data['content'] = 'guru/contents/eror/v_not_found';
		}
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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
					'id'		=> $teacher->guru_nip,
					'text'		=> $teacher->guru_kode,
				];
			}
		} elseif ($typesend == 'room') {
			$rooms = $this->master->get_select2($typesend, $search);
			foreach ($rooms as $room) {
				$result[] = [
					'id'	=> $room->ruang_id,
					'text'	=> $room->kode_ruang,
				];
			}
		} elseif ($typesend == 'jurusan') {
			$rooms = $this->master->get_select2($typesend, $search);
			foreach ($rooms as $room) {
				$result[] = [
					'id'	=> $room->jurusan_id,
					'text'	=> $room->kode_jurusan,
				];
			}
		}
		echo json_encode($result);
	}

	public function delete_jadwal()
	{
		$this->db->delete('jadwal', ['jadwal_id' => $this->input->post('jadwal_id', true)]);
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
		$data['class']	= $this->db->order_by('kode_jurusan', 'ASC')->get_where('kelas', ['kode_kelas' => $class])->row();
		$data['content'] = 'admin/contents/jadwal/v_pratinjau_jadwal';
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function pratinjau_jadwal()
	{
		$kelas = $this->input->get('kelas');
		$kelas = $this->db->get_where('kelas', ['kode_kelas' => $kelas])->row();
		$data['title'] = 'Pratinjau Jadwal';
		$data['content'] = 'admin/contents/jadwal/v_pratinjau_jadwal';
		$data['classes'] = $this->master->get_masterdata('kelas');
		$days = array("Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
		if ($kelas) {
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
}
