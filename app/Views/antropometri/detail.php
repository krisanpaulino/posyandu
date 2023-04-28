<?= $this->extend('layout-' . session('user')->user_type); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $title ?></h4>

            <?php if (session('user')->user_type == 'petugas') : ?>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type . '/hasilukur') ?>">Antropometri</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            <?php endif ?>
            <?php if (session('user')->user_type == 'admin') : ?>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type . '/hasilukur') ?>">Antropometri</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type . '/hasilukur/' . $periode->periode_id) ?>"><?= 'Antropometri Periode ' . konversiBulan($periode->periode_bulan) . ' ' . $periode->periode_tahun ?> </a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            <?php endif ?>

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
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Hasil Ukur <?= $posyandu->posyandu_nama ?></h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <div class="d-flex justify-content-end mb-4">
                    <form action="<?= base_url(session('user')->user_type . '/antropometri/hitung') ?>" method="post">
                        <input type="hidden" name="periode_id" value="<?= $periode->periode_id ?>">
                        <input type="hidden" name="posyandu_id" value="<?= $posyandu->posyandu_id ?>">
                        <button type="submit" class="btn btn-primary"><i class="ri-calculator-line"></i> Hitung</button>
                    </form>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Balita</th>
                            <th>JK</th>
                            <th>Umur</th>
                            <th>Skor SAW</th>
                            <th>Status Gizi</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($hasilukur as $b) : ?>
                            <tr>
                                <td><?= $b->balita_nama ?></td>
                                <td><?= $b->balita_jk ?></td>
                                <td><?= $b->balita_umur ?></td>
                                <td><?= $b->hasilukur_skor ?></td>
                                <td><?= $b->statusgizi_nama ?></td>
                                <td>
                                    <a href="<?= base_url(session('user')->user_type . '/hasilukur/' . $periode->periode_id . '/detail/' . $b->balita_id) ?>" class="badge bg-info">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<?= $this->endSection(); ?>