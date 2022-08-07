<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Bus AKAP</title>

    <!-- BOOTSTRAP LIB -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">

    <!-- CSS SENDIRI -->
    <link rel="stylesheet" href="css/pesan.css">
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">TIKET BUS AKAP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="index.php">Bus AKAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pembeli.php">Data Pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pesan.php">Pesan Tiket</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- FORM PEMESANAN -->

    <?php
    include 'database.php';
    include 'function.php';
    ?>

    <div class="form-pesan">
        <p class="title">Formulir Pemesanan</p>
        <form action="pesan.php" class="form-container" method="post">
            <label for="name"><b class="form-text">Nama Lengkap</b></label><br>
            <input type="text" name="name" class="form" value=" <?= isset($_POST['name']) ? $_POST['name'] : '' ?>" required> <br><br>

            <label for="nik"><b class="form-text">Nomor Identitas<span style="color:red;"> (16 angka)</span></b></label><br>
            <input type="text" name="nik" class="form" value=" <?= isset($_POST['nik']) ? $_POST['nik'] : '' ?>" pattern="[0-9]{16}" required> <br><br>

            <label for="telp"><b class="form-text">No. HP<span style="color:red;"> (>=10 angka)</span></b></label><br>
            <input type="text" name="telp" class="form" value=" <?= isset($_POST['telp']) ? $_POST['telp'] : '' ?>" pattern="[0-9]{10,}" required> <br><br>

            <label for=" kelas"><b class="form-text">Kelas Penumpang</b></label><br>
            <select id="kelas" name="kelas" class="form" value=" <?= isset($_POST['kelas']) ? $_POST['kelas'] : '' ?>">
                <?php
                while ($row = $kelas->fetch_assoc()) { ?>
                    <option value="<?= $row['id']; ?>">
                        <?= $row['nama']; ?> | <?= $row['tanggal']; ?> <?= $row['jam']; ?> | <?= $row['asal']; ?> - <?= $row['tujuan']; ?></option>
                <?php } ?>
            </select><br><br>


            <label for="jadwal"><b class="form-text">Jadwal Keberangkatan</b></label><br>
            <input type="date" id="jadwal" name="jadwal" class="form" value=" <?= isset($_POST['jadwal']) ? $_POST['jadwal'] : '' ?>" required><br><br>

            <label for="jumlahpenumpang"><b class="form-text">Jumlah Penumpang</b></label><br>
            <input type="text" name="jumlahpenumpang" class="form" value=" <?= isset($_POST['jumlahpenumpang']) ? $_POST['jumlahpenumpang'] : '' ?>" pattern="[0-9]+" required> <br><br>

            <label for="jumlahlansia"><b class="form-text">Jumlah Penumpang Lansia<span style="color:red;"> (> 60 tahun)</span></b></label><br>
            <input type="text" name="jumlahlansia" class="form" value=" <?= isset($_POST['jumlahlansia']) ? $_POST['jumlahlansia'] : '' ?>" pattern="[0-9]+" required> <br><br>

            <!-- NOTE -->
            <b style="color: red;"> *cek spasi didepan input text apabila terdapat kesalahan dan tidak bisa submit </b>

            <!-- COUNT TICKET PRICE AFTER BUTTON CLICKED -->
            <table class="mt-3">
                <tr>
                    <td>Harga Tiket </td>
                    <td>
                        <?php if (isset($_POST['hitung'])) { ?>
                            <input type=" text" value="<?php
                                                        $harganya =  price($_POST['kelas']);
                                                        echo "Rp$harganya,-"  ?>" class="number">
                        <?php
                        } else { ?>
                            <input type="text" value="Rp 0,-" class="number">
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    <td><?php if (isset($_POST['hitung'])) { ?>

                            <input type=" text" value="<?php
                                                        $total = counts($_POST['jumlahpenumpang'], $_POST['jumlahlansia'], price($_POST['kelas']));
                                                        echo "Rp$total,-"; ?>" class="number">
                        <?php
                        } else { ?>
                            <input type="text" value="Rp 0,-" class="number">
                        <?php } ?>
                    </td>
                </tr>
            </table>


            <br>

            <input type="checkbox" id="ketentuan" name="ketentuan" value="ketentuan" required>
            <label for="ketentuan"> Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan</label><br><br>

            <button type="submit" class="btn" name="hitung">Hitung Total Bayar</button>
            <button type="submit" class="btn" name="submit" formaction="tiket.php">Pesan Tiket</button>
            <button type="submit" class="btn" name="cancel"><a href="index.php" style="text-decoration: none; color:white">Cancel</a></button>

        </form>

    </div>

    <!-- FOOTER -->
    <footer class="text-center text-lg-start bg-white text-muted">

        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <div class="me-5 d-none d-lg-block">
                <span>Temukan kami di sosial media:</span>
            </div>

            <div>
                <a href="https://web.facebook.com/profile.php?id=100083606995507" class="me-4 link-grayish">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/nailykhry__" class="me-4 link-grayish">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.instagram.com/nailykhry/" class="me-4 link-grayish">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.linkedin.com/in/nailykhairiya/" class="me-4 link-grayish">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/nailykhry" class="me-4 link-grayish">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </section>

        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">

                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="bi bi-sun"></i> TIKET BUS AKAP
                        </h6>
                        <p style="text-align: justify;">
                            Bepergian ke destinasi favorit Anda jadi lebih mudah berkat jangkauan Tiket Bus AKAP yang luas di Indonesia.
                            Menawarkan operator bus terbaik dengan armada bus paling baru, mencapai tujuan Anda dengan aman dan nyaman datang dengan harga yang terjangkau.
                            Pun dengan segala kemudahan memesan tiket bus di platform ini,
                            pemesanan tiket bus dapat diselesaikan dalam beberapa menit saja.

                        </p>
                    </div>


                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                        <h6 class="text-uppercase fw-bold mb-4">
                            Link
                        </h6>
                        <p>
                            <a href="index.php" class="text-reset">Daftar Bus</a>
                        </p>
                        <p>
                            <a href="pesan.php" class="text-reset">Pesan Tiket</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3 text-grayish"></i> Temanggung, Jawa Tengah</p>
                        <p>
                            <i class="fas fa-envelope me-3 text-grayish"></i>
                            busakap@gmail.com
                        </p>
                        <p><i class="fas fa-phone me-3 text-grayish"></i> + 6283 8210 82460</p>
                        <p><i class="fas fa-print me-3 text-grayish"></i> + 6283 8210 82460</p>
                    </div>

                </div>

            </div>
        </section>

    </footer>
</body>

</html>