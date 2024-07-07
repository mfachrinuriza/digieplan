<?php
$monthNames = array(
    'January'   => 'Januari',
    'February'  => 'Februari',
    'March'     => 'Maret',
    'April'     => 'April',
    'May'       => 'Mei',
    'June'      => 'Juni',
    'July'      => 'Juli',
    'August'    => 'Agustus',
    'September' => 'September',
    'October'   => 'Oktober',
    'November'  => 'November',
    'December'  => 'Desember'
);

$dayTranslations = array(
    'Sunday'    => 'Min',
    'Monday'    => 'Sen',
    'Tuesday'   => 'Sel',
    'Wednesday' => 'Rab',
    'Thursday'  => 'Kam',
    'Friday'    => 'Jum',
    'Saturday'  => 'Sab'
);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="<?= base_url('/AssetsGuest/css/template_b/style.css') ?>">
    <script src="<?= base_url('/AssetsGuest/js/template_b/pristine.min.js') ?>" type="text/javascript"></script>
    <title class="text-capitalize"><?= $weddingData['title'] ?> - Digital Invitation by <?= env('TITLE_COMPANY') ?></title>
</head>

<body>
    <main class="scroller" style="--background-base:  url('<?= $imageCoverPath ?>');">
        <div id="flowerContainer">
            <img id="flowerTopLeft" src="<?= base_url('/AssetsGuest/image/template_b/top_left_flower.png') ?>" height="110">
            <img id="flowerTopRight" src="<?= base_url('/AssetsGuest/image/template_b/top_right_flower.png') ?>" height="110">
            <img id="flowerBottomLeft" src="<?= base_url('/AssetsGuest/image/template_b/bottom_left_flower.png') ?>" height="110">
            <img id="flowerBottomRight" src="<?= base_url('/AssetsGuest/image/template_b/bottom_right_flower.png') ?>" height="110">
        </div>
        <div id="layout_padding_container">
            <div id="layout_padding_container_relative">
            </div>
        </div>
        <div id="white_rectangle_container">
            <div id="white_rectangle_container_relative">
                <div id="white_rectangle"></div>
            </div>
        </div>
        <section id="welcomePage">
            <div id="welcomaPage_content">
                <h5 id="welcomaPage_content_first_h5">The Wedding of</h5>
                <h1 id="welcomaPage_content_second_h1"><?= $groomData['nickname'] . ' & ' . $brideData['nickname'] ?></h1>
                <p id="welcomaPage_content_dear">dear,</p>
                <h3><?= $invited_to ?></h3>
                <button class="variant_1_button animate__animated" id="welcomaPage_content_button" type="button">Buka Undangan</button>
            </div>
        </section>
        <section id="countDown">
            <div id="countDown_content">
                <div class="first_frame">
                    <div class="first_frame_image_clipped one">
                        <img src="<?= $imageCoverPath ?>" alt="Couples">
                    </div>
                    <img class="first_frame_frame" src="<?= base_url('/AssetsGuest/image/template_b/first_frame_rectangle.png') ?>" alt="Frame">
                    <img class="first_frame_flower" src="<?= base_url('/AssetsGuest/image/template_b/flower_frame.png') ?>" alt="Flower">
                </div>
                <h5 id="countDown_content_first_h5">The Wedding of</h5>
                <h1 id="countDown_content_second_h1"><?= $groomData['nickname'] . ' & ' . $brideData['nickname'] ?></h1>
                <p id="countDown_date" attr-val="<?= date_format(date_create($primaryEventData['date']), 'Y-m-d\TH:i:s') ?>" style="text-transform: uppercase;"><?= date_format(date_create($primaryEventData['date']), "j") . " " . $monthNames[date_format(date_create($primaryEventData['date']), "F")] . " " . date_format(date_create($primaryEventData['date']), "Y") ?></p>
                <div id="countDown_timer">
                    <div>
                        <h3 id="countDown_timer_days">12</h3>
                        <p>hari</p>
                    </div>
                    |
                    <div>
                        <h3 id="countDown_timer_hours">8</h3>
                        <p>jam</p>
                    </div>
                    |
                    <div>
                        <h3 id="countDown_timer_minutes">48</h3>
                        <p>menit</p>
                    </div>
                    |
                    <div>
                        <h3 id="countDown_timer_seconds">32</h3>
                        <p>detik</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="bride">
            <div id="bride_content">
                <div id="first_bride">
                    <div class="second_frame">
                        <div class="second_frame_image_clipped two">
                            <img src="<?= base_url('/assets/images/album/' . $groomData['photo']); ?>" alt="Couples">
                        </div>
                        <img class="second_frame_frame" src="<?= base_url('/AssetsGuest/image/template_b/second_frame_rectangle.png') ?>" alt="Frame">
                        <img class="second_frame_flower" src="<?= base_url('/AssetsGuest/image/template_b/flower_frame.png') ?>" alt="Flowr">
                    </div>
                    <h1><?= $groomData['nickname'] ?></h1>
                    <h5 class="bride_parent">PUTRA PERTAMA BAPAK <?= $groomData['father_name'] ?> DAN IBU <?= $groomData['mother_name'] ?></h5>
                </div>
                <h1 id="bride_and">&</h1>
                <div id="second_bride">
                    <div class="second_frame">
                        <div class="second_frame_image_clipped two">
                            <img src="<?= base_url('/assets/images/album/' . $brideData['photo']); ?>" alt="Couples">
                        </div>
                        <img class="second_frame_frame" src="<?= base_url('/AssetsGuest/image/template_b/second_frame_rectangle.png') ?>" alt="Frame">
                        <img class="second_frame_flower" src="<?= base_url('/AssetsGuest/image/template_b/flower_frame.png') ?>" alt="Flower">
                    </div>
                    <h1><?= $brideData['nickname'] ?></h1>
                    <h5 class="bride_parent">PUTRI PERTAMA BAPAK <?= $brideData['father_name'] ?> DAN IBU <?= $brideData['mother_name'] ?></h5>
                </div>
            </div>
        </section>

        <section id="weddingStory">
            <div id="weddingStory_content">
                <img id="weddingStory_ring" src="<?= base_url('/AssetsGuest/image/template_b/ring.png') ?>" height="45">
                <h3>OUR LOVE STORY</h3>
                <div class="weddingStory_storyContainer">
                    <img id="weddingStory_couple" src="<?= $imageLoveStoryPath ?>" width="100%">
                    <?php
                    foreach ($loveStoryList as $loveStory) {
                        echo '
                        <h5 class="animate__animated">' . $loveStory['title'] . '</h5>
                        <p class="animate__animated">' . $loveStory['story'] . '</p>
                        ';
                    }
                    ?>
                </div>
            </div>
        </section>

        <section id="date">
            <div id="date_container">
                <h3 class="date_title">AKAD NIKAH</h3>
                <img class="date_divider" src="<?= base_url('/AssetsGuest/image/template_b/divider.png') ?>" width="48">
                <?php
                if (isset($primaryEventData)) {
                    echo '
                    <div class="date_date_day">
                        <h3>' . $dayTranslations[date_format(date_create($primaryEventData['date']), "l")] . '</h3>
                        |
                        <div class="date_date_day_date">
                        <h3>' . date_format(date_create($primaryEventData['date']), "j") . '</h3>
                        <div>
                            <p>' . $monthNames[date_format(date_create($primaryEventData['date']), "F")] . '</p>
                            <p>' . date_format(date_create($primaryEventData['date']), "Y") . '</p>
                        </div>
                        </div>
                    </div>
                    <h5 class="date_time">' . $primaryEventData['start_time'] . ' wib - ' . $primaryEventData['end_time'] . '</h5>
                    ';
                }

                if (isset($eventData)) {
                    echo '
                    <h3 class="date_title">' . $eventData['title'] . '</h3>
                    <img class="date_divider" src="' . base_url("/AssetsGuest/image/template_b/divider.png") . '" width="48">
                    <div class="date_date_day">
                        <h3>' . $dayTranslations[date_format(date_create($eventData['date']), "l")] . '</h3>
                        |
                        <div class="date_date_day_date">
                        <h3>' . date_format(date_create($eventData['date']), "j") . '</h3>
                        <div>
                            <p>' . $monthNames[date_format(date_create($eventData['date']), "F")] . '</p>
                            <p>' . date_format(date_create($eventData['date']), "Y") . '</p>
                        </div>
                        </div>
                    </div>
                    <h5 class="date_time">' . $eventData['start_time'] . ' wib - ' . $eventData['end_time'] . '</h5>
                    ';
                }
                ?>
                <img id="date_pointer" src="<?= base_url('/AssetsGuest/image/template_b/pointer.png') ?>" width="24">
                <h5 id="date_location"><?= $eventData['place_name'] ?></h5>
                <p id="date_adress"><?= $eventData['address'] ?></p>
                <button id="date_map" class="variant_2_button" type="button" onclick="window.open('<?= $eventData['link_address'] ?>', '_blank')">VIEW ON MAPS</button>
            </div>
        </section>

        <section id="gift" class="docSlider-scroll">
            <div id="gift_content">
                <h3 id="gift_title">WEDDING GIFT</h3>
                <img class="gift_divider" src="<?= base_url('/AssetsGuest/image/template_b/divider.png') ?>" width="48">
                <p id="gift_information">Bagi bapak/ibu/saudara/i yang ingin mengirimkan hadiah pernikahan dapat melalui virtual account atau e-wallet di bawah ini:</p>
                <div id="gift_card_container">
                    <?php
                    foreach ($giftList as $gift) {
                        if ($gift['type'] == "Bank") {
                            echo '
                                <div class="gift_card">
                                    <h5>' . $gift['bank_name'] . '</h5>
                                    <div class="gift_card_info">
                                        <h5>' . $gift['account_number'] . '</h5>
                                        <p class="gift_gift_card_info_an"><span>A/N</span>' . ' ' . $gift['receiver_name'] . '</p>
                                    </div>
                                    <button id="copy_rekening" rek-number="12122211" class="variant_2_button" type="button"><img src="' . base_url('/AssetsGuest/image/template_b/copy.png') . '" width="12">SALIN NO. REK</button>
                                </div>
                                ';
                        } else if ($gift['type'] == "E-Wallet") {
                            echo '
                                <div class="gift_card">
                                <h5>' . $gift['bank_name'] . '</h5>
                                <div class="gift_card_info">
                                    <h5>' . $gift['account_number'] . '</h5>
                                    <p class="gift_gift_card_info_an"><span>A/N</span>' . ' ' . $gift['receiver_name'] . '</p>
                                </div>
                                <button id="copy_rekening" rek-number=' . $gift['account_number'] . ' class="variant_1_button" type="button"><img src="' . base_url('/AssetsGuest/image/template_a/copy.svg') . '" width="12" />SALIN NO. REK</button>
                                </div>
                                ';
                        } else if ($gift['type'] == "Address") {
                            echo '
                                <div class="gift_card">
                                <h3>GIFT</h3>
                                <div class="gift_card_info">
                                    <p id="gift_gift_card_info_receiver">PENERIMA:</p>
                                    <h5>' . $gift['receiver_name'] . '</h5>
                                    <p id="address" class="gift_gift_card_info_an">' . $gift['receiver_address'] . '</p>
                                </div>
                                <button id="copy_adrress" class="variant_1_button" type="button"><img src="' . base_url('/AssetsGuest/image/template_a/copy.svg') . '" width="12" /> SALIN ALAMAT</button>
                                </div>
                                ';
                        }
                    }
                    ?>


                </div>
            </div>
        </section>

        <section id="rsvp" class="docSlider-scroll">
            <div id="rsvp_content">
                <h3 id="rsvp_title">RSVP</h3>
                <img id="rsvp_divider" src="<?= base_url('/AssetsGuest/image/template_b/divider.png') ?>" width="48">
                <p id="rsvp_information">Our wedding will be a small, intimate ceremony. and only those who are closest to us will be in attendance</p>
                <form id="rsvp_form">
                    <input name="transaction_id" value="<?= $weddingData['id'] ?>" hidden>
                    <div class="rsvp_input_group form-group">
                        <label class="rsvp_label" for="rsvp_name">
                            NAMA <span>*</span>
                        </label>
                        <input class="rsvp_input" id="rsvp_name" required placeholder="NAMA" name="name" type="text">
                    </div>
                    <div class="rsvp_input_group form-group" data-field-holder>
                        <label class="rsvp_label" for="rsvp_confirmation">
                            Konfirmasi Kehadiran <span>*</span>
                        </label>
                        <select class="rsvp_select_input" id="rsvp_confirmation" required name="confirmation">
                            <option style="display:none"></option>
                            <option value="Hadir">HADIR</option>
                            <option value="Tidak Hadir">TIDAK HADIR</option>
                        </select>
                    </div>
                    <div class="rsvp_input_group form-group" data-field-holder>
                        <label class="rsvp_label" for="rsvp_amount">
                            JUMLAH KEHADIRAN <span>*</span>
                        </label>
                        <input class="rsvp_input" id="rsvp_amount" name="amount" type="number" required>
                    </div>
                    <div class="rsvp_input_group form-group" data-field-holder>
                        <label class="rsvp_label" for="rsvp_text_area_input">
                            MAKE A WISH <span>*</span>
                        </label>
                        <textarea maxlength="500" id="rsvp_text_area_input" class="rsvp_text_area_input" name="wish" rows="4" placeholder="WRITE A WISH" required></textarea>
                        <div id="rsvp_the_count">
                            <span id="rsvp_the_count_current">0</span>
                            <span id="rsvp_the_count_maximum">/ 500</span>
                        </div>
                    </div>
                    <input id="rsvp_submit" type="submit" value="SEND RSVP">
                </form>
                <div id="rsvp_wishes_container">

                </div>
            </div>
        </section>
        <?php if (isset($filter)) { ?>
            <section id="filter">
                <div id="filter_content">
                    <h3 id="filter_title">INSTAGRAM FILTER</h3>
                    <img id="filter_divider" src="<?= base_url('/AssetsGuest/image/template_b/divider.png') ?>" width="48">
                    <p id="filter_information">gunakan filter instagram dan biarkan cinta kami memancar dengan mengabadikan setiap moment berharga dalam pernikahan kami.</p>
                    <a href="<?= $filter['link_url'] ?? "" ?>" target="_blank">
                        <button id="filter_filter" type="button"><img src="<?= base_url('/AssetsGuest/image/template_b/instagram_white.png') ?>" width="12"> FILTER INSTAGRAM</button>
                    </a>
                </div>
            </section>
        <?php } ?>
        <section id="gallery">
            <h3 id="gallery_title">OUR GALLERY</h3>
            <img id="gallery_divider" src="<?= base_url('/AssetsGuest/image/template_b/divider.png') ?>" width="48">

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
        </section>
        <section id="clossingMessage">
            <div id="clossingMessage_content">
                <p id="clossingMessage_info">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do'a restu kepada kedua mempelai.</p>
                <img class="gallery_divider" src="<?= base_url('/AssetsGuest/image/template_b/divider.png') ?>" width="48">
                <h4 id="clossingMessage_couples"><?= $groomData['nickname'] . ' & ' . $brideData['nickname'] ?></h4>
                <div id="trademark">
                    <p>crafted by <span><img src="<?= base_url('/AssetsGuest/image/template_b/watermark.png') ?>" width="15"></span>digieplan © 2023</p>
                </div>
            </div>
        </section>
        <?php if (isset($music)) { ?>
            <div id="musicPlayer">
                <img id="musicPlayer_paused" src="<?= base_url('/AssetsGuest/image/template_a/music-disc.svg') ?>" height="48">
                <img id="musicPlayer_played" src="<?= base_url('/AssetsGuest/image/template_a/music-disc-played.svg') ?>" height="48">
                <audio autoplay loop>
                    <source src="<?= base_url('/assets/music/' . $music['music_path']) ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        <?php } ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="<?= base_url('/AssetsGuest/js/template_b/index.js') ?>"></script>
    <!-- DB INTEGRATION -->
    <script>
        var size = <?= $size ?>;
        var totalWishesList = <?= $totalWishesList ?>;

        function submitRSVP() {
            // Get form data
            var formData = $('#rsvp_form').serialize();

            if (formData.length > 0) {
                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url("guest/submit-rsvp"); ?>',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Handle success response
                        console.log(response);

                        // You can update the UI or perform other actions here
                        loadWishesList(5);
                    },
                    error: function(error) {
                        // Handle error response
                        console.log(error);
                    }
                });
            }
        }

        function loadWishesList(size) {
            // Load wishes list HTML content dynamically
            $.ajax({
                url: '<?= base_url("/" . $weddingName . "/get-wishses-list?size=") ?>' + size,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Update UI based on response
                    updateUIShowMoreWishes(response);
                },
                error: function(xhr, status, error) {
                    console.log("Error loading wishes list:", error);
                }
            });
        }

        function showMoreTapped() {
            size += 5;
            loadWishesList(size);
        }

        function updateUIShowMoreWishes(response) {
            // Process response data and update UI here
            // This function seems redundant, you might want to consolidate it with loadWishesList
            var html = '';
            response.forEach(function(wish) {
                html += '<div class="rsvp_wish_container">';
                html += '<p class="rsvp_wish_container_name">' + wish.name + '</p>';
                html += '<p class="rsvp_wish_container_wishes">' + wish.wishes + '</p>';
                html += '<p class="rsvp_wish_container_date">' + wish.created_date + '</p>';
                html += '</div>';
            });
            html += `<a onClick="showMoreTapped()" id="rsvp_show_more">SHOW MORE WISHES</a>`;
            $('#rsvp_wishes_container').html(html);

            if (totalWishesList > size) {
                $('#rsvp_show_more').show();
            } else {
                $('#rsvp_show_more').hide();
            }
        }

        // Initial load
        loadWishesList(size);

        // Form validation
        window.onload = function() {
            var form = document.getElementById("rsvp_form");
            var pristine = new Pristine(form);

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var valid = pristine.validate();
                if (valid) {
                    submitRSVP();
                    form.reset();
                }
            });
        };
    </script>
</body>

</html>