<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Siswa</h1>
            </div>
        </div>
    </div>
</div>

<?php
$Nis = $_GET['nis_siswa'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis_siswa='$nis_siswa'"));

if(isset($_POST['tambah'])){
    $nis_siswa = $_POST['nis_siswa'];
    $nama_siswa = $_POST['nama_siswa'];
    $no_hp = $_POST['no_hp'];
    $id_kelas = $_POST['id_kelas'];

    $insert = mysqli_query($koneksi, "UPDATE siswa SET nama_siswa='$nama_siswa', no_hp='$no_hp', id_kelas='$id_kelas' WHERE nis_siswa='$nis_siswa'");
    if($insert){
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert"aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=mapel">';
    }else {
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
                            <input type="text" name="nis_siswa" value="<?=$edit['nis_siswa']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa">nama siswa</label>
                            <input type="text" name="nama_siswa" value="<?=$edit['nama_siswa']; ?>" id="nama_siswa" placeholder="nama siswa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">no hp</label>
                            <input type="text" name="no_hp" value="<?=$edit['no_hp']; ?>" id="no_hp" placeholder="no hp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_kelas">id kelas</label>
                            <input type="text" name="id_kelas" value="<?=$edit['id_kelas']; ?>" id="id_kelas" placeholder="id kelas" class="form-control">
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