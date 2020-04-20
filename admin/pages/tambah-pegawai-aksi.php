<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama_perusahaan'];
 
// menginput data ke database
$q = mysqli_query($koneksi,"insert into perusahaan values(NULL,'$nama')");


if(!$q){
    header("location:../index.php?page=tambah-perusahaan&msg=bad");
}else{
    header("location:../index.php?page=tambah-perusahaan&msg=good");
}
 
// mengalihkan halaman kembali ke index.php

 
?>