<br>

<?php
$msg = (isset($_GET['msg'])) ? $_GET['msg'] : "index";
if ($msg == "good") {
?>
    <div class="alert alert-success" role="alert">
        Memasukkan Data Berhasil
    </div>
<?php } else if ($msg == "bad") {  ?>
    <div class="alert alert-danger" role="alert">
        Memasukkan Data Gagal
    </div>
<?php }  else if ($msg == "pdf-only"){

?>
  <div class="alert alert-danger" role="alert">
        Masukkan file pdf atau docx saja !
    </div>
<?php
}
?>
<div class="card ">
    <div class="card-header text-center">
        <h2>Tambah Data Dokumen Kontrak</h2>
    </div>
    <div class="card-body">
        <form method="post" action="pages/tambah-dokumen-aksi.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Perusahaan :</label>
                <select class="form-control" name="perusahaan" id="exampleFormControlSelect1" required>
                    <?php
                    $komo_sql = mysqli_query($koneksi, "SELECT * FROM perusahaan");
                    while ($komo_data = mysqli_fetch_array($komo_sql)) {
                    ?>
                        <option value="<?= $komo_data['id_perusahaan'] ?>"><?= $komo_data['nama_perusahaan'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Tahun :</label>
                <input type="number" name="tahun" class="form-control" id="exampleFormControlInput1" placeholder="masukkan tahun" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">File Data Repository (pdf)</label>
                <input type="file" name="myfile" class="form-control-file" id="exampleFormControlFile1" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>
</div>