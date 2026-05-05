<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Siswa</h1>
            </div>
        </div>
    </div>
</div>
<?php
//kode otomatis
$carikode = mysqli_query($koneksi, "select max(Nis) from siswa") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);
if ($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "123" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "123001";
}
$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['tambah'])) {
    $nis_siswa = $_POST['nis_siswa'];
    $nama_siswa = $_POST['nama_siswa'];
    $no_hp = $_POST['no_hp'];
    $id_kelas = $_POST['id_kelas'];

    $insert = mysqli_query($koneksi, "INSERT INTO siswa values ('$nis_siswa', '$nama_siswa', '$no_hp', '$id_kelas')");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert"aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=siswa">';
    } else {
        echo '<div class="alert alert-warning-dismissible">
           <button type="button" class="close" data-dismiss="alert"aria-hidden="true">X</button>
           <h5><i class="icon fas fa-info"></i> Info </h5>
           <h4>Gagal Disimpan</h4></div>';
    }
}
?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="nis_siswa">nis siswa</label>
                            <input type="text" name="nis_siswa" value="<?= $hasilkode; ?>" placeholder="nis siswa"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa">nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" placeholder="nama siswa"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">no hp</label>
                            <input type="text" name="no_hp" id="no_hp" placeholder="no hp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_kelas">id Kelas</label>
                            <input type="text" name="id_kelas" id="id_kelas" placeholder="id Kelas"
                                class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>