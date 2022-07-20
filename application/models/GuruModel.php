<?php

class GuruModel extends CI_Model
{
	protected $table = "guru";

	public function getAll()
	{
		$query	= $this->db->get($this->table);
		$result	= $query->result_array();
		if ($result) {
			return $result;
		} else {
			return false;
		}
	}

	public function getWhere(array $params = null)
	{
		if ($params == null) {
			return false;
		}
		$query	= $this->db->get_where($this->table, $params);
		$row = $query->num_rows();
		if ($row > 1) {
			return $query->result();
		} elseif ($row == 1) {
			return $query->row();
		}
	}

	public function updateWhere(array $update = null, string $where = null)
	{
		if ($update == null && $where == null) {
			return false;
		}

		$this->db->set($update)
			->where('guru_nip', $where)
			->update($this->table);
	}

	public function insert_guru(array $data)
	{
		$this->db->insert($this->table, $data);
		return true;
	}

	public function get_kelas_guru($where)
	{
		$this->db->select("kelas.kelas_id, kelas.kode_kelas, kelas.nama_kelas");
		$this->db->from('kelas');
		$this->db->join('jadwal', 'jadwal.kelas_id=kelas.kelas_id');
		$this->db->where('jadwal.guru_kode', $where);
		$this->db->group_by('nama_kelas');
		$this->db->order_by('kelas.nama_kelas', 'ASC');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function jurnal_absensi($where)
	{
		$this->db->select("jadwal.jadwal_id, jadwal.hari, jadwal.jam_masuk, jadwal.jam_keluar,
			mapel.nama_mapel, ruangan.nama_ruang, jurnal.pert_ke, jurnal.tanggal, jurnal.jurnal_id
		");
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left');
		$this->db->where('jurnal.jadwal_id', $where);
		$this->db->group_by('tanggal', 'DESC');
		$query	= $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function addJurnalMateri($id)
	{
		$jurnal = array(
			'kd_materi' => htmlspecialchars($this->input->post('kd_materi', true)),
			'pembahasan'  => htmlspecialchars($this->input->post('pembahasan', true)),
			'catatan_kbm'  => htmlspecialchars($this->input->post('catatan_kbm', true)),
			'jumlah_siswa' => htmlspecialchars($this->input->post('jumlah_siswa', true)),
			'jumlah_hadir' => htmlspecialchars($this->input->post('jumlah_hadir', true)),
			'jumlah_alpha' => htmlspecialchars($this->input->post('jumlah_alpha', true)),
			'jumlah_izin'  => htmlspecialchars($this->input->post('jumlah_izin', true)),
			'jumlah_sakit'  => htmlspecialchars($this->input->post('jumlah_sakit', true))
		);
		$this->db->set($jurnal)->where('jurnal_id', $id)->update('jurnal');
	}

	public function get_jadwal_mapel($jadwalID)
	{
		$query = $this->db->select("guru.guru_kode, kelas.kelas_id, kelas.nama_kelas, mapel.nama_mapel, jadwal.jadwal_id")
			->from('jadwal')
			->join('guru', 'guru.guru_kode=jadwal.guru_kode')
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id')
			->where('jadwal_id', $jadwalID)
			->get();
		$result = $query->row();
		return $result;
	}

	public function print_riwayat_absen($jadwalID, $nis, $pert_awal, $pert_akhir)
	{
		$select = "jurnal.jurnal_id, jurnal.pert_ke, jurnal.jadwal_id,
		absensi.status, absensi.siswa_nis";

		$query = $this->db->select($select)
			->from('absensi')->join('jurnal', 'jurnal.jurnal_id=absensi.jurnal_id')
			->where('jadwal_id', $jadwalID)
			->where('siswa_nis', $nis)
			->where('pert_ke >=', $pert_awal)
			->where('pert_ke <=', $pert_akhir)
			->get();
		$result = $query->result();
		return $result;
	}

	public function count_absensi_siswa($status, $nis, $jadwal)
	{
		$this->db->select('absensi.status');
		$this->db->from('absensi');
		$this->db->join('jurnal', 'jurnal.jurnal_id=absensi.jurnal_id');
		$this->db->where('absensi.status', $status);
		$this->db->where('siswa_nis', $nis);
		$this->db->where('jadwal_id', $jadwal);
		$this->db->where('pert_ke >=', $this->input->post('pert_awal', true));
		$this->db->where('pert_ke <=', $this->input->post('pert_akhir', true));
		$query = $this->db->get();
		return $query->num_rows();
	}


	public function get_info_tugas($id_jadwal)
	{
		$this->db->select("jadwal.jadwal_id, jadwal.hari, mapel.nama_mapel,
			tugas.tugas_id, tugas.judul_tugas, tugas.pertemuan, tugas.create_time, tugas.update_time
		");
		$this->db->from('tugas');
		$this->db->join('jadwal', 'jadwal.jadwal_id=tugas.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->where('tugas.jadwal_id', $id_jadwal);
		$query	= $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function get_detail_tugas($id)
	{
		$this->db->select("jadwal.jadwal_id, jadwal.hari, jadwal.kelas_id, kelas.nama_kelas, mapel.nama_mapel,tugas.tugas_id, 
		tugas.judul_tugas, tugas.deskripsi, tugas.pertemuan, tugas.file_tugas, tugas.deadline");
		$this->db->from('tugas');
		$this->db->join('jadwal', 'jadwal.jadwal_id=tugas.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->where('tugas_id', $id);
		$query	= $this->db->get();
		return $query->row();
	}

	public function tambah_tugas_harian()
	{
		$file_tugas = $_FILES['file_tugas']['name'];
		if ($file_tugas) {
			$conf['upload_path']   = './storage/guru/tugas_harian';
			$conf['allowed_types'] = 'pdf';
			$conf['max_size']      = 2000;
			$conf['overwrite']     = TRUE;
			$conf['encrypt_name'] = TRUE;

			$this->load->library('upload', $conf);
			$this->upload->initialize($conf);

			$_FILES['file']['name']		= $_FILES['file_tugas']['name'];
			$_FILES['file']['type'] 	= $_FILES['file_tugas']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['file_tugas']['tmp_name'];
			$_FILES['file']['error'] 	= $_FILES['file_tugas']['error'];
			$_FILES['file']['size'] 	= $_FILES['file_tugas']['size'];

			# cek apakah direktori upload file soal tugas sudah tersedia
			if (!is_dir('storage')) :
				mkdir('./storage', 0777, true);
			endif;

			$dir_exist = true;
			if (!is_dir('storage/guru')) :
				mkdir('./storage/guru', 0777, true);
				$dir_exist = false; // dir not exist
			endif;

			if (!is_dir('storage/guru/tugas_harian')) :
				mkdir('./storage/guru/tugas_harian', 0777, true);
				$dir_exist = false; // dir not exist
			endif;
			# end

			if (!$this->upload->do_upload('file_tugas')) :
				if (!$dir_exist) :
					rmdir('/storage/guru/tugas_harian');
				endif;
				$response = [
					'success' => false,
					'errors' => $this->upload->display_errors('<span>', '</span>')
				];
			else :
				$uploadTugas = $this->upload->data();
				$tugas = array(
					'file_tugas' => $uploadTugas['file_name'],
					'file_type'	 => $uploadTugas['file_ext'],
					'file_size'  => $uploadTugas['file_size']
				);
				$this->db->set($tugas);
			endif;
		}
		$tangaldl = htmlspecialchars($this->input->post('tanggal', true));
		$jamdl = htmlspecialchars($this->input->post('jam', true));
		$data = array(
			'tanggal_tugas' => date('Y-m-d'),
			'pertemuan'	=> htmlspecialchars($this->input->post('pertemuan', true)),
			'judul_tugas' => htmlspecialchars($this->input->post('judul_tugas', true)),
			'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
			'deadline' => $tangaldl . ' ' . $jamdl,
			'jadwal_id' =>  htmlspecialchars($this->input->post('jadwal_id', true))
		);
		$this->db->set($data);
		$this->db->insert('tugas');
		$response = [
			'success' => true,
			'errors' => ''
		];
		return $response;
	}

	public function check_tugas_exist()
	{
		$tugas = $this->db->get_where('tugas', [
			'pertemuan' => htmlspecialchars($this->input->post('pertemuan', true)),
			'jadwal_id' => htmlspecialchars($this->input->post('jadwal_id', true))
		])->num_rows();
		return $tugas;
	}

	public function get_count_tugas($id_tugas, $type)
	{
		if ($type == 'SM') {
			$this->db->where_in('status', [1, 3]);
		} elseif ($type == 'SN') {
			$this->db->where_in('status', [2, 4]);
		}
		$this->db->where('tugas_id', $id_tugas);
		$query = $this->db->get('tugas_siswa');
		return $query->num_rows();
	}

	public function get_nilai_siswa($id)
	{
		$this->db->select('tugas_siswa.tugas_siswa_id, tugas_siswa.time_upload, tugas_siswa.metode, tugas_siswa.file_tugas_siswa, tugas_siswa.file_type, tugas_siswa.nilai_tugas, tugas_siswa.komentar, tugas_siswa.status, tugas_siswa.siswa_nis, tugas_siswa.tugas_id, siswa.siswa_nama
		');
		$this->db->from('tugas_siswa');
		$this->db->join('siswa', 'siswa.siswa_nis=tugas_siswa.siswa_nis');
		$this->db->where('tugas_siswa_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
}
