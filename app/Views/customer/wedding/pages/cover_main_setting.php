<div class="page-wrapper">
    <!-- Page header -->
    <?= view('customer/wedding/components/header_page') ?>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="<?= $url_image != null ? 'card' : '' ?> p-0 mb-3" style="width: 100%; aspect-ratio: 8 / 13; overflow: hidden;">
                                        <form action="<?= base_url('/customer/kelola-konten-undangan/halaman-utama/create') ?>" method="POST" enctype="multipart/form-data" style="width: 100%; height: 100%;">
                                            <a class="p-0 m-0 border-0 bg-transparent" onclick="buttonSelectImage()" style="display: block; width: 100%; height: 100%;">
                                                <input type="text" name="transaction_id" id="transaction_id" value="<?= $transactionSelected['id'] ?>" hidden>
                                                <input type="text" name="type" id="type" value="cover" hidden>
                                                <input type="file" name="image" id="input-image" onchange="requestSubmitImage()" accept="image/*" hidden>
                                                <img src="<?= $url_image != null ? base_url('/assets/images/album/' . $url_image) : base_url('/assets/images/icon/default-upload.png') ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                            </a>
                                            <button id="button-submit" hidden></button>
                                        </form>
                                    </div>
                                    <button class="btn btn-outline-primary w-full" onclick="buttonSelectImage()">Upload Gambar</button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('customer/commons/layer/footer_page') ?>
</div>