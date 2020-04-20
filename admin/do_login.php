<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'pages/koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from users where username='$username' and password='$password'");

$test_login = mysqli_query($koneksi,"INSERT INTO last_login VALUES (NULL, '$username',current_timestamp())");


// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	while ($login_data = mysqli_fetch_array($data)) {
		$_SESSION['hak_akses'] = $login_data['hak_akses'];
	}
	
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:index.php");
	
}else{
	header("location:login.php?pesan=gagal");
}
?>