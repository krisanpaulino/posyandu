<?= $this->extend('layout-admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hasil Ukur</a></li>
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

                <h4 class="card-title">Daftar Posyandu</h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <th style="width: 10%;">No</th>
                        <th>Posyandu</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($posyandu as $p) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $p->posyandu_nama ?></td>
                                <td>
                                    <a href="<?= base_url('admin/hasilukur/' . $periode->periode_id . '/posyandu/' . $p->posyandu_id) ?>" class="badge bg-primary">Lihat</a>
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