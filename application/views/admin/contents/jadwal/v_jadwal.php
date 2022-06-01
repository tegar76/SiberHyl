<!-- Data Tables -->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/js/data-table/mainnnn.js') ?>"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url('assets/admin/css/data-table-custom/stylessss.css') ?>">
<!-- End Data Tables -->

<link rel="stylesheet" href="<?= base_url('assets/admin/css/dashboard/styles.css') ?>">

<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Jadwal</h3>
				<div class="d-flex align-items-center">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb m-0 p-0">
							<li class="breadcrumb-item"><a class="text-muted">Setting Jadwal</a></li>
							<li class="breadcrumb-item text-muted active" aria-current="page">Jadwal</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		<!-- *************************************************************** -->
		<!-- Start First Cards -->
		<!-- *************************************************************** -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h6 class="card-title">Data Jadwal Pelajaran Semester Gasal Tahun Pelajaran 2021 /2022 </h6>
						<div class="mt-4 activity">
							<table id="data_jadwal" class="table-responsive table-striped table-bordered" style="width:100%">
								<!-- pemanggilan tabel id pesan ada di assets/admin/js/data-table/main.js -->
								<thead>
									<tr>
										<th style="width:6%">No</th>
										<th style="width:9%;">Kelas</th>
										<th style="width:9%;">Hari</th>
										<th style="width:9%;">Mapel</th>
										<th style="width:7%;">Kode Guru</th>
										<th style="width:9%;">Mulai</th>
										<th style="width:9%;">Selesai</th>
										<th style="width:9%;">Ruang</th>
										<th style="width:9%;">Dibuat</th>
										<th style="width:9%;">Diubah</th>
										<th style="width:14%;">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($jadwal as $row => $value) : ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value['nama_kelas'] ?></td>
											<td><?= $value['hari'] ?></td>
											<td><?= $value['nama_mapel'] ?></td>
											<td><?= $value['guru_kode'] ?></td>
											<td><?= date('H:i', strtotime($value['jam_masuk'])) ?></td>
											<td><?= date('H:i', strtotime($value['jam_keluar'])) ?></td>
											<td><?= $value['nama_ruang'] ?></td>
											<td><?= date('d-m-Y H:i', strtotime($value['create_time'])) . " WIB" ?></td>
											<td><?= ($value['create_time'] == $value['update_time']) ? ' - ' : date('d-m-Y H:i', strtotime($value['update_time'])) . " WIB" ?></td>
											<td>
												<a href="<?= base_url('master/jadwal/detailJadwal/' . $value['kode_jadwal']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-search text-white" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>
												<a href="<?= base_url('master/jadwal/editJadwal/' . $value['kode_jadwal']) ?>" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
												<input type="hidden" class="csrf_token" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
												<a href="#" id="delete-schedule" class="btn btn-sm btn-danger delete-schedule" data-toggle="tooltip" data-placement="top" title="Hapus" kode-jadwal="<?= $value['kode_jadwal'] ?>"><i class="fa-solid fa-trash-can text-white"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="floating-container">
			<a href="<?= base_url('master/jadwal/TambahJadwal') ?>">
				<div class="floating-button">+</div>
			</a>
		</div>


		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>

	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();

			var csrfName = $(".csrf_token").attr('name');
			var csrfHash = $(".csrf_token").val();
			$("#data_jadwal").on('click', '.delete-schedule', function(e) {
				e.preventDefault();
				var kodeJadwal = $(e.currentTarget).attr('kode-jadwal');
				var dataJson = {
					[csrfName]: csrfHash,
					kodeJadwal: kodeJadwal
				}
				console.log(dataJson);
				Swal.fire({
					title: 'Hapus Jadwal Pelajaran',
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
							url: '<?= base_url('master/jadwal/hapusJadwal'); ?>',
							data: dataJson,
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
									window.location = "<?= base_url('master/jadwal') ?>";
								}
							},
							error: function() {
								swal.fire("Penghapusan Pesan Aduan Gagal", "Ada Kesalahan Saat menghapus jadwal!", "error");
							}
						});
					}
				});
			});
		});
	</script>
