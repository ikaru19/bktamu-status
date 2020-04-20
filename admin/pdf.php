<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
include 'pages/koneksi.php';

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}



$id = $_GET['id'];
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p', 'mm', 'A4');
$tgl_banget;
$komoname;

// membuat halaman baru
$pdf->AddPage();


$tgl = mysqli_query($koneksi, "SELECT * FROM tanggal_perubahan");
while ($tgl_data = mysqli_fetch_array($tgl)) {
    $date = strtotime($tgl_data['date_change']);
    $tgl_indo = date("Y-m-d", $date);
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial', 'B', 16);
    // mencetak string 
    $pdf->Cell(190, 7, 'STOK BENIH '.tgl_indo($tgl_indo), 0, 1, 'C');
    $tgl_banget = tgl_indo($tgl_indo);
}

$satuan;

$komoditas = mysqli_query($koneksi, "SELECT * FROM komoditas WHERE id_komoditas = $id");
while ($row = mysqli_fetch_array($komoditas)) {
    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(190, 7, 'KOMODITAS '.$row['nama_komoditas'], 0, 1, 'C');
    $komoname = $row['nama_komoditas'];
    $satuan = $row['satuan_komoditas'];
}


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(8, 7, 'NO.', 1, 0);
$pdf->Cell(43, 7, 'NAMA VARIETAS', 1, 0);
$pdf->Cell(33, 7, 'ASAL', 1, 0);
$pdf->Cell(20, 7, 'KELAS', 1, 0);
$pdf->Cell(45, 7, 'JUMLAH', 1, 0);
$pdf->Cell(45, 7, 'KETERANGAN', 1, 1);

$pdf->SetFont('Arial', '', 10);


$varietas = mysqli_query($koneksi, "SELECT * FROM varietas WHERE id_komoditas = $id");
$nomer = 0;
while ($row = mysqli_fetch_array($varietas)) {
    $nomer++;
    $pdf->Cell(8, 7, $nomer, 1, 0);
    $pdf->Cell(43, 7, $row['nama_varietas'], 1, 0);
    $pdf->Cell(33, 7, $row['asal'], 1, 0);
    $pdf->Cell(20, 7, $row['kelas_benih'], 1, 0);
    $pdf->Cell(45, 7, $row['jumlah_stok']." ".$satuan, 1, 0);
    $pdf->Cell(45, 7, $row['keterangan'], 1, 1);
}


$pdf->Output('',$tgl_banget."-".$komoname.".pdf");
