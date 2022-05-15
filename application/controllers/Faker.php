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
		$count = 4;
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
				'siswa_alamat' => $this->faker->address(),
				'create_time' => date('Y-m-d H:i:s'),
				'update_time' => date('Y-m-d H:i:s'),
				'kelas_id' => $this->faker->numberBetween(1, 2),
				'jurusan_id' => $this->faker->randomElement([1, 5]),
				'role_id' => 4
			];
			// $this->db->insert('siberhyl_siswa', $data);
		}
		$this->db->insert_batch('siberhyl_siswa', $siswa);
		var_dump($siswa);
	}

	public function guru()
	{
		$count = 3;
		$guru = array();
		for ($i = 0; $i < $count; $i++) {
			$guru[] = [
				'guru_nip' => $this->faker->nik(),
				'guru_kode' => $this->faker->lexify('G-??'),
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
}
