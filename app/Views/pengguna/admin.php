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
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user->user_email ?></td>
                                <td>
                                    <form action="<?= base_url('admin/user/hapus') ?>" method="post">
                                        <input type="hidden" name="user_id" value="<?= $user->user_id ?>">
                                        <button type="submit" class="bagde bg-danger border">Hapus</button>
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

<form action="<?= base_url('admin/admin/tambah') ?>" method="post" autocomplete="off">
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Tambah Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <label for="user_email">Email</label>
                        <input autcomplete="off" type="email" class="form-control <?= (isset(session('errors')['user_email'])) ? 'is-invalid' : '' ?>" id="user_emaila" name="user_email" value="">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['user_email'])) : ?>
                                <?= session('errors')['user_email'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="user_password">Password</label>
                        <input type="password" class="form-control <?= (isset(session('errors')['user_password'])) ? 'is-invalid' : '' ?>" id="user_password" name="user_password" value="" autocomplete="new-password">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['user_password'])) : ?>
                                <?= session('errors')['user_password'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control <?= (isset(session('errors')['password_confirmation'])) ? 'is-invalid' : '' ?>" id="password_confirmation" name="password_confirmation" value="">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['password_confirmation'])) : ?>
                                <?= session('errors')['password_confirmation'] ?>
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