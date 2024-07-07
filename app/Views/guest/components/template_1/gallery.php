<section id="gallery">
    <div id="gallery_top">
        <img id="gallery_top_left" src="<?= base_url('/AssetsGuest/image/top_left.svg') ?>">
        <img id="gallery_top_right" src="<?= base_url('/AssetsGuest/image/top_right.svg') ?>">
        <div id="gallery_top_line"></div>
    </div>

    <h3 id="gallery_title">OUR GALLERY</h3>

    <?php
    $selectedId = $weddingData['gallery_option_id'];
    if ($selectedId == 1) {
        // 3 images
        echo '
                  <div class="gallery_images_container">
                    <div class="gallery_images_container_two_collumn">
                        <img class="gallery_images_var_1" src="' . $imageGalleryFirst . '"/>
                        <img class="gallery_images_var_1" src="' . $imageGallerySecond . '" />
                    </div>
                    <div class="gallery_images_container_one_collumn">
                        <img class="gallery_images_var_2" src="' . $imageGalleryThird . '" />
                    </div>
                  </div>
                ';
    } else if ($selectedId == 2) {
        // 4 images
        echo '
                <div class="gallery_images_container">
                  <div class="gallery_images_container_two_collumn">
                      <img class="gallery_images_var_1" src="' . $imageGalleryFirst . '" />
                      <img class="gallery_images_var_1" src="' . $imageGallerySecond . '" />
                  </div>
                  <div class="gallery_images_container_two_collumn">
                      <img class="gallery_images_var_1" src="' . $imageGalleryThird . '" />
                      <img class="gallery_images_var_1" src="' . $imageGalleryFourth . '"/>
                  </div>
                </div>
                ';
    } else if ($selectedId == 3) {
        // 7 images
        echo '

                <div class="gallery_images_container" id="seven-images">
                  <div class="gallery_images_container_four_collumn">
                      <img class="gallery_images_var_1" src="' . $imageGalleryFirst . '" />
                      <img class="gallery_images_var_3 mt-1" src="' . $imageGallerySecond . '" />
                      <img class="gallery_images_var_3" src="' . $imageGalleryThird . '" />
                      <img class="gallery_images_var_1 mt-1" src="' . $imageGalleryFourth . '" />
                  </div>
                  <div class="gallery_images_container_one_collumn">
                      <img class="gallery_images_var_2" src="' . $imageGalleryFifh . '" />
                  </div>
                  <div class="gallery_images_container_two_collumn">
                      <img class="gallery_images_var_3" src="' . $imageGallerySixth . '" />
                      <img class="gallery_images_var_3" src="' . $imageGallerySeventh . '" />
                  </div>
                </div>
                ';
    } else if ($selectedId == 4) {
        // 10 images
        echo '
                <div class="gallery_images_container">
                  <div class="gallery_images_container_four_collumn">
                      <img class="gallery_images_var_3" src="' . $imageGalleryFirst . '" />
                      <img class="gallery_images_var_1 mt-1" src="' . $imageGallerySecond . '" />
                      <img class="gallery_images_var_3 mt-1" src="' . $imageGalleryThird . '" />
                      <img class="gallery_images_var_1" src="' . $imageGalleryFourth . '" />
                      <img class="gallery_images_var_4 mt-1" src="' . $imageGalleryFifh . '" />
                      <img class="gallery_images_var_5 mt-1" src="' . $imageGallerySixth . '" />
                  </div>
                  <div class="gallery_images_container_one_collumn">
                      <img class="gallery_images_var_2" src="' . $imageGallerySeventh . '" />
                  </div>
                  <div class="gallery_images_container_two_collumn">
                      <img class="gallery_images_var_3 src="' . $imageGalleryEighth . '" />
                      <img class="gallery_images_var_3" src="' . $imageGalleryNineth . '" />
                  </div>
                  <div class="gallery_images_container_one_collumn">
                      <img class="gallery_images_var_2" src="' . $imageGalleryTenth . '" />
                  </div>
                </div>

                
                ';
    }
    ?>
    <div id="gallery_buttom">
        <img id="gallery_buttom_left" src="<?= base_url('/AssetsGuest/image/buttom_left.svg') ?>">
        <img id="gallery_buttom_right" src="<?= base_url('/AssetsGuest/image/buttom_right.svg') ?>">
        <div id="gallery_buttom_line"></div>
    </div>

</section>