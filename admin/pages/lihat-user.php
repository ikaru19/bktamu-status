
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
<?php } ?>

<div id="<?= $user_data['id_komoditas'] ?>" class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Data User</h1>

        <a href="index.php?page=users-add">
            <button type="button" class="btn btn-success">Tambah User</button>
        </a>
        <br>
        <br>
        <br>

        <table id="TABLE_1" class="table">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomer = 0;
                $user = mysqli_query($koneksi, "SELECT * FROM users");
                while ($user_data = mysqli_fetch_array($user)) {
                    $nomer++;
                ?>
                    <tr>

                        <th scope="row"><?= $nomer ?></th>
                        <td><?= $user_data['username'] ?></td>
                        <td><?= $user_data['password'] ?></td>
                        <td>
                            <!-- <a href="index.php?page=edit-varietas&id=<?= $varietas_data['id_varietas'] ?>">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a> -->
                            <a href="pages/hapus-user.php?id=<?= $user_data['id_users'] ?>">
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