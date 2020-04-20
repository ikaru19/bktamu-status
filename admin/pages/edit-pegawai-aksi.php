<?php
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id =  $_POST['id_pegawai'];
$nama = $_POST['nama_pegawai'];
$status = $_POST['status'];
$ket = $_POST['keterangan'];
$filename = $_FILES['myfile']['name'];
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = $nama . "_" . $nip . pathinfo($filename, PATHINFO_EXTENSION);
move_uploaded_file($_FILES["file"]["tmp_name"], "../../uploads/" . $newfilename);

// destination of the file on the server
$destination = '../../uploads/' . $newfilename;

// get the file extension
$extension = pathinfo($filename, PATHINFO_EXTENSION);

// the physical file on a temporary uploads directory on the server
$file = $_FILES['myfile']['tmp_name'];
$size = $_FILES['myfile']['size'];
// menginput data ke database
if ($filename == null) {
    $q = mysqli_query($koneksi, "UPDATE `pegawai` SET `status` = '$status', `keterangan` = '$ket' WHERE `pegawai`.`pegawaiID` = $id");
    if (!$q) {
        header("location:../index.php?page=edit-pegawai&msg=bad&id=$id");
    } else {
        header("location:../index.php?page=edit-pegawai&msg=good&id=$id");
    }
} else {
    if (!in_array($extension, ['png', 'jpg', 'jpeg'])) {
        header("location:../index.php?page=edit-pegawai&msg=pdf-only&id=$id");
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

            $q = mysqli_query($koneksi, "UPDATE `pegawai` SET `status` = '$status', `keterangan` = '$ket', `picture` = '$newfilename' WHERE `pegawai`.`pegawaiID` = $id");
            if (!$q) {
                header("location:../index.php?page=edit-pegawai&msg=bad&id=$id");
            } else {
                header("location:../index.php?page=edit-pegawai&msg=good&id=$id");
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}





 
// mengalihkan halaman kembali ke index.php
