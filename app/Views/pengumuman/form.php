<?= $this->extend('layout-admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
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

                <h4 class="card-title">Form Pengumuman</h4>
                <p class="card-title-desc">Masukkan data dengan teliti!</p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <form action="<?= base_url(session('user')->user_type . '/pengumuman/' . $action) ?>" method="post" class="form">
                    <input type="hidden" name="pengumuman_id" value="<?= $pengumuman->pengumuman_id ?>">
                    <div class="form-group mb-4">
                        <label for="pengumuman_judul"></label>
                        <input type="text" class="form-control <?= (isset(session('errors')['pengumuman_judul'])) ? 'is-invalid' : '' ?>" id="pengumuman_judul" name="pengumuman_judul" value="<?= old('pengumuman_judul') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['pengumuman_judul'])) : ?>
                                <?= session('errors')['pengumuman_judul'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<?= $this->endSection(); ?>