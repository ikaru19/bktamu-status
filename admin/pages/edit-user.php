<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database

$komoditas = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id");
while ($komoditas_data = mysqli_fetch_array($komoditas)) {
?>
<div class="card ">
    <div class="card-header text-center">
        <h2>Edit Komoditas</h2>
    </div>
    <div class="card-body">
        <form method="post" action="pages/edit-komoditas-aksi.php">
            <input type="hidden" name="id_komoditas" value="<?=$komoditas_data['id_komoditas']?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Komoditas</label>
                <input type="text" class="form-control" name="nama_komoditas" id="InputNama" aria-describedby="emailHelp" placeholder="Masukkan Nama Komoditas" value="<?=$komoditas_data['nama_komoditas']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Harga</label>
                <input type="number" class="form-control" name="harga_komoditas" id="InputHarga" aria-describedby="emailHelp" placeholder="Masukkan Harga" value="<?=$komoditas_data['harga_komoditas']?>">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>

    </div>
</div>
<?php
}
?>