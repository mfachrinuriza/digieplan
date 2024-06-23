<!-- Start Create Event -->
<div class="modal modal-blur fade" id="modal-reception-create" tabindex="-1" role="dialog" aria-hidden="true" onload="disableYesterday()">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/customer/kelola-konten-undangan/akad-resepsi/create') ?>" method="POST">
                <input type="text" name="transaction_id" value="<?= $transactionSelected['id'] ?>" hidden>
                <input type="text" name="user_id" value="<?= $transactionSelected['user_id'] ?>" hidden>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Acara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label required" for="title">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Akad Nikah" autocomplete required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label required" for="date">Tanggal</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label required" for="startTime">Jam Mulai</label>
                            <input type="time" class="form-control" id="startTime" name="startTime" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label required" for="endTime">Jam Selesai</label>
                            <input type="time" class="form-control" id="endTime" name="endTime" disabled>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="isUntilEnd">
                                <span class="form-check-label">Sampai Selesai</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Zona Waktu</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="timeZone" value="WIB" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">WIB</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="timeZone" value="WITA" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">WITA</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="timeZone" value="WIT" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">WIT</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required" for="placeName">Nama Tempat</label>
                        <input type="text" class="form-control" id="placeName" name="placeName" placeholder="Gedung sate" autocomplete required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required" for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Jalan sudirman" maxlength="250" autocomplete required>
                        <small class="text-muted text-red text-end form-label required" for="title'.$number.'">Maksimal 250 Karakter</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required" for="linkAddress">Link Lokasi</label>
                        <input type="text" class="form-control" id="linkAddress" name="linkAddress" placeholder="https://goo.gl/maps/yMsEKDmAUo5d8vTu8" autocomplete required>
                    </div>
                    <div>
                        <label class="form-label required">Jadikan acara utama</label>
                        <label class="row">
                            <span class="col">Countdown akan mengacu pada acara utama</span>
                            <span class="col-auto">
                                <label class="form-check form-check-single form-switch">
                                    <?php
                                    if (count($receptionsData) > 0) {
                                        echo '<input class="form-check-input" type="checkbox" name="isPrimary">';
                                    } else {
                                        echo '<input class="form-check-input" type="checkbox" name="isPrimary" checked>';
                                    }
                                    ?>
                                </label>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                            <path d="M16 3v4" />
                            <path d="M8 3v4" />
                            <path d="M4 11h16" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                        </svg>
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Close Create Event -->