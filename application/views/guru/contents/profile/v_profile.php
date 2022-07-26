<div class="page-wrapper">
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-7 align-self-center">
				<h3 class="page-title">Profile</h3>
			</div>
		</div>
		<div class="d-flex align-items-center">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb m-0 p-0">
					<li class="breadcrumb-item text-muted active"><a href="<?= base_url($this->session->userdata('level') . '/dashboard') ?>" class="text-muted">Dashboard</a></li>
					<li class="breadcrumb-item text-muted active" aria-current="page">Profile</li>
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
	<div class="container-fluid mt-n4">
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
				<div class="mt-4 activity">
					<div class="profile">
						<div class="row">
							<div class="col-md-3 text-center mb-3">
								<div class="card shadow py-4">
									<div class="img-photo justify-content-center">
										<?php if ($guru->guru_foto == 'default_profile.png') : ?>
											<img class="mx-auto d-block rounded-circle" src="<?= base_url('assets/siswa/img/profile-default-siswa.png') ?>" width="150" alt="Foto Profile guru">
										<?php else : ?>
											<img class="mx-auto d-block rounded-circle" src="<?= base_url('storage/guru/profile/' . $guru->guru_foto) ?>" width="150" height="150" alt="<?= $guru->guru_nama ?>">
										<?php endif ?>
									</div>
								</div>
							</div>
							<div class="col-md-9">
								<div class="card shadow px-3">
									<table class="table">
										<tbody>
											<tr class="table-borderless">
												<th scope="row" class="col-md-3">Kode Guru</th>
												<td><?= $guru->guru_kode ?></td>
											</tr>
											<tr>
												<th scope="row">Nama</th>
												<td><?= $guru->guru_nama ?></td>
											</tr>
											<tr>
												<th scope="row">NIP/NUPTK</th>
												<td><?= $guru->guru_nip ?></td>
											</tr>

										</tbody>
									</table>
									<hr class="mt-n3">
									<div class="button-action d-flex mb-3 mt-2">
										<a href="<?= base_url($this->session->userdata('level') . '/profile/update_profile') ?>" class="btn btn-sm btn-outline-primary rounded ml-3 px-3">Edit Profile</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- *************************************************************** -->
		<!-- End Top Leader Table -->
		<!-- *************************************************************** -->
	</div>
