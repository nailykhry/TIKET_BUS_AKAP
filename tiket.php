<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIKET</title>

    <!-- BOOTSTRAP LIB -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- CSS STYLE -->
    <link rel="stylesheet" href="css/tiket.php">
</head>

<body>
    <!-- PEMESANAN TIKET -->

    <?php

    include 'database.php';

    if (isset($_POST['submit'])) {

        //Assign data from $_POST into a variabel
        $pemesan = $_POST['name'];
        $nik = $_POST['nik'];
        $hp = $_POST['telp'];
        $kelas = $_POST['kelas'];
        $tanggal = $_POST['jadwal'];
        $jumlah_penumpang = $_POST['jumlahpenumpang'];
        $jumlah_penumpang_lansia = $_POST['jumlahlansia'];


        $sql = "SELECT id, harga  FROM kelas";
        $cari = $conn->query($sql);

        $harga_tiket = 0;
        while ($baris = $cari->fetch_assoc()) {
            if ($baris['id'] == $kelas) {
                $harga_tiket =  $baris['harga'];
                break;
            }
        }

        $total_bayar = $harga_tiket * $jumlah_penumpang + ($harga_tiket - $harga_tiket * 0.1) * $jumlah_penumpang_lansia;

        //INSERT INTO DATABASE
        $sql = "INSERT INTO pesanan (pemesan, nik, hp, kelas, tanggal, jumlah_penumpang, jumlah_penumpang_lansia, harga_tiket, total_bayar) VALUES ('$pemesan', '$nik', '$hp', '$kelas', '$tanggal', $jumlah_penumpang, $jumlah_penumpang_lansia, $harga_tiket, $total_bayar)";
        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">';
            echo 'alert("berhasil menambahkan pesanan!")';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        //UPDATE KELAS
        $query2 = mysqli_query($conn, "SELECT * FROM `kelas` WHERE `id` = $kelas");
        $kelas_dipilih = mysqli_fetch_array($query2);
        $update_kursi = $kelas_dipilih['kursi'] - $jumlah_penumpang - $jumlah_penumpang_lansia;

        //update banyak sisa bus
        $update = "UPDATE kelas SET kursi=$update_kursi WHERE id=$kelas";
        $conn->query($update);
    }
    ?>

    <?php
    //ambil data
    $query = mysqli_query($conn, "SELECT * FROM `pesanan` ORDER BY `id` DESC LIMIT 1");
    $data_ticket = mysqli_fetch_array($query);
    $kelas_id =  $data_ticket['kelas'];

    $query2 = mysqli_query($conn, "SELECT * FROM `kelas` WHERE `id` = $kelas_id");
    $kelas_dipilih = mysqli_fetch_array($query2);
    ?>

    <!-- TAMPILAN TIKET -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg bg-danger text-white text-center">
                <h1>Informasi Tiket AKAP</h1>
                <h3>Pesanan Dikonfimasi</h3>
                <hr />
                <h6>Nomor Tiket : AKAP00<?= $data_ticket['id']; ?></h6>
            </div>
            <div>
                <p> Hai, <?= $data_ticket['pemesan']; ?>!</p>
                <p>Terima kasih sudah memilih layanan kami.</p>
                <p> Pesanan Anda sudah dikonfirmasi <b>(Kode ID Tiket - AKAP00<?= $data_ticket['id']; ?>)</b>.</p>
            </div>

            <div class="col-md-5 bg-light border border-dark rounded">
                <h3 style="text-align: center;">DETAIL TIKET</h3>

                <table class="table table-borderless">
                    <tr>
                        <td>Kode Tiket </td>
                        <td>: AKAP00<?= $data_ticket['id']; ?> </td>
                    </tr>
                    <tr>
                        <td>Nama Pemesan </td>
                        <td>: <?= $data_ticket['pemesan']; ?> </td>
                    </tr>
                    <tr>
                        <td>Nomor Identitas </td>
                        <td>: <?= $data_ticket['nik']; ?> </td>
                    </tr>
                    <tr>
                        <td>Nomor HP </td>
                        <td>: <?= $data_ticket['hp']; ?></td>
                    </tr>
                    <tr>
                        <td>Kelas Penumpang </td>
                        <td>: <?= $kelas_dipilih['kelas']; ?> </td>
                    </tr>
                    <tr>
                        <td>Nama Bus </td>
                        <td>: <?= $kelas_dipilih['nama']; ?> </td>
                    </tr>
                    <tr>
                        <td>Asal - Tujuan </td>
                        <td>: <?= $kelas_dipilih['asal']; ?> - <?= $kelas_dipilih['tujuan']; ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal dan Waktu Keberangkatan </td>
                        <td>: <?= $kelas_dipilih['tanggal']; ?> <?= $kelas_dipilih['jam']; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Penumpang </td>
                        <td>: <?= $data_ticket['jumlah_penumpang']; ?> orang</td>
                    </tr>
                    <tr>
                        <td>Jumlah Penumpang Lansia</td>
                        <td>: <?= $data_ticket['jumlah_penumpang_lansia']; ?> orang</td>
                    </tr>
                    <tr>
                        <td>Harga Tiket </td>
                        <td>: Rp<?= $data_ticket['harga_tiket']; ?>,- </td>
                    </tr>
                    <tr>
                        <td>Total Bayar </td>
                        <td>: Rp<?= $data_ticket['total_bayar']; ?>,- </td>
                    </tr>
                </table>
            </div>

            <!-- KETENTUAN -->
            <div class="row justify-content-md-center mt-5">
                <div class="col-md-5 bg-light border border-dark rounded ">
                    <h3 style="text-align: center;">KETENTUAN PEMESANAN</h3>
                    <hr>
                    <b><i class="bi bi-balloon-fill"></i> Ketentuan Penumpang Anak-anak</b>
                    <p style="text-align: justify;">Anak berusia diatas 3 tahun wajib memiliki tiket.</p>
                    <hr>
                    <b><i class="bi bi-bag-check"></i> Ketentuan Bagasi</b>
                    <p style="text-align: justify;">Maksimal 3 barang bagasi gratis setiap penumpang, selebihnya akan dikenakan biaya tambahan. Kelebihan bagasi lebih dari 10 KG per penumpang akan dikenakan biaya tambahan.</p>
                    <hr>
                    <b><i class="bi bi-clipboard-x-fill"></i> Ketentuan Barang yang Dilarang </b>
                    <p style="text-align: justify;">Penumpang dilarang membawa barang yang dinyatakan terlarang/legal, dan berbau menyengat.</p>
                    <hr>
                    <b><i class="bi bi-person-fill"></i> Ketentuan Penumpang Lansia</b>
                    <p style="text-align: justify;">Kriteria penumpang lansia adalah yang berusia 60 tahun ke atas. Penumpang lansia akan mendapat potongan harga 10%.</p>
                </div>
            </div>

            <!-- PEDOMAN -->
            <div class="row justify-content-md-center mt-5">
                <div class="col-md-5 bg-light border border-dark rounded ">
                    <h3 style="text-align: center;">PEDOMAN PENUMPANG</h3>
                    <hr>
                    <b><i class="bi bi-file-earmark-ruled-fill"></i> Peraturan wajib masker untuk penumpang</b>
                    <p style="text-align: justify;">Masker standard wajib untuk semua penumpang. Saputangan / kain tidak diizinkan sebagai masker.</p>
                    <hr>
                    <b><i class="bi bi-moon-stars-fill"></i> Bawalah selimut Anda sendiri</b>
                    <p style="text-align: justify;">Dalam upaya menjaga kebersihan maksimal, Anda diminta membawa selimut dan linen sendiri karena operator bus tidak akan menyediakannya.</p>
                    <hr>
                    <b><i class="bi bi-heart-pulse-fill"></i> Jangan bepergian jika memiliki gejala </b>
                    <p style="text-align: justify;">Penumpang disarankan untuk tidak bepergian jika mereka menunjukkan Gejala Covid-19. Dalam kasus ini, penumpang berisiko kehilangan kursi.</p>
                </div>
            </div>
            <div class="col-lg bg-danger text-white text-center mt-5 mb-5">
                <h1>Terima Kasih</h1>
                <h3>Semoga selamat sampai tujuan</h3>
                <hr />
                <h6>Nomor Tiket : AKAP00<?= $data_ticket['id']; ?></h6>
            </div>
        </div>
    </div>

    <!-- CLOSE DATABASE -->
    <?php mysqli_close($conn); ?>

    <!-- BUTTON NAVBAR -->
    <div id="button" class="button mt-3 mb-5">
        <button class="btn btn-primary" onclick="window.print()">Download Tiket</button>
        <a class="btn btn-danger" href="index.php">Kembali</a>
    </div>


    <script src="js/script.js"></script>
</body>

</html>