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
<?php } ?>
<div class="card ">
    <div class="card-header text-center">
        <h2>Tambah User</h2>
    </div>
    <div class="card-body">
        <form method="post" action="pages/tambah-user-aksi.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="nama_komoditas" id="InputNama" aria-describedby="emailHelp" placeholder="Masukkan Username">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="text" class="form-control" name="harga_komoditas" id="InputHarga" aria-describedby="emailHelp" placeholder="Masukkan Password">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Role</label>
                <select class="form-control" name="role" id="exampleFormControlSelect1">
                    <option value="admin">Super Admin</option>
                    <option value="user">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

    </div>
</div>