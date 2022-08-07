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

</head>

<body>
    <!-- MAIN -->
    <!-- ambil data dari database.php -->
    <?php
    include "database.php" ?>

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
                        <a class="nav-link active" aria-current="page" href="index.php">Bus AKAP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pembeli.php">Data Pembeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pesan.php">Pesan Tiket</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- DATE USING JS -->
    <div class="mt-3">
        <b>Diakses pada : </b>
        <p id="date"></p>
    </div>

    <!-- TITLE -->
    <h1 style="text-align: center;">DAFTAR BUS</h1>


    <!-- SHOW BUS DATA -->
    <br><br>
    <div class="container">
        <div class="row">
            <?php while ($row = $kelas->fetch_assoc()) { ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="img/<?= $row['gambar']; ?>" class="card-img-top" alt="<?= $row['nama']; ?>">
                        <div class="card-body">
                            <h2 class="card-title"><?= $row['nama']; ?></h2>
                            <p class="card-text"><b><?= $row['asal']; ?> - <?= $row['tujuan']; ?></b></p>
                            <p class="card-text">Tanggal Keberangkatan : <?= $row['tanggal']; ?> </p>
                            <p class="card-text">Jam Keberangkatan : <?= $row['jam']; ?> </p>
                            <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <!-- FOOTER -->
    <footer class="text-center text-lg-start bg-white text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
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

    <script src="js/script.js"></script>

</body>

</html>