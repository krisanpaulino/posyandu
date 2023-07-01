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
        <h1>DATA BAYI-BALITA POSYANDU WAIKLIBANG</h1>

    </div>
    <div>
        <p>Desa : RATULODONG</p>
        <p>Kelompok Pengukur : <?= $posyandu ?></p>
        <p>Tanggal Ukur : <?= $balita[0]->hasilukur_tgl ?></p>
    </div>
    <table id="table">
        <thead class="text-center">
            <tr>
                <th style="width: auto;">No</th>
                <th>Nama Balita</th>
                <th>Umur Balita</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Lahir</th>
                <th>Alamat</th>
                <th>Nama Orangtua</th>
                <th>Kelompok Pengukur</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($balita as $b) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $b->balita_nama ?></td>
                    <td><?= $b->hasilukur_umur ?></td>
                    <td><?= $b->balita_jk ?></td>
                    <td><?= $b->balita_tgllahir ?></td>
                    <td><?= $b->balita_alamat ?></td>
                    <td><?= $b->balita_orangtua ?></td>
                    <td><?= $b->posyandu_nama ?></td>
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