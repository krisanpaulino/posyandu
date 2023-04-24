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
                            <th>Nama</th>
                            <th>Detail</th>
                            <th>Skor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($kriteria as $k) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $k->kriteria_nama ?></td>
                                <td><?= $k->kriteria_detail ?></td>
                                <td><?= $k->kriteria_bobot ?></td>
                                <td>
                                    <form action="<?= base_url('admin/kriteria/hapus') ?>" method="post">
                                        <input type="hidden" name="kriteria_id" value="<?= $k->kriteria_id ?>">
                                        <button type="submit" class="badge bg-danger border" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
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

<form action="<?= base_url(session('user')->user_type . '/kriteria/tambah') ?>" method="post" autocomplete="off">
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Kriteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="kriteria_nama">Kriteria</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['kriteria_nama'])) ? 'is-invalid' : '' ?>" id="kriteria_nama" name="kriteria_nama" value="<?= old('kriteria_nama') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['kriteria_nama'])) : ?>
                                <?= session('errors')['kriteria_nama'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="kriteria_detail">Detail</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['kriteria_detail'])) ? 'is-invalid' : '' ?>" id="kriteria_detail" name="kriteria_detail" value="<?= old('kriteria_detail') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['kriteria_detail'])) : ?>
                                <?= session('errors')['kriteria_detail'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="kriteria_bobot">Bobot</label>
                        <input type="number" step="0.01" class="form-control <?= (isset(session('errors')['kriteria_bobot'])) ? 'is-invalid' : '' ?>" id="kriteria_bobot" name="kriteria_bobot" value="<?= old('kriteria_bobot') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['kriteria_bobot'])) : ?>
                                <?= session('errors')['kriteria_bobot'] ?>
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