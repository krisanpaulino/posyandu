<?= $this->extend('layout-frontend'); ?>
<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container">
        <h1>Selamat Datang Di Posyandu</h1>
        <h2>Hasil Ukur Balita</h2>

    </div>
</section>
<!-- #hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h2>Data Balita</h2>
                    <p><b>Nama Balita </b> : <?= $balita->balita_nama ?></p>
                    <p><b>Jenis Kelamin </b> : <?= $balita->balita_jk ?></p>
                    <p><b>Tgl Lahir </b> : <?= $balita->balita_tgllahir ?></p>
                    <p><b>Orang Tua </b> : <?= $balita->balita_orangtua ?></p>
                </div>
                <div class="col-8">
                    <?php if ($hasilukur != null) : ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Usia Pengukuran (Bln)</th>
                                    <th>Status Gizi</th>
                                    <th>Lihat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($hasilukur as $h) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= konversiBulan($h->periode_bulan) ?></td>
                                        <td><?= $h->periode_tahun ?></td>
                                        <td><?= $h->hasilukur_umur ?></td>
                                        <td><?= $h->statusgizi_nama ?></td>
                                        <td>
                                            <a href="<?= base_url('hasilukur/' . $h->periode_id) ?>">Lihat</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="text-center">
                            <h5>Belum ada data pengukuran untuk balita dengan nama <b><?= $balita->balita_nama ?></b>!</h5>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->


    <!-- ======= Contact Us Section ======= -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?= $this->endSection(); ?>