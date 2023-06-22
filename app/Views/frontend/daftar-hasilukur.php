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
                        <div class="mb-4">
                            <div id="chart"></div>
                        </div>
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
<?= $this->section('scripts'); ?>
<script>
    var cetak = '<?php foreach ($hasilukur as $h) {
                        echo $h->hasilukur_bb . ',';
                    } ?>';
    console.log(cetak);
    var options = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'BB',
            data: [<?php foreach ($hasilukur as $key => $h) {
                        if ($key != 0)
                            echo ',';
                        echo $h->hasilukur_bb;
                    } ?>]
        }],
        yaxis: {
            show: true,
            showAlways: true,
            showForNullSeries: true,
            seriesName: undefined,
            opposite: false,
            reversed: false,
            logarithmic: false,
            logBase: 10,
            tickAmount: 60,
            min: 1,
            max: 30,
            forceNiceScale: false,
            floating: false,
            decimalsInFloat: undefined,
            labels: {
                show: true,
                align: 'right',
                minWidth: 0,
                maxWidth: 160,
                style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 400,
                    cssClass: 'apexcharts-yaxis-label',
                },
                offsetX: 0,
                offsetY: 0,
                rotate: 0,
            },

        },
        xaxis: {

            categories: [<?php foreach ($hasilukur as $h) {
                                echo "'" . $h->hasilukur_umur . " bln(" . konversiBulan($h->periode_bulan) . " " . $h->periode_tahun . ")',";
                            } ?>],
            labels: {
                show: true,
                rotate: -45,
                rotateAlways: false,
                hideOverlappingLabels: true,
                showDuplicates: false,
                trim: false,
                minHeight: undefined,
                maxHeight: 120,
                style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'Helvetica, Arial, sans-serif',
                    fontWeight: 400,
                    cssClass: 'apexcharts-xaxis-label',
                },
                offsetX: 0,
                offsetY: 0,
                format: undefined,
                formatter: undefined,
                datetimeUTC: true,
                datetimeFormatter: {
                    year: 'yyyy',
                    month: "MMM 'yy",
                    day: 'dd MMM',
                    hour: 'HH:mm',
                },
            },
        },
        dataLabels: {
            enabled: true,
            style: {
                colors: ['#333']
            },
            offsetX: 30
        },
        title: {
            text: 'Grafik Perkembangan Balita',
            offsetX: 0,
            offsetY: 0,
            style: {
                color: '#333',
                fontSize: '16px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 600,
                cssClass: 'apexcharts-xaxis-title',
            },
        },
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();
</script>
<?= $this->endSection(); ?>