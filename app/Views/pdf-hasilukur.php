<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
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
        <h3> LAPORAN HASIL POSYANDU BAYI - BALITA</h3>
    </div>
    <div>
        <p>Posyandu : <?= $posyandu->posyandu_nama ?></p>
        <p>Periode Ukur : <?= konversiBulan($periode->periode_bulan) ?> <?= $periode->periode_tahun ?></p>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th rowspan="">Golongan Umur Dan <br> Jenis Kelamin</th>
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
</body>

</html>