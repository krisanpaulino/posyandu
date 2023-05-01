<?= $this->extend('layout-frontend'); ?>
<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <h1>Selamat Datang Di Posyandu</h1>
        <h2>Masukkan nama balita anda untuk melihat kembali hasil pemeriksaan!</h2>

        <form action="<?= base_url('pencarian') ?>" method="get" class="php-email-form">
            <div class="row no-gutters">
                <div class="col-md-6 form-group pr-md-1">
                    <input type="text" name="balita_nama" value="<?= $_GET['balita_nama'] ?>" class="form-control" id="balita_nama" placeholder="Nama Balita" required>
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
                <?php if ($balita != null) : ?>
                    <table class="table table-bordered">
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
                                <tr>
                                    <td><a href="<?= base_url('hasilukur/' . $b->balita_id) ?>" class="text-primary"><?= $b->balita_nama ?></a></td>
                                    <td><?= $b->balita_orangtua ?></td>
                                    <td><?= $b->balita_jk ?></td>
                                    <td><?= $b->balita_tgllahir ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="text-center">
                        <h5>Balita anda cari tidak ditemukan!</h5>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section><!-- End About Section -->


    <!-- ======= Contact Us Section ======= -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?= $this->endSection(); ?>