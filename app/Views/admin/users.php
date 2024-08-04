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
                                User List
                            </div>
                            <h2 class="page-title">
                                Daftar Pengguna
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="<?= base_url('/admin/users_add') ?>" class="btn btn-primary d-none d-sm-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 5l0 14" />
                                        <path d="M5 12l14 0" />
                                    </svg>
                                    Tambah Pengguna
                                </a>
                            </div>
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
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Pengguna</h3>
                                </div>
                                <div class="card-body border-bottom py-3">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Role</th>
                                                <th>Status Akun</th>
                                                <th>Tanggal Terdaftar</th>
                                                <th class="w-1"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($listUsers as $users) {
                                            ?>
                                                <tr>
                                                    <td><?= $users['user_name']; ?></td>
                                                    <td><?= $users['user_email']; ?></td>
                                                    <td><?= $users['user_phone']; ?></td>
                                                    <td><?= $users['user_level']; ?></td>
                                                    <td><?php
                                                        if ($users['user_account_status'] === '1') {
                                                            echo 'Active';
                                                        } else {
                                                            echo 'Inactive';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $users['created_at']; ?></td>
                                                    <td><a href="<?= base_url('admin/users_edit') ?>/<?= $users['user_id']; ?>">Edit</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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