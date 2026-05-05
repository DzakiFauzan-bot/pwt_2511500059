<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Ekstrakurikuler</h1>
            </div>
        </div>
    </div>
</div>

<?php
// kode otomatis
$carikode = mysqli_query($koneksi, "SELECT max(id_ekstra) FROM ekstra2511500059") or die(mysqli_error($koneksi));
$datakode = mysqli_fetch_array($carikode);

if ($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode = "M-" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $hasilkode = "M-001";
}

$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['tambah'])) {
    $id_ekstra = $_POST['id_ekstra'];
    $nama_ekstra = $_POST['nama_ekstra'];
    $ket = $_POST['ket'];
    $semester = $_POST['semester'];
    $thn_ajaran = $_POST['thn_ajaran'];

    $insert = mysqli_query($koneksi, "INSERT INTO ekstra2511500059 VALUES ('$id_ekstra','$nama_ekstra','$ket','$semester','$thn_ajaran')");

    if ($insert) {
        echo '
        <div class="alert alert-info-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info </h5>
            <h4>Berhasil Disimpan</h4> </div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra2511500059">';
    } else {
        echo '
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="fas fa-info"></i> Info </h5>
            <h4>Gagal Disimpan</h4> </div>';
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
                            <label for="id_ekstra">Kode Ekstrakurikuler</label>
                            <input type="text" name="id_ekstra" value="<?= $hasilkode; ?>" placeholder="Id Ekstrakurikuler"
                                class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_ekstra">Nama Ekstrakurikuler</label>
                            <input type="text" name="nama_ekstra" id="nama_ekstra" placeholder="Nama Ekstrakurikuler"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" name="ket" id="ket" placeholder="Keterangan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <input type="text" name="semester" id="semester" placeholder="Semester" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="thn_ajaran">Tahun Ajaran</label>
                            <input type="text" name="thn_ajaran" id="thn_ajaran" placeholder="Tahun Ajaran" class="form-control">
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>