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
                            <th>Index</th>
                            <th>Status</th>
                            <th>SkorMin</th>
                            <th>SkorMax</th>
                            <th>Bobot</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($ambangbatas as $ambang) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ambang->ambangbatas_index ?></td>
                                <td><?= $ambang->ambangbatas_status ?></td>
                                <td><?= $ambang->ambangbatas_skormin ?></td>
                                <td><?= $ambang->ambangbatas_skormax ?></td>
                                <td><?= $ambang->ambangbatas_bobotkriteria ?></td>
                                <td>
                                    <form action="<?= base_url('admin/ambangbatas/hapus') ?>" method="post">
                                        <input type="hidden" name="ambangbatas_id" value="<?= $ambang->ambangbatas_id ?>">
                                        <button type="submit" class="badge bg-danger border" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                        <button type="button" class="badge bg-primary border" data-bs-toggle="modal" data-bs-target="#update<?= $ambang->ambangbatas_id ?>">Edit</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<form action="<?= base_url(session('user')->user_type . '/ambangbatas/tambah') ?>" method="post" autocomplete="off">
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Ambang Batas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="ambangbatas_index">Index</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['ambangbatas_index'])) ? 'is-invalid' : '' ?>" id="ambangbatas_index" name="ambangbatas_index" value="<?= old('ambangbatas_index') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['ambangbatas_index'])) : ?>
                                <?= session('errors')['ambangbatas_index'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="ambangbatas_status">Status</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['ambangbatas_status'])) ? 'is-invalid' : '' ?>" id="ambangbatas_status" name="ambangbatas_status" value="<?= old('ambangbatas_status') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['ambangbatas_status'])) : ?>
                                <?= session('errors')['ambangbatas_status'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="ambangbatas_skormin">Minimum Skor</label>
                        <input type="number" class="form-control <?= (isset(session('errors')['ambangbatas_skormin'])) ? 'is-invalid' : '' ?>" id="ambangbatas_skormin" name="ambangbatas_skormin" value="<?= old('ambangbatas_skormin') ?>" step="0.1">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['ambangbatas_skormin'])) : ?>
                                <?= session('errors')['ambangbatas_skormin'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="ambangbatas_skormax">Maksimal Skor</label>
                        <input type="number" class="form-control <?= (isset(session('errors')['ambangbatas_skormax'])) ? 'is-invalid' : '' ?>" id="ambangbatas_skormax" name="ambangbatas_skormax" value="<?= old('ambangbatas_skormax') ?>" step="0.1">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['ambangbatas_skormax'])) : ?>
                                <?= session('errors')['ambangbatas_skormax'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="ambangbatas_bobotkriteria">Bobot Kriteria</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['ambangbatas_bobotkriteria'])) ? 'is-invalid' : '' ?>" id="ambangbatas_bobotkriteria" name="ambangbatas_bobotkriteria" value="<?= old('ambangbatas_bobotkriteria') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['ambangbatas_bobotkriteria'])) : ?>
                                <?= session('errors')['ambangbatas_bobotkriteria'] ?>
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

<?php foreach ($ambangbatas as $ambang) : ?>
    <form action="<?= base_url(session('user')->user_type . '/ambangbatas/update') ?>" method="post" autocomplete="off">
        <div id="update<?= $ambang->ambangbatas_id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update Ambang Batas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="ambangbatas_id" value="<?= $ambang->ambangbatas_id ?>">
                        <div class="form-group mb-4">
                            <label for="ambangbatas_index">Index</label>
                            <input type="text" class="form-control <?= (isset(session('errors')['ambangbatas_index'])) ? 'is-invalid' : '' ?>" id="ambangbatas_index" name="ambangbatas_index" value="<?= old('ambangbatas_index', $ambang->ambangbatas_index) ?>">
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['ambangbatas_index'])) : ?>
                                    <?= session('errors')['ambangbatas_index'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="ambangbatas_status">Status</label>
                            <input type="text" class="form-control <?= (isset(session('errors')['ambangbatas_status'])) ? 'is-invalid' : '' ?>" id="ambangbatas_status" name="ambangbatas_status" value="<?= old('ambangbatas_status', $ambang->ambangbatas_status) ?>">
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['ambangbatas_status'])) : ?>
                                    <?= session('errors')['ambangbatas_status'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="ambangbatas_skormin">Minimum Skor</label>
                            <input type="number" class="form-control <?= (isset(session('errors')['ambangbatas_skormin'])) ? 'is-invalid' : '' ?>" id="ambangbatas_skormin" name="ambangbatas_skormin" value="<?= old('ambangbatas_skormin', $ambang->ambangbatas_skormin) ?>" step="0.1">
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['ambangbatas_skormin'])) : ?>
                                    <?= session('errors')['ambangbatas_skormin'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="ambangbatas_skormax">Maksimal Skor</label>
                            <input type="number" class="form-control <?= (isset(session('errors')['ambangbatas_skormax'])) ? 'is-invalid' : '' ?>" id="ambangbatas_skormax" name="ambangbatas_skormax" value="<?= old('ambangbatas_skormax', $ambang->ambangbatas_skormax) ?>" step="0.1">
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['ambangbatas_skormax'])) : ?>
                                    <?= session('errors')['ambangbatas_skormax'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="ambangbatas_bobotkriteria">Bobot Kriteria</label>
                            <input type="number" step="0.01" class="form-control <?= (isset(session('errors')['ambangbatas_bobotkriteria'])) ? 'is-invalid' : '' ?>" id="ambangbatas_bobotkriteria" name="ambangbatas_bobotkriteria" value="<?= old('ambangbatas_bobotkriteria', $ambang->ambangbatas_bobotkriteria) ?>">
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['ambangbatas_bobotkriteria'])) : ?>
                                    <?= session('errors')['ambangbatas_bobotkriteria'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Tutup</button>
                        <button type="sumbit" class="btn btn-primary waves-effect waves-light">Update</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
    </form>
<?php endforeach ?>

<?= $this->endSection(); ?>