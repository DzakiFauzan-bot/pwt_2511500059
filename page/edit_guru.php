<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">edit_guru</h1>
            </div>
        </div>
    </div>
</div>

<?php
$Kd = $_GET['kd'];
$edit = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM guru WHERE id_guru='$Kd'"));

if(isset($_POST['tambah'])){
    $id_guru = $_POST['id_guru'];
    $nama = $_POST['nama'];
    $mata_pelajaran = $_POST['mata_pelajaran'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    $insert = mysqli_query($koneksi, "UPDATE guru SET Id_guru='$id_guru', nama='$nama', mata_pelajaran='$mata_pelajaran', alamat='$alamat', no_hp='$no_hp' WHERE id_guru='$Kd'");
    if($insert){
        echo '<div class="alert alert-info-dismissible">
        <button type="button" class="close" data-dismiss="alert"aria-hidden="true">X</button>
        <h5><i class="icon fas fa-info"></i> Info </h5>
        <h4>Berhasil Disimpan</h4></div>';
        echo '<meta http-equiv="refresh" content="1;url=index.php?page=guru">';
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
                            <label for="id_guru">id_guru</label>
                            <input type="text" name="id_guru" value="<?=$edit['id_guru']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" name="nama" value="<?=$edit['nama']; ?>" id="nama" placeholder="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="mata_pelajaran">mata_pelajaran</label>
                            <input type="text" name="mata_pelajaran" value="<?=$edit['mata_pelajaran']; ?>" id="mata_pelajaran" placeholder="Mata Pelajaran" class="form-control">
                        </div>
                        
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" name="alamat" value="<?=$edit['alamat']; ?>" id="alamat" placeholder="Alamat" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">no_hp</label>
                            <input type="text" name="no_hp" value="<?=$edit['no_hp']; ?>" id="no_hp" placeholder="Nomor Hp" class="form-control">
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