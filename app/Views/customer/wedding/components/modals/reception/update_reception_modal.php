<!-- Start Create Event -->
<div class="modal modal-blur fade" id="modal-reception-update<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" onload="disableYesterday()">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/customer/kelola-konten-undangan/akad-resepsi/update') ?>" method="POST">

                <input type="text" name="transaction_id" value="<?= $transactionSelected['id'] ?>" hidden>
                <input type="text" name="user_id" value="<?= $transactionSelected['user_id'] ?>" hidden>
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Acara</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label required" for="title">Judul</label>
                            <input type="text" name="id" value="<?= $row['id'] ?>" hidden>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Akad Nikah" value="<?= $row['title'] ?>" autocomplete required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label required" for="date">Tanggal</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?= $row['date'] ?>" required>
                            <p></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label required" for="startTime">Jam Mulai</label>
                            <input type="time" class="form-control" id="startTime" name="startTime" value="<?= $row['start_time'] ?>" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label required" for="endTime">Jam Selesai</label>
                            <?=
                            $row['isUntilEnd'] ?
                                '<input type="time" class="form-control" id="endTime" name="endTime" value="">'
                                :
                                '<input type="time" class="form-control" id="endTime" name="endTime" value="' . $row['end_time'] . '">';
                            ?>
                            <label class="form-check">
                                <?=
                                $row['isUntilEnd'] ?
                                    '<input class="form-check-input" id="checkBoxUntilEnd' . $row['id'] . '" type="checkbox" name="isUntilEnd" checked>'
                                    :
                                    '<input class="form-check-input" id="checkBoxUntilEnd' . $row['id'] . '" type="checkbox" name="isUntilEnd">';
                                ?>
                                <span class="form-check-label">Sampai Selesai</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Zona Waktu</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <?php
                                if ($row['time_zone'] == "WIB") {
                                    echo '<input type="radio" name="timeZone" value="WIB" class="form-selectgroup-input" checked>';
                                } else {
                                    echo '<input class="form-check-input" type="checkbox" name="isUntilEnd">';
                                }
                                ?>
                                <span class="form-selectgroup-label">WIB</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <?php
                                if ($row['time_zone'] == "WITA") {
                                    echo '<input type="radio" name="timeZone" value="WITA" class="form-selectgroup-input" checked>';
                                } else {
                                    echo '<input type="radio" name="timeZone" value="WITA" class="form-selectgroup-input">';
                                }
                                ?>
                                <span class="form-selectgroup-label">WITA</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <?php
                                if ($row['time_zone'] == "WIT") {
                                    echo '<input type="radio" name="timeZone" value="WIT" class="form-selectgroup-input" checked>';
                                } else {
                                    echo '<input type="radio" name="timeZone" value="WIT" class="form-selectgroup-input">';
                                }
                                ?>
                                <span class="form-selectgroup-label">WIT</span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required" for="placeName">Nama Tempat</label>
                        <input type="text" class="form-control" id="placeName" name="placeName" placeholder="Gedung sate" value="<?= $row['place_name'] ?>" autocomplete required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required" for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Jalan sudirman" value="<?= $row['address'] ?>" maxlength="250" autocomplete required>
                        <small class="text-muted text-red text-end form-label required" for="title'.$number.'">Maksimal 250 Karakter</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required" for="linkAddress">Link Lokasi</label>
                        <input type="text" class="form-control" id="linkAddress" name="linkAddress" placeholder="https://goo.gl/maps/yMsEKDmAUo5d8vTu8" value="<?= $row['link_address'] ?>" autocomplete required>
                    </div>
                    <div>
                        <label class="form-label required">Jadikan acara utama</label>
                        <label class="row">
                            <span class="col">Countdown akan mengacu pada acara utama</span>
                            <span class="col-auto">
                                <label class="form-check form-check-single form-switch">
                                    <?php
                                    if ($row['isPrimary']) {
                                        echo '<input class="form-check-input" type="checkbox" name="isPrimary" checked>';
                                    } else {
                                        echo '<input class="form-check-input" type="checkbox" name="isPrimary">';
                                    }
                                    ?>
                                </label>
                            </span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Close Create Event -->