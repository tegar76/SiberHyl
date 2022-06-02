function base_url() {
	var pathparts = location.pathname.split("/");
	if (location.host == "localhost:8080" || location.host == "localhost") {
		var url = location.origin + "/" + pathparts[1].trim("/") + "/"; // http://localhost/siberhyl/
	} else {
		var url = location.origin; // http://localhost/
	}
	return url;
}

const BASEURL = base_url();

// jadwal pelajaran
$(document).ready(function () {
	$('[data-toggle="tooltip"]').tooltip();
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#data_jadwal").on("click", ".delete-schedule", function (e) {
		e.preventDefault();
		var kodeJadwal = $(e.currentTarget).attr("kode-jadwal");
		var dataJson = {
			[csrfName]: csrfHash,
			kodeJadwal: kodeJadwal,
		};
		console.log(dataJson);
		Swal.fire({
			title: "Hapus Jadwal Pelajaran",
			text: "Anda yakin ingin menghapus jadwal pelajaran ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "/master/jadwal/hapusJadwal",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "/assets/logo/rolling.png",
							title: "Menghapus Jadwal Pelajaran",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Jadwal Pelajaran Gagal",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Jadwal Pelajaran Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location = BASEURL + "/master/jadwal";
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Jadwal Pelajaran Gagal",
							"Ada Kesalahan Saat menghapus jadwal!",
							"error"
						);
					},
				});
			}
		});
	});

	$("#id_kelas").change(function () {
		var kelas = $("#id_kelas").val();
		window.location = BASEURL + "/master/jadwal/pratinjauJadwal/" + kelas;
	});

	jQuery.datetimepicker.setLocale("id");
	$("#jam_masuk_edit, #jam_keluar_edit").datetimepicker({
		timepicker: true,
		datepicker: false,
		format: "H:i",
		hours12: false,
		step: 5,
		lang: "id",
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#data_materi").on("click", ".delete-materi", function (e) {
		e.preventDefault();
		var materi_info_id = $(e.currentTarget).attr("materi-id");
		var dataJson = {
			[csrfName]: csrfHash,
			materi_info_id: materi_info_id,
		};
		Swal.fire({
			title: "Hapus Semua Materi Pembelajaran",
			text: "Anda yakin ingin menghapus semua materi pembelajaran ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "/master/materi/hapusAllMateri",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "/assets/logo/rolling.png",
							title: "Menghapus Semua Materi Pembelajaran",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Materi Pembelajaran Gagal",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Materi Pembelajaran Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location = BASEURL + "/master/materi";
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Materi Pembelajaran Gagal",
							"Ada Kesalahan Saat menghapus materi pembelajaran!",
							"error"
						);
					},
				});
			}
		});
	});
});

// logout admin
$(document).ready(function () {
	$("#logout").click(function (event) {
		event.preventDefault();
		Swal.fire({
			title: "Anda Yakin Keluar?",
			text: "Anda yakin ingin keluar dari Siberhyl?",
			icon: "warning",
			showConfirmButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Logout",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "GET",
					url: BASEURL + "/authadmin/logout",
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "/assets/logo/rolling.png",
							title: "Logging Out",
							text: "silahkan tunggu...",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						swal.fire({
							icon: "success",
							title: "Logout",
							text: "Silahkan login kembali untuk melanjutkan :)",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
						window.location.href = BASEURL + "/authadmin";
					},
				});
			}
		});
	});
});
