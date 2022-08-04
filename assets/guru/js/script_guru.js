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
$(document).ready(function() {
    $("#logout").click(function(event) {
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
                    beforeSend: function() {
                        swal.fire({
                            imageUrl: BASEURL + "assets/logo/rolling.png",
                            title: "Logging Out",
                            text: "silahkan tunggu...",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                    },
                    success: function(data) {
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
$(document).ready(function() {
    $("#pengajuan-surat").DataTable();
});

// halaman siswa
$(document).ready(function() {
    $("#table-data-siswa").DataTable();
});

$(document).ready(function() {
    $("#data-absensi-siswa").DataTable();
});

$(document).ready(function() {
    $("#change-kelas-guru").change(function() {
        var data = $("#change-kelas-guru option:selected").val();
        window.location = BASEURL + "guru/data/data_siswa?kelas=" + data;
    });
});

$(document).ready(function() {
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

$(document).ready(function() {
    $("#data-absensi-siswa").DataTable();
    var csrfName = $(".csrf_token").attr("name");
    var csrfHash = $(".csrf_token").val();
    $("#data-absensi-siswa").on("change", ".action-absens-siswa", function(e) {
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
            success: function(data) {
                window.location =
                    BASEURL + "guru/pembelajaran/detail_absensi/" + jurnalId;
            },
        });
    });
});

$(document).ready(function() {
    load_comment();
    $("#submit-diskusi").submit(function(e) {
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
            success: function(response) {
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
            error: function() {
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
            success: function(reponse) {
                $("#display_forum").html(reponse);
            },
            error: function(reponse) {
                console.log(reponse.responseText);
            },
        });
    }
    $(document).on("click", ".balas", function(e) {
        var id_forum = $(e.target).attr("id-komen");
        $("#diskusi_id").val(id_forum);
        $("#text-message").focus();
    });
});

$(document).ready(function() {
    $("#pilih-kelas-materi").select2({
        placeholder: "Pilih Kelas",
        minimumResultsForSearch: -1,
    });

    $("#pilih-mapel-materi").select2({
        placeholder: "Pilih Mata Pelajaran",
        minimumResultsForSearch: -1,
    });

    $("#btn-tambah-materi").click(function() {
        var jumlah = parseInt($("#jumlah-materi").val());
        var nextMateri = jumlah + 1;
        $("#next-materi").append(
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
        $("#jumlah-materi").val(nextMateri);
    });

    $("#btn-tambah-video").click(function() {
        var jumlah = parseInt($("#jumlah-video").val());
        var nextVideo = jumlah + 1;
        $("#next-video").append(
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
        $("#jumlah-video").val(nextVideo);
    });
});

$(document).ready(function() {
    $("#data-materi-guru").DataTable();
    $("#data-materi-guru").on("click", ".delete-materi", function(e) {
        e.preventDefault();
        var materi_info_id = $(e.currentTarget).attr("materi-id");
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
                    type: "GET",
                    url: BASEURL + "guru/data/delete_all_materi?id=" + materi_info_id,
                    beforeSend: function() {
                        swal.fire({
                            imageUrl: BASEURL + "assets/logo/rolling.png",
                            title: "Menghapus Semua Materi Pembelajaran",
                            text: "Silahkan Tunggu",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                    },
                    success: function(data) {
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
                            window.location = BASEURL + "guru/data/data_materi?user=guru";
                        }
                    },
                    error: function() {
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

$(document).ready(function() {
    $(".hapus-materi-pdf").click(function(e) {
        e.preventDefault();
        var materi_id = $(e.currentTarget).attr("materi-id");
        var materi_info_id = $(e.currentTarget).attr("materi-info-id");
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
                    type: "GET",
                    url: BASEURL + "guru/data/delete_materi_pdf?materi_id=" + materi_id,
                    beforeSend: function() {
                        swal.fire({
                            imageUrl: BASEURL + "assets/logo/rolling.png",
                            title: "Menghapus File Materi Pembelajaran",
                            text: "Silahkan Tunggu",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                    },
                    success: function(data) {
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
                                BASEURL + "guru/data/edit_materi/" + materi_info_id;
                        }
                    },
                    error: function() {
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

    $(".hapus-materi-video").click(function(e) {
        e.preventDefault();
        var materi_id = $(e.currentTarget).attr("materi-id");
        var materi_info_id = $(e.currentTarget).attr("materi-info-id");
        Swal.fire({
            title: "Hapus Video Pembelajaran",
            text: "Anda yakin ingin mengahapus video pembelajaran ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "GET",
                    url: BASEURL + "guru/data/delete_materi_video?materi_id=" + materi_id,
                    beforeSend: function() {
                        swal.fire({
                            imageUrl: BASEURL + "assets/logo/rolling.png",
                            title: "Menghapus kelas",
                            text: "Silahkan Tunggu",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                    },
                    success: function(data) {
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
                                BASEURL + "guru/data/edit_materi/" + materi_info_id;
                        }
                    },
                    error: function() {
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


$(document).ready(function() {
    var csrfName = $(".csrf_token").attr("name");
    var csrfHash = $(".csrf_token").val();
    $("#table-pengajuan-surat").DataTable();
    $("#table-pengajuan-surat").on("click", ".detail-surat", function(e) {
        e.preventDefault();
        var id = $(e.currentTarget).attr("id-pen");
        var status = $(e.currentTarget).attr("status");
        var dataJson = {
            [csrfName]: csrfHash,
            id: id,
        };
        if (status == 0) {
            $.ajax({
                type: "POST",
                url: BASEURL + "guru/pembelajaran/acction_show_surat",
                data: dataJson,
                success: function(data) {
                    window.location = BASEURL + "guru/pembelajaran/surat";
                },
            });
        }
    });
});