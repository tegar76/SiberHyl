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
