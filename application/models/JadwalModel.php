<?php

class JadwalModel extends CI_Model
{
	protected $table = "jadwal";

	public function getJadwal()
	{
		$select = "
			kelas.nama_kelas, mapel.nama_mapel, guru.guru_nama, guru.guru_kode, 
			guru.guru_foto, ruangan.kode_ruang, ruangan.nama_ruang,
			jadwal.jadwal_id, jadwal.kode_jadwal, jadwal.hari, jadwal.jumlah_jam,
			jadwal.jam_masuk, jadwal.jam_keluar, jadwal.create_time, jadwal.update_time
		";
		$query = $this->db->select($select)
			->from($this->table)
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id', 'left')
			->join('guru', 'guru.guru_kode=jadwal.guru_kode', 'left')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left')
			->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left')
			->order_by('create_time', 'DESC')
			->get();
		return $query;
	}

	public function getJadwalHariIni($params = null)
	{
		$select = "
			kelas.kelas_id, kelas.nama_kelas, mapel.mapel_id, mapel.nama_mapel, guru.guru_nama, guru.guru_kode, 
			guru.guru_foto, ruangan.ruang_id, ruangan.kode_ruang, ruangan.nama_ruang,
			jadwal.jadwal_id, jadwal.kode_jadwal, jadwal.hari, jadwal.jumlah_jam,
			jadwal.jam_masuk, jadwal.jam_keluar, jadwal.create_time, jadwal.update_time
		";
		$query = $this->db->select($select)
			->from($this->table)
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id', 'left')
			->join('guru', 'guru.guru_kode=jadwal.guru_kode', 'left')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left')
			->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left')
			->where($params)
			->get();
		return $query;
	}

	public function generateKodeJadwal()
	{
		$this->db->select('RIGHT(kode_jadwal,4) as kode', false);
		$this->db->order_by("kode", "DESC");
		$this->db->limit(1);
		$query = $this->db->get('jadwal');
		// CEK JIKA DATA ADA
		if ($query->num_rows() <> 0) {
			$data       = $query->row(); // ambil satu baris data
			$kodeJadwal  = intval($data->kode) + 1; // tambah 1
		} else {
			$kodeJadwal  = 1; // isi dengan 1
		}

		$lastKode = str_pad($kodeJadwal, 4, "0", STR_PAD_LEFT);
		$tahun    = date("Y");
		$SMK      = "SMK";

		$newKode = $SMK . "-" . $tahun . "-" . $lastKode;
		return $newKode;
	}

	public function get_jurnal($limit = null)
	{
		$select = "
			jadwal.kode_jadwal, jadwal.hari,jurnal.jurnal_id, 
			jurnal.tanggal, jurnal.pert_ke, jurnal.pembahasan, jurnal.status,
			jurnal.catatan_kbm, guru.guru_kode, mapel.nama_mapel, kelas.nama_kelas
		";
		$this->db->select($select);
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('guru', 'guru.guru_kode=jadwal.guru_kode');
		$this->db->join('kelas', 'kelas.kelas_id=jadwal.kelas_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->order_by('jurnal.tanggal', 'DESC');
		$this->db->limit($limit);
		$result = $this->db->get();
		return $result->result();
	}

	public function getJurnalWhere(array $params)
	{
		$select = "jadwal.hari, jadwal.jam_masuk, jadwal.jam_keluar, 
		jurnal.jurnal_id, jurnal.tanggal, jurnal.pert_ke, jurnal.kd_materi, jurnal.absen_mulai,
		jurnal.jumlah_siswa, jurnal.jumlah_hadir, jurnal.jumlah_alpha, jurnal.jumlah_izin, 
		jurnal.jumlah_sakit, jurnal.pembahasan, jurnal.status, jurnal.catatan_kbm, 
		guru.guru_kode, mapel.nama_mapel, kelas.nama_kelas, ruangan.kode_ruang
		";

		$query = $this->db->select($select)->from('jurnal')
			->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id')
			->join('guru', 'guru.guru_kode=jadwal.guru_kode')
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id')
			->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id')
			->where($params)
			->get();
		$result = $query->row();
		return $result;
	}

	public function getJadwalGuru($kodeGuru)
	{
		$select = "jadwal.kode_jadwal, jadwal.jumlah_jam, jadwal.kelas_id, jadwal.mapel_id,
		mapel.nama_mapel, kelas.nama_kelas, guru.guru_kode";
		$query = $this->db->select($select)
			->from('jadwal')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id')
			->join('kelas', 'kelas.kelas_id=jadwal.kelas_id')
			->join('guru', 'guru.guru_kode=jadwal.guru_kode')
			->where('jadwal.guru_kode', $kodeGuru)
			->group_by('mapel.nama_mapel')
			->get();
		$result = $query->result();
		return $result;
	}

	public function getKelasJadwal($mapel)
	{
		$select = "jadwal.jumlah_jam, jadwal.mapel_id, jadwal.kelas_id, kelas.nama_kelas";
		$query = $this->db->select($select)
			->from('kelas')
			->join('jadwal', 'jadwal.kelas_id=kelas.kelas_id')
			->where('mapel_id', $mapel)
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

	public function activate_tahunajar(int $id, int $active)
	{
		$this->db->set('status', $active);
		$this->db->where('thnakd_id', $id);
		$this->db->update('tahun_akademik');
		return true;
	}

	public function get_activate_tahunajar()
	{
		$query = $this->db->get_where('tahun_akademik', ['status' => 1])->row_array();
		$result = $query;
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
}
