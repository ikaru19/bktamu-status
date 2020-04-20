<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama_komoditas'];
$harga = $_POST['harga_komoditas'];
$role = $_POST['role'];
 
// menginput data ke database
$q = mysqli_query($koneksi,"INSERT INTO `users` (`id_users`, `nama`, `username`, `password`, `avatar`, `hak_akses`, `created_at`, `updated_at`) 
                    VALUES (NULL, '', '$nama', '$harga', '', '$role', current_timestamp(), '');");


if(!$q){
    header("location:../index.php?page=lihat-user&msg=bad");
}else{
    header("location:../index.php?page=lihat-user&msg=good");
}
 
// mengalihkan halaman kembali ke index.php

 
?>