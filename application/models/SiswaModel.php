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

	public function get_mulai_absen($where)
	{
		$select = "jurnal.jurnal_id, jurnal.tanggal, jurnal.pert_ke, jurnal.jenis_kbm, jurnal.absen_mulai, jurnal.absen_selesai,
		jurnal.status, jadwal.jadwal_id, jadwal.hari, mapel.mapel_id, mapel.nama_mapel";
		$this->db->select($select);
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->where($where);
		$this->db->order_by('jurnal.tanggal', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_absen_siswa($where)
	{
		// $select = "absensi.tanggal_absen, absensi.metode_kbm, absensi.status, absensi.bukti_absen, absensi.siswa_nis";
		$this->db->where($where);
		$this->db->limit(1);
		$query = $this->db->get('absensi');
		return $query->row();
	}

	public function check_absensi($jurnalID)
	{
		$query = $this->db->select("jurnal_id, tanggal, pert_ke, jenis_kbm, absen_mulai, absen_selesai")
			->from('jurnal')
			->where('jurnal_id', $jurnalID)
			->get();
		return $query->row();
	}

	public function check_absensi_siswa($nis, $jurnal)
	{
		$query = $this->db->where('siswa_nis', $nis)
			->where('jurnal_id', $jurnal)
			->limit(1)
			->get('absensi');
		return $query->num_rows();
	}

	public function process_absensi($metode_absen, $nis)
	{
		$jurnal_id = $this->input->post('jurnal_id', true);
		if ($metode_absen == 'offline') :
			$set_absen = array(
				'tanggal_absen' => date('Y-m-d'),
				'metode_kbm' => 'offline',
				'status' => 'H',
				'bukti_absen' => null,
				'siswa_nis' => $nis,
				'jurnal_id' => $jurnal_id
			);
			$this->db->insert('absensi', $set_absen);
		elseif ($metode_absen == 'online') :
			if ($_FILES['bukti_absen']['name']) :
				$conf['upload_path']   = './storage/siswa/absensi';
				$conf['allowed_types'] = 'gif|jpg|png|jpeg';
				$conf['max_size']      = 2000;
				$conf['overwrite']     = TRUE;
				$conf['encrypt_name'] = TRUE;
				$this->load->library('upload', $conf);

				if (!is_dir('storage')) :
					mkdir('./storage', 0777, true);
				endif;

				$dir_exist = true;
				if (!is_dir('storage/siswa')) :
					mkdir('./storage/siswa', 0777, true);
					$dir_exist = false; // dir not exist
				endif;

				if (!is_dir('storage/siswa/absensi')) :
					mkdir('./storage/siswa/absensi', 0777, true);
					$dir_exist = false; // dir not exist
				endif;

				if (!$this->upload->do_upload('bukti_absen')) :
					if (!$dir_exist) :
						rmdir('/storage/siswa/absensi');
					endif;
					return $response = [
						'csrfName' => $this->security->get_csrf_token_name(),
						'csrfHash' => $this->security->get_csrf_hash(),
						'success' => false,
						'msgabsen' => 'Upload Bukti Absen Gagal',
						'errorupload' => $this->upload->display_errors('<span>', '</span>')
					];
				else :
					$dataUpload = $this->upload->data();
					$resolution = ['width' => 500, 'height' => 500];
					$this->compreesImage('absensi', $dataUpload['file_name'], $resolution);
					$buktiAbsen = $this->upload->data('file_name');
					$this->db->set('bukti_absen', $buktiAbsen);
				endif;

			endif;
			$set_absen = array(
				'tanggal_absen' => date('Y-m-d'),
				'metode_kbm' => 'offline',
				'status' => 'H',
				'siswa_nis' => $nis,
				'jurnal_id' => $jurnal_id
			);
			$this->db->set($set_absen);
			$this->db->insert('absensi');
			return $response = [
				'csrfName' => $this->security->get_csrf_token_name(),
				'csrfHash' => $this->security->get_csrf_hash(),
				'success' => true,
				'msgabsen' => 'Absensi Berhasil',
				'errorupload' => ''
			];
		endif;
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

	public function get_riwayat_jurnal($jadwalID)
	{
		$select = "jadwal.jadwal_id, mapel.nama_mapel, jurnal.jurnal_id, jurnal.tanggal, jurnal.pert_ke, jurnal.pembahasan";
		$this->db->select($select);
		$this->db->from('jurnal');
		$this->db->join('jadwal', 'jadwal.jadwal_id=jurnal.jadwal_id');
		$this->db->join('mapel', 'mapel.mapel_id=jadwal.mapel_id');
		$this->db->order_by('jurnal.pert_ke', 'ASC');
		$this->db->where('jurnal.jadwal_id', $jadwalID);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_riwayat_absen($nis, $jurnal_id)
	{
		$query = $this->db->get_where('absensi', [
			'siswa_nis' => $nis,
			'jurnal_id' => $jurnal_id
		], 1);
		$result = $query->row();
		return $result;
	}

	public function get_jadwal_mapel($jadwalID)
	{
		$query = $this->db->select("guru.guru_kode, kelas.nama_kelas, mapel.nama_mapel, jadwal.jadwal_id")
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
}
