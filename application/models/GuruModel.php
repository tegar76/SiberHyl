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

	public function kelasGuruPengajar($nip)
	{
		$this->db->select("
			kelas.kelas_id as id,
			kelas.kode_kelas as kode,
			kelas.nama_kelas as nama
		");
		$this->db->from('kelas');
		$this->db->join('jadwal', 'jadwal.kelas_id=kelas.kelas_id');
		$this->db->where('jadwal.guru_nip', $nip);
		$this->db->group_by('nama_kelas');
		$this->db->order_by('kelas.nama_kelas', 'ASC');
		return $this->db->get()->result();
	}

	public function mapelGuruPengajar($nip)
	{
		$this->db->select("
			mapel.mapel_id as id,
			mapel.slug_mapel as slug,
			mapel.nama_mapel as nama
		");
		$this->db->from('mapel');
		$this->db->join('jadwal', 'jadwal.mapel_id=mapel.mapel_id');
		$this->db->where('jadwal.guru_nip', $nip);
		$this->db->group_by('nama_mapel');
		$this->db->order_by('mapel.nama_mapel', 'ASC');
		return $this->db->get()->result();
	}

	public function jurusanKelas($id)
	{
		$this->db->select("
			k.kelas_id as k_id,
			k.index_kelas as index,
			k.nama_kelas as nama,
			j.jurusan_id as j_id,
			j.kode_jurusan as kd_j
		");
		$this->db->from('kelas as k');
		$this->db->join('jurusan as j', 'j.kode_jurusan=k.kode_jurusan');
		$this->db->where('k.kelas_id', $id);
		return $this->db->get()->row();
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
			'hadir' => htmlspecialchars($this->input->post('jumlah_hadir', true)),
			'alpha' => htmlspecialchars($this->input->post('jumlah_alpha', true)),
			'izin'  => htmlspecialchars($this->input->post('jumlah_izin', true)),
			'sakit'  => htmlspecialchars($this->input->post('jumlah_sakit', true))
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
			$this->check_storage_guru('tugas_harian');
			if (!$this->upload->do_upload('file_tugas')) :
				if (!$this->check_storage_guru('tugas_harian')) :
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
			$tangaldl = htmlspecialchars($this->input->post('tanggal', true));
			$jamdl = htmlspecialchars($this->input->post('jam', true));
			$data = array(
				'pertemuan'	=> htmlspecialchars($this->input->post('pertemuan', true)),
				'judul_tugas' => htmlspecialchars($this->input->post('judul_tugas', true)),
				'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
				'deadline' => $tangaldl . ' ' . $jamdl,
				'jadwal_id' =>  htmlspecialchars($this->input->post('jadwal_id', true))
			);
			$this->db->set($data);
			$this->db->insert('tugasharian');
			$response = [
				'success' => true,
				'errors' => ''
			];
			return $response;
		}
	}

	public function check_tugas_exist()
	{
		$tugas = $this->db->get_where('tugasharian', [
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
		$this->db->select('
			tugas_siswa.tugas_siswa_id,
			tugas_siswa.time_upload,
			tugas_siswa.metode,
			tugas_siswa.file_tugas_siswa,
			tugas_siswa.file_type,
			tugas_siswa.nilai_tugas,
			tugas_siswa.komentar,
			tugas_siswa.status,
			tugas_siswa.siswa_nis, 
			tugas_siswa.tugas_id,
			siswa.siswa_nama
		');
		$this->db->from('tugas_siswa');
		$this->db->join('siswa', 'siswa.siswa_nis=tugas_siswa.siswa_nis');
		$this->db->where('tugas_siswa_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function check_storage_guru($dir)
	{
		if (!is_dir('storage')) :
			mkdir('./storage', 0777, true);
		endif;

		$dir_exist = true;
		if (!is_dir('storage/guru')) :
			mkdir('./storage/guru', 0777, true);
			$dir_exist = false; // dir not exist
		endif;

		if (!is_dir('storage/guru/' . $dir)) :
			mkdir('./storage/guru/' . $dir, 0777, true);
			$dir_exist = false; // dir not exist
		endif;

		return $dir_exist;
	}

	// Evaluasi
	public function get_info_evaluasi($id_jadwal)
	{
		$this->db->select("jadwal.jadwal_id, mapel.nama_mapel, evaluasi.evaluasi_id, evaluasi.judul, 
		evaluasi.evaluasi_ke, evaluasi.tanggal, evaluasi.create_time, evaluasi.update_time");
		$this->db->from('evaluasi');
		$this->db->join('jadwal', 'jadwal.jadwal_id=evaluasi.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->where('evaluasi.jadwal_id', $id_jadwal);
		$query	= $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function check_evaluasi_exist()
	{
		$tugas = $this->db->get_where('evaluasi', [
			'evaluasi_ke' => htmlspecialchars($this->input->post('evaluasi_ke', true)),
			'jadwal_id' => htmlspecialchars($this->input->post('jadwal_id', true))
		])->num_rows();
		return $tugas;
	}

	public function tambah_evaluasi()
	{
		$file_evaluasi = $_FILES['file_evaluasi']['name'];
		if ($file_evaluasi) {
			$conf['upload_path']   = './storage/guru/evaluasi';
			$conf['allowed_types'] = 'pdf';
			$conf['max_size']      = 2000;
			$conf['overwrite']     = TRUE;
			$conf['encrypt_name'] = TRUE;
			$this->load->library('upload', $conf);
			$this->upload->initialize($conf);
			$_FILES['file']['name']		= $_FILES['file_evaluasi']['name'];
			$_FILES['file']['type'] 	= $_FILES['file_evaluasi']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['file_evaluasi']['tmp_name'];
			$_FILES['file']['error'] 	= $_FILES['file_evaluasi']['error'];
			$_FILES['file']['size'] 	= $_FILES['file_evaluasi']['size'];
			$this->check_storage_guru('evaluasi');
			if (!$this->upload->do_upload('file_evaluasi')) :
				if (!$this->check_storage_guru('evaluasi')) :
					rmdir('/storage/guru/evaluasi');
				endif;
				$response = [
					'success' => false,
					'errors' => $this->upload->display_errors('<span>', '</span>')
				];
			else :
				$upload = $this->upload->data();
				$file_eval = array(
					'file_evaluasi' => $upload['file_name'],
					'file_type'	 => $upload['file_ext'],
					'file_size'  => $upload['file_size']
				);
				$this->db->set($file_eval);
			endif;
			$data = array(
				'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
				'judul' => htmlspecialchars($this->input->post('judul', true)),
				'jenis_soal' => htmlspecialchars($this->input->post('jenis', true)),
				'evaluasi_ke'	=> htmlspecialchars($this->input->post('evaluasi_ke', true)),
				'jadwal_id' =>  htmlspecialchars($this->input->post('jadwal_id', true))
			);
			$this->db->set($data);
			$this->db->insert('evaluasi');
			$response = [
				'success' => true,
				'errors' => ''
			];
			return $response;
		}
	}

	public function get_detail_evaluasi($id)
	{
		$this->db->select("jadwal.jadwal_id, jadwal.hari, jadwal.kelas_id, kelas.nama_kelas, mapel.nama_mapel,evaluasi.evaluasi_id, 
		evaluasi.judul, evaluasi.tanggal,  evaluasi.jenis_soal, evaluasi.evaluasi_ke, evaluasi.file_evaluasi, evaluasi.waktu_mulai,
		evaluasi.waktu_mulai, evaluasi.waktu_selesai, evaluasi.waktu_deadline");
		$this->db->from('evaluasi');
		$this->db->join('jadwal', 'jadwal.jadwal_id=evaluasi.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->where('evaluasi_id', $id);
		$query	= $this->db->get();
		return $query->row();
	}

	public function get_count_evaluasi($id, $type)
	{
		if ($type == 'SM') {
			$this->db->where_in('status', [1, 3]);
		} elseif ($type == 'SN') {
			$this->db->where_in('status', [2, 4]);
		}
		$this->db->where('evaluasi_id', $id);
		$query = $this->db->get('evaluasi_siswa');
		return $query->num_rows();
	}

	public function get_nilai_evaluasi($id)
	{
		$this->db->select('evaluasi_siswa.evaluasi_siswa_id, evaluasi_siswa.time_upload, evaluasi_siswa.metode, evaluasi_siswa.file_evaluasi_siswa, evaluasi_siswa.file_type, evaluasi_siswa.nilai, evaluasi_siswa.komentar, evaluasi_siswa.status, evaluasi_siswa.siswa_nis, evaluasi_siswa.evaluasi_id, siswa.siswa_nama');
		$this->db->from('evaluasi_siswa');
		$this->db->join('siswa', 'siswa.siswa_nis=evaluasi_siswa.siswa_nis');
		$this->db->where('evaluasi_siswa_id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_jurnal_materi($id)
	{
		$this->db->select("jadwal.jadwal_id, jadwal.hari, mapel.nama_mapel, kelas.nama_kelas, jurnal.tanggal, jurnal.kd_materi, jurnal.pert_ke, jurnal.pembahasan, jurnal.jurnal_id");
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->where('jurnal.jadwal_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	// diskusi
	public function get_diskusi($id_jadwal)
	{
		$this->db->where('jadwal_id', $id_jadwal);
		$this->db->order_by('create_time', 'DESC');
		$query = $this->db->get('forum_diskusi');
		return $query->result();
	}

	public function get_reply_forum($id)
	{
		$this->db->where('forum_diskusi_id', $id);
		$this->db->order_by('create_time', 'DESC');
		$query = $this->db->get('diskusi_siswa');
		return $query->result();
	}

	public function add_forum_diskusi()
	{
		$data = array(
			'pembuat' => htmlspecialchars($this->input->post('nama_guru', true)),
			'judul' => htmlspecialchars($this->input->post('judul_diskusi', true)),
			'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
			'jadwal_id' => htmlspecialchars($this->input->post('jadwal_id', true)),
		);
		$this->db->insert('forum_diskusi', $data);
	}

	public function get_siswa($id)
	{
		$this->db->select('siswa.siswa_id, siswa.siswa_nama, siswa.siswa_nis, siswa.siswa_foto');
		$this->db->from('siswa');
		$this->db->where('siswa.siswa_nis', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_guru($id)
	{
		$this->db->select('guru.guru_id, guru.guru_kode, guru_nip, guru.guru_nama, guru.guru_foto');
		$this->db->from('guru');
		$this->db->where('guru_nip', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_reply_diskusi($where = null, $order, $desc)
	{
		$this->db->select(
			'diskusi.diskusi_siswa_id, diskusi.parent_diskusi_id, diskusi.message, diskusi.create_time, diskusi.user_id,
			forum.forum_diskusi_id, forum.pembuat, forum.judul, forum.deskripsi, forum.jadwal_id'
		);
		$this->db->from('diskusi_siswa as diskusi');
		$this->db->join('forum_diskusi as forum', 'forum.forum_diskusi_id=diskusi.forum_diskusi_id');
		$this->db->where($where);
		$this->db->order_by('diskusi.' . $order, $desc);
		$query = $this->db->get();
		return $query;
	}

	public function insert_diskusi()
	{
		$data = array(
			'parent_diskusi_id' => $this->input->post('parent_diskusi_id', true),
			'user_id' => $this->input->post('user_id', true),
			'message' => $this->input->post('message', true),
			'forum_diskusi_id' => $this->input->post('forum_diskusi_id', true),
		);
		$this->db->insert('diskusi_siswa', $data);
	}

	public function getMateriGuru($id)
	{
		$this->db->select("
			detail.detailmateri_id as id,
			detail.index_kelas as index_kelas,
			detail.create_time as create,
			detail.update_time as update,
			detail.status,
			kelas.nama_kelas as kelas,
			mapel.nama_mapel as mapel,
			guru.guru_nama as guru, 
			guru.guru_kode as kode_g,
			jurusan.nama_jurusan as jurusan,
			jurusan.kode_jurusan as kode_j
		");
		$this->db->from('detailmateri as detail');
		$this->db->join('mapel', 'mapel.mapel_id=detail.mapel_id', 'left');
		$this->db->join('kelas', 'kelas.kelas_id=detail.kelas_id', 'left');
		$this->db->join('guru', 'guru.guru_id=detail.guru_id', 'left');
		$this->db->join('jurusan', 'jurusan.jurusan_id=detail.jurusan_id', 'left');
		$this->db->where('detail.guru_id', $id);
		$this->db->where('status', 2);
		$this->db->order_by('detail.create_time', 'DESC');
		return $this->db->get()->result();
	}


	public function getPengajuanSurat($nip, $limit = null)
	{
		$this->db->select("
			penerima.id as idPen,
			penerima.guru_nip as nip,
			penerima.status,
			surat.surat_id as id,
			surat.hari,
			surat.tanggal,
			surat.jenis, 
			surat.file_surat as file,
			surat.file_type as type,
			surat.siswa_nis as nis,
			siswa.siswa_nama as nama,
			kelas.nama_kelas as kelas
		");
		$this->db->from('pengajuansurat as surat');
		$this->db->join('penerimasurat as penerima', 'penerima.surat_id=surat.surat_id');
		$this->db->join('siswa', 'siswa.siswa_nis=surat.siswa_nis');
		$this->db->join('kelas', 'kelas.kelas_id=siswa.kelas_id');
		$this->db->where('penerima.guru_nip', $nip);
		$this->db->order_by('tanggal', 'DESC');
		if($limit) {
			$this->db->limit($limit);
		}
		return $this->db->get()->result();
	}

	public function get_wali_kelas($where)
	{
		$this->db->select('guru.guru_kode, guru.guru_nama, kelas.kelas_id, kelas.kode_kelas, kelas.nama_kelas, kelas.create_time, kelas.update_time');
		$this->db->from('kelas');
		$this->db->join('guru', 'guru.guru_kode=kelas.guru_kode');
		$this->db->where('kelas.guru_kode', $where);
		$query = $this->db->get();
		return $query->row();
	}
}
