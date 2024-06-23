<!-- Start Create Event -->
<div class="modal modal-blur fade" id="modal-gift-create-<?= $no ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('/customer/kelola-konten-undangan/hadiah/create') ?>" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Hadiah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Tipe Hadiah</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="gift_type" value="Bank" id="bank-type-<?= $no ?>" class="form-selectgroup-input" checked>
                                <span class="form-selectgroup-label">Bank</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="gift_type" value="E-Wallet" id="e-wallet-type-<?= $no ?>" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">E-Wallet</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="gift_type" value="Address" id="address-type-<?= $no ?>" class="form-selectgroup-input">
                                <span class="form-selectgroup-label">Alamat</span>
                            </label>
                        </div>
                    </div>
                    <div id="bank-content-<?= $no ?>">
                        <div class="mb-3">
                            <label class="form-label required" for="receiver_name">Pilih Bank</label>
                            <select class="form-select" id="select-bank-<?= $no ?>" name="bank_id">
                                <?php foreach ($bankList as $bank) { ?>
                                    <option value="<?= $bank['id'] ?>" class="option-bank"><?= $bank['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3" id="bank-name-field-<?= $no ?>">
                            <label class="form-label required" for="bank-name">Nama Bank</label>
                            <input type="text" class="form-control" id="bank-name-<?= $no ?>" name="bank_name" placeholder="Masukkan nama bank">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required" for="bank-account-no">Nomor Rekening</label>
                            <input type="text" class="form-control" id="bank-account-no-<?= $no ?>" name="bank_account_no" placeholder="Masukkan nomor rekening">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required" for="receiver-name-bank">Nama Penerima</label>
                            <input type="text" class="form-control" id="receiver-name-bank-<?= $no ?>" name="receiver_name_bank" placeholder="Masukan nama penerima">
                        </div>
                    </div>
                    <div id="e-wallet-content-<?= $no ?>" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label required" for="select-e-wallet">Nama E-Wallet</label>
                            <select class="form-select" id="select-e-wallet-<?= $no ?>" name="e_wallet_id">
                                <?php foreach ($ewalletList as $ewallet) { ?>
                                    <option value="<?= $ewallet['id'] ?>"><?= $ewallet['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required" for="e-wallet-account-no">Nomor E-Wallet</label>
                            <input type="text" class="form-control" id="e-wallet-account-no-<?= $no ?>" name="e_wallet_account_no" placeholder="Masukkan nomor e-wallet">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required" for="receiver-name-e-wallet">Nama Penerima</label>
                            <input type="text" class="form-control" id="receiver-name-e-wallet-<?= $no ?>" name="receiver_name_e_wallet" placeholder="Masukan nama penerima">
                        </div>
                    </div>
                    <div id="address-content-<?= $no ?>" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label required" for="receiver-name-address">Nama Penerima</label>
                            <input type="text" class="form-control" id="receiver-name-address-<?= $no ?>" name="receiver_name_address" placeholder="Masukan nama penerima">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required" for="receiver_address">Alamat Penerima</label>
                            <input type="text" class="form-control" id="receiver-address-<?= $no ?>" name="receiver_address" placeholder="Masukan alamat penerima">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
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