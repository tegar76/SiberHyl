function base_url() {
	var pathparts = location.pathname.split("/");
	if (location.host == "localhost:8080" || location.host == "localhost") {
		var url = location.origin + "/" + pathparts[1].trim("/") + "/"; // http://localhost/siberhyl/
	} else {
		var url = location.origin + "/"; // http://localhost/
	}
	return url;
}

const BASEURL = base_url();

// Dashboard
$(document).ready(function () {
	$("#table-info-akademik").DataTable({
		searching: false,
	});

	$("#table-pesan-aduan").DataTable({
		// paging: false,
		searching: false,
	});

	// table_pesan.destroy();
});

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
	$("#data_materi").DataTable();
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
			text: "Anda yakin ingin menghapus kelas ini!",
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
							title: "Menghapus kelas",
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

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#data-kelas").DataTable();
	$("#data-kelas").on("click", ".delete-kelas", function (e) {
		e.preventDefault();
		var kode_kelas = $(e.currentTarget).attr("kode-kelas");
		var dataJson = {
			[csrfName]: csrfHash,
			kode_kelas: kode_kelas,
		};
		Swal.fire({
			title: "Hapus Kelas",
			text: "Anda yakin ingin menghapus kelas ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "master/data/kelas/delete_kelas",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
							title: "Menghapus Kelas",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Kelas Gagal",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Kelas Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location = BASEURL + "master/data/kelas";
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Kelas Gagal",
							"Ada Kesalahan Saat menghapus kelas!",
							"error"
						);
					},
				});
			}
		});
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#data-mapel").DataTable();
	$("#data-mapel").on("click", ".delete-mapel", function (e) {
		e.preventDefault();
		var mapel_id = $(e.currentTarget).attr("mapel-id");
		var dataJson = {
			[csrfName]: csrfHash,
			mapel_id: mapel_id,
		};
		console.log(dataJson);
		Swal.fire({
			title: "Hapus Mata Pelajaran",
			text: "Anda yakin ingin menghapus mata pelajaran ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "master/data/mata-pelajaran/delete_mapel",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
							title: "Menghapus Mata Pelajaran",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Mata Pelajaran Gagal",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Mata Pelajaran Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location = BASEURL + "master/data/mata-pelajaran";
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Mata Pelajaran Gagal",
							"Ada Kesalahan Saat menghapus Mata Pelajaran!",
							"error"
						);
					},
				});
			}
		});
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#data-ruangan").DataTable();
	$("#data-ruangan").on("click", ".delete-ruangan", function (e) {
		e.preventDefault();
		var ruang_id = $(e.currentTarget).attr("ruang-id");
		var dataJson = {
			[csrfName]: csrfHash,
			ruang_id: ruang_id,
		};
		Swal.fire({
			title: "Hapus Ruangan",
			text: "Anda yakin ingin menghapus ruangan ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "master/data/ruangan/delete_ruangan",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
							title: "Menghapus Ruangan",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Ruangan Gagal",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Ruangan Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location = BASEURL + "master/data/ruangan";
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Ruangan Gagal",
							"Ada Kesalahan Saat menghapus Ruangan!",
							"error"
						);
					},
				});
			}
		});
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#data-guru").DataTable();
	$("#data-guru").on("click", ".delete-guru", function (e) {
		e.preventDefault();
		var guru_nip = $(e.currentTarget).attr("guru-nip");
		var dataJson = {
			[csrfName]: csrfHash,
			guru_nip: guru_nip,
		};
		Swal.fire({
			title: "Hapus Data Guru",
			text: "Anda yakin ingin menghapus data guru ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "master/data/guru/delete_guru",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
							title: "Menghapus Data Guru",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Data Guru Gagal",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Data Guru Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location = BASEURL + "master/data/guru";
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Data Guru Gagal",
							"Ada Kesalahan Saat menghapus Data Guru!",
							"error"
						);
					},
				});
			}
		});
	});
});

