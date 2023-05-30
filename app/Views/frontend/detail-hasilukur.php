<?= $this->extend('layout-frontend'); ?>
<?= $this->section('content'); ?>
<!-- ======= Hero Section ======= -->

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
                    <table class="table">
                        <tr>
                            <th>Tanggal Ukur</th>
                            <td><?= $detail->hasilukur_tgl ?></td>
                        </tr>
                        <tr>
                            <th>Posisi</th>
                            <td><?= $detail->hasilukur_posisi ?></td>
                        </tr>
                        <tr>
                            <th>Berat Badan</th>
                            <td><?= $detail->hasilukur_bb ?> kg</td>
                        </tr>
                        <tr>
                            <th>Tinggi/Panjang Badan</th>
                            <td><?= $detail->hasilukur_pbtb ?> cm</td>
                        </tr>
                        <tr>
                            <th>BB/U</th>
                            <td><?= getStatus('BB/U', $detail->hasilukur_c1) ?> </td>
                        </tr>
                        <tr>
                            <th>TB/U</th>
                            <td><?= getStatus('TB/U', $detail->hasilukur_c2) ?> </td>
                        </tr>
                        <tr>
                            <th>BB/TB</th>
                            <td><?= getStatus('BB/tb', $detail->hasilukur_c3) ?> </td>
                        </tr>
                        <tr>
                            <th>IMT/U</th>
                            <td><?= getStatus('IMT/U', $detail->hasilukur_c4) ?> </td>
                        </tr>
                        <tr>
                            <th>Status Gizi</th>
                            <td><?= ($detail->statusgizi_nama != null) ? $detail->statusgizi_nama : '<i>(Menunggu perhitungan akhir dari petugas)</i>' ?></td>
                        </tr>
                    </table>
                    <div class="mt-4">
                        <h2>Informasi Status Gizi</h2>
                        <b>Penyebab</b>
                        <br>
                        <?= $detail->statusgizi_penyebab ?><br><br>
                        <b>Pencegahan</b>
                        <br>
                        <?= $detail->statusgizi_pencegahan ?><br><br>
                        <b>Pengobatan</b>
                        <br>
                        <?= $detail->statusgizi_pengobatan ?>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <a href="<?= base_url('hasilukur/') ?>">
                    << Kembali </a>
            </div>
        </div>
    </section><!-- End About Section -->


    <!-- ======= Contact Us Section ======= -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?= $this->endSection(); ?>