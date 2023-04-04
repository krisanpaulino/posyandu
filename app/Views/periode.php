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
                <div class="mb-4">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($periode as $p) : ?>
                            <tr>
                                <td><?= $p->periode_tahun ?></td>
                                <td><?= konversiBulan($p->periode_bulan) ?></td>
                                <td><?= $p->periode_status ?></td>
                                <td>
                                    <?php if ($p->periode_status == 'tutup') : ?>
                                        <div class="d-flex justify-content-start">
                                            <form action="<?= base_url('admin/periode/buka') ?>" method="post">
                                                <input type="hidden" name="periode_id" value="<?= $p->periode_id ?>">
                                                <button type="submit" class="badge bg-success border">Buka</button>
                                            </form>
                                            <form action="<?= base_url('admin/periode/hapus') ?>" method="post">
                                                <input type="hidden" name="periode_id" value="<?= $p->periode_id ?>">
                                                <button type="submit" class="badge bg-danger border" onclick="return confirm('apakah anda yakin>')">Hapus</button>
                                            </form>
                                        </div>
                                    <?php elseif ($p->periode_status == 'buka') : ?>
                                        <form action="<?= base_url('admin/periode/selesai') ?>" method="post">
                                            <input type="hidden" name="periode_id" value="<?= $p->periode_id ?>">
                                            <button type="submit" class="badge bg-warning border">Selesai</button>
                                        </form>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<form action="<?= base_url('admin/periode/tambah') ?>" method="post" autocomplete="off">
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Periode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="periode_tahun">Tahun</label>
                        <input type="year" class="form-control <?= (isset(session('errors')['periode_tahun'])) ? 'is-invalid' : '' ?>" id="periode_tahun" name="periode_tahun" value="<?= old('periode_tahun', date('Y')) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['periode_tahun'])) : ?>
                                <?= session('errors')['periode_tahun'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="periode_bulan">Bulan</label>
                        <select class="form-select <?= (isset(session('errors')['periode_bulan'])) ? 'is-invalid' : '' ?>" id="periode_bulan" name="periode_bulan" required>
                            <option value="">Pilih Bulan</option>
                            <?php foreach ($bulan as $b) : ?>
                                <option value="<?= $b['angka'] ?>"><?= $b['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['periode_bulan'])) : ?>
                                <?= session('errors')['periode_bulan'] ?>
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