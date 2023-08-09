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
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <img src="<?= base_url('assets/images/kop.png') ?>" alt="">
        <h3>LAPORAN HASIL POSYANDU BAYI-BALITA</h3>
    </div>
    <div>
        <p>Kelompok Penimbang : <?= $posyandu->posyandu_nama ?></p>
        <p>Tanggal Ukur : <?= $tglukur ?></p>
    </div>
    <table id="table">
        <thead class="text-center">
            <tr>
                <th style="width: auto;" rowspan="">Golongan Umur Dan <br> Jenis Kelamin</th>
                <th colspan="2">0-5 Bulan</th>
                <th colspan="2">6-11 Bulan</th>
                <th colspan="2">12-23 Bulan</th>
                <th colspan="2">24-59 Bulan</th>
                <th rowspan="2">Total</th>

            </tr>
            <tr>
                <th>Kategori Penduduk</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
                <th>L</th>
                <th>P</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">Jumlah Bayi Terdaftar</td>
                <?php $total = 0; ?>
                <?php foreach ($jumlah as $j) : ?>
                    <?php $total += $j ?>
                    <td><?= $j ?></td>
                <?php endforeach; ?>
                <td><?= $total ?></td>
            </tr>
            <tr>
                <td colspan="10"></td>
            </tr>
            <?php foreach ($gizi as $g) : ?>
                <?php $total = 0; ?>
                <tr>
                    <td><?= $g['status'] ?></td>
                    <?php if ($g['data'] != null) : ?>
                        <?php foreach ($g['data']  as $data) : ?>
                            <?php $total += $data ?>
                            <td><?= $data ?></td>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    <?php endif; ?>
                    <td><?= $total ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="10"></td>
            </tr>
            <?php foreach ($tinggi as $g) : ?>
                <?php $total = 0; ?>
                <tr>
                    <td><?= $g['status'] ?></td>
                    <?php if ($g['data'] != null) : ?>
                        <?php foreach ($g['data']  as $data) : ?>
                            <?php $total += $data ?>
                            <td><?= $data ?></td>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    <?php endif; ?>
                    <td><?= $total ?></td>
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