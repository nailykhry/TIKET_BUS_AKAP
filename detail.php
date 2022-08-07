<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAIL BUS</title>


    <!-- BOOTSTRAP LIB -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

</head>

<body>
    <!-- DETAIL BUS -->
    <!-- mengambil code di database.php -->
    <?php
    include 'database.php';
    //hubungkan dengan id terkait
    while ($row = $kelas->fetch_assoc()) {
        if ($row['id'] == $_GET['id']) {
            $bus_detail = $row;
        }
    }
    ?>

    <!-- KONTEN DETAIL BUS -->
    <div class="container">
        <!-- TITLE -->
        <div class="row justify-content-md-center">
            <div class="col-lg bg-danger text-white">
                <h1 style="text-align: center;">Informasi Bus</h1>
                <hr />
                <h1 style="text-align: center;"><?= $bus_detail['nama']; ?> | <?= $bus_detail['kelas']; ?></h1>
            </div>

        </div>
        <!-- ISI -->
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-5 bg-light">
                <img src="img/<?= $bus_detail['gambar']; ?>" alt="gambar Bis">
                <table>
                    <tr>
                        <td>Harga Tiket</td>
                        <td>: Rp<?= $bus_detail['harga']; ?>,-</td>
                    </tr>
                    <tr>
                        <td>Asal Keberangkatan</td>
                        <td>: <?= $bus_detail['asal']; ?></td>
                    </tr>
                    <tr>
                        <td>Tujuan Bus</td>
                        <td>: <?= $bus_detail['tujuan']; ?></td>
                    </tr>
                    <tr>
                        <td>Sisa Kursi</td>
                        <td>: <?= $bus_detail['kursi']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal dan Waktu</td>
                        <td>: <?= $bus_detail['tanggal']; ?> <?= $bus_detail['jam']; ?></td>
                    </tr>
                    <tr>
                        <td>Fasilitas</td>
                        <td>: <?= $bus_detail['fasilitas']; ?> </td>
                    </tr>

                </table>

                <!-- BUTTON NAV -->
                <div id="button" class="button mt-3">
                    <a class="btn btn-danger" href="index.php" role="button">Kembali</a>
                    <a class="btn btn-primary" href="pesan.php" role="button">Pesan Sekarang</a>
                </div>

            </div>
        </div>

    </div>


</body>

</html>