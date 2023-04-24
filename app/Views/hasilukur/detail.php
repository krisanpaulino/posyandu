<?= $this->extend('layout-' . session('user')->user_type); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type . '/periksa') ?>">Periksa</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
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
    <div class="d-flex justify-content-end mb-2">
        <a href="<?= base_url('petugas/periksa') ?>" class="button btn btn-warning">Kembali</a>

    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Balita</h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <table class="table">
                    <tr>
                        <th>Nama balita</th>
                        <td><?= $balita->balita_nama ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?= $balita->balita_jk ?></td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td><?= $balita->balita_umur ?> Bulan</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Hasil Ukur</h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
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
                        <td><?= $detail->hasilukur_bb ?> Bulan</td>
                    </tr>
                    <tr>
                        <th>Tinggi/Panjang Badan</th>
                        <td><?= $detail->hasilukur_pbtb ?> cm</td>
                    </tr>
                    <tr>
                        <th>BB/U</th>
                        <td><?= getStatus('BB/U', $detail->hasilukur_c1) ?> (<?= $detail->hasilukur_c1 ?>)</td>
                    </tr>
                    <tr>
                        <th>TB/U</th>
                        <td><?= getStatus('TB/U', $detail->hasilukur_c2) ?> (<?= $detail->hasilukur_c2 ?>)</td>
                    </tr>
                    <tr>
                        <th>BB/TB</th>
                        <td><?= getStatus('BB/tb', $detail->hasilukur_c3) ?> (<?= $detail->hasilukur_c3 ?>)</td>
                    </tr>
                    <tr>
                        <th>IMT/U</th>
                        <td><?= getStatus('IMT/U', $detail->hasilukur_c4) ?> (<?= $detail->hasilukur_c4 ?>)</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>