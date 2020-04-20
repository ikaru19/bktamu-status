<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
 
 
// menghapus data dari database
$q=mysqli_query($koneksi,"delete from users where id_users='$id'");


 
// mengalihkan halaman kembali ke index.php

if(!$q){
    header("location:../index.php?page=lihat-user&msg=bad");

}else{
    header("location:../index.php?page=lihat-user&msg=good");
}
 
 
?>