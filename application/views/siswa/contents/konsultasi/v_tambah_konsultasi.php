<!-- import style -->
<?php include APPPATH.'../assets/siswa/css/import_style_content.php';?>

<section class="container section section__height"> 

<form action="">
    <div class="title-form mb-3">
        Form Tambah Konsultasi Baru 
    </div>
    <label for="">NIS</label>
    <div class="input-group mb-3">
        <input type="text" name="" id="" class="form-control" value="2010049" readonly>
    </div>
    <label for="">Nama</label>
    <div class="input-group mb-3">
        <input type="text" name="" id="" class="form-control" value="ADIT PRAYITNO" readonly>
    </div>
    <label for="">Judul</label>
    <div class="input-group mb-3">
        <input type="text" name="" id="" class="form-control" placeholder="Masukan Judul Pembahasan">
    </div>
    <label for="">Deskripsi Pembahasan</label>
    <div class="input-group mb-3">
        <textarea class="form-control" name="deskripsi" placeholder="Masukan Deskripsi Pembahasan"></textarea>
    </div>
    <div class="btn-aksi mb-4">
        <button type="submit" class="btn btn-sm btn-info rounded px-4 py-1 mr-3">Simpan</button>
        <button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-1">Reset</button>
    </div>
</form>