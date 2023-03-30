<?= $this->extend('layout-admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"></h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Balita</th>
                            <th>JK</th>
                            <th>Tgl Lahir</th>
                            <th>OrangTua</th>
                            <th>Umur(bln)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($balita as $b) : ?>
                            <tr>
                                <td><?= $b->balita_nama ?></td>
                                <td><?= $b->balita_jk ?></td>
                                <td><?= $b->balita_tgllahir ?></td>
                                <td><?= $b->balita_orangtua ?></td>
                                <td><?= $b->balita_umur ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<?= $this->endSection(); ?>