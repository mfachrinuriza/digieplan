<!-- data is empty -->
<div class="col-md-6">
    <div class="card">
        <div class="container-md d-flex flex-column justify-content-center">
            <div class="empty">
                <p class="empty-subtitle"><?= $title ?></p>
                <p class="empty-subtitle text-muted"><?= $body ?></p>
                <div class="empty-action">
                    <a href="./." class="btn btn-outline-blue" data-bs-toggle="modal" data-bs-target="#modal-profile-create-<?= $gender ?>">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah <?= $empty_state_title ?? "" ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br />