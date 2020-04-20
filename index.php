<!DOCTYPE html>
<?php
include "koneksi.php";
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
?>
<html>

<head>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Balittas</title>
</head>

<body>

    <nav class="navbar  fixed-top navbar-expand-lg navbar-dark " style="background-color: #16a085">
        <a class="navbar-brand" href="#" style="padding: 8px"><img src="assets/img/logoHD.png" style="height: 50px"></img></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin">Admin Login<span class="sr-only">(current)</span></a>
                </li>

            </ul>



        </div>
    </nav>
    <br>
    <br>
    <br>

    <br>
    <br>



    <div class="container ">
        <!-- Content here -->
        <h1>Status Cuti Pegawai Balittas</h1>
        <br>


        <a href="http://192.168.5.2:8080/bktamu/"><button type="button" class="btn btn-success" style="margin-bottom: 3% ;">Silahkan Isi Buku Tamu Disini</button></a>

        <table id="TABLE1" class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Nama/NIP</th>
                    <th scope="col">Status</th>
                    <th scope="col">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id_komoditas = $komoditas_data['id_komoditas'];
                $nomer = 0;
                $varietas = mysqli_query($koneksi, "SELECT * FROM pegawai where NOT status = 'Hadir' ");
                while ($varietas_data = mysqli_fetch_array($varietas)) {
                    $nomer++;
                ?>
                    <tr>
                        <th scope="row"><?= $nomer ?></th>
                        <td><img src="uploads/<?= $varietas_data['picture']?>" style="height:200px"></td>
                        <td><?= $varietas_data['nama'] ?>
                            <br><?= $varietas_data['NIP'] ?></td>
                        <td><?= $varietas_data['status'] ?></td>
                        <td><?= $varietas_data['keterangan'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>





    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#TABLE1").DataTable({
                "columns": [{
                        "width": "1px"
                    },
                    {
                        "width": "1px"
                    },
                    {
                        "width": "30%"
                    },
                    {
                        "width": "1px"
                    },
                    null
                ]
            });
        });
    </script>
</body>

</html>