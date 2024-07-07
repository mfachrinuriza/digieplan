<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title; ?></title>
    <!-- CSS files -->
    <link href="<?= base_url('') ?>/dist/css/tabler.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('') ?>/dist/css/tabler-flags.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('') ?>/dist/css/tabler-payments.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('') ?>/dist/css/tabler-vendors.min.css?1674944402" rel="stylesheet" />
    <link href="<?= base_url('') ?>/dist/css/demo.min.css?1674944402" rel="stylesheet" />
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
    <script src="<?= base_url('') ?>/dist/js/demo-theme.min.js?1674944402"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url('') ?>/static/logo.svg" height="36" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="mb-3">Pendaftaran Event</h2>
                    <p class="text-muted text-wrap mb-4">
                        Terima kasih sudah memilih WeddingKu sebagai partner anda, untuk membuat event silahkan gunakan user token yang sudah diinformasikan oleh agent kami.
                    </p>
                    <div class="mb-3">
                        <label class="form-label">User Token</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="Masukkan User Token">
                    </div>

                    <div class="my-4">
                        <a href="#" class="btn btn-primary w-100">
                            Validasi User Token
                        </a>
                    </div>
                    <p class="text-muted">
                        Apabila anda memerlukan bantuan, silahkan hubungi kami <a href="#">disini</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('') ?>/dist/js/tabler.min.js?1674944402" defer></script>
    <script src="<?= base_url('') ?>/dist/js/demo.min.js?1674944402" defer></script>
</body>

</html>