$(document).ready(function () {
	function select_kelas(type, jurusan) {
		$("#pilih-kelas-siswa").select2({
			placeholder: "Pilih Kelas",
			ajax: {
				dataType: "json",
				url:
					BASEURL +
					"master/data/siswa/select_data?type=" +
					type +
					"&jurusan=" +
					jurusan,
				delay: 800,
				data: function (params) {
					return {
						search: params.term,
					};
				},
				processResults: function (response) {
					return {
						results: response,
					};
				},
				cache: true,
			},
		});
	}

	function select_asal_kelas(type) {
		$("#asal-kelas-siswa").select2({
			placeholder: "Pilih Kelas",
			ajax: {
				dataType: "json",
				url: BASEURL + "master/jadwal/get_data?type=" + type,
				delay: 800,
				data: function (params) {
					return {
						search: params.term,
					};
				},
				processResults: function (response) {
					return {
						results: response,
					};
				},
				cache: true,
			},
		});
	}

	function select_jurusan(type) {
		$("#pilih-jurusan-siswa").select2({
			placeholder: "Pilih Jurusan Siswa",
			ajax: {
				dataType: "json",
				url: BASEURL + "master/data/siswa/select_data?type=" + type,
				delay: 800,
				data: function (params) {
					return {
						search: params.term,
					};
				},
				processResults: function (response) {
					return {
						results: response,
					};
				},
				cache: true,
			},
		});
	}

	$("#pilih-jurusan-siswa").change(function () {
		var jurusan = $("#pilih-jurusan-siswa").val();
		select_kelas("kelas", jurusan);
	});

	select_jurusan("jurusan");
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#data-siswa").DataTable();
	$("#data-siswa").on("click", ".delete-siswa", function (e) {
		e.preventDefault();
		var siswa_id = $(e.currentTarget).attr("siswa-id");
		var kode_kelas = $(e.currentTarget).attr("kode-kelas");
		var dataJson = {
			[csrfName]: csrfHash,
			siswa_id: siswa_id,
		};
		Swal.fire({
			title: "Hapus Data Siswa",
			text: "Anda yakin ingin menghapus data siswa ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "master/data/siswa/delete_siswa",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
							title: "Menghapus Data Siswa",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Data Siswa Gagal",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Data Siswa Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location =
								BASEURL + "master/data/siswa/kelas/" + kode_kelas;
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Data Siswa Gagal",
							"Ada Kesalahan Saat menghapus Data Siswa!",
							"error"
						);
					},
				});
			}
		});
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#table-jurnal").DataTable();
	$("#table-jurnal").on("click", ".detail-jurnal", function (e) {
		e.preventDefault();
		var jurnal_id = $(e.currentTarget).attr("jurnal-id");
		var status = $(e.currentTarget).attr("status");
		var dataJson = {
			[csrfName]: csrfHash,
			jurnal_id: jurnal_id,
		};
		if (status == 0) {
			$.ajax({
				type: "POST",
				url: BASEURL + "master/jurnal/show_jurnal",
				data: dataJson,
				success: function (data) {
					window.location =
						BASEURL + "master/jurnal/detail_jurnal/" + jurnal_id;
				},
			});
		} else {
			window.location = BASEURL + "master/jurnal/detail_jurnal/" + jurnal_id;
		}
	});
});

$(document).ready(function () {
	$("#change-kelas").change(function () {
		var data = $("#change-kelas option:selected").val();
		window.location = BASEURL + "master/data/siswa/kelas/" + data;
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#table-tahun-akademik").DataTable();
	$("#table-tahun-akademik").on(
		"change",
		".change-tahun-akademik",
		function (e) {
			e.preventDefault();
			var tahunakd_id = $(e.currentTarget).attr("tahun-akademik-id");
			var status = $(e.currentTarget).attr("value");
			var dataJson = {
				[csrfName]: csrfHash,
				tahunakd_id: tahunakd_id,
				status: status,
			};
			// console.log(dataJson);
			$.ajax({
				type: "POST",
				url: BASEURL + "master/info/check_tahun_akademik",
				data: dataJson,
				success: function (data) {
					window.location = BASEURL + "master/info/tahun-ajar";
					console.log(dataJson);
				},
			});
		}
	);
});

$(document).ready(function () {
	$("#info-jurusan").change(function () {
		var index_kelas = $("#index_kelas").val();
		var jurusan = $("#info-jurusan").val();
		$("#kelas_jurusan").select2({
			placeholder: "Pilih Kelas",
			minimumResultsForSearch: -1,
			ajax: {
				dataType: "json",
				type: "GET",
				url:
					BASEURL +
					"master/info/get_kelas?index_kelas=" +
					index_kelas +
					"&kode_jurusan=" +
					jurusan,
				processResults: function (response) {
					return {
						results: response,
					};
				},
				cache: true,
			},
		});
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#table-info-akademik").DataTable();
	$("#table-info-akademik").on("click", ".delete-info-akademik", function (e) {
		e.preventDefault();
		var infoakd_id = $(e.currentTarget).attr("info-akd-id");
		var dataJson = {
			[csrfName]: csrfHash,
			infoakd_id: infoakd_id,
		};
		Swal.fire({
			title: "Hapus Info Akademik",
			text: "Anda yakin menghapus info akademik ini!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Ya, Hapus!",
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: "POST",
					url: BASEURL + "master/info/delete_info_akademik",
					data: dataJson,
					beforeSend: function () {
						swal.fire({
							imageUrl: BASEURL + "assets/logo/rolling.png",
							title: "Menghapus Info Akademik",
							text: "Silahkan Tunggu",
							showConfirmButton: false,
							allowOutsideClick: false,
						});
					},
					success: function (data) {
						if (data.success == false) {
							swal.fire({
								icon: "error",
								title: "Menghapus Info Akademik",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
						} else {
							swal.fire({
								icon: "success",
								title: "Menghapus Info Akademik Berhasil",
								text: data.message,
								showConfirmButton: false,
								timer: 1500,
							});
							window.location = BASEURL + "master/info/info-akademik";
						}
					},
					error: function () {
						swal.fire(
							"Penghapusan Info Akademik Gagal",
							"Ada Kesalahan Saat menghapus Info Akademik!",
							"error"
						);
					},
				});
			}
		});
	});
});
