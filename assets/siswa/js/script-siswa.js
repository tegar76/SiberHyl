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
// console.log(BASEURL);

// script untuk fitur abseni siswa
$(document).ready(function () {
	$("#metode_absen").change(function () {
		var metode_absen = $("#metode_absen").val();
		if (metode_absen == "online") {
			$("#next-form-absen").append(
				'<input type="file" name="bukti_absen" id="bukti_absen">' +
					'<div class="form-info mt-1">Upload bukti mengikuti kelas online, File max 2mb</div>'
			);
		} else if (metode_absen == "offline") {
			$("#next-form-absen").html("");
		}
	});
});

$(document).ready(function () {
	$("#submit_absen").submit(function (e) {
		e.preventDefault();
		var jadwal_id = $("#jadwal-id").val();
		var form = this;
		var formdata = new FormData(form);
		$.ajax({
			type: "POST",
			url: BASEURL + "siswa/absensi/process_absensi",
			data: formdata,
			processData: false,
			contentType: false,
			dataType: "json",
			beforeSend: function () {
				swal.fire({
					imageUrl: BASEURL + "assets/logo/rolling.png",
					title: "Cek Absensi",
					text: "Silahkan Tunggu",
					showConfirmButton: false,
					allowOutsideClick: false,
				});
			},
			success: function (data) {
				if (data.success == false) {
					swal.fire({
						icon: "error",
						title: "Absensi Gagal",
						text: data.msgabsen,
						html: data.errorupload,
						showConfirmButton: false,
						// timer: 1500,
					});
					// window.location = BASEURL + "Siswa/Absen";
				} else {
					swal.fire({
						icon: "success",
						title: "Absensi Berhasil",
						text: data.msgabsen,
						showConfirmButton: false,
						timer: 1500,
					});
					window.location =
						BASEURL + "siswa/absensi/ruang_absensi/" + jadwal_id;
				}
			},
		});
	});
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	var jadwal_id = $(".jadwal-id").val();
	$(".submit-assignment").click(function (e) {
		var tugas_id = $(e.target).attr("tugas-id");
		$.ajax({
			type: "GET",
			url: BASEURL + "siswa/ruang_tugas/check_deadline?id=" + tugas_id,
			dataType: "json",
			success: function (response) {
				if (response.success == true) {
					$('[data-toggle="popover"]')
						.popover({
							placement: "bottom",
							html: true,
							title:
								'<span class="title-popover mr-3">Metode Pengumpulan</span> <a href="#" class="close" data-dismiss="alert">&times;</a>',
							content:
								'<div class="media"><a href="' +
								BASEURL +
								"siswa/ruang_tugas/pengumpulan_online/" +
								tugas_id +
								'" class="btn btn-sm btn-outline-primary mr-3">Online</a><a role="button" class="btn-langsung btn btn-sm btn-outline-success" id="btn-confirm">Langsung</a></div>',
						})
						.on("show.bs.popover", function (e) {
							$(document).on("click", ".popover .btn-langsung", function () {
								var dataJson = {
									[csrfName]: csrfHash,
									tugas_id: tugas_id,
								};
								Swal.fire({
									title: "Pengumpulan Tugas Langsung",
									text: "Apakah tugas sudah di serahkan ke guru pengajar?",
									icon: "question",
									showDenyButton: true,
									confirmButtonText: "Sudah",
									confirmButtonColor: "#50B54A",
									denyButtonText: `Belum`,
									denyButtonColor: "#6C757D",
								}).then((result) => {
									if (result.isConfirmed) {
										$.ajax({
											type: "POST",
											url: BASEURL + "siswa/ruang_tugas/pengumpulan_langsung",
											data: dataJson,
											success: function (data) {
												swal
													.fire({
														icon: "success",
														title: "Berhasil",
														text: data.message,
														html: "<strong>Berhasil,</strong> Silahkan cek pada tab <strong>nilai tugas !</strong>",
													})
													.then((result) => {
														if (result.value) {
															window.location =
																BASEURL +
																"siswa/ruang_tugas/tugas_harian/" +
																jadwal_id;
														}
													});
											},
										});
									} else if (result.isDenied) {
										$("#result").html(
											'<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Dibatalkan,</strong> Mohon serahkan pengerjaan tugas dahulu ke guru pengajar</div>'
										);
									}
								});
							});
						});
				} else {
					swal.fire(
						"Anda Terlambat!",
						"Waktu Pengumpulan Tugas Latihan Telah Berakhir",
						"warning"
					);
				}
			},
		});
	});
	$(document).on("click", ".popover .close", function () {
		$(this).parents(".popover").popover("hide");
	});
});
