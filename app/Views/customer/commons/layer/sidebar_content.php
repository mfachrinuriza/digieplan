<div class="collapse navbar-collapse" id="sidebar-menu">
    <ul class="navbar-nav pt-lg-3">
        <?php

        ?>
        <li class="nav-item">
            <a class="nav-link <?= $title === getenv('TITLE_DASHBOARD') ? "active" : "" ?>" href="<?= base_url('customer/dashboard'); ?>/">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Dashboard
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $title === getenv('TITLE_THEME') ? "active" : "" ?>" href="<?= base_url('customer/tema'); ?>/">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brush" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 21v-4a4 4 0 1 1 4 4h-4"></path>
                        <path d="M21 3a16 16 0 0 0 -12.8 10.2"></path>
                        <path d="M21 3a16 16 0 0 1 -10.2 12.8"></path>
                        <path d="M10.6 9a9 9 0 0 1 4.4 4.4"></path>
                    </svg>
                </span>
                <span class="nav-link-title">
                    Tema
                </span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle <?= $title === getenv('TITLE_INVITATION_CONTENT_SETTING') ? "show" : "" ?>" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="false" role="button" aria-expanded="<?= $title === getenv('TITLE_INVITATION_CONTENT_SETTING') ? "true" : "false" ?>">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                        <path d="M16 3l0 4"></path>
                        <path d="M8 3l0 4"></path>
                        <path d="M4 11l16 0"></path>
                        <path d="M8 15h2v2h-2z"></path>
                    </svg>
                </span>
                <span class="nav-link-title">
                    Kelola Konten Undangan
                </span>
            </a>
            <div class="dropdown-menu <?= $title === getenv('TITLE_INVITATION_CONTENT_SETTING') ? "show" : "" ?>">
                <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                        <a class="dropdown-item <?= $sub_title === getenv('SUBTITLE_GENERAL') ? "active" : "" ?>" href="<?= base_url('customer/kelola-konten-undangan/general'); ?>">General</a>
                        <a class="dropdown-item <?= $sub_title === getenv('SUBTITLE_MAIN_PAGE') ? "active" : "" ?>" href="<?= base_url('customer/kelola-konten-undangan/halaman-utama'); ?>">Halaman Utama</a>
                        <a class="dropdown-item <?= $sub_title === getenv('SUBTITLE_LOVE_STORY') ? "active" : "" ?>" href="<?= base_url('customer/kelola-konten-undangan/love-story'); ?>">Love Story</a>
                        <a class="dropdown-item <?= $sub_title === getenv('SUBTITLE_PROFILE') ? "active" : "" ?>" href="<?= base_url('customer/kelola-konten-undangan/profil'); ?>">Profil</a>
                        <a class="dropdown-item <?= $sub_title === getenv('SUBTITLE_RECEPTION') ? "active" : "" ?>" href="<?= base_url('customer/kelola-konten-undangan/akad-resepsi'); ?>">Akad & Resepsi</a>
                        <a class="dropdown-item <?= $sub_title === getenv('SUBTITLE_GALLERY') ? "active" : "" ?>" href="<?= base_url('customer/kelola-konten-undangan/galeri'); ?>">Galeri</a>
                        <a class="dropdown-item <?= $sub_title === getenv('SUBTITLE_GIFT') ? "active" : "" ?>" href="<?= base_url('customer/kelola-konten-undangan/hadiah'); ?>">Hadiah</a>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link <?= $title === getenv('TITLE_GUEST') ? "active" : "" ?>" href="<?= base_url('customer/tamu'); ?>">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                        <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Tamu
                </span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link <?= $title === getenv('TITLE_GUEST_BOOK') ? "active" : "" ?>" href="<?= base_url('customer/buku-tamu'); ?>">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 6v12a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2z" />
                        <path d="M10 16h6" />
                        <path d="M13 11m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M4 8h3" />
                        <path d="M4 12h3" />
                        <path d="M4 16h3" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Buku Tamu
                </span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link <?= $title === getenv('TITLE_GUEST') ? "active" : "" ?>" href="<?= base_url('preview/' . $transactionSelected['title_path'] . '?to=guest+name%26+keluarga'); ?>" target="_blank">
                <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    </svg>
                </span>
                <span class="nav-link-title">
                    Preview Undangan
                </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="btn btn-ghost-primary disabled d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">

            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url() ?>/auth/logout" class="btn btn-danger d-none d-sm-inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                </svg>
                Logout
            </a>
        </li>
    </ul>
</div>