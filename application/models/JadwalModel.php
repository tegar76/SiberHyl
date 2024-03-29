<?php

class JadwalModel extends CI_Model
{
	protected $table = "jadwal";

	public function getJadwal()
	{
		$select = "
			kelas.nama_kelas, 
			mapel.nama_mapel, 
			guru.guru_nip, guru.guru_nama, guru.guru_kode, guru.profile, 
			ruangan.kode_ruang,
			jadwal.jadwal_id, jadwal.hari, jadwal.jumlah_jam, 
			jadwal.jam_masuk, jadwal.jam_keluar, jadwal.create_time, jadwal.update_time
		";
		$query = $this->db->select($select)
			->from($this->table)
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id', 'left')
			->join('guru', 'guru.guru_nip=jadwal.guru_nip', 'left')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left')
			->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left')
			->order_by('create_time', 'DESC')
			->get();
		return $query;
	}

	public function getJadwalHariIni($params = null)
	{
		$select = "
			kelas.kelas_id, kelas.nama_kelas,
			mapel.mapel_id, mapel.nama_mapel, 
			guru.guru_nip, guru.guru_nama, guru.guru_kode, guru.profile,
			ruangan.ruang_id, ruangan.kode_ruang,
			jadwal.jadwal_id, jadwal.hari, jadwal.jumlah_jam,
			jadwal.jam_masuk, jadwal.jam_keluar, jadwal.create_time, jadwal.update_time
		";
		$query = $this->db->select($select)
			->from($this->table)
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id', 'left')
			->join('guru', 'guru.guru_nip=jadwal.guru_nip', 'left')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left')
			->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left')
			->where($params)
			->get();
		return $query;
	}

	// public function generateKodeJadwal()
	// {
	// 	$this->db->select('RIGHT(kode_jadwal,4) as kode', false);
	// 	$this->db->order_by("kode", "DESC");
	// 	$this->db->limit(1);
	// 	$query = $this->db->get('jadwal');
	// 	// CEK JIKA DATA ADA
	// 	if ($query->num_rows() <> 0) {
	// 		$data       = $query->row(); // ambil satu baris data
	// 		$kodeJadwal  = intval($data->kode) + 1; // tambah 1
	// 	} else {
	// 		$kodeJadwal  = 1; // isi dengan 1
	// 	}

	// 	$lastKode = str_pad($kodeJadwal, 4, "0", STR_PAD_LEFT);
	// 	$tahun    = date("Y");
	// 	$SMK      = "SMK";

	// 	$newKode = $SMK . "-" . $tahun . "-" . $lastKode;
	// 	return $newKode;
	// }

	public function update_jadwal()
	{
		$update = [
			'hari' => $this->input->post('hari_edit', true),
			'jumlah_jam' => $this->input->post('jam_mengajar_edit', true),
			'jam_masuk' => $this->input->post('jam_masuk_edit', true),
			'jam_keluar' => $this->input->post('jam_keluar_edit', true),
			'update_time' => date('Y-m-d H:i:s'),
			'mapel_id' => $this->input->post('mapel_edit', true),
			'kelas_id' => $this->input->post('kelas_edit', true),
			'guru_nip' => $this->input->post('guru_edit', true),
			'ruang_id' => $this->input->post('ruangan_edit', true)
		];
		$this->db->set($update);
		$this->db->where('jadwal_id', $this->input->post('jadwal_id', true));
		$this->db->update('jadwal');
	}

	public function get_jurnal($where = null, $limit = null)
	{
		$select = "
			jadwal.hari,jurnal.jurnal_id, 
			jurnal.tanggal, jurnal.pertemuan, jurnal.pembahasan, jurnal.status,
			jurnal.catatan_kbm, guru.guru_kode, mapel.nama_mapel, kelas.nama_kelas, kelas.kode_kelas
		";
		$this->db->select($select);
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('guru', 'guru.guru_nip=jadwal.guru_nip');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		if ($where) {
			$this->db->where($where);
		}
		$this->db->order_by('jurnal.tanggal', 'DESC');
		$this->db->limit($limit);
		$result = $this->db->get();
		return $result->result();
	}

