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
			->join('guru', 'guru.guru_nip=jadwal.guru_nip', 'left')
			->join('mapel', 'mapel.mapel_id=jadwal.mapel_id', 'left')
			->join('ruangan', 'ruangan.ruang_id=jadwal.ruang_id', 'left')
			->order_by('create_time', 'DESC')
			->get();
		return $query;
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
