<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembeli | ADMIN</title>

    <!-- BOOTSTRAP LIB -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">

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
                        <a class="nav-link" aria-current="page" href="index.php">Bus AKAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="pembeli.php">Data Pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesan.php">Pesan Tiket</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- TITLE -->
    <br><br>
    <h1 style="text-align: center;">DATA PEMBELI</h1>
    <?php include 'database.php' ?>

    <!-- CONTENT -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg bg-light text-dark text-center">
                <table class="table table-hover mt-5">
                    <thead style="background-color: #FFC0CB;">
                        <tr>
                            <th scope="col">ID Tiket</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Nomor Identitas</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Jumlah Penumpang</th>
                            <th scope="col">Jumlah Penumpang Lansia</th>
                            <th scope="col">Harga Tiket</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">BUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $pesanan->fetch_assoc()) { ?>
                            <tr>
                                <td>AKAP00<?= $row['id']; ?></td>
                                <td><?= $row['pemesan']; ?></td>
                                <td><?= $row['nik']; ?></td>
                                <td><?= $row['hp']; ?></td>
                                <td><?= $row['jumlah_penumpang']; ?></td>
                                <td><?= $row['jumlah_penumpang_lansia']; ?></td>
                                <td><?= $row['harga_tiket']; ?></td>
                                <td><?= $row['total_bayar']; ?></td>
                                <td><a class="btn btn-primary" href="detail.php?id=<?= $row['kelas']; ?>" role="button">Lihat Bus</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
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