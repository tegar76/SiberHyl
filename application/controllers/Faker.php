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
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
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
				'guru_kode' => $this->faker->lexify('guru-???'),
				'guru_nama' => $this->faker->name(),
				'guru_tempatlahir' => $this->faker->city(),
				'guru_tanggallahir' => $this->faker->date(),
				'guru_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
				'guru_telp' => $this->faker->phoneNumber(),
				'guru_alamat' => $this->faker->address(),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
				'role_id' => 2
			];
			// $this->db->insert('siberhyl_siswa', $data);
		}
		$this->db->insert_batch('siberhyl_guru', $guru);
		var_dump($guru);
	}

	public function tes()
	{
		echo $this->faker->randomElement([1, 5]);
	}
}
