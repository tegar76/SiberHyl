<!-- multiple select -->
<script src="<?= base_url('assets/MSelectDialogBox-master/dist/m-select-d-box.js')?>"></script>
<script type="application/javascript" src="<?= base_url('assets/MSelectDialogBox-master/examples/')?>/js/examplee.js"></script>

<!-- Select with search -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />


<!-- import style -->
<?php include APPPATH.'../assets/admin/css/import_style.php';?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title">Edit Materi</h3>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item text-muted active">Setting Jadwal</li>
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('Admin/Jadwal/materi')?>" class="text-muted">Materi</a></li>
                    <li class="breadcrumb-item text-muted active" aria-current="page">Edit Materi</li>
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
    <div class="container-fluid">
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
                <div class="activity">
                    <form action="">
                        <!-- looping card -->
                        <div class="card shadow mb-4">
                            <div class="container my-3"> 
                                <label for="kelas">Kelas</label>
                                <div class="input-group mb-3">
                                    <input type="button" id="kelas" class="" style="width:100%;">
                                    <!-- value ada di ('assets/MSelectDialogBox-master/examples/')/js/example.js"> -->
                                </div>
                                <label for="kelas">Mata Pelajaran</label>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="mapel">
                                        <option selected>Pilih Mata Pelajaran</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                               <div class="input-group">
                                    <button type="button" class="btn btn-primary btn-sm btn-disabled mb-2 mt-2"><i class="fa fa-plus"></i> Materi</button>
                               </div>
                                <label for="kelas">Judul Materi ke- 1</label>
                                <div class="input-group mb-3">
                                   <input type="text" name="" id="" class="form-control" placeholder="Masukan Judul">
                                </div>
                                <label for="kelas">Unggah Materi Pembelajaran ke -1</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="" id="" class="form-control">
                                </div>
                                <div class="input-group mb-3">
                                    <p>*File max 2mb dengan format PDF</p>
                                </div>
                                <div class="input-group">
                                    <button type="button" class="btn btn-primary btn-sm btn-disabled mb-2 mt-2"><i class="fa fa-plus"></i> Video Pembelajaran</button>
                               </div>
                                <label for="kelas">Judul Video Pembelajaran ke- 1</label>
                                <div class="input-group mb-3">
                                   <input type="text" name="" id="" class="form-control" placeholder="Masukan Judul Video">
                                </div>
                                <label for="kelas">Video Pembelajaran ke- 1</label>
                                <div class="input-group mb-3">
                                   <input type="text" name="" id="" class="form-control" placeholder="Masukan Link Video">
                                </div>
                                <div class="input-group mb-3">
                                    <p>*Link bersumber dari youtube</p>
                                </div>
                                <div class="btn-aksi mb-3">
                                    <button type="submit" class="btn btn-sm btn-success rounded px-4 py-2 mr-3">Update</button>
                                </div>
                               <hr>
                                <label class="mb-4" for="">Materi Pembelajaran</label>
                                <div class="input-group mb-3">
                                    <div class="item-pdf">
                                        <div class="row">
                                            <!-- looping item -->
                                            <div class="pdf-file ml-3">
                                                <div class="card d-flex flex-column card-pdf">
                                                        <a target="_blank" href="<?= base_url('Admin/Jadwal/materiPdf')?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png')?>" alt="file pdf"></a>
                                                        <hr class="w-50 mx-auto">
                                                        <h6 class="text-center mt-n1">Lorem ipsum dolor sit amet.</h6>
                                                        <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                            <a href="<?= base_url('Admin/Jadwal/editMateriPdf')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                        </div>
                                                </div>
                                            </div>
                                             <!-- looping item -->
                                             <div class="pdf-file ml-3">
                                                <div class="card d-flex flex-column card-pdf">
                                                        <a target="_blank" href="<?= base_url('Admin/Jadwal/materiPdf')?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png')?>" alt="file pdf"></a>
                                                        <hr class="w-50 mx-auto">
                                                        <h6 class="text-center mt-n1">Lorem ipsum dolor sit amet.</h6>
                                                        <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                            <a href="<?= base_url('Admin/Jadwal/editMateriPdf')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                        </div>
                                                </div>
                                            </div>
                                             <!-- looping item -->
                                             <div class="pdf-file ml-3">
                                                <div class="card d-flex flex-column card-pdf">
                                                        <a target="_blank" href="<?= base_url('Admin/Jadwal/materiPdf')?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png')?>" alt="file pdf"></a>
                                                        <hr class="w-50 mx-auto">
                                                        <h6 class="text-center mt-n1">Lorem ipsum dolor sit amet.</h6>
                                                        <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                            <a href="<?= base_url('Admin/Jadwal/editMateriPdf')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                        </div>
                                                </div>
                                            </div>
                                             <!-- looping item -->
                                             <div class="pdf-file ml-3">
                                                <div class="card d-flex flex-column card-pdf">
                                                        <a target="_blank" href="<?= base_url('Admin/Jadwal/materiPdf')?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png')?>" alt="file pdf"></a>
                                                        <hr class="w-50 mx-auto">
                                                        <h6 class="text-center mt-n1">Lorem ipsum dolor sit amet.</h6>
                                                        <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                            <a href="<?= base_url('Admin/Jadwal/editMateriPdf')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                        </div>
                                                </div>
                                            </div>
                                             <!-- looping item -->
                                             <div class="pdf-file ml-3">
                                                <div class="card d-flex flex-column card-pdf">
                                                        <a target="_blank" href="<?= base_url('Admin/Jadwal/materiPdf')?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png')?>" alt="file pdf"></a>
                                                        <hr class="w-50 mx-auto">
                                                        <h6 class="text-center mt-n1">Lorem ipsum dolor sit amet.</h6>
                                                        <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                            <a href="<?= base_url('Admin/Jadwal/editMateriPdf')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                        </div>
                                                </div>
                                            </div>
                                             <!-- looping item -->
                                             <div class="pdf-file ml-3">
                                                <div class="card d-flex flex-column card-pdf">
                                                        <a target="_blank" href="<?= base_url('Admin/Jadwal/materiPdf')?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png')?>" alt="file pdf"></a>
                                                        <hr class="w-50 mx-auto">
                                                        <h6 class="text-center mt-n1">Lorem ipsum dolor sit amet.</h6>
                                                        <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                            <a href="<?= base_url('Admin/Jadwal/editMateriPdf')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                        </div>
                                                </div>
                                            </div>
                                             <!-- looping item -->
                                             <div class="pdf-file ml-3">
                                                <div class="card d-flex flex-column card-pdf">
                                                        <a target="_blank" href="<?= base_url('Admin/Jadwal/materiPdf')?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png')?>" alt="file pdf"></a>
                                                        <hr class="w-50 mx-auto">
                                                        <h6 class="text-center mt-n1">Lorem ipsum dolor sit amet.</h6>
                                                        <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                            <a href="<?= base_url('Admin/Jadwal/editMateriPdf')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                        </div>
                                                </div>
                                            </div>
                                             <!-- looping item -->
                                             <div class="pdf-file ml-3">
                                                <div class="card d-flex flex-column card-pdf">
                                                        <a target="_blank" href="<?= base_url('Admin/Jadwal/materiPdf')?>"><img class="d-block mx-auto" src="<?= base_url('assets/admin/icons/pdf-md.png')?>" alt="file pdf"></a>
                                                        <hr class="w-50 mx-auto">
                                                        <h6 class="text-center mt-n1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, impedit!</h6>
                                                        <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                            <a href="<?= base_url('Admin/Jadwal/editMateriPdf')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                            <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <hr>
                               <label class="mb-4" for="">Video Pembelajaran</label>
                                <div class="input-group mb-3">
                                    <div class="item-video">
                                        <div class="row">
                                            <!-- Looping Video -->
                                            <div class="pdf-file ml-3">
                                                <div class="card shadow-sm d-flex flex-column card-video">
                                                    <iframe class="d-block mx-auto"  src="https://www.youtube.com/embed/rEjSkBl47OY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <h6 class="mt-1 ml-3">2021-10-12</h6>
                                                    <h6 class="mt-n1 ml-3">Ebook Pemeliharaan Kelistrikan Kendaraan Ringan</h6>
                                                    <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                        <a href="<?= base_url('Admin/Jadwal/editMateriVideo')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                        <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Looping Video -->
                                             <div class="pdf-file ml-3">
                                                <div class="card shadow-sm d-flex flex-column card-video">
                                                    <iframe class="d-block mx-auto"  src="https://www.youtube.com/embed/rEjSkBl47OY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <h6 class="mt-1 ml-3">2021-10-12</h6>
                                                    <h6 class="mt-n1 ml-3">Ebook Pemeliharaan Kelistrikan Kendaraan Ringan</h6>
                                                    <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                        <a href="<?= base_url('Admin/Jadwal/editMateriVideo')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                        <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Looping Video -->
                                             <div class="pdf-file ml-3">
                                                <div class="card shadow-sm d-flex flex-column card-video">
                                                    <iframe class="d-block mx-auto"  src="https://www.youtube.com/embed/rEjSkBl47OY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <h6 class="mt-1 ml-3">2021-10-12</h6>
                                                    <h6 class="mt-n1 ml-3">Ebook Pemeliharaan Kelistrikan Kendaraan Ringan</h6>
                                                    <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                        <a href="<?= base_url('Admin/Jadwal/editMateriVideo')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                        <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Looping Video -->
                                             <div class="pdf-file ml-3">
                                                <div class="card shadow-sm d-flex flex-column card-video">
                                                    <iframe class="d-block mx-auto"  src="https://www.youtube.com/embed/rEjSkBl47OY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <h6 class="mt-1 ml-3">2021-10-12</h6>
                                                    <h6 class="mt-n1 ml-3">Ebook Pemeliharaan Kelistrikan Kendaraan Ringan</h6>
                                                    <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                        <a href="<?= base_url('Admin/Jadwal/editMateriVideo')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                        <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Looping Video -->
                                             <div class="pdf-file ml-3">
                                                <div class="card shadow-sm d-flex flex-column card-video">
                                                    <iframe class="d-block mx-auto"  src="https://www.youtube.com/embed/rEjSkBl47OY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <h6 class="mt-1 ml-3">2021-10-12</h6>
                                                    <h6 class="mt-n1 ml-3">Ebook Pemeliharaan Kelistrikan Kendaraan Ringan</h6>
                                                    <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                        <a href="<?= base_url('Admin/Jadwal/editMateriVideo')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                        <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Looping Video -->
                                             <div class="pdf-file ml-3">
                                                <div class="card shadow-sm d-flex flex-column card-video">
                                                    <iframe class="d-block mx-auto"  src="https://www.youtube.com/embed/rEjSkBl47OY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <h6 class="mt-1 ml-3">2021-10-12</h6>
                                                    <h6 class="mt-n1 ml-3">Ebook Pemeliharaan Kelistrikan Kendaraan Ringan</h6>
                                                    <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                        <a href="<?= base_url('Admin/Jadwal/editMateriVideo')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                        <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                             <!-- Looping Video -->
                                             <div class="pdf-file ml-3">
                                                <div class="card shadow-sm d-flex flex-column card-video">
                                                    <iframe class="d-block mx-auto"  src="https://www.youtube.com/embed/rEjSkBl47OY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <h6 class="mt-1 ml-3">2021-10-12</h6>
                                                    <h6 class="mt-n1 ml-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, nihil?</h6>
                                                    <div class="row d-flex justify-content-center mb-3 mt-auto">
                                                        <a href="<?= base_url('Admin/Jadwal/editMateriVideo')?>" class="btn btn-sm btn-success mr-1" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa-solid fa-pen-to-square text-white"></i></a>
                                                        <a href="" class="btn btn-sm btn-danger"  data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa-solid fa-trash-can text-white"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
     <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>

  
    <!-- Select Search -->
<script type="text/javascript">
$(document).ready(function() {
    $('#mapel').select2();
});
</script>

