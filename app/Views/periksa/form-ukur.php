<?= $this->extend('layout-petugas'); ?>
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
        <ul>

        </ul>
    <?php endif ?>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Data Balita</h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <table class="table">
                    <tr>
                        <th>Nama balita</th>
                        <td><?= $balita->balita_nama ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?= $balita->balita_jk ?></td>
                    </tr>
                    <tr>
                        <th>Umur</th>
                        <td><?= $balita->balita_umur ?> Bulan</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Formulir Pengukuran</h4>
                <p class="card-title-desc"></p>
                </p>
                <!-- end row -->
                <!-- Content Here -->
                <form action="<?= base_url('petugas/periksa/store') ?>" method="post">
                    <input type="hidden" name="periode_id" value="<?= $periode->periode_id ?>">
                    <input type="hidden" name="balita_id" value="<?= $balita->balita_id ?>">

                    <h4 class="card-title">Formulir Pengukuran</h4>
                    <div class="form-group mb-4">
                        <label for="hasilukur_posisi">Posisi</label>
                        <select class="form-select <?= (isset(session('errors')['hasilukur_posisi'])) ? 'is-invalid' : '' ?>" id="hasilukur_posisi" name="hasilukur_posisi" required>
                            <option value="L">L</option>
                            <option value="H">H</option>
                        </select>
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['hasilukur_posisi'])) : ?>
                                <?= session('errors')['hasilukur_posisi'] ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="hasilukur_bb">Berat Badan (Kg)</label>
                        <input type="number" step="0.1" class="form-control <?= (isset(session('errors')['hasilukur_bb'])) ? 'is-invalid' : '' ?>" id="hasilukur_bb" name="hasilukur_bb" value="<?= old('hasilukur_bb') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['hasilukur_bb'])) : ?>
                                <?= session('errors')['hasilukur_bb'] ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="hasilukur_pbtb">Tinggi/Panjang Badan (Cm)</label>
                        <input type="number" class="form-control <?= (isset(session('errors')['hasilukur_pbtb'])) ? 'is-invalid' : '' ?>" step="0.1" id="hasilukur_pbtb" name="hasilukur_pbtb" value="<?= old('hasilukur_pbtb') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['hasilukur_pbtb'])) : ?>
                                <?= session('errors')['hasilukur_pbtb'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<div class="mb-5">

</div>
<?= $this->endSection(); ?>