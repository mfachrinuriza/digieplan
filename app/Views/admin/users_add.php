<!doctype html>
<html lang="en">

<?php include 'template/header.php' ?>

<body>
    <script src="<?= base_url('') ?>/dist/js/demo-theme.min.js"></script>
    <div class="page">
        <?php include 'template/sidebar.php' ?>
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Add User
                            </div>
                            <h2 class="page-title">
                                Tambah Pengguna
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body border-bottom py-3">
                                    <form action="<?= base_url('auth/admin_register_process') ?>" method="POST">
                                        <div class="mb-3">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="user_name" placeholder="Masukkan Nama Lengkap" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat Email</label>
                                            <input type="text" class="form-control" name="user_email" placeholder="Masukkan Alamat Email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nomor Ponsel</label>
                                            <input type="text" class="form-control" name="user_phone" placeholder="Masukkan Nomor Ponsel" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pilih Level Akun</label>
                                            <div class="mb-3">
                                                <div>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="radio" name="user_level" value="Admin" required>
                                                        <span class="form-check-label">Administrator</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="radio" name="user_level" value="Partner" required>
                                                        <span class="form-check-label">Partner (EO/WO)</span>
                                                    </label>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="radio" name="user_level" value="Customer" required>
                                                        <span class="form-check-label">Customer</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <button type="submit" class="btn btn-primary">Proses Tambah Pengguna</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'template/footer.php' ?>
</body>

</html>