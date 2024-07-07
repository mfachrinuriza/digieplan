<?php
$isSelected = $music['id'] == $transactionSelected['music_id'] ? true : false;
?>
<div class="card">
    <div class="card-body">
        <div class="divide-y">
            <div>
                <div class="row">
                    <div class="col-auto">
                        <span class="avatar rounded-circle" style="background-image: url(<?= base_url('') . '/assets/images/singer/' . $music['image_singer'] ?>)"></span>
                    </div>
                    <div class="col">
                        <div class="text-truncate">
                            <strong><?= $music['singer'] ?></strong>
                        </div>
                        <div class="text-muted"><?= $music['name'] ?></div>
                    </div>
                    <div class="col-auto">
                        <div id="music-play" class="border-0" style="background-color: transparent;" onclick="playMusicButton('<?= $music['music_path'] ?>', 'music-play<?= $music['id'] ?>')">
                            <img class="avatar rounded-circle" id="music-play<?= $music['id'] ?>" src="<?= base_url(''); ?>/assets/images/icon/play-button.png"></img>
                        </div>
                    </div>
                    <div class="col-auto align-self-center">
                        <!-- Page title actions -->
                        <div class="col-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <form action="<?= base_url('/customer/kelola-konten-undangan/general/music/select') ?>" method="POST">
                                    <input name="music_id" value="<?= $music['id'] ?>" hidden>
                                    <button class="btn <?= ($isSelected ? " btn-primary" : " btn-outline-primary"); ?>" style="width: 70px;">
                                        <?= ($isSelected ? "Dipilih" : "Pilih"); ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br />