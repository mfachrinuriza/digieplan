<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Register | Panel Admin Weddingku</title>
    <link href="<?= base_url('') ?>/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url('') ?>/dist/css/demo.min.css" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="<?= base_url('') ?>/dist/js/demo-theme.min.js"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body">
                    <h1 class="h1 text-center mb-2">
                        <img src="<?= base_url('/dist/img') ?>/weddingku-logo.png" width="300">
                    </h1>
                    <br />
                    <h2 class="h2 text-center mb-4">Create your account</h2>
                    <form action="<?= base_url() ?>/auth/register_process" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="user_name" id="user_name" class=" form-control" placeholder="Masukkan Nama Lengkap Anda" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Masukkan Alamat Email Anda" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="number" name="user_phone" id="user_phone" class="form-control" placeholder="Masukkan Nomor Telepon Anda" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Buat Password</label>
                            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Buat Password Unik Anda" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="user_password_confirm" id="user_password_confirm" class="form-control" placeholder="Masukkan Ulang Password Anda" autocomplete="off" required>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">REGISTER</button>
                        </div>
                    </form>
                </div>
                <div class="text-center text-muted mt-3 mb-5">
                    Sudah memiliki akun? <a href="<?= base_url() ?>/auth/login" tabindex="-1">Login Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="<?= base_url('') ?>/dist/js/tabler.min.js" defer></script>
    <script src="<?= base_url('') ?>/dist/js/demo.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php if (isset(session()->success)) : ?>
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: "<?= session()->success ?>",
            icon: 'success'
        });
    </script>
<?php endif; ?>

<?php if (isset(session()->error)) : ?>
    <script>
        Swal.fire({
            title: 'Gagal!',
            text: "<?= session()->error ?>",
            icon: 'error'
        });
    </script>
<?php endif; ?>