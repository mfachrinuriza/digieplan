<!-- Start Create Event -->
<div class="modal modal-blur fade" id="modal-profile-update<?= $profiles['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" onload="disableYesterday()">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/customer/kelola-konten-undangan/profil/update')?>" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?= $profiles['id'] ?>" hidden>
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                echo  
                                    '<label class="form-selectgroup-item">
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
                    <div class="mb-3" id="dropzone-profile-update">
                        <label class="form-label required">Foto</label>
                        <input type="file" name="image_file" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
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
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Close Create Event -->