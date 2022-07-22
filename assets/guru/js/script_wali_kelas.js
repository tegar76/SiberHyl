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
	$("#logout-wali-kelas").click(function (event) {
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

$(document).ready(function () {
	$("#table-jurnal-dashboard-wk").DataTable();
});

$(document).ready(function () {
	$("#table-data-siswa-wk").DataTable();
});

$(document).ready(function () {
	$("#table-jurnal-materi-wk").DataTable();
});

$(document).ready(function () {
	var csrfName = $(".csrf_token").attr("name");
	var csrfHash = $(".csrf_token").val();
	$("#table-jurnal-materi-wk").DataTable();
	$("#table-jurnal-materi-wk").on("click", ".detail-jurnal", function (e) {
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
				url: BASEURL + "wali-kelas/jurnal_materi/show_jurnal",
				data: dataJson,
				success: function (data) {
					window.location =
						BASEURL + "wali-kelas/jurnal_materi/detail_jurnal/" + jurnal_id;
				},
			});
		} else {
			window.location =
				BASEURL + "wali-kelas/jurnal_materi/detail_jurnal/" + jurnal_id;
		}
	});
});
