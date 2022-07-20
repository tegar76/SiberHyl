	<div class="page-wrapper">
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="page-breadcrumb">
			<div class="row">
				<div class="col-7 align-self-center">
					<h3 class="page-title"><?= $title ?></h3>
				</div>
			</div>
			<div class="d-flex align-items-center">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb m-0 p-0">
						<li class="breadcrumb-item text-muted active">Pembelajaran</li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran') ?>" class="text-muted">Mengajar</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/absensi/' . $jurnal->jadwal_id) ?>" class="text-muted">Absensi</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/detail_absensi/' . $jurnal->jurnal_id) ?>" class="text-muted">Detail Absensi</a></li>
						<li class="breadcrumb-item text-muted active" aria-current="page"><?= $title ?></li>
					</ol>
				</nav>
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
			<!-- *************************************************************** -->
			<!-- End Location and Earnings Charts Section -->
			<!-- *************************************************************** -->
			<!-- *************************************************************** -->
			<!-- Start Top Leader Table -->
			<!-- *************************************************************** -->

			<div class="row">
				<div class="col-12">
					<div class="activity">
						<?= form_open('guru/pembelajaran/set_waktu_absensi/' . $jurnal->jurnal_id) ?>
						<input type="hidden" name="jurnal_id" value="<?= $jurnal->jurnal_id ?>">
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="absen_masuk">Dibuka</label>
								<div class="input-group mb-3">
									<input type="text" name="absen_masuk" id="absen_masuk" class="form-control <?= (form_error('absen_masuk')) ? 'is-invalid' : '' ?>">
									<div id="absen_masukFeedback" class="invalid-feedback">
										<?= form_error('absen_masuk', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="absen_selesai">Ditutup</label>
								<div class="input-group mb-3">
									<input type="text" name="absen_selesai" id="absen_selesai" class="form-control <?= (form_error('absen_selesai')) ? 'is-invalid' : '' ?>">
									<div id="absen_selesaiFeedback" class="invalid-feedback">
										<?= form_error('absen_selesai', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="btn-aksi mt-4 mb-2">
									<button type="submit" class="btn btn-sm btn-success border-0 rounded px-4 py-2 mr-3">Update</button>
									<button type="reset" class="btn btn-sm btn-secondary border-0 rounded px-4 py-2">Reset</button>
								</div>
							</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>
				<!-- *************************************************************** -->
				<!-- End Top Leader Table -->
				<!-- *************************************************************** -->
			</div>

			<script>
				$(document).ready(function() {
					jQuery.datetimepicker.setLocale("id");
					$("#absen_masuk").datetimepicker({
						timepicker: true,
						datepicker: false,
						format: "H:i",
						value: "<?= date('H:i', strtotime($jurnal->absen_mulai)) ?>",
						hours12: false,
						step: 5,
						lang: "id",
					});

					$("#absen_selesai").datetimepicker({
						timepicker: true,
						datepicker: false,
						format: "H:i",
						value: "<?= date('H:i', strtotime($jurnal->absen_selesai)) ?>",
						hours12: false,
						step: 5,
						lang: "id",
					});
				});
			</script>
