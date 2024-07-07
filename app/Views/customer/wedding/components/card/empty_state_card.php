<!-- Page body -->
<?php
$type = $sub_title;
$empty_state_title = "";
$empty_state_subtitle = "";

switch ($type) {
    case SUBTITLE_PROFILE:
        $empty_state_title = "Profil";
        $empty_state_subtitle = "Silakan tambah profil. Data profil tersebut dapat diubah setelah profil disimpan.";
    case SUBTITLE_RECEPTION:
        $empty_state_title = "Acara";
        $empty_state_subtitle = "Silakan tambah acara. Data acara tersebut dapat diubah setelah acara disimpan.";
    case SUBTITLE_GIFT:
        $empty_state_title = "Hadiah";
        $empty_state_subtitle = "Tambah nomor bank/e-wallet atau alamat untuk menerima hadiahmu.";
};

?>

<div class="page-body">
    <div class="container-xl d-flex flex-column justify-content-center">
        <div class="empty">
            <div class="empty-img"><img style="background-image: url(<?= base_url(''); ?>/dist/svg/user.svg)" height="48" width="48" alt=""></div>
            <p class="empty-title">Belum Ada <?= $empty_state_title ?></p>
            <p class="empty-subtitle text-muted"><?= $empty_state_subtitle ?></p>
            <div class="empty-action">
                <a href="./." class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modalNameCreate ?>">
                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M5 12l14 0" />
                    </svg>
                    Tambah <?= $empty_state_title ?>
                </a>
            </div>
        </div>
    </div>
</div>