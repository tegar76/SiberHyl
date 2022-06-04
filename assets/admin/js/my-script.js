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
	$("#data_jadwal").DataTable();
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
					url: BASEURL + "master/jadwal/hapusJadwal",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
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
							window.location = BASEURL + "master/jadwal";
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
});

$(document).ready(function () {
	$("#pratinjau-kelas-id").change(function () {
		var kelas = $("#pratinjau-kelas-id").val();
		window.location = BASEURL + "master/jadwal/pratinjauJadwal/" + kelas;
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
					url: BASEURL + "master/materi/hapusAllMateri",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
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
							window.location = BASEURL + "master/materi";
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
					url: BASEURL + "authadmin/logout",
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
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
						window.location.href = BASEURL + "authadmin";
					},
				});
			}
		});
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$(".hapus-file-materi").click(function (e) {
		e.preventDefault();
		var materi_id = $(e.currentTarget).attr("materi-id");
		var materi_info_id = $(e.currentTarget).attr("materi-info-id");
		var dataJson = {
			[csrfName]: csrfHash,
			materi_info_id: materi_info_id,
			materi_id: materi_id,
		};
		Swal.fire({
			title: "Hapus File Materi Pembelajaran",
			text: "Anda yakin ingin menghapus file materi pembelajaran ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "master/materi/deleteMateri",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
							title: "Menghapus File Materi Pembelajaran",
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
							window.location =
								BASEURL + "master/materi/editMateri/" + materi_info_id;
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

	$(".hapus-video-materi").click(function (e) {
		e.preventDefault();
		var materi_id = $(e.currentTarget).attr("materi-id");
		var materi_info_id = $(e.currentTarget).attr("materi-info-id");
		var dataJson = {
			[csrfName]: csrfHash,
			materi_info_id: materi_info_id,
			materi_id: materi_id,
		};
		Swal.fire({
			title: "Hapus Video Pembelajaran",
			text: "Anda yakin ingin menghapus video materi pembelajaran ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "master/materi/deleteVideoMateri",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
							title: "Menghapus Video Materi Pembelajaran",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Video Pembelajaran Gagal",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Video Pembelajaran Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location =
								BASEURL + "master/materi/editMateri/" + materi_info_id;
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Video Pembelajaran Gagal",
							"Ada Kesalahan Saat menghapus video pembelajaran!",
							"error"
						);
					},
				});
			}
		});
	});
});

$(document).ready(function () {
	$("#btn-update-materi").click(function () {
		var jumlah = parseInt($("#jumlah-materi-update").val());
		var nextMateri = jumlah + 1;
		$("#next-update-materi").append(
			'<label for="judul_materi">Judul Materi ke- ' +
				nextMateri +
				"</label>" +
				'<div class="input-group mb-3">' +
				'<input type="text" name="judul_materi[]" id="judul_materi" class="form-control" placeholder="Masukan Judul">' +
				"</div>" +
				'<label for="file_materi">Unggah Materi Pembelajaran ke- ' +
				nextMateri +
				"</label>" +
				'<div class="input-group mb-3">' +
				'<input type="file" name="file_materi[]" id="file_materi" class="form-control">' +
				"</div>" +
				'<div class="input-group mb-3">' +
				"<p>*File max 2mb dengan format PDF</p>" +
				"</div>"
		);
		$("#jumlah-materi-update").val(nextMateri);
	});

	$("#btn-update-video").click(function () {
		var jumlah = parseInt($("#jumlah-video-update").val());
		var nextVideo = jumlah + 1;
		$("#next-update-video").append(
			'<label for = "judul_video" > Judul Video Pembelajaran ke - ' +
				nextVideo +
				" </label>" +
				'<div class="input-group mb-3">' +
				'<input type="text" name="judul_video[]" id="judul_video" class="form-control" placeholder="Masukan Judul Video">' +
				"</div>" +
				'<label for="link_video">Video Pembelajaran ke- ' +
				nextVideo +
				"</label>" +
				'<div class="input-group mb-3">' +
				'<input type="text" name="link_video[]" id="link_video" class="form-control" placeholder="Masukan Link Video">' +
				"</div>"
		);
		$("#jumlah-video-update").val(nextVideo);
	});
});
