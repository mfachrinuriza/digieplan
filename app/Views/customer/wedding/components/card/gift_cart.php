<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="divide-y">
                <div class="row">
                    <div class="col">
                        <div class="text-title">
                            <h4>
                                <?=
                                $updateData['type'] == "Address"
                                    ?
                                    $updateData['receiver_name']
                                    :
                                    $updateData['account_number']
                                ?>
                            </h4>
                        </div>
                        <div class="text-muted">
                            <?=
                            $updateData['type'] == "Address"
                                ?
                                $updateData['receiver_address']
                                :
                                $updateData['receiver_name']
                            ?>
                        </div>
                        <div class="text-muted">
                            <?php
                            if ($updateData['type'] == "Bank") {
                                echo $updateData['bank_name'];
                            } else if ($updateData['type'] == "E-Wallet") {
                                echo $updateData['bank_name'] . " | " . $updateData['type'] ?? "";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-auto align-self-center">
                        <!-- Page title actions -->
                        <br /><br /><br /><br /><br />
                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <a href="<?= base_url('/customer/kelola-konten-undangan/hadiah/delete/' . $updateData['id']) ?>" class="btn btn-outline-danger w-100 m-1">Hapus</a>
                                <a href="#" class="btn btn-outline-primary w-100 m-1" data-bs-toggle="modal" data-bs-target="#modal-gift-update-<?= $updateData['id'] ?>">Ubah</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
</div>