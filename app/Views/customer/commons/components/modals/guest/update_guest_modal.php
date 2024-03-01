<!-- Start Create Event -->
<div class="modal modal-blur fade" id="<?= $modalNameUpdate.$guest['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" onload="disableYesterday()">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/customer/tamu/update')?>" method="POST" >
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="id" value="<?= $guest['id'] ?>" hidden>
                    <div class="mb-3">
                        <label class="form-label required" for="name">Nama Tamu Undangan</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap anda" autocomplete="TRUE" value="<?= $guest['name'] ?? "" ?>" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label required">Bersama</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <?php  
                                if ($guest['invite_with'] == "Tidak Ada") {
                                    echo '<input type="radio" name="invite_with" value="Tidak Ada" class="form-selectgroup-input" checked>';
                                } else {
                                    echo '<input type="radio" name="invite_with" value="Tidak Ada" class="form-selectgroup-input">';
                                }
                            ?>
                            <span class="form-selectgroup-label">Tidak Ada</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <?php  
                                if ($guest['invite_with'] == "Keluarga") {
                                    echo '<input type="radio" name="invite_with" value="Keluarga" class="form-selectgroup-input" checked>';
                                } else {
                                    echo '<input type="radio" name="invite_with" value="Keluarga" class="form-selectgroup-input">';
                                }
                            ?>
                            <span class="form-selectgroup-label">Keluarga</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <?php  
                                if ($guest['invite_with'] == "Partner") {
                                    echo '<input type="radio" name="invite_with" value="Partner" class="form-selectgroup-input" checked>';
                                } else {
                                    echo '<input type="radio" name="invite_with" value="Partner" class="form-selectgroup-input">';
                                }
                            ?>
                            <span class="form-selectgroup-label">Partner</span>
                        </label>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
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