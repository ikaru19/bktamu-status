<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database

$komoditas = mysqli_query($koneksi, "SELECT * FROM `kontrak` INNER JOIN perusahaan on kontrak.id_perusahaan = perusahaan.id_perusahaan WHERE id_kontrak = $id");
while ($komoditas_data = mysqli_fetch_array($komoditas)) {
?>
    <div class="card ">
        <div class="card-header text-center">
            <h2>Edit Repository Data</h2>
        </div>
        <div class="card-body">
            <form method="post" action="pages/edit-dokumen-aksi.php" enctype="multipart/form-data">
                <input type="hidden" name="id_kontrak" value="<?= $komoditas_data['id_kontrak'] ?>">
                <div class="form-group">
                    <label for="email">Komoditas :</label>
                    <select class="form-control" name="perusahaan" id="exampleFormControlSelect1">
                        <?php
                        $komo_sql = mysqli_query($koneksi, "SELECT * FROM perusahaan");
                        while ($komo_data = mysqli_fetch_array($komo_sql)) {
                        ?>
                            <option <?php
                                    if ($komo_data['id_perusahaan'] ==  $komoditas_data['id_perusahaan']) {
                                        echo 'selected';
                                    }

                                    ?> value="<?= $komo_data['id_perusahaan'] ?>"><?= $komo_data['nama_perusahaan'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Tahun :</label>
                    <input type="number" name="tahun" class="form-control" id="exampleFormControlInput1" placeholder="masukkan tahun" require value="<?= $komoditas_data['tahun'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">File Data Repository (pdf)</label>
                    <input type="file" name="myfile" class="form-control-file" id="exampleFormControlFile1" >
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>

        </div>
    </div>
<?php
}
?>