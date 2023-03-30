<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Posyandu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Aplikasi Pendataan Kesehatan Balita" name="description" />
    <meta content="SAW" name="Vemi" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url() ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="" class="auth-logo">
                                <img src="<?= base_url() ?>assets/images/logo-dark.png" height="90" class="logo-dark mx-auto" alt="">
                            </a>
                        </div>
                    </div>

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
                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="<?= base_url('login') ?>" autocomplete="off">

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="email" required placeholder="Email Anda" name="email">
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <input class="form-control" type="password" name="password" required="" placeholder="Password" value="" autocomplete="new-password">
                                </div>
                            </div>


                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>

    <script src="<?= base_url() ?>assets/js/app.js"></script>

</body>

</html>