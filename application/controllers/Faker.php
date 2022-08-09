<?php

class Faker extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->faker = Faker\Factory::create('id_ID');
	}

	public function siswa()
	{
		$count = 6;
		$siswa = array();
		for ($i = 0; $i < $count; $i++) {
			$siswa[] = [
				'siswa_nis' => $this->faker->randomNumber(5, true),
				'siswa_nisn' => $this->faker->randomNumber(8, true),
				'siswa_nama' => $this->faker->name(),
				'siswa_tempatlahir' => $this->faker->city(),
				'siswa_tanggallahir' => $this->faker->date(),
				'siswa_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
				'siswa_telp' => $this->faker->phoneNumber(),
				'siswa_email' => $this->faker->email(),
				'siswa_alamat' => $this->faker->address(),
				'kelas_id' => $this->faker->numberBetween(1, 3),
				'role_id' => 4
			];
		}
		$this->db->insert_batch('siswa', $siswa);
		var_dump($siswa);
	}

	public function guru()
	{
		$count = 3;
		$guru = array();
		for ($i = 0; $i < $count; $i++) {

			$guru[] = [
				'guru_nip' => $this->faker->nik(),
				'guru_kode' => $this->faker->lexify('??'),
				'guru_nama' => $this->faker->name(),
				'guru_tempatlahir' => $this->faker->city(),
				'guru_tanggallahir' => $this->faker->date(),
				'guru_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
				'guru_alamat' => $this->faker->address(),
				'guru_telp' => $this->faker->phoneNumber(),
				'guru_email' => $this->faker->email(),
				'guru_username' => $this->faker->userName(),
				'create_time' => date('Y-m-d H:i:s'),
				'update_time' => date('Y-m-d H:i:s'),
				'role_id' => 2
			];
			// $this->db->insert('siberhyl_siswa', $data);
		}
		$this->db->insert_batch('guru', $guru);
		var_dump($guru);
	}

	public function tes()
	{
		echo $this->faker->randomElement([1, 5]);
	}

	public function kelas()
	{
		$data = [
			[
				'kode_kelas' => 'X-MM-1',
				'nama_kelas' => 'X MM 1',
				''
			]
		];
	}

	public function role()
	{
		$data = [
			[
				'role_id' => 1,
				'role_name' => 'admin'
			],
			[
				'role_id' => 2,
				'role_name' => 'guru',
			],
			[
				'role_id' => 3,
				'role_name' => 'staff',
			],
			[
				'role_id' => 4,
				'role_name' => 'wali-kelas'
			],
			[
				'role_id' => 5,
				'role_name' => 'siswa'
			]
		];

		$this->db->insert_batch('role', $data);
		return true;
	}

	public function insert_mapel()
	{
		$mapel = [
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Pendidikan Agama dan Budi Pekerti', 'dash', true),
				'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('PPendidikan Pancasila dan Kewarganegaraan', 'dash', true),
				'nama_mapel' => 'PPendidikan Pancasila dan Kewarganegaraan'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Bahasa Indonesia', 'dash', true),
				'nama_mapel' => 'Bahasa Indonesia'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Matematika', 'dash', true),
				'nama_mapel' => 'Matematika'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Sejarah Indonesia', 'dash', true),
				'nama_mapel' => 'Sejarah Indonesia'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Bahasa Inggris', 'dash', true),
				'nama_mapel' => 'Bahasa Inggris'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Seni Budaya', 'dash', true),
				'nama_mapel' => 'Seni Budaya'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Pendidikan Jasmani, Olahraga, dan Kesehatan', 'dash', true),
				'nama_mapel' => 'Pendidikan Jasmani, Olahraga, dan Kesehatan'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Kimia', 'dash', true),
				'nama_mapel' => 'Kimia'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Fisika', 'dash', true),
				'nama_mapel' => 'Fisika'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Simulasi dan Komunikasi Digital', 'dash', true),
				'nama_mapel' => 'Simulasi dan Komunikasi Digital'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Dasar Desain Grafis', 'dash', true),
				'nama_mapel' => 'Dasar Desain Grafis'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Teknik Animasi 2D dan 3D ', 'dash', true),
				'nama_mapel' => 'Teknik Animasi 2D dan 3D '
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Pemeliharaan Sasis dan Pemindah Tenaga Kendaraan Ringan', 'dash', true),
				'nama_mapel' => 'Pemeliharaan Sasis dan Pemindah Tenaga Kendaraan Ringan'
			],
			[
				'kode_mapel' => strtoupper($this->faker->lexify('??')),
				'slug_mapel' => url_title('Teknologi Dasar Otomotif', 'dash', true),
				'nama_mapel' => 'Teknologi Dasar Otomotif'
			],
		];
		$this->db->insert_batch('mapel', $mapel);
		var_dump($mapel);
	}


	public function insert_guru()
	{
		$count = 5;
		$guru = array();
		for ($i = 0; $i < $count; $i++) {
			$guru_nip = $this->faker->nik();
			$guru_kode = strtoupper($this->faker->lexify('??'));
			$guru_nama = $this->faker->name();
			$tempatlahir = $this->faker->city();
			$tanggallahir = $this->faker->date();
			$kelamin = $this->faker->randomElement(['laki-laki', 'perempuan']);
			$alamat = $this->faker->address();
			$phone = $this->faker->phoneNumber();
			$email = $this->faker->freeEmail();
			$username = $guru_kode . substr($guru_nip, 0, 4);
			$guru[] = [
				'guru_nip' => $guru_nip,
				'guru_kode' => $guru_kode,
				'guru_nama' => $guru_nama,
				'guru_tempatlahir' => $tempatlahir,
				'guru_tanggallahir' => $tanggallahir,
				'guru_kelamin' => $kelamin,
				'guru_alamat' => $alamat,
				'guru_telp' => $phone,
				'guru_email' => $email,
				'guru_username' => $username,
				'role_id' => 2
			];
		}
		$this->db->insert_batch('guru', $guru);
		var_dump($guru);
	}

	public function insert_admin()
	{
		$guru = [
			'guru_nip' => $this->faker->nik(),
			'guru_kode' => strtoupper($this->faker->lexify('???')),
			'guru_nama' => $this->faker->name(),
			'guru_tempatlahir' => $this->faker->city(),
			'guru_tanggallahir' => $this->faker->date(),
			'guru_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
			'guru_alamat' => $this->faker->address(),
			'guru_telp' => $this->faker->phoneNumber(),
			'guru_email' => $this->faker->email(),
			'guru_username' => $this->faker->userName(),
			'guru_pass' => '$2y$10$XUjvRu7qOWGAodNjfmgizeyns0e7T7ajDUHtlJ1Nw.VmFPw4aD/1q',
			'role_id' => 1
		];
		$this->db->insert('guru', $guru);
		var_dump($guru);
	}

	public function insert_siswa($idkelas, $jumlahsiswa)
	{
		$count = $jumlahsiswa;
		$siswa = array();
		for ($i = 0; $i < $count; $i++) {
			$siswa[] = [
				'siswa_nis' => $this->faker->randomNumber(5, true),
				'siswa_nisn' => $this->faker->randomNumber(8, true),
				'siswa_nama' => $this->faker->name(),
				'siswa_tempatlahir' => $this->faker->city(),
				'siswa_tanggallahir' => $this->faker->date(),
				'siswa_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
				'siswa_telp' => $this->faker->phoneNumber(),
				'siswa_email' => $this->faker->email(),
				'siswa_alamat' => $this->faker->address(),
				'kelas_id' => $idkelas,
			];
		}
		$this->db->insert_batch('siswa', $siswa);
		var_dump($siswa);
	}
}
