<div class="page-wrapper">
    <!-- Page header -->
    <?php
    echo view('customer/wedding/components/header_page');
    $n = 0;
    ?>


    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <!-- Page title actions -->
                        <?php
                        if (count($giftList) > 0 && count($giftList) < 3) {
                            $n++;
                            echo '
                                <div class="col-auto ms-auto d-print-none">
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#' . $modalNameCreate . '-' . $n . '">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                                <path d="M16 3v4" />
                                                <path d="M8 3v4" />
                                                <path d="M4 11h16" />
                                                <path d="M16 19h6" />
                                                <path d="M19 16v6" />
                                            </svg>
                                            Tambah 
                                        </a>
                                    </div>
                                </div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <?php if (count($giftList) > 0) : ?>
                    <?php foreach ($giftList as $updateData) : ?>
                        <?php $n++; ?>
                        <?= view('customer/wedding/components/card/gift_cart', ['updateData' => $updateData]) ?>
                        <?= view('customer/wedding/components/modals/gift/update_gift_modal', ['updateData' => $updateData]) ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php
                    $n++;
                    $empty_state_title = "Hadiah";
                    $empty_state_subtitle = "Tambah nomor bank/e-wallet atau alamat untuk menerima hadiahmu.";
                    ?>
                    <div class="page-body">
                        <div class="container-xl d-flex flex-column justify-content-center">
                            <div class="empty">
                                <div class="empty-img"><img style="background-image: url(<?= base_url(''); ?>/dist/svg/user.svg)" height="48" width="48" alt=""></div>
                                <p class="empty-title">Belum Ada <?= $empty_state_title ?></p>
                                <p class="empty-subtitle text-muted"><?= $empty_state_subtitle ?></p>
                                <div class="empty-action">
                                    <a href="./." class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?= $modalNameCreate . '-' . $n ?>">
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
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php for ($no = 1; $no <= $n; $no++) : ?>
        <?= view('customer/wedding/components/modals/gift/create_gift_modal', ['no' => $no]) ?>
    <?php endfor; ?>

    <?= view('customer/commons/layer/footer_page') ?>
</div>