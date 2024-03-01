<!-- Start Create Event -->
<div class="modal modal-blur fade" id="modal-gift-update<?= $updateData['id']?>" tabindex="-1" role="dialog" aria-hidden="true" onload="disableYesterday()">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Hadiah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-update-gift" action="<?= base_url('/customer/kelola-konten-undangan/hadiah/update')?>" method="POST">
                <input type="text" name="id" value="<?= $updateData['id'] ?>" hidden>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label required">Tipe Hadiah</label>
                        <div class="form-selectgroup">
                            <?= 
                                $updateData['type'] == "Bank" 
                                ?
                                '<label class="form-selectgroup-item">
                                    <input type="radio" name="updateGiftType" value="Bank" id="update-bank-type" class="form-selectgroup-input" checked disabled>
                                    <span class="form-selectgroup-label">Bank</span>
                                </label>'
                                :
                                '<label class="form-selectgroup-item">
                                    <input type="radio" name="updateGiftType" value="Bank" id="update-bank-type" class="form-selectgroup-input" disabled>
                                    <span class="form-selectgroup-label">Bank</span>
                                </label>'
                            ?>
                            <?= 
                                $updateData['type'] == "E-Wallet" 
                                ?
                                '<label class="form-selectgroup-item">
                                    <input type="radio" name="updateGiftType" value="E-Wallet" id="update-e-wallet-type" class="form-selectgroup-input" checked disabled>
                                    <span class="form-selectgroup-label">E-Wallet</span>
                                </label>'
                                :
                                '<label class="form-selectgroup-item">
                                    <input type="radio" name="updateGiftType" value="E-Wallet" id="update-e-wallet-type" class="form-selectgroup-input" disabled>
                                    <span class="form-selectgroup-label">E-Wallet</span>
                                </label>'
                            ?>
                            <?= 
                                $updateData['type'] == "Address" 
                                ?
                                '<label class="form-selectgroup-item">
                                    <input type="radio" name="updateGiftType" value="Address" id="update-address-type" class="form-selectgroup-input" checked disabled>
                                    <span class="form-selectgroup-label">Alamat</span>
                                </label>'
                                :
                                '<label class="form-selectgroup-item">
                                    <input type="radio" name="updateGiftType" value="Address" id="update-address-type" class="form-selectgroup-input" disabled>
                                    <span class="form-selectgroup-label">Alamat</span>
                                </label>'
                            ?>
                        </div>
                        <input type="text" name="updateGiftType" value="<?= $updateData['type'] ?>" hidden>
                    </div>
                    <?php if ($updateData['type'] == "Bank") {?>
                        <div id="update-bank-content">
                            <div class="mb-3">
                                <select class="form-select" id="update-select-bank" name="bank_id">
                                    <option value="<?= $updateData['bank_id']?>"><?= $updateData['bank_name']?></option>
                                    <?php foreach($bankList as $bank) {
                                        if ($updateData['bank_id'] != $bank['id']) {
                                            echo '<option value="'.$bank['id'].'" class="update-option-bank">'.$bank['name'].'</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                            <?= $updateData['bank_id'] == 99 ?
                                '<div class="mb-3" id="update-bank-name-field">
                                    <label class="form-label required" for="update-bank-name" id="update-title-bank-name">Nama Bank</label>
                                    <input type="text" class="form-control" id="update-bank-name" name="bankName" placeholder="Masukkan nama bank" value="'. $updateData['bank_name'].'" required>
                                </div>'
                                :
                                "";?>
                            <div class="mb-3">
                                <label class="form-label required" for="update-bank-account-no">Nomor Rekening </label>
                                <input type="text" class="form-control" id="update-bank-account-no" name="bank_account_no" placeholder="Masukkan nomor rekening" value="<?= $updateData['account_number'] ?>" required>
                            </div>
                        </div>
                    <?php } else if ($updateData['type'] == "E-Wallet") { ?>
                        <div id="update-e-wallet-content">
                            <div class="mb-3">
                                <select class="form-select" id="update-select-e-wallet" name="e_wallet_id">
                                    <option value="<?= $updateData['bank_id']?>"><?= $updateData['bank_name']?></option>
                                    <?php foreach($ewalletList as $ewallet) {
                                        if ($updateData['bank_id'] != $ewallet['id']) {
                                            echo '<option value="'.$ewallet['id'].'">'. $ewallet['name'].'</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label required" for="update-e-wallet-no">Nomor E-Wallet </label>
                                <input type="text" class="form-control" id="update-e-wallet-no" name="e_wallet_account_no" placeholder="Masukkan nomor e-wallet" value="<?= $updateData['account_number'] ?>" required>
                            </div>
                        </div>
                    <?php } else if ($updateData['type'] == "Address") {
                        echo '<div id="update-address-content">
                                <div class="mb-3">
                                    <label class="form-label required" for="update-receiver-name">Nama Penerima</label>
                                    <input type="text" class="form-control" id="update-receiver-name" name="receiverName" placeholder="Masukan nama penerima" value="'. $updateData['receiver_name'].'" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required" for="update-receiver-address">Alamat Penerima</label>
                                    <input type="text" class="form-control" id="update-receiver-address" name="receiverAddress" placeholder="Masukan alamat penerima" value="'. $updateData['receiver_address'].'"required>
                                </div>
                            </div>';
                    } ?> 
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
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
                        Ubah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Close Create Event -->