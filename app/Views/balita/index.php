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
                <div class="mb-4 d-flex justify-content-between">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#cetak"><i class="ri-printer-line"></i> Cetak Laporan Posyandu</button>
                </div>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Posyandu</th>
                            <th>Nama Balita</th>
                            <th>JK</th>
                            <th>Tgl Lahir</th>
                            <th>OrangTua</th>
                            <th>Umur(bln)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($balita as $b) : ?>
                            <tr>
                                <td><?= $b->posyandu_nama ?></td>
                                <td><?= $b->balita_nama ?></td>
                                <td><?= $b->balita_jk ?></td>
                                <td><?= $b->balita_tgllahir ?></td>
                                <td><?= $b->balita_orangtua ?></td>
                                <td><?= $b->balita_umur ?></td>
                                <td>
                                    <form action="<?= base_url(session('user')->user_type . '/balita/hapus') ?>" method="post">
                                        <input type="hidden" name="balita_id" value="<?= $b->balita_id ?>">
                                        <a href="<?= base_url(session('user')->user_type . '/balita/' . $b->balita_id) ?>" class="badge bg-primary">Detail</a>
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

<form action="<?= base_url(session('user')->user_type . '/balita/tambah') ?>" method="post" autocomplete="off">
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Balita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="balita_nama">Nama Balita</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['balita_nama'])) ? 'is-invalid' : '' ?>" id="balita_nama" name="balita_nama" value="<?= old('balita_nama') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_nama'])) : ?>
                                <?= session('errors')['balita_nama'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="balita_jk">Jenis Kelamin</label>
                        <select class="form-select <?= (isset(session('errors')['balita_jk'])) ? 'is-invalid' : '' ?>" id="balita_jk" name="balita_jk" required>
                            <option value="">Pilih JK</option>
                            <option value="L" <?= (old('balita_jk' == 'L')) ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="P" <?= (old('balita_jk' == 'P')) ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_jk'])) : ?>
                                <?= session('errors')['balita_jk'] ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="balita_tgllahir">Tgl Lahir Balita</label>
                        <input type="text" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" class="form-control input-mask <?= (isset(session('errors')['balita_tgllahir'])) ? 'is-invalid' : '' ?>" id="balita_tgllahir" name="balita_tgllahir" value="<?= old('balita_tgllahir') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_tgllahir'])) : ?>
                                <?= session('errors')['balita_tgllahir'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="balita_orangtua">Orang Tua Balita</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['balita_orangtua'])) ? 'is-invalid' : '' ?>" id="balita_orangtua" name="balita_orangtua" value="<?= old('balita_orangtua') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_orangtua'])) : ?>
                                <?= session('errors')['balita_orangtua'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="balita_alamat">Alamat</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['balita_alamat'])) ? 'is-invalid' : '' ?>" id="balita_alamat" name="balita_alamat" value="<?= old('balita_alamat') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_alamat'])) : ?>
                                <?= session('errors')['balita_alamat'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if (session('user')->user_type == "admin") : ?>
                        <div class="form-group mb-4">
                            <label for="posyandu_id">Posyandu</label>
                            <select class="form-select <?= (isset(session('errors')['posyandu_id'])) ? 'is-invalid' : '' ?>" id="posyandu_id" name="posyandu_id" required>
                                <option value="">Pilih Posyandu</option>
                                <?php foreach ($posyandu as $p) : ?>
                                    <option value="<?= $p->posyandu_id ?>"><?= $p->posyandu_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['posyandu_id'])) : ?>
                                    <?= session('errors')['posyandu_id'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</form>
<form action="<?= base_url(session('user')->user_type . '/laporan-balita') ?>" method="post" target="_blank" autocomplete="off">
    <div id="cetak" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Pilih Periode</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="periode_id">Periode</label>
                        <select name="periode_id" class="form-select" id="">
                            <?php foreach ($periode as $p) : ?>
                                <option value="<?= $p->periode_id ?>"><?= konversiBulan($p->periode_bulan) ?> <?= $p->periode_tahun ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php if (session()->has('admin_logged_id')) : ?>
                        <div class="form-group mb-4">
                            <label for="posyandu_id">Kelompok Penimbang</label>
                            <select name="posyandu_id" class="custom-select" id="">
                                <option value="">Semua</option>
                                <?php foreach ($posyandu as $p) : ?>
                                    <option value="<?= $p->posyandu_id ?>"><?= $p->posyandu_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning waves-effect waves-light">Cetak</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</form>
<?= $this->endSection(); ?>