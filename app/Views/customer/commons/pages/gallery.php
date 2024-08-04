<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col-10">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        <?= TITLE_COMPANY ?>
                    </div>
                    <h2 class="page-title">
                        <?= $title ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards align-items-center mb-3">
                <div class="col-md-10 col-xl-10 align-items-center">
                    <div class="d-none d-xl-block ps-2">
                        <h4>Photos gallery</h4>
                        <p>Tambahkan foto kedalam galeri pada undanganmu</p>
                        <small class="muted">*Tekan gambar untuk mengganti foto</small>
                    </div>
                </div>
            </div>
            <form action="<?= base_url('/customer/kelola-konten-undangan/galeri/change-option') ?>" method="POST">
                <div class="mb-3">
                    <select class="form-select" id="select-gallery-type" name="gallery_option_id" onchange="requestChangeGalleryOption()">
                        <?php
                        if (isset($galleryOptionSelected)) {
                            echo '<option value="' . $galleryOptionSelected['id'] . '">' . $galleryOptionSelected['name'] . '</option>';
                        }
                        foreach ($galleryOptionList as $option) {
                            if (isset($galleryOptionSelected)) {
                                if ($galleryOptionSelected['id'] != $option['id']) {
                                    echo '<option value="' . $option['id'] . '">' . $option['name'] . '</option>';
                                }
                            } else {
                                echo '<option value="' . $option['id'] . '">' . $option['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <button id="button-change-type" hidden></button>
            </form>
            <form class="row row-cards d-flex" action="<?= base_url('/customer/kelola-konten-undangan/galeri/create') ?>" method="POST" enctype="multipart/form-data">
                <section id="gallery">
                    <input type="text" name="id" id="image-id" value="" hidden>
                    <input type="text" name="transaction_id" id="transaction_id" value="<?= $transactionSelected['id'] ?>" hidden>
                    <input type="text" name="image-sequence" id="image-sequence" value="" hidden>
                    <input type="text" name="gallery_option_id" id="gallery-option-id" value="" hidden>
                    <input type="text" name="type" id="type" value="gallery" hidden>
                    <input type="file" name="image" id="input-image" onchange="requestSubmitImage()" accept="image/*" hidden>

                    <!-- Three Images -->
                    <div class="gallery_images_container" id="three-images" hidden>
                        <div class="gallery_images_container_two_collumn">
                            <img class="gallery_images_var_1" id="first-image" onclick="buttonSelectImages('first-image', <?= $imagesList[0]['id'] ?? null ?>)" src="<?= $imagesList[0] ?? null != null ? base_url('/assets/images/album/' . $imagesList[0]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_1" id="second-image" onclick="buttonSelectImages('second-image', <?= $imagesList[1]['id'] ?? null ?>)" src="<?= $imagesList[1] ?? null != null ? base_url('/assets/images/album/' . $imagesList[1]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                        <div class="gallery_images_container_one_collumn">
                            <img class="gallery_images_var_2" id="third-image" onclick="buttonSelectImages('third-image', <?= $imagesList[2]['id'] ?? null ?>)" src="<?= $imagesList[2] ?? null != null ? base_url('/assets/images/album/' . $imagesList[2]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                    </div>

                    <!-- Four Images -->
                    <div class="gallery_images_container" id="four-images" hidden>
                        <div class="gallery_images_container_two_collumn">
                            <img class="gallery_images_var_1" id="first-image" onclick="buttonSelectImages('first-image', <?= $imagesList[0]['id'] ?? null ?>)" src="<?= $imagesList[0] ?? null != null ? base_url('/assets/images/album/' . $imagesList[0]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_1" id="second-image" onclick="buttonSelectImages('second-image', <?= $imagesList[1]['id'] ?? null ?>)" src="<?= $imagesList[1] ?? null != null ? base_url('/assets/images/album/' . $imagesList[1]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                        <div class="gallery_images_container_two_collumn">
                            <img class="gallery_images_var_1" id="third-image" onclick="buttonSelectImages('third-image', <?= $imagesList[2]['id'] ?? null ?>)" src="<?= $imagesList[2] ?? null != null ? base_url('/assets/images/album/' . $imagesList[2]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_1" id="fourth-image" onclick="buttonSelectImages('fourth-image', <?= $imagesList[3]['id'] ?? null ?>)" src="<?= $imagesList[3] ?? null != null ? base_url('/assets/images/album/' . $imagesList[3]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                    </div>

                    <!-- Seven Images -->
                    <div class="gallery_images_container" id="seven-images" hidden>
                        <div class="gallery_images_container_four_collumn">
                            <img class="gallery_images_var_1" id="first-image" onclick="buttonSelectImages('first-image', <?= $imagesList[0]['id'] ?? null ?>)" src="<?= $imagesList[0] ?? null != null ? base_url('/assets/images/album/' . $imagesList[0]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_3 mt-1" id="second-image" onclick="buttonSelectImages('second-image', <?= $imagesList[1]['id'] ?? null ?>)" src="<?= $imagesList[1] ?? null != null ? base_url('/assets/images/album/' . $imagesList[1]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_3" id="third-image" onclick="buttonSelectImages('third-image', <?= $imagesList[2]['id'] ?? null ?>)" src="<?= $imagesList[2] ?? null != null ? base_url('/assets/images/album/' . $imagesList[2]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_1 mt-1" id="fourth-image" onclick="buttonSelectImages('fourth-image', <?= $imagesList[3]['id'] ?? null ?>)" src="<?= $imagesList[3] ?? null != null ? base_url('/assets/images/album/' . $imagesList[3]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                        <div class="gallery_images_container_one_collumn">
                            <img class="gallery_images_var_2" id="fifth-image" onclick="buttonSelectImages('fifth-image', <?= $imagesList[4]['id'] ?? null ?>)" src="<?= $imagesList[4] ?? null != null ? base_url('/assets/images/album/' . $imagesList[4]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                        <div class="gallery_images_container_two_collumn">
                            <img class="gallery_images_var_3" id="sixth-image" onclick="buttonSelectImages('sixth-image', <?= $imagesList[5]['id'] ?? null ?>)" src="<?= $imagesList[5] ?? null != null ? base_url('/assets/images/album/' . $imagesList[5]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_3" id="seventh-image" onclick="buttonSelectImages('seventh-image', <?= $imagesList[6]['id'] ?? null ?>)" src="<?= $imagesList[6] ?? null != null ? base_url('/assets/images/album/' . $imagesList[6]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                    </div>

                    <!-- Ten Images -->
                    <div class="gallery_images_container" id="ten-images" hidden>
                        <div class="gallery_images_container_four_collumn">
                            <img class="gallery_images_var_3" id="first-image" onclick="buttonSelectImages('first-image', <?= $imagesList[0]['id'] ?? null ?>)" src="<?= $imagesList[0] ?? null != null ? base_url('/assets/images/album/' . $imagesList[0]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_1 mt-1" id="second-image" onclick="buttonSelectImages('second-image', <?= $imagesList[1]['id'] ?? null ?>)" src="<?= $imagesList[1] ?? null != null ? base_url('/assets/images/album/' . $imagesList[1]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_3 mt-1" id="third-image" onclick="buttonSelectImages('third-image', <?= $imagesList[2]['id'] ?? null ?>)" src="<?= $imagesList[2] ?? null != null ? base_url('/assets/images/album/' . $imagesList[2]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_1" id="fourth-image" onclick="buttonSelectImages('fourth-image', <?= $imagesList[3]['id'] ?? null ?>)" src="<?= $imagesList[3] ?? null != null ? base_url('/assets/images/album/' . $imagesList[3]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_4 mt-1" id="fifth-image" onclick="buttonSelectImages('fifth-image', <?= $imagesList[4]['id'] ?? null ?>)" src="<?= $imagesList[4] ?? null != null ? base_url('/assets/images/album/' . $imagesList[4]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_5 mt-1" id="sixth-image" onclick="buttonSelectImages('sixth-image', <?= $imagesList[5]['id'] ?? null ?>)" src="<?= $imagesList[5] ?? null != null ? base_url('/assets/images/album/' . $imagesList[5]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                        <div class="gallery_images_container_one_collumn">
                            <img class="gallery_images_var_2" id="seventh-image" onclick="buttonSelectImages('seventh-image', <?= $imagesList[6]['id'] ?? null ?>)" src="<?= $imagesList[6] ?? null != null ? base_url('/assets/images/album/' . $imagesList[6]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                        <div class="gallery_images_container_two_collumn">
                            <img class="gallery_images_var_3" id="eighth-image" onclick="buttonSelectImages('eighth-image', <?= $imagesList[7]['id'] ?? null ?>)" src="<?= $imagesList[7] ?? null != null ? base_url('/assets/images/album/' . $imagesList[7]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                            <img class="gallery_images_var_3" id="nienth-image" onclick="buttonSelectImages('nienth-image', <?= $imagesList[8]['id'] ?? null ?>)" src="<?= $imagesList[8] ?? null != null ? base_url('/assets/images/album/' . $imagesList[8]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                        <div class="gallery_images_container_one_collumn">
                            <img class="gallery_images_var_2" id="tenth-image" onclick="buttonSelectImages('tenth-image', <?= $imagesList[9]['id'] ?? null ?>)" src="<?= $imagesList[9] ?? null != null ? base_url('/assets/images/album/' . $imagesList[9]['url_image']) : base_url('/assets/images/icon/default-upload.png') ?>" />
                        </div>
                    </div>
                </section>
                <button id="button-submit" hidden></button>
            </form>
        </div>
    </div>
    <?= view('customer/commons/layer/footer_page') ?>
</div>