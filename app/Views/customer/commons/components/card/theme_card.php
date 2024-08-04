<?php
$isThemeSelected = $theme['id'] == $transactionSelected['theme_id'] ? true : false;
?>
<div class="col-sm-4 col-lg-3">
    <div class="card card-sm">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner" style="aspect-ratio: 9 / 19.5;">
                <div class="carousel-item active">
                    <img src="<?= base_url('/assets/images/themes/' . $theme['photo_1']) ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('/assets/images/themes/' . $theme['photo_2']) ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('/assets/images/themes/' . $theme['photo_3']) ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('/assets/images/themes/' . $theme['photo_4']) ?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('/assets/images/themes/' . $theme['photo_5']) ?>" class="d-block w-100" alt="...">
                </div>
                <?= var_dump($theme['photo_1']) ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="card-footer text-center">
            <div class="align-items-center">
                <h3><?= $theme['name'] ?></h3>
            </div>
        </div>
        <a href="<?= $theme['preview_url'] ?>" class="btn btn-outline-secondary" style="margin-bottom: 8px;" target="_blank">Preview</a>
        <form action="<?= base_url('/customer/tema/select') ?>" method="POST">
            <input type="text" name="theme_id" value="<?= $theme['id'] ?>" hidden>
            <button class="btn col-md-12 <?= $isThemeSelected ? "btn-primary" : "btn-outline-primary" ?>" name="request-select-theme"><?= $isThemeSelected ? "Dipilih" : "Pilih" ?></button>
        </form>
    </div>
</div>