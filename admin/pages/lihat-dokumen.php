
<br>
<?php


$msg = (isset($_GET['msg'])) ? $_GET['msg'] : "index";
if ($msg == "good") {
?>
    <div class="alert alert-success" role="alert">
        Berhasil
    </div>
<?php } else if ($msg == "bad") {  ?>
    <div class="alert alert-danger" role="alert">
        Gagal
    </div>
<?php }  else if ($msg == "pdf-only"){

?>
  <div class="alert alert-danger" role="alert">
        Masukkan file pdf saja !
    </div>
<?php
}
?>

<div id="<?= $user_data['id_komoditas'] ?>" class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Data Dokumen</h1>

        <a href="index.php?page=tambah-dokumen">
            <button type="button" class="btn btn-success">Tambah Data Dokumen</button>
        </a>
        <br>
        <br>
        <br>

        <table id="TABLE_1" class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 25px;">Nomor</th>
                    <th scope="col">Nama Perusaan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">File</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomer = 0;
                $repoSQL = mysqli_query($koneksi, "SELECT * FROM kontrak INNER JOIN perusahaan ON kontrak.id_perusahaan = perusahaan.id_perusahaan");
                while ($repo = mysqli_fetch_array($repoSQL)) {
                    $nomer++;
                ?>
                    <tr>
                        <th><?= $nomer ?></th>
                        <td><?= $repo['nama_perusahaan'] ?></td>
                     
                        <td><?= $repo['tahun'] ?></td>
                        <td><a href="../uploads/<?= $repo['nama_file']?>" >File</a></td>
                        <td>
                            <a  href="index.php?page=edit-dokumen&id=<?= $repo['id_kontrak'] ?>">
                                <button type="button" class="btn btn-info">Edit</button>
                            </a>
                            <a href="pages/hapus-dokumen.php?id=<?= $repo['id_kontrak'] ?>">
                                <button type="button" class="btn btn-danger">Hapus</button>
                            </a>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>