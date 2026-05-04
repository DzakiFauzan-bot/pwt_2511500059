<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Guru</h1>
            </div>
        </div>
    </div>
</div>
<?php
//kode otomatis
$carikode = mysqli_query($koneksi, "select max(id_guru) from guru") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);
if ($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "G" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "G-";
}
$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['tambah'])) {
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $insert = mysqli_query($koneksi, "INSERT INTO guru values ('$id_guru', '$nama', '$mata_pelajaran', '$alamat', '$no_hp')");
    if ($insert) {
        echo '<div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert"aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=guru">';
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
                            <label for="kd_guru">id guru</label>
                            <input type="text" name="id_guru" value="<?= $hasilkode; ?>" placeholder="id guru"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Id_guru">nama</label>
                            <input type="text" name="nama" id="nama" placeholder="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Nm_guru">mata pelajaran</label>
                            <input type="text" name="mata_pelajaran" id="mata_pelajaran" placeholder="Mata Pelajaran"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Pend_terakhir">alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">no hp</label>
                            <input type="text" name="no_hp" id="no_hp" placeholder="Nomor Hp" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>