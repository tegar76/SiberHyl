<?php

class SiswaModel extends CI_Model
{
	protected $table = "siswa";
	const SESSION_KEY = "nis";

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
		$query	= $this->db->select('*')
			->from('siswa as siswa')
			->join('kelas as kelas', 'siswa.kelas_id=kelas.kelas_id')
			->join('jurusan', 'jurusan.kode_jurusan=kelas.kode_jurusan')
			->where($params)
			->order_by('siswa_nama', 'ASC')
			->get();
		$row = $query->num_rows();
		if ($row > 1) {
			return $query->result();
		} else {
			return $query->row();
		}
	}

	public function updateWhere($update = null, string $where = null)
	{
		if ($update == null && $where == null) {
			return false;
		}

		$this->db->set($update)
			->where('siswa_nis', $where)
			->update($this->table);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->table, ['siswa_nis' => $user_id]);
		return $query->row();
	}


	/*	
		fungsi untuk mengecek apakah sudah ada direktori siswa pada direktori storage,
		jika belum ada maka akan dibuatkan terlebih dahulu
	*/
	public function check_storage_siswa($dir)
	{
		if (!is_dir('storage')) :
			mkdir('./storage', 0777, true);
		endif;

		$dir_exist = true;
		if (!is_dir('storage/siswa')) :
			mkdir('./storage/siswa', 0777, true);
			$dir_exist = false; // dir not exist
		endif;

		if (!is_dir('storage/siswa/' . $dir)) :
			mkdir('./storage/siswa/' . $dir, 0777, true);
			$dir_exist = false; // dir not exist
		endif;

		return $dir_exist;
	}

	public function compreesImage($dirName, $fileName, $resolution)
	{
		$this->load->library('image_lib');
		$config['image_library'] = 'gd2';
		$config['source_image'] = './storage/siswa/' . $dirName . '/' . $fileName;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']     = $resolution['width'];
		$config['height']   = $resolution['height'];

		$this->image_lib->clear();
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}

	public function infoMulaiAbsensi($where)
	{
		$this->db->select("
			jurnal.jurnal_id,
			jurnal.tanggal,
			jurnal.pertemuan,
			jurnal.absen_mulai,
			jurnal.absen_selesai,
			jurnal.status,
			jadwal.jadwal_id,
			jadwal.hari,
			mapel.mapel_id,
			mapel.nama_mapel
		");
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->where($where);
		$this->db->order_by('jurnal.tanggal', 'DESC');
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	public function get_absen_siswa($where)
	{
		$this->db->where($where);
		$this->db->limit(1);
		return $this->db->get('absensi')->row();
	}

	public function check_absensi($id)
	{
		$this->db->select("jurnal_id, tanggal, pertemuan, absen_mulai, absen_selesai");
		$this->db->from('jurnal');
		$this->db->where('jurnal_id', $id);
		return $this->db->get()->row();
	}

	public function check_absensi_siswa($nis, $jurnal)
	{
		$this->db->where('siswa_nis', $nis);
		$this->db->where('jurnal_id', $jurnal);
		$this->db->limit(1);
		return $this->db->get('absensi')->num_rows();
	}

	public function process_absensi($metode_absen, $nis)
	{
		$jurnal_id = $this->input->post('jurnal_id', true);
		if ($metode_absen == 'offline') {
			$set_absen = array(
				'tanggal_absen' => date('Y-m-d'),
				'metode_absen' => 'offline',
				'status' => 'H',
				'bukti_absen' => null,
				'siswa_nis' => $nis,
				'jurnal_id' => $jurnal_id
			);
			$this->db->insert('absensi', $set_absen);
		} elseif ($metode_absen == 'online') {
			if ($_FILES['bukti_absen']['name']) {
				$conf['upload_path']   = './storage/siswa/absensi';
				$conf['allowed_types'] = 'gif|jpg|png|jpeg';
				$conf['max_size']      = 2000;
				$conf['overwrite']     = true;
				$conf['encrypt_name'] = true;
				$this->load->library('upload', $conf);
				$this->check_storage_siswa('absensi');
				if (!$this->upload->do_upload('bukti_absen')) {
					if (!$this->check_storage_siswa('absensi')) {
						rmdir('/storage/siswa/absensi');
					}
				} else {
					$dataUpload = $this->upload->data();
					$resolution = ['width' => 500, 'height' => 500];
					$this->compreesImage('absensi', $dataUpload['file_name'], $resolution);
					$buktiAbsen = $this->upload->data('file_name');
					$this->db->set('bukti_absen', $buktiAbsen);
				}
			}
			$set_absen = array(
				'tanggal_absen' => date('Y-m-d'),
				'metode_absen' => 'online',
				'status' => 'H',
				'siswa_nis' => $nis,
				'jurnal_id' => $jurnal_id
			);
			$this->db->set($set_absen);
			$this->db->insert('absensi');
		}
	}

	public function get_riwayat_jurnal($jadwalID)
	{
		$this->db->select("
			jadwal.jadwal_id,
			mapel.nama_mapel,
			jurnal.jurnal_id,
			jurnal.tanggal,
			jurnal.pertemuan,
			jurnal.pembahasan
		");
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->order_by('jurnal.pertemuan', 'ASC');
		$this->db->where('jurnal.jadwal_id', $jadwalID);
		return $this->db->get()->result();
	}

	public function riwayatAbsensi($nis, $jurnal_id)
	{
		$this->db->where('siswa_nis', $nis);
		$this->db->where('jurnal_id', $jurnal_id);
		$this->db->limit(1);
		return $this->db->get('absensi')->row();
	}

	public function get_jadwal_mapel($id)
	{
		$this->db->select("
			guru.guru_kode,
			guru.guru_nip,
			guru.guru_nama,
			kelas.nama_kelas,
			mapel.nama_mapel,
			jadwal.jadwal_id
		");
		$this->db->from("jadwal");
		$this->db->join("guru", "guru.guru_nip=jadwal.guru_nip");
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->where('jadwal_id', $id);
		return $this->db->get()->row();
	}

	public function print_riwayat_absen($jadwalID, $nis, $pert_awal, $pert_akhir)
	{
		$select = "jurnal.jurnal_id, jurnal.pertemuan, jurnal.jadwal_id,
		absensi.status, absensi.siswa_nis";

		$query = $this->db->select($select)
			->from('absensi')->join('jurnal', 'jurnal.jurnal_id=absensi.jurnal_id')
			->where('jadwal_id', $jadwalID)
			->where('siswa_nis', $nis)
			->where('pertemuan >=', $pert_awal)
			->where('pertemuan <=', $pert_akhir)
			->get();
		$result = $query->result();
		return $result;
	}

	public function get_tugas_harian($id_jadwal)
	{
		$this->db->where('jadwal_id', $id_jadwal);
		$this->db->order_by('create_time', 'DESC');
		$query	= $this->db->get('tugasharian');
		return $query->result();
	}

	public function get_tugas_siswa($nis, $id)
	{
		$this->db->where('siswa_nis', $nis);
		$this->db->where('tugas_id', $id);
		$query	= $this->db->get('tugassiswa');
		return $query->row();
	}

	public function get_result_tugas($id)
	{
		$this->db->select('tugas.tugas_id, tugas.pertemuan, tugas.judul_tugas, tugas.deadline, mapel.nama_mapel');
		$this->db->from('tugasharian as tugas');
		$this->db->where('tugas.jadwal_id', $id);
		$this->db->join('jadwal', 'jadwal.jadwal_id=tugas.jadwal_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_info_tugas($id)
	{
		$this->db->select("
			tugas.tugas_id,
			tugas.pertemuan,
			tugas.judul_tugas,
			jadwal.jadwal_id,
			mapel.nama_mapel
		");
		$this->db->from('tugasharian as tugas');
		$this->db->join('jadwal', 'jadwal.jadwal_id=tugas.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->where('tugas.tugas_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function process_assignment()
	{
		if ($_FILES['file_tugas']['name']) :
			$conf['upload_path']   = './storage/siswa/tugas_harian/';
			$conf['allowed_types'] = 'pdf|jpg|png|jpeg';
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
			$this->check_storage_siswa('tugas_harian');
			if (!$this->upload->do_upload('file_tugas')) {
				if (!$this->check_storage_siswa('tugas_harian')) {
					rmdir('/storage/siswa/tugas_harian');
				}
				$result = array(
					'status' => false,
					'errors' => $this->upload->display_errors('<span>', '</span>')
				);
			} else {
				$upload = $this->upload->data();
				if ($upload['file_ext'] == '.pdf') {
					$file_ = array(
						'file_tugas_siswa' => $upload['file_name'],
						'file_type' => $upload['file_ext'],
						'file_size' => $upload['file_size']
					);
					$this->db->set($file_);
				} else {
					$resolution = ['width' => 500, 'height' => 500];
					$this->compreesImage('tugas_harian', $upload['file_name'], $resolution);
					$file_ = array(
						'file_tugas_siswa' => $upload['file_name'],
						'file_type' => $upload['file_ext'],
						'file_size' => $upload['file_size']
					);
					$this->db->set($file_);
				}
				$desc = array(
					'time_upload' => date('Y-m-d H:i:s'),
					'metode' => 'online',
					'status' => 1,
					'siswa_nis' => $this->input->post('nis', true),
					'tugas_id' => $this->input->post('tugas_id', true)
				);
				$this->db->set($desc);
				$this->db->insert('tugassiswa');
			}
			$result = array(
				'status' => true,
				'errors' => ''
			);
		endif;
		return $result;
	}

	public function get_update_tugas($id)
	{
		$this->db->select("
			tugas.tugas_id,
			tugas.pertemuan,
			tugas.judul_tugas,
			jadwal.jadwal_id,
			mapel.nama_mapel,
			tugassiswa.tugas_siswa_id,
			tugassiswa.file_tugas_siswa
		");
		$this->db->from('tugassiswa');
		$this->db->join('tugasharian as tugas', 'tugas.tugas_id=tugassiswa.tugas_id');
		$this->db->join('jadwal', 'jadwal.jadwal_id=tugas.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->where('tugas_siswa_id', $id);
		return $this->db->get()->row();
	}

	public function update_assignment()
	{
		$tugasSiswa = $this->get_update_tugas($this->input->post('tugas_siswa_id', true));
		$fileTugas = $tugasSiswa->file_tugas_siswa;
		if ($_FILES['update_tugas']['name']) {
			$conf['upload_path']   = './storage/siswa/tugas_harian';
			$conf['allowed_types'] = 'pdf|jpg|png|jpeg';
			$conf['max_size']      = 2000;
			$conf['overwrite']     = TRUE;
			$conf['encrypt_name'] = TRUE;
			$this->load->library('upload', $conf);
			$this->upload->initialize($conf);
			$_FILES['file']['name']		= $_FILES['update_tugas']['name'];
			$_FILES['file']['type'] 	= $_FILES['update_tugas']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['update_tugas']['tmp_name'];
			$_FILES['file']['error'] 	= $_FILES['update_tugas']['error'];
			$_FILES['file']['size'] 	= $_FILES['update_tugas']['size'];
			$this->check_storage_siswa('tugas_harian');
			if (!$this->upload->do_upload('update_tugas')) {
				if (!$this->check_storage_siswa('tugas_harian')) {
					rmdir('/storage/siswa/tugas_harian');
				}
				$result = array(
					'status' => false,
					'errors' => $this->upload->display_errors('<span>', '</span>')
				);
			} else {
				if ($fileTugas) {
					@unlink(FCPATH . './storage/siswa/tugas_harian/' . $fileTugas);
				}
				$upload = $this->upload->data();
				if ($upload['file_ext'] == '.pdf') {
					$file_ = array(
						'file_tugas_siswa' => $upload['file_name'],
						'file_type' => $upload['file_ext'],
						'file_size' => $upload['file_size']
					);
					$this->db->set($file_);
				} else {
					$resolution = ['width' => 500, 'height' => 500];
					$this->compreesImage('tugas_harian', $upload['file_name'], $resolution);
					$file_ = array(
						'file_tugas_siswa' => $upload['file_name'],
						'file_type' => $upload['file_ext'],
						'file_size' => $upload['file_size']
					);
					$this->db->set($file_);
				}
				$desc = array(
					'time_upload' => date('Y-m-d H:i:s'),
				);
				$this->db->set($desc);
				$this->db->where('tugas_siswa_id', $this->input->post('tugas_siswa_id', true));
				$this->db->update('tugassiswa');
				$result = array(
					'status' => true,
					'errors' => ''
				);
			}
		}
		return $result;
	}

	public function get_mapel($id)
	{
		$this->db->select('mapel.mapel_id, mapel.nama_mapel, jadwal.jadwal_id');
		$this->db->from('mapel');
		$this->db->join('jadwal', 'jadwal.mapel_id=mapel.mapel_id');
		$this->db->where('jadwal_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_evaluasi($jadwalId)
	{
		$query = $this->db->where('jadwal_id', $jadwalId)->order_by('evaluasi_ke')->get('evaluasi');
		return $query->result();
	}

	public function get_evaluasi_siswa($nis, $id)
	{
		$this->db->where('siswa_nis', $nis);
		$this->db->where('evaluasi_id', $id);
		$query = $this->db->get('evaluasisiswa');
		return $query->row();
	}

	public function get_info_evaluasi($id)
	{
		$this->db->select("evaluasi.evaluasi_id, evaluasi.evaluasi_ke, evaluasi.judul, jadwal.jadwal_id, mapel.nama_mapel");
		$this->db->from('evaluasi');
		$this->db->join('jadwal', 'jadwal.jadwal_id=evaluasi.jadwal_id', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->where('evaluasi.evaluasi_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function process_evaluasi()
	{
		if ($_FILES['file_evaluasi']['name']) :
			$conf['upload_path']   = './storage/siswa/evaluasi';
			$conf['allowed_types'] = 'pdf|jpg|png|jpeg';
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
			$this->check_storage_siswa('evaluasi');
			if (!$this->upload->do_upload('file_evaluasi')) {
				if (!$this->check_storage_siswa('evaluasi')) {
					rmdir('/storage/siswa/evaluasi');
				}
				$result = array(
					'status' => false,
					'errors' => $this->upload->display_errors('<span>', '</span>')
				);
			} else {
				$upload = $this->upload->data();
				if ($upload['file_ext'] == '.pdf') {
					$file_ = array(
						'file_evaluasi_siswa' => $upload['file_name'],
						'file_type' => $upload['file_ext'],
						'file_size' => $upload['file_size']
					);
					$this->db->set($file_);
				} else {
					$resolution = ['width' => 500, 'height' => 500];
					$this->compreesImage('evaluasi', $upload['file_name'], $resolution);
					$file_ = array(
						'file_evaluasi_siswa' => $upload['file_name'],
						'file_type' => $upload['file_ext'],
						'file_size' => $upload['file_size']
					);
					$this->db->set($file_);
				}
				$desc = array(
					'time_upload' => date('Y-m-d H:i:s'),
					'metode' => 'online',
					'status' => 1,
					'siswa_nis' => $this->input->post('nis', true),
					'evaluasi_id' => $this->input->post('evaluasi_id', true)
				);
				$this->db->set($desc);
				$this->db->insert('evaluasisiswa');
			}
			$result = array(
				'status' => true,
				'errors' => ''
			);
		endif;
		return $result;
	}

	public function add_forum_diskusi()
	{
		$data = array(
			'pembuat' => htmlspecialchars($this->input->post('nama_siswa', true)),
			'judul' => htmlspecialchars($this->input->post('judul_diskusi', true)),
			'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
			'jadwal_id' => htmlspecialchars($this->input->post('jadwal_id', true)),
		);
		$this->db->insert('forumdiskusi', $data);
	}

	public function pengajuanSurat($nis)
	{
		$this->db->select("st.surat_id, st.hari, st.tanggal, st.jenis, st.file_surat, sw.siswa_nama, sw.siswa_nis");
		$this->db->from('pengajuansurat as st');
		$this->db->join('siswa as sw', 'sw.siswa_nis=st.siswa_nis');
		$this->db->where('sw.siswa_nis', $nis);
		$this->db->order_by('surat_id', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function recive_surat($id)
	{
		$this->db->select("ps.surat_id, g.guru_nama, g.guru_nip");
		$this->db->from('penerimasurat as ps');
		$this->db->join('guru as g', 'g.guru_nip=ps.guru_nip');
		$this->db->where('ps.surat_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getInfoAkademik($where)
	{
		$this->db->select("*");
		$this->db->from('infoakademik');
		$this->db->join('penerimainfo', 'penerimainfo.info_id=infoakademik.info_id');
		if ($where) $this->db->where($where);
		$this->db->order_by('create_time', 'DESC');
		return $this->db->get()->result();
	}

	public function materiPembelajaranAdmin($where)
	{
		$this->db->select("
			detail.detailmateri_id as id,
			detail.index_kelas as kelas,
			detail.create_time as create,
			detail.update_time as update,
			detail.status,
			mapel.nama_mapel as mapel, 
			jurusan.kode_jurusan as jurusan,
		");
		$this->db->from('detailmateri as detail');
		$this->db->join('mapel', 'mapel.mapel_id=detail.mapel_id', 'left');
		$this->db->join('jurusan', 'jurusan.jurusan_id=detail.jurusan_id', 'left');
		$this->db->where('status', 1);
		$this->db->order_by('detail.create_time', 'DESC');
		return $this->db->get()->result();
	}

	public function getMateriAdmin($index = null, $mapel = null, $jurusan = null)
	{
		$this->db->select("
			materi.materi_id, materi.judul, materi.jenis,
			materi.file_materi as file,
			materi.file_size as size,
			materi.create_time as create,
			detail.detailmateri_id as detail_id,
		");
		$this->db->from('materipembelajaran as materi');
		$this->db->join('detailmateri as detail', 'detail.detailmateri_id=materi.detailmateri_id', 'left');
		$this->db->where('status', 1);
		if ($index) {
			$this->db->or_where('detail.index_kelas', $index);
		}
		if ($mapel) {
			$this->db->where('detail.mapel_id', $mapel);
		}
		if ($jurusan) {
			$this->db->or_where('detail.jurusan_id', $jurusan);
		}

		return $this->db->get()->result();
	}

	public function getMateriGuru($jenis, $kelas, $mapel)
	{
		$this->db->select("
			materi.materi_id, materi.judul, materi.jenis,
			materi.file_materi as file,
			materi.file_size as size,
			materi.create_time as create,
			detail.detailmateri_id as detail_id,
		");
		$this->db->from('materipembelajaran as materi');
		$this->db->join('detailmateri as detail', 'detail.detailmateri_id=materi.detailmateri_id', 'left');
		$this->db->where('jenis', $jenis);
		$this->db->where('status', 2);
		$this->db->where('kelas_id', $kelas);
		$this->db->where('mapel_id', $mapel);
		$this->db->order_by('detail.create_time', 'DESC');
		return $this->db->get()->result();
	}

	public function getWaliKelas($id)
	{
		$this->db->select("
			guru.guru_nip as nip,
			guru.guru_kode as kode,
			guru.guru_nama as wali,
			kelas.nama_kelas as kelas
		");
		$this->db->from("guru");
		$this->db->join("kelas", "kelas.guru_nip=guru.guru_nip");
		$this->db->where("kelas_id", $id);
		return $this->db->get()->row();
	}

	// Function Konsultasi
	public function getKonsultasi($id)
	{
		$this->db->where('kelas_id', $id);
		$this->db->order_by('create_time', 'DESC');
		return $this->db->get('forumdiskusi')->result();
	}

	public function getReplyForum($id)
	{
		$this->db->where('forum_id', $id);
		$this->db->order_by('create_time', 'DESC');
		$query = $this->db->get('detaildiskusi');
		return $query->result();
	}

	public function detailForum($id)
	{
		$this->db->where('forum_id', $id);
		return $this->db->get('forumdiskusi')->row();
	}

	public function addKonsultasi()
	{
		$data = array(
			'pembuat' => htmlspecialchars($this->input->post('nama_siswa', true)),
			'judul' => htmlspecialchars($this->input->post('judul', true)),
			'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
			'kelas_id' => htmlspecialchars($this->input->post('kelas_id', true)),
		);
		$this->db->insert('forumdiskusi', $data);
	}
}
