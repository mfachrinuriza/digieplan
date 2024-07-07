<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title><?= $title ?></title>
    <!-- CSS files -->
    <link href="<?= base_url(''); ?>/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url(''); ?>/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url(''); ?>/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url(''); ?>/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url(''); ?>/dist/css/demo.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('/assets/css/gallery.css'); ?>" />
    <link href="<?= base_url(''); ?>/dist/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
    <!-- <link href="<?= base_url(''); ?>/dist/css/style.css" rel="stylesheet"/> -->

    <script src="<?= base_url(''); ?>/dist/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url(''); ?>/dist/js/masonry.pkgd.min.js"></script>

    <!-- DataTables -->
    <?php
    if ($title == getenv('TITLE_GUEST_BOOK') || $title == getenv('TITLE_GUEST')) {
        echo '
            <link href="' . base_url('/dist/fontawesome-free/css/all.min.css') . '">
            <link href="' . base_url('/dist/css/adminlte.min.css') . '">
            <link href="' . base_url('/dist/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css') . '">
            <link href="' . base_url('/dist/datatables/datatables-responsive/css/responsive.bootstrap4.min.css') . '">
            <link href="' . base_url('/dist/datatables-buttons/css/buttons.bootstrap4.min.css') . '">
            ';
    }
    ?>

    <!-- CSS files -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet" />

</head>

<body>
    <div class="page">