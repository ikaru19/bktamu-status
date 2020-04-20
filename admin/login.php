<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN ULP Balittas</title>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="my.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <br>
            <img style="height:90px;margin-bottom:30px;" src="../assets/img/balittas.png"></img>
            <h1>Buku Tamu Balittas Admin</h1>
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "Login gagal! username dan password salah!";
                } else if ($_GET['pesan'] == "logout") {
                    echo "Anda telah berhasil logout";
                } else if ($_GET['pesan'] == "belum_login") {
                    echo "Anda harus login untuk mengakses halaman admin";
                }
            }
            ?>
            <!-- Icon -->

            <!-- Login Form -->
            <form method="post" action="do_login.php">
                <input type="text" id="username" class="fadeIn second" name="username" placeholder="Masukkan Username">
                <input type="password" name="password" class="fadeIn third" name="login" placeholder="Masukkan Password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

        </div>
    </div>

</body>

</html>