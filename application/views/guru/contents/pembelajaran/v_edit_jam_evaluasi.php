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
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/') ?>" class="text-muted">Mengajar</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/evaluasi/' . $eval->jadwal_id) ?>" class="text-muted">Evaluasi</a></li>
						<li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('guru/pembelajaran/detail_evaluasi/' . $eval->evaluasi_id) ?>" class="text-muted">Detail Evaluasi</a></li>
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
						<?= form_open('guru/pembelajaran/set_deadline_evaluasi/' . $eval->evaluasi_id) ?>
						<input type="hidden" name="evaluasi_id" value="<?= $eval->evaluasi_id ?>">
						<div class="card shadow mb-4">
							<div class="container my-3">
								<label for="mulai">Mulai</label>
								<div class="input-group mb-3">
									<input type="text" name="mulai" id="mulai" class="form-control <?= (form_error('mulai')) ? 'is-invalid' : 'mulai' ?>">
									<div id="mulaiFeedback" class="invalid-feedback">
										<?= form_error('mulai', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="selesai">Selesai</label>
								<div class="input-group mb-3">
									<input type="text" name="selesai" id="selesai" class="form-control <?= (form_error('selesai')) ? 'is-invalid' : '' ?>">
									<div id="selesaiFeedback" class="invalid-feedback">
										<?= form_error('selesai', '<div class="text-danger">', '</div>') ?>
									</div>
								</div>
								<label for="deadline">Batas Pengumpulan</label>
								<div class="input-group mb-3">
									<input type="text" name="deadline" id="deadline" class="form-control <?= (form_error('deadline')) ? 'is-invalid' : '' ?>">
									<div id="deadlineFeedback" class="invalid-feedback">
										<?= form_error('deadline', '<div class="text-danger">', '</div>') ?>
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
					$("#mulai").datetimepicker({
						timepicker: true,
						datepicker: false,
						format: "H:i",
						value: "<?= date('H:i', strtotime($eval->waktu_mulai)) ?>",
						hours12: false,
						step: 5,
						lang: "id",
					});

					$("#selesai").datetimepicker({
						timepicker: true,
						datepicker: false,
						format: "H:i",
						value: "<?= date('H:i', strtotime($eval->waktu_selesai)) ?>",
						hours12: false,
						step: 5,
						lang: "id",
					});

					$("#deadline").datetimepicker({
						timepicker: true,
						datepicker: false,
						format: "H:i",
						value: "<?= date('H:i', strtotime($eval->waktu_deadline)) ?>",
						hours12: false,
						step: 5,
						lang: "id",
					});
				});
			</script>
