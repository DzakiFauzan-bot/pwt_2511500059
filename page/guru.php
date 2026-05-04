<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Guru</h1>
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_GET['action'])) {
    if($_GET['action'] == "hapus") {
        $Kd =$_GET['kd'];
        $query = mysqli_query($koneksi, "DELETE FROM guru WHERE id_guru ='$Kd'");
        if ($query) {
            echo '
            <div class="alert alert-warning alert-dismissible">
            Berhasil di hapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=index.php?page=guru">';
        }
    }
}
?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <a href="index.php?page=tambah_guru" class="btn btn-primary btn-sm">Tambah Guru</a>
                <table class="table table-striped">
                    <tread>
                        <tr>
                            <th>id guru</th>
                            <th>nama</th>
                            <th>mata_pelajaran</th>
                            <th>alamat</th>
                            <th>no_hp</th>
                        </tr>
                    </tread>
                    <?php
                    $no = 0;
                    $query = mysqli_query($koneksi, "SELECT * FROM guru");
                    while ($result = mysqli_fetch_array($query) ) {
                        $no++
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?=$result['id_guru']; ?></td>
                                <td><?=$result['nama']; ?></td>
                                <td><?=$result['mata_pelajaran']; ?></td>
                                <td><?=$result['no_hp']; ?></td>
                                <td><?=$result['alamat']; ?></td>
                                <td>
                                    <a href="index.php?page=guru&action=hapus&kd=<?= $result['id_guru']; ?>" title="delete">
                                    <span class="badge badge-danger">Hapus</span>
                                    </a>

                                    <a href="index.php?page=edit_guru&kd=<?= $result['id_guru']; ?>" title="edit">
                                    <span class="badge badge-warning">Edit</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  