	public function getJurnalWhere(array $params)
	{
		$select = "jadwal.jadwal_id, jadwal.hari, jadwal.jam_masuk, jadwal.jam_keluar, 
		jurnal.jurnal_id, jurnal.tanggal, jurnal., jurnal.kd_materi, jurnal.absen_mulai, jurnal.absen_selesai,
		jurnal.jumlah_siswa, jurnal.jumlah_hadir, jurnal.jumlah_alpha, jurnal.jumlah_izin, 
		jurnal.jumlah_sakit, jurnal.pembahasan, jurnal.status, jurnal.catatan_kbm, 
		guru.guru_kode, mapel.nama_mapel, kelas.kelas_id, kelas.nama_kelas, ruangan.kode_ruang, ruangan.nama_ruang
		";

		$query = $this->db->select($select)->from('jurnal')
			->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id', 'left')
			->join('guru', 'guru.guru_nip=jadwal.guru_nip', 'left')
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id', 'left')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left')
			->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left')
			->where($params)
			->get();
		$result = $query->row();
		return $result;
	}

	public function getJadwalGuru($nip)
	{
		$select = "jadwal.jadwal_id, jadwal.jumlah_jam, jadwal.kelas_id, jadwal.mapel_id,
		mapel.nama_mapel, kelas.nama_kelas, guru.guru_nip, guru.guru_kode, guru.guru_nama";
		$query = $this->db->select($select)
			->from('jadwal')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id')
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id')
			->join('guru', 'guru.guru_nip=jadwal.guru_nip')
			->where('jadwal.guru_nip', $nip)
			->group_by('mapel.nama_mapel')
			->get();
		$result = $query->result();
		return $result;
	}

	public function getKelasJadwal($mapel, $guru)
	{
		$query = $this->db->select("jadwal.jumlah_jam, jadwal.mapel_id, jadwal.kelas_id, kelas.nama_kelas")
			->from('kelas')
			->join('jadwal', 'jadwal.kelas_id=kelas.kelas_id')
			->where('mapel_id', $mapel)
			->where('jadwal.guru_nip', $guru)
			->group_by('nama_kelas')
			->get();
		$result = $query->result();
		return $result;
	}

	public function get_tahun_akademik()
	{
		$query	= $this->db->order_by('create_time', 'DESC')->get('tahun_akademik');
		$result = $query->result();
		return $result;
	}



	public function get_info_akademik()
	{
		$this->db->select("*");
		$this->db->from('info_akademik');
		$this->db->join('infoakd_kelas', 'infoakd_kelas.infoakd_id=info_akademik.infoakd_id');
		$this->db->order_by('info_akademik.create_time', 'DESC');
		$this->db->group_by('infoakd_kelas.infoakd_id');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function get_infolimit($limit)
	{
		$this->db->select("*");
		$this->db->from('info_akademik');
		$this->db->join('infoakd_kelas', 'infoakd_kelas.infoakd_id=info_akademik.infoakd_id');
		$this->db->order_by('info_akademik.create_time', 'DESC');
		$this->db->limit($limit);
		$this->db->group_by('infoakd_kelas.infoakd_id');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}

	public function get_info_akademik_detail($params)
	{
		$this->db->select("*");
		$this->db->from('info_akademik');
		$this->db->join('infoakd_kelas', 'infoakd_kelas.infoakd_id=info_akademik.infoakd_id');
		$this->db->where('info_akademik.infoakd_id', $params);
		$this->db->group_by('infoakd_kelas.infoakd_id');
		$query = $this->db->get();
		$result = $query->row();
		return $result;
	}

	public function get_info_akademik_kelas($where)
	{
		$query = $this->db->select("
		kelas.nama_kelas, infoakd_kelas.index_kelas, infoakd_kelas.kode_jurusan, infoakd_kelas.kelas_id
		")->from('infoakd_kelas')
			->join('kelas', 'kelas.kelas_id=infoakd_kelas.kelas_id', 'left')
			->where('infoakd_id', $where)
			->order_by('nama_kelas', 'ASC')
			->get();
		$result = $query->result();
		return $result;
	}

	public function get_absen_siswa($id, $status)
	{
		$this->db->where('jurnal_id', $id);
		$this->db->where('status', $status);
		$query = $this->db->get('absensi');
		return $query->num_rows();
	}

	public function get_new_info()
	{
		$query = "SELECT judul_info, max(create_time) as date FROM info_akademik";
		return $result = $this->db->query($query);
	}

	public function get_jurnal_materi($id)
	{
		$this->db->select("jadwal.jadwal_id, jadwal.hari, mapel.nama_mapel, kelas.nama_kelas, jurnal.tanggal, jurnal.kd_materi, jurnal.pert_ke, jurnal.pembahasan, jurnal.jurnal_id");
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->where('jadwal.kelas_id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function getSearchJadwal($kelas, $params)
	{
		$this->db->select("
			kelas.kelas_id, kelas.nama_kelas,
			mapel.mapel_id, mapel.nama_mapel, 
			guru.guru_nip, guru.guru_nama, guru.guru_kode, guru.profile,
			ruangan.ruang_id, ruangan.kode_ruang,
			jadwal.jadwal_id, jadwal.hari, jadwal.jumlah_jam,
			jadwal.jam_masuk, jadwal.jam_keluar, jadwal.create_time, jadwal.update_time
		");
		$this->db->from('jadwal');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id', 'left');
		$this->db->join('guru', 'guru.guru_nip=jadwal.guru_nip', 'left');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left');
		$this->db->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left');
		$this->db->like($params);
		$this->db->where('jadwal.kelas_id', $kelas);
		return $this->db->get();
	}
}
