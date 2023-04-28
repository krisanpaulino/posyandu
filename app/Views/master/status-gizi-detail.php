<?= $this->extend('layout-admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/statusgizi') ?>">Status Gizi</a></li>
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
            .
            <div class="card-body">

                <h4 class="card-title"></h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <div class="mb-2 d-flex justify-content-end">
                    <form action="<?= base_url('admin/statusgizi/hapus') ?>" method="post">
                        <input type="hidden" name="statusgizi_id" value="<?= $status->statusgizi_id ?>">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                    </form>
                </div>
                <form action="<?= base_url('admin/statusgizi/update') ?>" method="post">
                    <div class="form-group mb-4">
                        <input type="hidden" name="statusgizi_id" value="<?= $status->statusgizi_id ?>">
                        <label for="statusgizi_nama">Nama Status Gizi</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['statusgizi_nama'])) ? 'is-invalid' : '' ?>" id="statusgizi_nama" name="statusgizi_nama" value="<?= old('statusgizi_nama', $status->statusgizi_nama) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_nama'])) : ?>
                                <?= session('errors')['statusgizi_nama'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_min">Skor Minimal</label>
                        <input type="number" step="0.01" class="form-control <?= (isset(session('errors')['statusgizi_min'])) ? 'is-invalid' : '' ?>" id="statusgizi_min" name="statusgizi_min" value="<?= old('statusgizi_min', $status->statusgizi_min) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_min'])) : ?>
                                <?= session('errors')['statusgizi_min'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_max">Skor Maksimal</label>
                        <input type="number" step="0.01" class="form-control <?= (isset(session('errors')['statusgizi_max'])) ? 'is-invalid' : '' ?>" id="statusgizi_max" name="statusgizi_max" value="<?= old('statusgizi_max', $status->statusgizi_max) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_max'])) : ?>
                                <?= session('errors')['statusgizi_max'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_penyebab">Penyebab</label>
                        <textarea name="statusgizi_penyebab" id="editor1" cols="30" rows="10"><?= old('statusgizi_penyebab', $status->statusgizi_penyebab) ?></textarea>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_penyebab'])) : ?>
                                <?= session('errors')['statusgizi_penyebab'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_pencegahan">Pencegahan</label>
                        <textarea name="statusgizi_pencegahan" id="editor2" cols="30" rows="10"><?= old('statusgizi_pencegahan', $status->statusgizi_pencegahan) ?></textarea>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_pencegahan'])) : ?>
                                <?= session('errors')['statusgizi_pencegahan'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_pengobatan">Pengobatan</label>
                        <textarea name="statusgizi_pengobatan" id="editor3" cols="30" rows="10"><?= old('statusgizi_pengobatan', $status->statusgizi_pengobatan) ?></textarea>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_pengobatan'])) : ?>
                                <?= session('errors')['statusgizi_pengobatan'] ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<?= $this->endSection(); ?>