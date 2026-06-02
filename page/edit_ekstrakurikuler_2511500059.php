<?php
include "config/koneksi.php"
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Data Extrakulikuler</h1>
            </div>
        </div>
    </div>
</div>

    <?php
    $Id = $_GET['Id'];
    $edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM ekstra_2511500059 WHERE id_ekstra059='$Id'"));

    if(isset($_POST['tambah'])){
        $id_ekstra059 = $_POST['id_ekstra059'];
        $nama_ekstra = $_POST['nama_ekstra059'];
        $ket = $_POST['ket059'];
        $semester = $_POST['semester059'];
        $thn_ajaran = $_POST['thn_ajaran059'];

        $insert = mysqli_query($koneksi, "UPDATE ekstra_2511500059 SET id_ekstra059='$id_ekstra059', nama_ekstra059='$nama_ekstra', ket059='$ket', semester059='$semester', thn_ajaran059='$thn_ajaran' WHERE id_ekstra059='$Id'");
        if ($insert) {
            echo '<div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            <h4>Berhasil Di Simpan</h4></div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=ekstra2511500059">';
        } else {
            echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                <h5><i class="icon fas fa-info"></i> Info</h5>
                <h4>Gagal Di Simpan</h4>
            </div>';
        }
    }

?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group
                        ">
                            <label for="id_ekstra059">Id Extrakulikuler:</label>
                            <input type="text" name="id_ekstra059" value="<?= $edit['id_ekstra059']; ?>" placeholder="Masukkan Id Extrakulikuler" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_ekstra059">Nama Extrakulikuler:</label>
                            <input type="text" name="nama_ekstra059" id="nama_ekstra059" value="<?= $edit['nama_ekstra059']; ?>" placeholder="Masukkan Nama Extrakulikuler" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="ket059">Keterangan:</label>
                            <input type="text" name="ket059" id="ket059" value="<?= $edit['ket059']; ?>" placeholder="Masukkan Keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="semester059">Semester:</label>
                            <select name="semester059" id="semester059" class="form-control">
                                <option value="">Pilih Semester</option>
                                <option value="Ganjil" <?= ($edit['semester059'] == 'Ganjil') ? 'selected' : '' ?>>Ganjil</option>
                                <option value="Genap" <?= ($edit['semester059'] == 'Genap') ? 'selected' : '' ?>>Genap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="thn_ajaran059">Tahun Ajaran:</label>
                            <select name="thn_ajaran059" id="thn_ajaran059" class="form-control">
                                <option value="">Pilih Tahun Ajaran</option>
                                <option value="2020/2021" <?= ($edit['thn_ajaran059'] == '2020/2021') ? 'selected' : '' ?>>2020/2021</option>
                                <option value="2021/2022" <?= ($edit['thn_ajaran059'] == '2021/2022') ? 'selected' : '' ?>>2021/2022</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                            <a href="index.php?page=ekstra2511500059" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>