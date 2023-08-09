<?= $this->extend('layout-admin'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/petugas') ?>">Petugas</a></li>
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
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Foto Profil</h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <img src="<?= base_url('assets/images/profil/' . $petugas->petugas_foto) ?>" alt="Foto Profil" class="img img-fluid">
            </div>
        </div>
    </div>
    <div class="col-lg-10">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Detail Petugas</h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <form action="<?= base_url('admin/petugas/update') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="petugas_id" value="<?= $petugas->petugas_id ?>">
                    <div class="form-group mb-4">
                        <label for="petugas_nama">Nama</label>
                        <input type="text" onkeydown="return /[a-z, ]/i.test(event.key)" class="form-control <?= (isset(session('errors')['petugas_nama'])) ? 'is-invalid' : '' ?>" id="petugas_nama" name="petugas_nama" value="<?= old('petugas_nama', $petugas->petugas_nama) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['petugas_nama'])) : ?>
                                <?= session('errors')['petugas_nama'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="petugas_jk">Jenis Kelamin</label>
                        <select class="form-select <?= (isset(session('errors')['petugas_jk'])) ? 'is-invalid' : '' ?>" id="petugas_jk" name="petugas_jk">
                            <option value="L" <?= ($petugas->petugas_jk == 'L') ? 'selected' : '' ?>><?= $petugas->petugas_jk ?></option>
                            <option value="P" <?= ($petugas->petugas_jk == 'P') ? 'selected' : '' ?>><?= $petugas->petugas_jk ?></option>
                        </select>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['petugas_jk'])) : ?>
                                <?= session('errors')['petugas_jk'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="petugas_tempatlahir">Tempat Lahir</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['petugas_tempatlahir'])) ? 'is-invalid' : '' ?>" id="petugas_tempatlahir" name="petugas_tempatlahir" value="<?= old('petugas_tempatlahir', $petugas->petugas_tempatlahir) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['petugas_tempatlahir'])) : ?>
                                <?= session('errors')['petugas_tempatlahir'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="petugas_tgllahir">Tanggal Lahir</label>
                        <input data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd-mm-yyyy" class="form-control input-mask <?= (isset(session('errors')['petugas_tgllahir'])) ? 'is-invalid' : '' ?>" id="petugas_tgllahir" name="petugas_tgllahir" value="<?= old('petugas_tgllahir', date('d/m/Y', strtotime($petugas->petugas_tgllahir))) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['petugas_tgllahir'])) : ?>
                                <?= session('errors')['petugas_tgllahir'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="petugas_alamat">Alamat Petugas</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['petugas_alamat'])) ? 'is-invalid' : '' ?>" id="petugas_alamat" name="petugas_alamat" value="<?= old('petugas_alamat', $petugas->petugas_alamat) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['petugas_alamat'])) : ?>
                                <?= session('errors')['petugas_alamat'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="petugas_hp">Nomor HP</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['petugas_hp'])) ? 'is-invalid' : '' ?>" id="petugas_hp" name="petugas_hp" value="<?= old('petugas_hp', $petugas->petugas_hp) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['petugas_hp'])) : ?>
                                <?= session('errors')['petugas_hp'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="posyandu_id">Kelompok Penimbang</label>
                        <select class="form-select <?= (isset(session('errors')['posyandu_id'])) ? 'is-invalid' : '' ?>" id="posyandu_id" name="posyandu_id" required>
                            <option value="">Pilih Kelompok Penimbang</option>
                            <?php foreach ($posyandu as $p) : ?>
                                <option value="<?= $p->posyandu_id ?>" <?= ($p->posyandu_id == $petugas->posyandu_id) ? 'selected' : '' ?>><?= $p->posyandu_nama ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['posyandu_id'])) : ?>
                                <?= session('errors')['posyandu_id'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <button type="submit" class="btn btn-primary">Ubah Data Petugas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<?= $this->endSection(); ?>