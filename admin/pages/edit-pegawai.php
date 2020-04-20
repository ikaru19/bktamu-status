<?php
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['id'];


// menghapus data dari database

$komoditas = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE pegawaiID = $id");
while ($pegawai_data = mysqli_fetch_array($komoditas)) {
?>

    <div class="card ">
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
        <div class="card-header text-center">
            <h2>Edit Perusahaan</h2>
        </div>
        <div class="card-body">
            <form method="post" action="pages/edit-pegawai-aksi.php" enctype="multipart/form-data">
                <img src="../uploads/<?= $pegawai_data['picture'] ?>" style="height:200px">
                <input type="hidden" name="id_pegawai" value="<?= $pegawai_data['pegawaiID'] ?>">

                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Pegawai</label>
                    <input type="text" readonly class="form-control" name="nama_pegawai" id="InputNama" aria-describedby="emailHelp" placeholder="Masukkan Nama Perusahaan" value="<?= $pegawai_data['nama'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="text" readonly class="form-control" name="nip" id="InputNama" aria-describedby="emailHelp" placeholder="Masukkan Nama Perusahaan" value="<?= $pegawai_data['NIP'] ?>">
                </div>
                <label for="exampleFormControlTextarea1">Foto</label>
                <div class="form-group">
                    <label for="exampleFormControlFile1">File Data Repository (PNG,JPG,JPEG)</label>
                    <input type="file" name="myfile" class="form-control-file" id="exampleFormControlFile1">
                </div>  
                <div class="form-group">
                    <label for="email">Status</label>
                    <select class="form-control" name="status" id="exampleFormControlSelect1">
                        <?php $status = $pegawai_data['status'] ?>
                        <option <?php if ($status == "Hadir") echo 'selected'; ?> value="Hadir">Hadir</option>
                        <option <?php if ($status == "Cuti") echo 'selected'; ?> value="Cuti">Cuti</option>
                        <option <?php if ($status == "TN") echo 'selected'; ?> value="TN">TN</option>
                        <option <?php if ($status == "Ijin") echo 'selected'; ?> value="Ijin">Ijin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3"><?= $pegawai_data['keterangan'] ?></textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>

        </div>
    </div>
<?php
}
?>