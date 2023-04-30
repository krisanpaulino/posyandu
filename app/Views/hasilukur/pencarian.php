<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Siimple - Bootstrap Landing Page Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/frontend/') ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('assets/frontend/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/frontend/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/frontend/') ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Siimple
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/free-bootstrap-landing-page/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container-fluid">

            <div class="logo">
                <h1><a href="index.html" class="text-dark">Posyandu</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="<?= base_url('assets/frontend/') ?>assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <button type="button" class="nav-toggle"><i class="bx bx-menu"></i></button>
            <nav class="nav-menu">
                <ul>
                    <li class="active"><a href="#header" class="scrollto">Home</a></li>
                    <li><a href="#about" class="scrollto">About Us</a></li>
                    <li><a href="#why-us" class="scrollto">Why Us</a></li>
                    <li class="drop-down"><a href="">Drop Down</a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="drop-down"><a href="#">Drop Down 2</a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                            <li><a href="#">Drop Down 5</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact" class="scrollto">Contact Us</a></li>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End #header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <h1>Selamat Datang Di Posyandu</h1>
            <h2>Masukkan nama balita anda untuk melihat kembali hasil pemeriksaan!</h2>

            <form action="<?= base_url('hasilukur') ?>" method="get" class="php-email-form">
                <div class="row no-gutters">
                    <div class="col-md-6 form-group pr-md-1">
                        <input type="text" name="balita_nama" class="form-control" id="balita_nama" placeholder="Nama Balita" required>
                    </div>
                </div>

                <div class="text-center"><button type="submit">Lihat</button></div>
            </form>
        </div>
    </section><!-- #hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Balita</th>
                                <th>Nama Orang Tua</th>
                                <th>Jenis Kelamin Balita</th>
                                <th>Tgl Lahir Balita</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($balita as $b) : ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Contact Us Section ======= -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Siimple</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-landing-page/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End #footer -->

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/frontend/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/frontend/') ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('assets/frontend/') ?>assets/js/main.js"></script>

</body>

</html>