<!-- import style -->
<?php include APPPATH.'../assets/siswa/css/import_style_content.php';?>

<section class="container section section__height"> 

<form action="<?= base_url('Siswa/Absen/cetakAbsensi')?>">
    <div class="title-form mb-3">
        Form Cetak Reporting Absensi Siswa 
    </div>
    <label for="">Kode Guru</label>
    <div class="input-group mb-3">
        <input type="text" name="" id="" class="form-control" value="AZ" readonly>
    </div>
    <label for="">Kelas</label>
    <div class="input-group mb-3">
        <input type="text" name="" id="" class="form-control" value="XI TKRO 1" readonly>
    </div>
    <label for="">Mapel</label>
    <div class="input-group mb-3">
        <input type="text" name="" id="" class="form-control" value="Panel Sasis Dan Pemindahan Tenaga KR" readonly>
    </div>
    <label for="">Pertemuan Ke-</label>
    <div class="input-group mb-3">
        <select name="" id="" class="form-control">
            <option value="" selected>Pilih Pertemuan Ke-</option>
            <option value="">1 (Satu)</option>
            <option value="">2 (Dua)</option>
            <option value="">3 (Tiga)</option>
        </select>
    </div>
    <label for="">Sampai Pertemuan Ke-</label>
    <div class="input-group mb-3">
        <select name="" id="" class="form-control">
            <option value="" selected>Pilih Sampai Pertemuan Ke-</option>
            <option value="">1 (Satu)</option>
            <option value="">2 (Dua)</option>
            <option value="">3 (Tiga)</option>
        </select>
    </div>
    <label for="">Format</label>
    <div class="input-group mb-4">
        <select name="" id="" class="form-control">
            <option value="" selected>Pilih Format</option>
            <option value="">PDF</option>
            <option value="">EXCEL</option>
        </select>
    </div>
    <div class="btn-aksi mb-4">
        <button type="submit" class="btn btn-sm btn-primary rounded px-4 py-1 mr-3">Kirim</button>
        <button type="reset" class="btn btn-sm btn-secondary rounded px-4 py-1">Reset</button>
    </div>
</form>