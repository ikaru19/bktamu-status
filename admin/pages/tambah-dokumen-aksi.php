<?php
// koneksi database
include '../../koneksi.php';




// Uploads files
// name of the uploaded file
$perusahaan = $_POST['perusahaan'];
$tahun = $_POST['tahun'];
$filename = $_FILES['myfile']['name'];
$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = $perusahaan."_".$tahun. '.pdf';
move_uploaded_file($_FILES["file"]["tmp_name"], "../../uploads/" . $newfilename);

// destination of the file on the server
$destination = '../../uploads/' . $newfilename;

// get the file extension
$extension = pathinfo($filename, PATHINFO_EXTENSION);

// the physical file on a temporary uploads directory on the server
$file = $_FILES['myfile']['tmp_name'];
$size = $_FILES['myfile']['size'];

if (!in_array($extension, ['pdf'])) {
    header("location:../index.php?page=lihat-repo&msg=pdf-only");
} else {
    // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file, $destination)) {
       
        $q = mysqli_query($koneksi, "insert into kontrak values(NULL,'$perusahaan','$tahun','$newfilename')");

    
        if (!$q) {
            header("location:../index.php?page=lihat-dokumen&msg=bad");
        } else {
            header("location:../index.php?page=lihat-dokumen&msg=good");
        }
    } else {
        echo "Failed to upload file.";
    }
}
