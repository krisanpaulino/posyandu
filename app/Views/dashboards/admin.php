<?= $this->extend('layout-admin'); ?>
<?= $this->section('content'); ?>
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12 mb-4">
            <img class="img-fluid" src="<?= base_url('assets/images/home-admin.jpeg') ?>" alt="">
        </div>
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Jumlah Balita</p>
                                    <h4 class="mb-2"><?= $jumlah_balita->jumlah ?></h4>
                                    <p class="text-muted mb-0">Semua Posyandu</p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-shield-user-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div>
                <!-- Revenue Card -->
                <!-- End Revenue Card -->

            </div>
            <div class="row">
                <h2>Status Gizi Periode <?= konversiBulan($periode->periode_bulan) ?> <?= $periode->periode_tahun ?></h2>
                <?php foreach ($status_gizi as $status) : ?>
                    <div class="col-xl-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2"><?= $status->statusgizi_nama ?></p>
                                        <h4 class="mb-2"><?= $status->jumlah ?></h4>
                                        <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2">Skor</span><?= $status->statusgizi_min ?> - <?= $status->statusgizi_max ?></p>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-primary rounded-3">
                                            <i class="ri-scales-2-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div>
                <?php endforeach; ?>
            </div>

        </div><!-- End Left side columns -->

    </div>
</section>
<?= $this->endSection(); ?>