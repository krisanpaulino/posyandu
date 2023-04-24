<?= $this->extend('layout-' . session('user')->user_type); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type . '/balita') ?>">Balita</a></li>
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

                <form action="<?= base_url(session('user')->user_type . '/balita/update') ?>" method="post">
                    <input type="hidden" name="balita_id" value="<?= $balita->balita_id ?>">
                    <div class="form-group mb-4">
                        <label for="balita_nama">Nama Balita</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['balita_nama'])) ? 'is-invalid' : '' ?>" id="balita_nama" name="balita_nama" value="<?= old('balita_nama', $balita->balita_nama) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_nama'])) : ?>
                                <?= session('errors')['balita_nama'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="balita_jk">Jenis Kelamin</label>
                        <select class="form-select <?= (isset(session('errors')['balita_jk'])) ? 'is-invalid' : '' ?>" id="balita_jk" name="balita_jk">
                            <option value="L" <?= ($balita->balita_jk == 'L') ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="P" <?= ($balita->balita_jk == 'P') ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_jk'])) : ?>
                                <?= session('errors')['balita_jk'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="balita_umur">Umur Balita (bln)</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['balita_umur'])) ? 'is-invalid' : '' ?>" id="balita_umur" name="balita_umur" value="<?= old('balita_umur', $balita->balita_umur) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_umur'])) : ?>
                                <?= session('errors')['balita_umur'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="balita_tgllahir">Tgl Lahir Balita</label>
                        <input type="text" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" class="form-control input-mask <?= (isset(session('errors')['balita_tgllahir'])) ? 'is-invalid' : '' ?>" id="balita_tgllahir" name="balita_tgllahir" value="<?= old('balita_tgllahir', date('d-m-Y', strtotime($balita->balita_tgllahir))) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_tgllahir'])) : ?>
                                <?= session('errors')['balita_tgllahir'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="balita_orangtua">Orang Tua Balita</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['balita_orangtua'])) ? 'is-invalid' : '' ?>" id="balita_orangtua" name="balita_orangtua" value="<?= old('balita_orangtua', $balita->balita_orangtua) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['balita_orangtua'])) : ?>
                                <?= session('errors')['balita_orangtua'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="balita_alamat">Alamat</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['balita_alamat'])) ? 'is-invalid' : '' ?>" id="balita_alamat" name="balita_alamat" value="<?= old('balita_alamat', $balita->balita_alamat) ?>">
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
                                <?php foreach ($posyandu as $p) : ?>
                                    <option value="<?= $p->posyandu_id ?>" <?= ($p->posyandu_id == $balita->posyandu_id) ? 'selected' : '' ?>><?= $p->posyandu_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?php if (isset(session('errors')['posyandu_id'])) : ?>
                                    <?= session('errors')['posyandu_id'] ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <button type="sumbit" class="btn btn-primary waves-effect waves-light">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<?= $this->endSection(); ?>