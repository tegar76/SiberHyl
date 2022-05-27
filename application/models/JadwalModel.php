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

	public function insertJadwal()
	{
	}

	public function updateJadwal()
	{
	}

	public function deleteJadwal()
	{
	}
}
