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
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/mengajar') ?>" class="text-muted">Mengajar</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/tugas_harian/' . $tugas->jadwal_id) ?>" class="text-muted">Tugas Harian</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/detail_tugas_harian/' . $tugas->tugas_id) ?>" class="text-muted">Detail Tugas Harian</a></li>
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
						<?= form_open('guru/pembelajaran/set_deadline_tugas/' . $tugas->tugas_id) ?>\
						<input type="hidden" name="tugas_id" value="<?= $tugas->tugas_id ?>">
						<div class="card shadow mb-4">
							<div class="container my-3">
								<div class="row">
									<div class="col">
										<label for="tanggal">Tanggal</label>
										<div class="input-group mb-3">
											<input type="date" name="tanggal" id="tanggal" class="form-control <?= form_error('tanggal') ? 'is-invalid' : '' ?>" value="<?= date('Y-m-d', strtotime($tugas->deadline)) ?>">
											<div id="tanggalFeedback" class="invalid-feedback">
												<?= form_error('tanggal', '<div class="text-danger">', '</div>') ?>
											</div>
										</div>
									</div>
									<div class="col">
										<label for="jam">Jam</label>
										<div class="input-group mb-3">
											<input type="text" name="jam" id="jam-dl-tugas" class="form-control <?= form_error('jam') ? 'is-invalid' : '' ?>" value="<?= date('H:i', strtotime($tugas->deadline)) ?>">
											<div id="jamFeedback" class="invalid-feedback">
												<?= form_error('jam', '<div class="text-danger">', '</div>') ?>
											</div>
										</div>
									</div>
								</div>
								<div class="btn-aksi mt-3 mb-2">
									<button type="submit" name="set_deadline" class="btn btn-sm btn-success border-0 rounded px-4 py-2 mr-3">Update</button>
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
					$("#jam-dl-tugas").datetimepicker({
						timepicker: true,
						datepicker: false,
						format: "H:i",
						value: "<?= date('H:i', strtotime($tugas->deadline)) ?>",
						hours12: false,
						step: 5,
						lang: "id",
					});
				});
			</script>
