<!-- Start Create Event -->
<div class="modal modal-blur fade" id="<?= $modalNameCreate ?>" tabindex="-1" role="dialog" aria-hidden="true" onload="disableYesterday()">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/customer/tamu/create')?>" method="POST" >
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required" for="name">Nama Tamu Undangan</label>
                        <input type="text" class="form-control" id="name" name="fullname" placeholder="Masukkan nama lengkap anda" autocomplete="TRUE" value="<?= $profile['fullname'] ?? "" ?>" required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label required">Bersama</label>
                    <div class="form-selectgroup">
                        <label class="form-selectgroup-item">
                            <input type="radio" name="invite_with" value="Tidak Ada" class="form-selectgroup-input" checked>
                            <span class="form-selectgroup-label">Tidak Ada</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="invite_with" value="Keluarga" class="form-selectgroup-input">
                            <span class="form-selectgroup-label">Keluarga</span>
                        </label>
                        <label class="form-selectgroup-item">
                            <input type="radio" name="invite_with" value="Partner" class="form-selectgroup-input">
                            <span class="form-selectgroup-label">Partner</span>
                        </label>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
                    <button type="submit" class="btn btn-primary ms-auto">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Close Create Event -->