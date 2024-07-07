<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Login | Panel Admin Weddingku</title>
  <link href="<?= base_url('/dist/css/tabler.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('/dist/css/tabler-flags.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('/dist/css/tabler-payments.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('/dist/css/tabler-vendors.min.css') ?>" rel="stylesheet" />
  <link href="<?= base_url('/dist/css/demo.min.css') ?>" rel="stylesheet" />
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
  <script src="<?= base_url('/dist/js/demo-theme.min.js') ?>"></script>
  <div class="page page-center">
    <div class="container container-tight py-4">
      <div class="card card-md">
        <div class="card-body">
          <h1 class="h1 text-center mb-2">
            <img class="rounded-4" src="<?= base_url('/assets/images/logo.png') ?>" width="300">
          </h1>
          <br />
          <h2 class="h2 text-center mb-4">Login</h2>
          <form action="<?= base_url() ?>/auth/login_process" method="POST" autocomplete="off">
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="user_email" class="form-control" placeholder="Masukkan Email anda" autocomplete="on" required>
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
              </label>
              <div class="input-group input-group-flat">
                <input type="password" name="user_password" class="form-control" placeholder="Masukkan Password anda" autocomplete="off" required>
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                      <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                    </svg>
                  </a>
                </span>
              </div>
              <span class="form-label-description">
                <!-- <a href="./forgot-password.html">Lupa Password</a> -->
              </span>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">LOGIN</button>
            </div>
          </form>
        </div>
        <div class="text-center text-muted mt-3 mb-5">
          <!-- Belum memiliki akun? <a href="<?= base_url() ?>/auth/register" tabindex="-1">Daftar Sekarang</a> -->
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="<?= base_url('/dist/js/tabler.min.js') ?>" defer></script>
  <script src="<?= base_url('/dist/js/demo.min.js') ?>" defer></script>
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