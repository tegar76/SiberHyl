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

// logout guru
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
					url: BASEURL + "auth/logout",
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
						window.location.href = BASEURL;
					},
				});
			}
		});
	});
});

// script untuk halaman dashboard guru
$(document).ready(function () {
	$("#pengajuan-surat").DataTable();
});

// halaman siswa
$(document).ready(function () {
	$("#table-data-siswa").DataTable();
});

$(document).ready(function () {
	$("#data-absensi-siswa").DataTable();
});

$(document).ready(function () {
	$("#change-kelas").change(function () {
		var data = $("#change-kelas option:selected").val();
		window.location = BASEURL + "guru/data/data_siswa/kelas/" + data;
	});
});

$(document).ready(function () {
	jQuery.datetimepicker.setLocale("id");
	$("#absen_masuk, #absen_selesai").datetimepicker({
		timepicker: true,
		datepicker: false,
		format: "H:i",
		value: "00:00",
		hours12: false,
		step: 5,
		lang: "id",
	});
});

$(document).ready(function () {
	$("#data-absensi-siswa").DataTable();
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#data-absensi-siswa").on("change", ".action-absens-siswa", function (e) {
		e.preventDefault();
		var status = $(e.currentTarget).attr("value");
		var nisSiswa = $(e.currentTarget).attr("nis");
		var jurnalId = $(e.currentTarget).attr("jurnal");
		var absensiId = $(e.currentTarget).attr("absensi");
		var dataJson = {
			[csrfName]: csrfHash,
			nisSiswa: nisSiswa,
			jurnalId: jurnalId,
			absensiId: absensiId,
			status: status,
		};
		console.log(dataJson);
		$.ajax({
			type: "POST",
			url: BASEURL + "guru/pembelajaran/process_absen_siswa",
			data: dataJson,
			success: function (data) {
				window.location =
					BASEURL + "guru/pembelajaran/detail_absensi/" + jurnalId;
			},
		});
	});
});

$(document).ready(function () {
	load_comment();
	$("#submit-diskusi").submit(function (e) {
		e.preventDefault();
		var form = this;
		var formdata = new FormData(form);
		$.ajax({
			url: BASEURL + "guru/pembelajaran/submit_diskusi",
			type: "POST",
			processData: false,
			contentType: false,
			data: formdata,
			dataType: "json",
			success: function (response) {
				// $("#info-data").html(response.messages).attr("disabled", false).show();
				if (response.success == true) {
					// $(".text-danger").remove();
					// swal.fire({
					// 	icon: "success",
					// 	title: "Komentar Berhasil",
					// 	text: "Penambahan komentar sudah berhasil !",
					// 	showConfirmButton: false,
					// 	timer: 1500,
					// });
					$("#diskusi_id").val("0");
					load_comment();
					form.reset();
				}
			},
			error: function () {
				swal.fire(
					"Penambahan Komentar Gagal",
					"Ada Kesalahan Saat penambahan Komentar!",
					"error"
				);
			},
		});
	});

	function load_comment() {
		var id_forum = $("#id_forum").val();
		$.ajax({
			type: "GET",
			url: BASEURL + "guru/pembelajaran/get_komentar?id=" + id_forum,
			dataType: "json",
			success: function (reponse) {
				$("#display_forum").html(reponse);
			},
			error: function (reponse) {
				console.log(reponse.responseText);
			},
		});
	}
	$(document).on("click", ".balas", function (e) {
		var id_forum = $(e.target).attr("id-komen");
		$("#diskusi_id").val(id_forum);
		$("#text-message").focus();
	});
});
