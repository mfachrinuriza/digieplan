<div class="col-md-6">
    <div class="card">
        <div class="container-md d-flex flex-column justify-content-center">
            <div class="empty">
                <span class="avatar avatar-xl mb-3 rounded-3" style="background-image: url(<?= base_url('/assets/images/album/' . $profiles['photo'] ?? "default_profile.png"); ?>)"></span>
                <p class="empty-title"><?= $profiles['fullname'] ?><small class="empty-subtitle"> (<?= $profiles['nickname'] ?>)</small></p>
                <p class="empty-subtitle">Anak <?= $profiles['gender'] ? "Laki-Laki" : "Perempuan" ?> dari Bapak <?= $profiles['father_name'] ?> dan Ibu <?= $profiles['mother_name'] ?></p>

                <div class="empty-action">
                    <a href="https://www.instagram.com/<?= str_replace('@', '', $profiles['social_media']) ?>" class="btn btn-outline-instagram" target="_blank">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                            <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M16.5 7.5l0 .01"></path>
                        </svg>
                        <?= $profiles['social_media'] ?>
                    </a>
                    <a href="#" class="btn btn-outline-blue" data-bs-toggle="modal" data-bs-target="#modal-profile-update<?= $profiles['id'] ?>">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                            <path d="M13.5 6.5l4 4"></path>
                        </svg>
                        Ubah
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<br />
<br />