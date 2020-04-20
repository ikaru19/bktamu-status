<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id =  $_POST['id_kontrak'];
// menginput data ke database


// Uploads files
// name of the uploaded file
$perusahaan = $_POST['perusahaan'];
$tahun = $_POST['tahun'];
$filename = $_FILES['myfile']['name'];
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = $perusahaan . "_" . $tahun . '.pdf';
move_uploaded_file($_FILES["file"]["tmp_name"], "../../uploads/" . $newfilename);

// destination of the file on the server
$destination = '../../uploads/' . $newfilename;

// get the file extension
$extension = pathinfo($filename, PATHINFO_EXTENSION);

// the physical file on a temporary uploads directory on the server
$file = $_FILES['myfile']['tmp_name'];
$size = $_FILES['myfile']['size'];

if (!in_array($extension, ['pdf'])) {
    header("location:../index.php?page=lihat-dokumen&msg=pdf-only");
} else {

    $repo = mysqli_query($koneksi, "SELECT * FROM `kontrak` WHERE id_kontrak = $id");
    while ($repoArr = mysqli_fetch_array($repo)) {
        unlink('../../uploads/' . $repoArr['nama_file']);
    }
    // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file, $destination)) {

        $q = mysqli_query($koneksi, "UPDATE `kontrak` SET `id_kontrak` = $perusahaan, `tahun` = '$tahun' , `nama_file` = '$newfilename' WHERE `kontrak`.`id_kontrak` = $id") or die(mysqli_error($koneksi));


        if (!$q) {
            header("location:../index.php?page=lihat-dokumen&msg=bad");
        } else {
            header("location:../index.php?page=lihat-dokumen&msg=good");
        }
    } else {
        echo "Failed to upload file.";
    }
}

 

// mengalihkan halaman kembali ke index.php
