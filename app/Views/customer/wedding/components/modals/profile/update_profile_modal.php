<!-- Start Create Event -->
<div class="modal modal-blur fade" id="modal-profile-update<?= $profiles['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" onload="disableYesterday()">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/customer/kelola-konten-undangan/profil/update') ?>" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?= $profiles['id'] ?>" hidden>
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-center" onclick="requestChangeImageProfile(<?= $profiles['id'] ?>)">
                        <span class="avatar avatar-xl mb-3 rounded-3" id="image-profile-<?= $profiles['id'] ?>" style="background-image: url(<?= base_url('/assets/images/album/' . $profiles['photo'] ?? "default_profile.png"); ?>)"></span>
                        <input type="file" name="image_file" id="input-image-<?= $profiles['id'] ?>" onchange="updatePreviewImage(this, <?= $profiles['id'] ?>)" accept="image/*" hidden>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required" for="name">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="fullname" placeholder="Masukkan nama lengkap anda" autocomplete="TRUE" value="<?= $profiles['fullname'] ?? "" ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required" for="nickname">Nama Panggilan</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Masukkan nama panggilan anda" autocomplete="TRUE" value="<?= $profiles['nickname'] ?? "" ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required">Jenis Kelamin</label>
                        <?php
                        if ($profiles['gender'] == true) {
                            echo '
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="gender" value="1" class="form-selectgroup-input" checked>
                                        <span class="form-selectgroup-label">Laki-laki</span>
                                    </label>';
                            echo  '
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="gender" value="0" class="form-selectgroup-input" >
                                        <span class="form-selectgroup-label">Wanita</span>
                                    </label>
                                </div>';
                        } else {
                            echo '
                                <div class="form-selectgroup">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="gender" value="1" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">Laki-laki</span>
                                    </label>';
                            echo '
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="gender" value="0" class="form-selectgroup-input" checked >
                                        <span class="form-selectgroup-label">Wanita</span>
                                    </label>
                                </div>';
                        }

                        ?>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="form-label required" for="fatherName">Nama Ayah</label>
                                <input type="text" class="form-control" id="fatherName" name="fatherName" placeholder="Masukkan nama ayah anda" value="<?= $profiles['father_name'] ?? "" ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label required" for="fatherName">Nama Ibu</label>
                                <input type="text" class="form-control" id="motherName" name="motherName" placeholder="Masukkan nama ibu anda" value="<?= $profiles['mother_name'] ?? "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="akad_nikah">Media Sosial</label>
                        <span class="" for="akad_nikah">Instagram <small>(Optional)</small></span>
                        <input type="text" class="form-control" id="socialMedia" name="socialMedia" placeholder="@digieplan.official" value="<?= $profiles['social_media'] ?? "" ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Close Create Event -->