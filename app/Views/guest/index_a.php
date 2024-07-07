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

$groomData['nickname'] = $groomData['nickname'] ?? "Groom's Name";
$brideData['nickname'] = $brideData['nickname'] ?? "Bride's Name";
$primaryEventData['date'] = $primaryEventData['date'] ?? date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="<?= base_url('/AssetsGuest/css/template_a/style.css'); ?>" />
  <script src="<?= base_url('/AssetsGuest/js/template_a/pristine.min.js') ?>" type="text/javascript"></script>
  <title class="text-capitalize"><?= $weddingData['title'] ?> - Digital Invitation by <?= env('TITLE_COMPANY') ?></title>
</head>

<body data-theme="<?= $themeData['theme_color'] ?? "" ?>" style="--background-base: url('<?= $imageCoverPath ?>'); --background-two-base: url('<?= $imageCoverPath ?>');">
  <main>
    <!-- Section Welcome Page -->
    <?php
    if ($themeData['theme_code'] == 'A0001') {
      include_once "./app/Views/guest/components/template_1/welcome_page/welcome_page_1.php";
    } else if ($themeData['theme_code'] == 'A0002') {
      include_once "./app/Views/guest/components/template_1/welcome_page/welcome_page_2.php";
    } else if ($themeData['theme_code'] == 'A0003') {
      include_once "./app/Views/guest/components/template_1/welcome_page/welcome_page_3.php";
    } else if ($themeData['theme_code'] == 'A0004') {
      include_once "./app/Views/guest/components/template_1/welcome_page/welcome_page_4.php";
    } else if ($themeData['theme_code'] == 'A0005') {
      include_once "./app/Views/guest/components/template_1/welcome_page/welcome_page_5.php";
    }

    ?>

    <section id="countDown">
      <div id="countDown_top_image"><img src="<?= base_url('/AssetsGuest/image/template_a/countDown_top.svg') ?>" width="70%"></div>
      <div id="countDown_content">
        <h3 id="countDown_title">COUNTING TO THE BIG DAY</h3>
        <hr />
        <p id="countDown_date" attr-val="<?= date_format(date_create($primaryEventData['date']), 'Y-m-d\TH:i:s') ?>"><?= date_format(date_create($primaryEventData['date']), "d.m.Y"); ?></p>
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
        <button class="variant_1_button" type="button">SAVE THE DATE</button>

        <?php
        if (isset($prayData)) { ?>
          <h3 class="mb-3" id="surah_content"></h3>
          <img class="mb-4" id="pray_divider" src="<?= base_url('/AssetsGuest/image/template_a/divider.svg'); ?>" width="15%" />
          <h4 class="mb-3" id="sub_content"></h4>
          <p class="mb-1" id="surah_name"></p>
        <?php } ?>
      </div>
    </section>

    <img class="separator" src="<?= base_url('/AssetsGuest/image/template_a/separator.svg'); ?>" width="80%" />
    <section id="bride">
      <div id="first_bride">
        <div class="bride_image">
          <img class="bride_image_frame" src="<?= base_url('/AssetsGuest/image/template_a/frame_1.svg'); ?>" />
          <img class="bride_image_bride" src="<?= base_url('/assets/images/album/' . $groomData['photo']); ?>" />
        </div>

        <h4><?= $groomData['nickname'] ?></h4>
        <h2><?= $groomData['fullname'] ?></h2>
        <hr />
        <p class="bride_parent">PUTRA PERTAMA BAPAK <?= $groomData['father_name'] ?> DAN IBU <?= $groomData['mother_name'] ?></p>
        <a href="https://www.instagram.com/<?= str_replace('@', '', $groomData['social_media']) ?>" target="_blank">
          <div class="bride_instagram"><img class="bride_image_frame" src="<?= base_url('/AssetsGuest/image/template_a/instagram.svg'); ?>" height="13" />
            <p><?= $groomData['social_media'] ?></p>
          </div>
        </a>
      </div>
      <div id="second_bride">
        <div class="bride_image">
          <img class="bride_image_frame" src="<?= base_url('/AssetsGuest/image/template_a/frame_1.svg'); ?>" />
          <img class="bride_image_bride" src="<?= base_url('/assets/images/album/' . $brideData['photo']); ?>" />
        </div>
        <h4><?= $brideData['nickname'] ?></h4>
        <h2><?= $brideData['fullname'] ?></h2>
        <hr />
        <p class="bride_parent">PUTRI PERTAMA BAPAK <?= $brideData['father_name'] ?> DAN IBU <?= $brideData['mother_name'] ?></p>
        <a href="https://www.instagram.com/<?= str_replace('@', '', $brideData['social_media']) ?>" target="_blank">
          <div class="bride_instagram">
            <img class="bride_image_frame" src="<?= base_url('/AssetsGuest/image/template_a/instagram.svg'); ?>" height="13" />
            <p><?= $brideData['social_media'] ?></p>
          </div>
        </a>
      </div>
    </section>

    <section id="weddingStory">
      <img id="weddingStory_ring" src="<?= base_url('/AssetsGuest/image/template_a/ring.svg'); ?>" height="45" />
      <h3>OUR LOVE STORY</h3>
      <img id="weddingStory_couple" src="<?= $imageLoveStoryPath ?>" width="100%" />
      <?php
      foreach ($loveStoryList as $loveStory) {
        echo '
              <h5 class="animate__animated">' . $loveStory['title'] . '</h5>
              <p class="animate__animated">' . $loveStory['story'] . '</p>
            ';
      }
      ?>
    </section>
    <img class="separator" style="padding-bottom: 40px;" src="<?= base_url('/AssetsGuest/image/template_a/separator.svg'); ?>" width="80%" />
    <section id="date">
      <img id="date_top_left" src="<?= base_url('/AssetsGuest/image/template_a/top_left.svg'); ?>">
      <img id="date_top_right" src="<?= base_url('/AssetsGuest/image/template_a/top_right.svg'); ?>">
      <div id="date_container">
        <?php
        if (isset($primaryEventData)) {
          echo '
              <h3 class="date_title">' . $primaryEventData['title'] . '</h3>
              <img class="date_divider" src="' . base_url('/AssetsGuest/image/template_a/divider.svg') . '" width="48" />
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
              <img class="date_divider" src="' . base_url('/AssetsGuest/image/template_a/divider.svg') . '" width="48" />
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

        <img id="date_pointer" src="<?= base_url('/AssetsGuest/image/template_a/pointer.svg'); ?>" width="24" />
        <h5 id="date_location"><?= $eventData['place_name'] ?></h5>
        <p id="date_adress"><?= $eventData['address'] ?></p>
        <a href="<?= $eventData['link_address'] ?>" target="_blank">
          <button id="date_map" class="variant_1_button" type="button">VIEW ON MAPS</button>
        </a>
        <div id="date_left_line"></div>
        <div id="date_right_line"></div>
        <div id="date_buttom_line"></div>
      </div>
      <img id="date_buttom_left" src="<?= base_url('/AssetsGuest/image/template_a/buttom_left.svg'); ?>">
      <img id="date_buttom_right" src="<?= base_url('/AssetsGuest/image/template_a/buttom_right.svg'); ?>">
    </section>

    <section id="gift">
      <h3 id="gift_title">WEDDING GIFT</h3>
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
                    <p class="gift_gift_card_info_an"><span>A/N</span>' . ' ' .  $gift['receiver_name'] . '</p>
                  </div>
                  <button id="copy_rekening" rek-number=' . $gift['account_number'] . ' class="variant_1_button" type="button"><img src="' . base_url('/AssetsGuest/image/template_a/copy.svg') . '" width="12" />SALIN NO. REK</button>
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
    </section>
    <section id="rsvp">
      <img id="rsvp_ornament" src="<?= base_url('/AssetsGuest/image/template_a/Frame.svg'); ?>" width="243" />
      <h3 id="rsvp_title">RSVP</h3>
      <img class="rsvp_divider" src="<?= base_url('/AssetsGuest/image/template_a/divider.svg'); ?>" width="48" />
      <p id="rsvp_information">Our wedding will be a small, intimate ceremony. and only those who are closest to us will be in attendance</p>
      <form id="rsvp_form">
        <input name="transaction_id" value="<?= $weddingData['id'] ?>" hidden>
        <div class="rsvp_input_group form-group">
          <label class="rsvp_label"> NAMA <span>*</span> </label>
          <input class="rsvp_input" placeholder="NAMA" id="name" name="name" type="text" required />
        </div>
        <div class="rsvp_input_group form-group" data-field-holder>
          <label class="rsvp_label"> Konfirmasi Kehadiran <span>*</span> </label>
          <select class="rsvp_select_input" id="confirmation" name="confirmation" required>
            <option style="display: none"></option>
            <option value="Hadir">Hadir</option>
            <option value="Tidak Hadir">Tidak Hadir</option>
          </select>
        </div>
        <div class="rsvp_input_group form-group" data-field-holder>
          <label class="rsvp_label"> JUMLAH KEHADIRAN <span>*</span> </label>
          <input class="rsvp_input" id="amount" name="amount" type="number" required />
        </div>
        <div class="rsvp_input_group form-group" data-field-holder>
          <label class="rsvp_label"> MAKE A WISH <span>*</span> </label>
          <textarea max-word="500" id="rsvp_text_area_input" class="rsvp_text_area_input" name="wish" rows="4" placeholder="WRITE A WISH" required></textarea>
          <div id="rsvp_the_count">
            <span id="rsvp_the_count_current">0</span>
            <span id="rsvp_the_count_maximum">/ 500</span>
          </div>
        </div>
        <input id="rsvp_submit" type="submit" value="SEND RSVP">
        <!-- <button type="button" id="rsvp_submit" onclick="submitRSVP()">SEND RSVP</button> -->
      </form>
      <div id="rsvp_wishes_container">

      </div>
    </section>

    <?php if (isset($imageGalleryFirst)) { ?>
      <section id="gallery">
        <div id="gallery_top">
          <img id="gallery_top_left" src="<?= base_url('/AssetsGuest/image/template_a/top_left.svg') ?>">
          <img id="gallery_top_right" src="<?= base_url('/AssetsGuest/image/template_a/top_right.svg') ?>">
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
          <img id="gallery_buttom_left" src="<?= base_url('/AssetsGuest/image/template_a/buttom_left.svg') ?>">
          <img id="gallery_buttom_right" src="<?= base_url('/AssetsGuest/image/template_a/buttom_right.svg') ?>">
          <div id="gallery_buttom_line"></div>
        </div>

      </section>
    <?php } ?>
    <section id="clossingMessage">
      <div id="clossingMessage_content">
        <img id="clossingMessage_ornament_top" src="<?= base_url('/AssetsGuest/image/template_a/closing_ornament.svg'); ?>" width="124" />
        <p id="clossingMessage_info">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do'a restu kepada kedua mempelai.</p>
        <img class="date_divider" src="<?= base_url('/AssetsGuest/image/template_a/divider.svg'); ?>" width="48" />
        <h4 id="clossingMessage_couples"><?= $groomData['nickname'] . ' & ' . $brideData['nickname'] ?></h4>
      </div>
      <img id="clossingMessage_ornament_buttom" src="<?= base_url('/AssetsGuest/image/template_a/bawah.svg'); ?>" width="193" />
    </section>
  </main>
  <footer>
    <p>
      crafted by <span><img src="<?= base_url('/AssetsGuest/image/template_a/watermark.svg'); ?>" width="15" /></span>digieplan © 2023
    </p>
  </footer>
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
  <nav id="navbar">
    <ul>
      <li class="nav" id="bride_button">
        <img src="<?= base_url('/AssetsGuest/image/template_a/bride.svg'); ?>" height="24" />
        <div>BRIDE</div>
      </li>
      <li class="nav" id="date_button">
        <img src="<?= base_url('/AssetsGuest/image/template_a/date.svg'); ?>" height="24" />
        <div>DATE</div>
      </li>
      <li class="nav" id="rsvp_button">
        <img src="<?= base_url('/AssetsGuest/image/template_a/rsvp.svg'); ?>" height="24" />
        <div>RSVP</div>
      </li>
      <li class="nav" id="gift_button">
        <img src="<?= base_url('/AssetsGuest/image/template_a/gift.svg'); ?>" height="24" />
        <div>GIFT</div>
      </li>
    </ul>
  </nav>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="<?= base_url('/AssetsGuest/js/template_a/index.js') ?>"></script>

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

    var surahContentTxt = document.getElementById('surah_content');
    var prayDivider = document.getElementById('pray_divider');
    var subContentTxt = document.getElementById('sub_content');
    var surahNameTxt = document.getElementById('surah_name');

    var pray = <?= json_encode($prayData); ?>;

    function updateUIPray() {
      // Check if 'surah_content' property exists in 'pray' object
      if (pray && pray.hasOwnProperty('surah_content') && pray['surah_content'] !== "") {

        surahContentTxt.hidden = false;
        prayDivider.hidden = false;
        surahContentTxt.textContent = pray['surah_content'];
      } else {
        surahContentTxt.hidden = true;
        prayDivider.hidden = true;
      }

      subContentTxt.textContent = pray['sub_content'];

      // Check if 'surah_name' property exists in 'pray' object
      if (pray && pray.hasOwnProperty('surah_name') && pray['surah_name'] !== "") {
        subContentTxt.classList.replace("mb-3", "mb-2");
        surahNameTxt.hidden = false;
        surahNameTxt.textContent = "( " + pray['surah_name'] + " )";
      } else {
        subContentTxt.classList.replace("mb-3", "mb-4");
        surahNameTxt.hidden = true;
      }
    }

    updateUIPray();
  </script>

</body>

</html>