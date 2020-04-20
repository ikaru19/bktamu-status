<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
$q=mysqli_query($koneksi,"delete from pegawai where pegawaiID='$id'");


 
// mengalihkan halaman kembali ke index.php

if(!$q){
    header("location:../index.php?page=lihat-pegawai&msg=bad");

}else{
    header("location:../index.php?page=lihat-pegawai&msg=good");
}
 
 
?>