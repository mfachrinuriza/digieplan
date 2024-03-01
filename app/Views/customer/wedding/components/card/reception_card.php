<div class="col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="divide-y">
                <div>
                    <div class="row">
                        <div class="col">
                            <div class="text-truncate">
                                <strong class="text-uppercase"><?= $row['title'] ?></strong>
                                <?php 
                                    if ($row['isPrimary']) {
                                        echo '<kbd class="bg-success text-white">Acara Utama</kbd>';
                                    }
                                ?>
                            </div>
                            <div class="text-muted">
                                <?= $row['place_name']?>
                            </div>
                            <div class="text-muted">
                                <?= $row['isUntilEnd'] ? 
                                date_format(date_create_from_format('Y-m-d', $row['date']), 'd F Y')." | ".$row['start_time']." - "." Selesai" 
                                : date_format(date_create_from_format('Y-m-d', $row['date']), 'd F Y')." | ".$row['start_time']." - ".$row['end_time'] 
                                ?>
                            </div>
                        </div>
                        <div class="col-auto align-self-center">
                            <!-- Page title actions -->
                            <br/><br/><br/><br/><br/>
                            <div class="col-auto ms-auto d-print-none">
                                <div class="d-flex">
                                    <a href="<?= base_url('/customer/kelola-konten-undangan/akad-resepsi/delete/'.$row['id']) ?>" class="btn btn-outline-danger w-100 m-1">Hapus</a>
                                    <a href="#" class="btn btn-outline-primary w-100 m-1" data-bs-toggle="modal" data-bs-target="#modal-reception-update<?= $row['id']?>">Ubah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>