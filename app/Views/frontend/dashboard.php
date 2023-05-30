<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Posyandu Waiklibang</title>
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
          <?php if (session()->has('balita')) : ?>
            <li class=""><a href="<?= base_url('hasilukur') ?>" class="scrollto">Halaman Hasil Ukur</a></li>
          <?php else : ?>
            <li class=""><a href="<?= base_url('auth') ?>" class="scrollto">Login (Admin / Petugas)</a></li>
          <?php endif; ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End #header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h1>Selamat Datang Di Posyandu</h1>
      <?php if (session()->has('orangtua_kogged_id')) : ?>
        <h2>Masukkan USER ID dan Passwor anda untuk melihat kembali hasil pemeriksaan!</h2>
        <?php if (session()->has('success')) : ?>
          <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
            <div class="text-white"><?= session('success') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>
        <?php if (session()->has('danger')) : ?>
          <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
            <div class="text-white"><?= session('danger') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>
        <form action="<?= base_url('login') ?>" method="POST" class="php-email-form">
          <div class="row no-gutters">
            <div class="col-md-6 form-group pr-md-1 mb-2">
              <input type="text" name="email" class="form-control" id="balita_nama" placeholder="UserID" required>
            </div>
          </div>
          <div class="row no-gutters">
            <div class="col-md-6 form-group pr-md-1">
              <input type="password" name="password" class="form-control" id="_balita_nama" placeholder="Password" required>
            </div>
          </div>

          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your notification request was sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Login</button></div>
        </form>
      <?php else : ?>
        <div class="text-center">
          <a href="<?= base_url('hasilukur') ?>" class="btn btn-warning btn-round">Hasil Ukur</a>
        </div>
      <?php endif; ?>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="<?= base_url('assets/frontend/') ?>assets/img/home1.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h3>Posyandu Wailkibang</h3>
            <p class="fst-italic">
              Memberikan pelayanan terbaik bagi kesehatan balita anda.
            </p>
            <ul>
              <li><i class="bx bx-check-double"></i> Pengukuran Balita Bulanan.</li>
              <li><i class="bx bx-check-double"></i> Dilakukan dan diawasi petugas terpercaya.</li>
              <li><i class="bx bx-check-double"></i> Dilakukan bagi balita usa 0-60 bulan.</li>
            </ul>
            <p>
              Jangan ragu periksakan balita anda ke Posyandu setiap bulannya. Dapatkan pengukuran akurat mengenai status gizi balita anda agar dapat melakukan tindakan perawatan terbaik.
            </p>
            <br>
            <p>
              <b>Alamat</b>: JL. Ahmad Yani, Pukantobi Wangibao, Larantuka, Kabupaten Flores Timur, Nusa Tenggara Tim. <br><br> <b>Telepon</b>: (0383) 21239.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card">
              <img src="<?= base_url('assets/frontend/') ?>assets/img/gambar1.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="bx bx-book-reader"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Pengukuran Tiap Bulan</a></h5>
                <p class="card-text">Pengukuran Posyandu di Waiklibang dilakukan setiap bulan demi melihat perkembangan balita. Diukur menggunakan alat-alat pengukuran standar menjamin pengukuran balita dilakukan secara akurat </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card">
              <img src="<?= base_url('assets/frontend/') ?>assets/img/gambar2.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="bx bx-calendar-edit"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Petugas Yang Ahli</a></h5>
                <p class="card-text">Petugas kami adalah petugas yang ahli di bidangnya. Memiliki kapasitas untuk memberikan informasi-informasi gizi yang dibutuhkan balita anda sesuai dengan status gizinya. </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="card">
              <img src="<?= base_url('assets/frontend/') ?>assets/img/gambar3.jpg" class="card-img-top" alt="...">
              <div class="card-icon">
                <i class="bx bx-landscape"></i>
              </div>
              <div class="card-body">
                <h5 class="card-title"><a href="">Balita Sehat</a></h5>
                <p class="card-text">Tujuan kami ialah mewujudkan balita-balita yang sehat di Waiklibang. Jangan ragu periksakan balita anda posyandu! Mari cegah stunting bersama-sama! </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Frequenty Asked Questions Section ======= -->

    <!-- ======= Contact Us Section ======= -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/frontend/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/frontend/') ?>assets/js/main.js"></script>

</body>

</html>