<div class="page-wrapper">
    <!-- Page header -->
    <?php include_once './app/Views/customer/wedding/components/header_page.php' ?>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="<?= $url_image != null ? "card" : "" ?> col-md-4 p-0" style="aspect-ratio: 8 / 13;">
                                    <form action="<?= base_url('/customer/kelola-konten-undangan/halaman-utama/create')?>" method="POST" enctype="multipart/form-data">
                                        <a class="p-0 m-0 border-0 bg-transparent" onclick="buttonSelectImage()">
                                            <input type="text" name="transaction_id" id="transaction_id" value="<?= $transactionSelected['id'] ?>" hidden>
                                            <input type="text" name="type" id="type" value="cover" hidden>
                                            <input type="file" name="image" id="input-image" onchange="requestSubmitImage()" accept="image/*" hidden>
                                            <img src="<?= $url_image != null ? base_url('public/assets/images/album/'. $url_image) : base_url('public/assets/images/icon/default-upload.png') ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                        </a>
                                        <button id="button-submit" hidden></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once "./app/Views/customer/commons/layer/footer_page.php" ?>
</div>