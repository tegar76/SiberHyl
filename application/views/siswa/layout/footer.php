<footer>
	<p>&copy; 2022 Team Paradoks Technology</p>
</footer>

</section>

</main>
<!--=============== MAIN JS ===============-->
<script src="<?= base_url('assets/') ?>siswa/js/main.js"></script>

<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/popper.js"></script>
<script src="<?= base_url('assets/') ?>bootstrap-4.6.1-dist/js/bootstrap.js"></script>
<script src="<?= base_url('assets/') ?>plugin/sweetalert2/sweetalert2.all.min.js"></script>
<?php include APPPATH . '../assets/siswa/js/import_script.php'; ?>

<script type="text/javascript">
	$(function() {
		var title = '<?= $this->session->flashdata("title") ?>';
		var text = '<?= $this->session->flashdata("text") ?>';
		var type = '<?= $this->session->flashdata("type") ?>';
		if (title) {
			swal.fire({
				icon: type,
				title: title,
				text: text,
				type: type,
				button: true,
			});
		};
	});

	$(document).ready(function() {
		$(".logout").click(function(event) {
			var crsf = $("#crsf_name").val();
			event.preventDefault();
			Swal.fire({
				title: 'Anda Yakin Keluar?',
				text: 'Anda yakin ingin keluar dari kelas ini!',
				icon: 'warning',
				showConfirmButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Logout'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "GET",
						url: "<?= base_url('auth/logout'); ?>",
						beforeSend: function() {
							swal.fire({
								imageUrl: "<?= base_url('assets/logo/rolling.png'); ?>",
								title: "Logging Out",
								text: "silahkan tunggu...",
								showConfirmButton: false,
								allowOutsideClick: false
							});
						},
						success: function(data) {
							swal.fire({
								icon: 'success',
								title: 'Logout',
								text: 'Anda Telah Keluar!',
								showConfirmButton: false,
								allowOutsideClick: false
							});
							window.location.href = "<?= base_url() ?>";
						}
					});
				}
			});
		});
	});
</script>
</body>

</html>
