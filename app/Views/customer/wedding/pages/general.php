<div class="page-wrapper">
    <!-- Page header -->
    <?php include_once './app/Views/customer/wedding/components/header_page.php';?>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <form action="<?= base_url('/customer/kelola-konten-undangan/general/update')?>" method="POST">
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <h4>Background Halaman Utama</h4>
                                        <p>Atur background foto pada halaman utama undanganmu</p>
                                    </div>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <h4>Musik background</h4>
                                                <p>Musik background pada undanganmu</p>
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <span class="col-auto d-flex">
                                                    <label class="form-check form-check-single form-switch ms-auto center">
                                                        <input class="form-check-input" id="music-checkbox" name="music_checkbox" type="checkbox" <?= $hasMusicSelected ? "checked" : ""?>>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="music-content">
                                            <?php
                                                if (count($musicList) > 0) {
                                                    foreach($musicList as $music) {
                                                        include "./app/Views/customer/wedding/components/card/music_card.php";
                                                    }
                                                } else {
                                                    require_once './app/Views/customer/wedding/components/card/music_card_empty.php';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h4>Harapan Dan Doa</h4>
                                        <p>Tampilkan Harapan dan Doa dari para tamu pada undanganmu</p>
                                    </div>
                                    <div class="col-md-2 align-self-center">
                                        <span class="col-auto d-flex">
                                            <label class="form-check form-check-single form-switch ms-auto center">
                                                <input class="form-check-input" id="pray-checkbox" name="pray_checkbox" type="checkbox" <?= $hasPraySelected ? "checked" : ""?>>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                                <br/>
                                <div class="row" id="pray-content">
                                    <div class="col-md-10">
                                        <h4>Pesan Pembuka / Harapan Dan Doa</h4>
                                        <?php 
                                            include_once "./app/Views/customer/wedding/components/dropdowns/pray_dropdown.php";
                                            include_once "./app/Views/customer/wedding/components/card/pray_card.php";
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3" id="update-bank-name-field">
                                    <label class="form-label" for="update-bank-name" id="update-title-bank-name">Link Filter Instagram</label>
                                    <input type="text" name="filter_id" value="<?= $filterInstagram['id'] ?>" hidden>
                                    <input type="text" class="form-control" name="link_url" placeholder="instagram.com/" value="<?= $filterInstagram['link_url'] ?? "" ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <?php include_once "./app/Views/customer/commons/layer/footer_page.php" ?>
</div>