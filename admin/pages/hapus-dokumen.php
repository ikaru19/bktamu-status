<?php 
// koneksi database
include '../../koneksi.php';
 
// menangkap data id yang di kirim dari url
$id = $_GET['id'];
$repo = mysqli_query($koneksi, "SELECT * FROM `kontrak` WHERE id_kontrak = $id");
while ($repoArr = mysqli_fetch_array($repo)) {
    unlink('../../uploads/'.$repoArr['nama_file']);
}
 
 
// menghapus data dari database
$q=mysqli_query($koneksi,"delete from kontrak where id_kontrak='$id'");


 
// mengalihkan halaman kembali ke index.php

if(!$q){
    header("location:../index.php?page=lihat-dokumen&msg=bad");

}else{
    header("location:../index.php?page=lihat-dokumen&msg=good");
}
 
 
?>