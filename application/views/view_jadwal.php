<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.min.css">

	<title>Daftar Jadwal</title>
</head>

<body>
	<div class="container">
		<div class="card mt-4">
			<div class="card-body">
				<h4 class="mb-2">Data Jadwal Pelajaran Semester Gasal Tahun Pelajaran 2021 /2022</h4>
				<?php if ($this->session->userdata('message')) : ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<strong>Berhasil</strong> <?= $this->session->userdata('message') ?>.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
				<a href="<?= base_url('Admin/Dashboard/add_jadwal') ?>" class="btn btn-sm btn-primary">tambah</a>
				<table id="table-jadwal" class="table mt-2">
					<thead>
						<tr>
							<th>No</th>
							<th>Kelas</th>
							<th>Hari</th>
							<th>Mapel</th>
							<th>Kode Guru</th>
							<th>Mulai</th>
							<th>Selesai</th>
							<th>Ruang</th>
							<th>Created</th>
							<th>Update</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						foreach ($jadwal as $row) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $row['nama_kelas'] ?></td>
								<td><?= $row['hari'] ?></td>
								<td><?= $row['nama_mapel'] ?></td>
								<td><?= $row['guru_kode'] ?></td>
								<td><?= (empty($row['jam_masuk'])) ? "--:--" : date('H:i', strtotime($row['jam_masuk'])) ?></td>
								<td><?= (empty($row['jam_keluar'])) ? "--:--" : date('H:i', strtotime($row['jam_keluar'])) ?></td>
								<td><?= $row['nama_ruang'] ?></td>
								<td><?= (empty($row['create_time'])) ? "-" : date('d-m-Y H:i:s', strtotime($row['create_time'])) ?></td>
								<td>
									<?= ($row['update_time'] == $row['create_time']) ? "-" : date('d-m-Y H:i:s', strtotime($row['update_time'])) ?>
								</td>
								<td>
									<a href="<?= base_url('Admin/Dashboard/detail_jadwal/' . $row['jadwal_id']) ?>" class="btn btn-sm btn-primary">lihat</a>
									<a href="" class="btn btn-sm btn-success">edit</a>
									<button class="btn btn-sm btn-danger hapus-jadwal" data-jadwal-id="<?= $row['jadwal_id'] ?>" title="Hapus Jadwal">Hapus</button>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>

	<script>
		$('#table-jadwal').DataTable();
		$(document).ready(function() {
			$("#table-jadwal").on('click', '.hapus-jadwal', function(e) {
				e.preventDefault();
				var jadwalID = $(e.currentTarget).attr("data-jadwal-id");
				Swal.fire({
					title: 'Hapus Jadwal?!',
					text: "Anda yakin ingin menghapus jadwal pelajaran ini!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Hapus!'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							type: "POST",
							url: '<?= base_url('Admin/Dashboard/hapusJadwal'); ?>',
							data: {
								jadwalID: jadwalID
							},
							beforeSend: function() {
								swal.fire({
									imageUrl: "<?= base_url('assets/logo/rolling.png'); ?>",
									title: "Menghapus Jadwal Pelajaran",
									text: "Silahkan Tunggu",
									showConfirmButton: false,
									allowOutsideClick: false
								});
							},
							success: function(data) {
								if (data.success == false) {
									swal.fire({
										icon: 'error',
										title: 'Menghapus Jadwal Pelajaran Gagal',
										text: data.message,
										showConfirmButton: false,
										timer: 1500
									});
								} else {
									swal.fire({
										icon: 'success',
										title: 'Menghapus Jadwal Pelajaran Berhasil',
										text: data.message,
										showConfirmButton: false,
										timer: 1500
									});
								}
								window.location = "<?= base_url('Admin/Dashboard') ?>";
							},
							error: function() {
								swal.fire("Penghapusan Jadwal Pelajaran Gagal", "Ada Kesalahan Saat menghapus Jadwal Pelajaran!", "error");
							}
						});
					}
				})
			});
		});
	</script>
</body>

</html>
