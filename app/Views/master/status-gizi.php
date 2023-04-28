<?= $this->extend('layout-' . session('user')->user_type); ?>
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
                <div class="mb-4">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>SkorMin</th>
                            <th>SkorMax</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($statusgizi as $s) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $s->statusgizi_nama ?></td>
                                <td><?= $s->statusgizi_min ?></td>
                                <td><?= $s->statusgizi_max ?></td>
                                <td>
                                    <a href="<?= base_url('admin/statusgizi/' . $s->statusgizi_id) ?>" class="badge bg-info">Lihat</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<form action="<?= base_url(session('user')->user_type . '/statusgizi/tambah') ?>" method="post" autocomplete="off">
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Status Gizi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="statusgizi_nama">Nama Status Gizi</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['statusgizi_nama'])) ? 'is-invalid' : '' ?>" id="statusgizi_nama" name="statusgizi_nama" value="<?= old('statusgizi_nama') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_nama'])) : ?>
                                <?= session('errors')['statusgizi_nama'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_min">Skor Minimal</label>
                        <input type="number" step="0.01" class="form-control <?= (isset(session('errors')['statusgizi_min'])) ? 'is-invalid' : '' ?>" id="statusgizi_min" name="statusgizi_min" value="<?= old('statusgizi_min') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_min'])) : ?>
                                <?= session('errors')['statusgizi_min'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_max">Skor Maksimal</label>
                        <input type="number" step="0.01" class="form-control <?= (isset(session('errors')['statusgizi_max'])) ? 'is-invalid' : '' ?>" id="statusgizi_max" name="statusgizi_max" value="<?= old('statusgizi_max') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_max'])) : ?>
                                <?= session('errors')['statusgizi_max'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_penyebab">Penyebab</label>
                        <textarea name="statusgizi_penyebab" id="editor1" cols="30" rows="10"><?= old('statusgizi_penyebab') ?></textarea>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_penyebab'])) : ?>
                                <?= session('errors')['statusgizi_penyebab'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_pencegahan">Pencegahan</label>
                        <textarea name="statusgizi_pencegahan" id="editor2" cols="30" rows="10"><?= old('statusgizi_pencegahan') ?></textarea>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_pencegahan'])) : ?>
                                <?= session('errors')['statusgizi_pencegahan'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="statusgizi_pengobatan">Pengobatan</label>
                        <textarea name="statusgizi_pengobatan" id="editor3" cols="30" rows="10"><?= old('statusgizi_pengobatan') ?></textarea>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['statusgizi_pengobatan'])) : ?>
                                <?= session('errors')['statusgizi_pengobatan'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Tutup</button>
                    <button type="sumbit" class="btn btn-primary waves-effect waves-light">Tambah</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</form>


<?= $this->endSection(); ?>