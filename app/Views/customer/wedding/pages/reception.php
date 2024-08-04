<div class="page-wrapper">
    <!-- Page header -->
    <?= view('customer/wedding/components/header_page') ?>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <!-- Page title actions -->
                        <?php
                        if (count($receptionsData) > 0) {
                            echo '
                                <div class="col-auto ms-auto d-print-none">
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#' . $modalNameCreate . '">
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
                <?php
                if (count($receptionsData) > 0) {
                    foreach ($receptionsData as $row) {
                        echo view('customer/wedding/components/card/reception_card', ['row' => $row]);
                        echo view('customer/wedding/components/modals/reception/update_reception_modal');
                    }
                } else {
                    $empty_state_title = "Acara";
                    $empty_state_subtitle = "Silakan tambah acara. Data acara tersebut dapat diubah setelah acara disimpan.";
                ?>
                    <div class="page-body">
                        <div class="container-xl d-flex flex-column justify-content-center">
                            <div class="empty">
                                <div class="empty-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 128px; height: 128px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-speakerphone">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 8a3 3 0 0 1 0 6" />
                                        <path d="M10 8v11a1 1 0 0 1 -1 1h-1a1 1 0 0 1 -1 -1v-5" />
                                        <path d="M12 8h0l4.524 -3.77a.9 .9 0 0 1 1.476 .692v12.156a.9 .9 0 0 1 -1.476 .692l-4.524 -3.77h-8a1 1 0 0 1 -1 -1v-4a1 1 0 0 1 1 -1h8" />
                                    </svg>
                                </div>
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
                <?php } ?>
            </div>
        </div>
    </div>
    <?= $this->include('customer/wedding/components/modals/reception/create_reception_modal') ?>
    <?= $this->include('customer/commons/layer/footer_page') ?>
</div>