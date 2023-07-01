<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap3/bootstrap.min.css') ?>" crossorigin="anonymous">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: x-small;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            font-size: x-small;
            border: 1px solid #ddd;
            padding: 2px;
        }

        #table tr:nth-child(even) {
            font-size: x-small;
            background-color: #f2f2f2;
        }

        #table tr:hover {
            font-size: x-small;
            background-color: #ddd;
        }

        #table th {
            font-size: x-small;
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <img src="<?= base_url('assets/images/kop.png') ?>" alt="">
        <h1>LAPORAN HASI PENGUKURAN POSYANDU BAYI-BALITA</h1>
    </div>
    <div>
        <p>Kelompok Penimbang : <?= $posyandu->posyandu_nama ?></p>
        <p>Tanggal Ukur : <?= $tglukur ?></p>
    </div>
    <table id="table">
        <thead class="text-center">
            <tr>
                <th style="width: auto;" rowspan="2">No</th>
                <th rowspan="2">Nama Balita</th>
                <th rowspan="2">L/P</th>
                <th rowspan="2">Tanggal Lahir</th>
                <th rowspan="2">Nama Orangtua</th>
                <th rowspan="2">Alamat</th>
                <th rowspan="2">Posyandu</th>
                <th rowspan="2">Desa</th>
                <th rowspan="2">Tgl Ukur</th>
                <th rowspan="2">Umur</th>
                <th rowspan="2">BB</th>
                <th rowspan="2">Posisi</th>
                <th rowspan="2">PB/TB</th>
                <th rowspan="2">BMI</th>
                <th colspan="4">Status</th>

            </tr>
            <tr>
                <th>BB/U</th>
                <th>TB/U</th>
                <th>BB/TB</th>
                <th>IMT/U</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($hasilukur as $h) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $h->balita_nama ?></td>
                    <td><?= $h->balita_jk ?></td>
                    <td><?= $h->balita_tgllahir ?></td>
                    <td><?= $h->balita_orangtua ?></td>
                    <td><?= $h->balita_alamat ?></td>
                    <td><?= $h->posyandu_nama ?></td>
                    <td><?= $h->balita_alamat ?></td>
                    <td><?= $h->hasilukur_tgl ?></td>
                    <td><?= $h->hasilukur_umur ?></td>
                    <td><?= $h->hasilukur_bb ?></td>
                    <td><?= $h->hasilukur_posisi ?></td>
                    <td><?= $h->hasilukur_pbtb ?></td>
                    <td><?= $h->hasilukur_bmi ?></td>
                    <td><?= getStatus('BB/U', $h->hasilukur_c1) ?></td>
                    <td><?= getStatus('TB/U', $h->hasilukur_c2) ?></td>
                    <td><?= getStatus('BB/TB', $h->hasilukur_c3) ?></td>
                    <td><?= getStatus('IMT/U', $h->hasilukur_c4) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <table class="table borderless">
        <tr>
            <td style="width: 50%;">
                <div class="text-center">
                    <br>
                    <span class="text-center">Kepala Desa Ratulodong</span> <br><br><br>
                    <span class="text-center">Siprianus Lamen Koten</span><br>
                </div>
            </td>

            <td>
                <div class="text-center">
                    <span class="text-center">Waiklibang, <?= date('d-m-Y') ?></span><br>
                    <span class="text-center">Ketua PKK Desa Ratulodong,</span> <br><br><br>
                    <span class="text-center">Kristina Jawa Maran</span><br>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>