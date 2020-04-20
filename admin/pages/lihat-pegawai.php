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
<?php } else if ($msg == "pdf-only") {

?>
    <div class="alert alert-danger" role="alert">
        Masukkan file gambar saja !
    </div>
<?php
}
?>

<div id="<?= $user_data['id_komoditas'] ?>" class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Data Pegawai</h1>
        <?php
        if ($_SESSION['hak_akses'] == "admin") {
        ?>
            <a href="index.php?page=tambah-pegawai">
                <button type="button" class="btn btn-success">Tambah Data Pegawai</button>
            </a>
        <?php
        }
        ?>
        <br>
        <br>
        <br>

        <table id="TABLE1" class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_komoditas = $komoditas_data['id_komoditas'];
                $nomer = 0;
                $varietas = mysqli_query($koneksi, "SELECT * FROM pegawai ");
                while ($varietas_data = mysqli_fetch_array($varietas)) {
                    $nomer++;
                ?>
                    <tr>
                        <th scope="row"><?= $nomer ?></th>
                        <td><?= $varietas_data['nama'] ?></td>
                        <td><?= $varietas_data['NIP'] ?></td>
                        <td><?= $varietas_data['status'] ?></td>
                        <td><?= $varietas_data['keterangan'] ?></td>
                        <td> <a href="index.php?page=edit-pegawai&id=<?= $varietas_data['pegawaiID'] ?>">
                                <button type="button" class="btn btn-info">Edit</button>
                            </a>
                            <?php
                            if ($_SESSION['hak_akses'] == "admin") {
                            ?>
                                <a href="pages/hapus-pegawai.php?id=<?= $varietas_data['pegawaiID']?>">
                                    <button type="button" class="btn btn-danger">Hapus</button>
                                </a>
                            <?php
                            }
                            ?>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </table>

    </div>
</div>