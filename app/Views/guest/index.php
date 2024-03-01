<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <link rel="stylesheet" href="<?= base_url('public/AssetsGuest/css/style.css'); ?>" />
    <title class="text-capitalize"><?= $weddingData['title']?> - Digital Invitation by <?= env('TITLE_COMPANY') ?></title>
  </head>
  <body>
    <main>
      <section id="welcomePage">
        <div id="welcomaPage_content">
            <div id="welcomaPage_content_top_image"><img src="<?= base_url('public/AssetsGuest/image/welcome_top_left.svg')?>"><img src="<?= base_url('public/AssetsGuest/image/welcome_top_right.svg')?>"></div>
            <h1 id="welcomaPage_content_first_h1">Wedding of</h1>
            <h1 id="welcomaPage_content_second_h1">Rian & Jaka</h1>
            <p id="welcomaPage_content_date">13.10.2023</p>
            <p id="welcomaPage_content_dear">dear</p>
            <h3>Habibie & Istri</h3>
            <button class="variant_1_button animate__animated" id="welcomaPage_content_button" type="button">Buka Undangan</button>
            <div id="welcomaPage_content_bottom_image"><img src="<?= base_url('public/AssetsGuest/image/welcome_bottom.svg')?>" width="100%"></div>
        </div>
      </section>
      <section id="countDown">
        <div id="countDown_top_image"><img src="<?= base_url('public/AssetsGuest/image/countDown_top.svg')?>" width="70%"></div>
        <div id="countDown_content">
          <h3 id="countDown_title">COUNTING TO THE BIG DAY</h3>
          <hr />
          <p id="countDown_date"><?= date_format(date_create($primaryEventData['date']),"d.m.Y");  ?></p>
          <div id="countDown_timer">
            <div>
                <h3 id="countDown_timer_days">12</h3>
                <p>hari</p>
            </div>
            |
            <div>
                <h3  id="countDown_timer_hours">8</h3>
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
          <p id="countDown_text">Tuhan membuat segala sesuatu indah pada waktu-Nya. Indah saat Dia mempertemukan. Indah saat Dia menumbuhkan cinta kasih. Indah pula Saat Dia menyatukan kami dalam pernikahan kudus.</p>
        </div>
      </section>
      <img class="separator" src="<?= base_url('public/AssetsGuest/image/separator.svg'); ?>" width="80%" />
      <section id="bride">
        <div id="first_bride">
          <div class="bride_image">
            <img class="bride_image_frame" src="<?= base_url('public/AssetsGuest/image/frame_1.svg'); ?>" height="248" />
            <img class="bride_image_bride" src="<?= base_url('public/assets/images/album/'. $groomData['photo']); ?>" height="200" width="200" />
          </div>

          <h4 class="text-capitalize"><?= $groomData['nickname'] ?></h4>
          <h2><?= $groomData['fullname'] ?></h2>
          <hr />
          <p class="bride_parent">PUTRA PERTAMA BAPAK <?= $groomData['father_name'] ?> DAN IBU <?= $groomData['mother_name'] ?></p>
          <div class="bride_instagram"><img class="bride_image_frame" src="<?= base_url('public/AssetsGuest/image/instagram.svg'); ?>" height="13" /><p><?= $groomData['social_media'] ?></p></div>
        </div>
        <div id="second_bride">
          <div class="bride_image">
            <img class="bride_image_frame" src="<?= base_url('public/AssetsGuest/image/frame_1.svg'); ?>" height="248" />
            <img class="bride_image_bride" src="<?= base_url('public/assets/images/album/'. $brideData['photo'] ?? "bride.svg"); ?>" height="200" width="200" />
          </div>
          <h4><?= $brideData['nickname'] ?></h4>
          <h2><?= $brideData['fullname'] ?></h2>
          <hr />
          <p class="bride_parent">PUTRI PERTAMA BAPAK <?= $brideData['father_name'] ?> DAN IBU <?= $brideData['mother_name'] ?></p>
          <div class="bride_instagram">
            <img class="bride_image_frame" src="<?= base_url('public/AssetsGuest/image/instagram.svg'); ?>" height="13" />
            <p><?= $brideData['social_media'] ?></p>
          </div>
        </div>
      </section>

      <section id="weddingStory">
        <img id="weddingStory_ring" src="<?= base_url('public/AssetsGuest/image/ring.svg'); ?>" height="45" />
        <h3>OUR LOVE STORY</h3>
        <img id="weddingStory_couple" src="<?= $imageLoveStoryPath ?>" width="100%" />
        <h5>DESEMBER 2020</h5>
        <p>
          The long barrow was built on land previously inhabited in the Mesolithic period. It consisted of a sub-rectangular earthen tumulus, estimated to have been 15 metres (50 feet) in length, with a chamber built from sarsen megaliths.
        </p>
        <img class="separator" src="<?= base_url('public/AssetsGuest/image/separator.svg'); ?>" width="80%" />
      </section>

      <section id="date">
        <?php 
          if (isset($primaryEventData)) {
            echo '
            <img id="date_top" src="'.base_url('public/AssetsGuest/image/top.svg').'" width="100%" />
            <h3 class="date_title">'.$primaryEventData['title'].'</h3>
            <img class="date_divider" src="'.base_url('public/AssetsGuest/image/divider.svg').'" width="48" />
            <div class="date_date_day">
              <h3>'.date_format(date_create($primaryEventData['date']),"D").'</h3>
              |
              <div class="date_date_day_date">
                <h3>4</h3>
                <div>
                  <p>OCTOBER</p>
                  <p>2022</p>
                </div>
              </div>
            </div>
            <h5 class="date_time">08.00 wib - selesai</h5>
            ';
          }

          if (isset($eventData)) {
            echo '
            <h3 class="date_title">RESEPSI</h3>
            <img class="date_divider" src="'.base_url('public/AssetsGuest/image/divider.svg').'" width="48" />
            <div class="date_date_day">
              <h3>SABTU</h3>
              |
              <div class="date_date_day_date">
                <h3>4</h3>
                <div>
                  <p>OCTOBER</p>
                  <p>2022</p>
                </div>
              </div>
            </div>
            <h5 class="date_time">08.00 wib - selesai</h5>
            ';
          }
        ?>
        
        <img id="date_pointer" src="<?= base_url('public/AssetsGuest/image/pointer.svg'); ?>" width="24" />
        <h5 id="date_location">Grand heaven</h5>
        <p id="date_adress">4517 Washington Ave. Manchester, Kentucky 39495</p>
        <button id="date_map" class="variant_1_button" type="button">VIEW ON MAPS</button>
        <div id="date_left_line"></div>
        <div id="date_right_line"></div>
        <img id="date_buttom" src="<?= base_url('public/AssetsGuest/image/buttom.svg'); ?>" width="100%" />
      </section>

      <section id="gift">
        <h3 id="gift_title">WEDDING GIFT</h3>
        <p id="gift_information">Bagi bapak/ibu/saudara/i yang ingin mengirimkan hadiah pernikahan dapat melalui virtual account atau e-wallet di bawah ini:</p>
        <div id="gift_card_container">
          <div class="gift_card">
            <h5>BANK NAME</h5>
            <div class="gift_card_info">
              <h5>12345678910</h5>
              <p class="gift_gift_card_info_an"><span>A/N</span> NADINE</p>
            </div>
            <button class="variant_1_button" type="button"><img src="<?= base_url('public/AssetsGuest/image/copy.svg'); ?>" width="12" />SALIN NO. REK</button>
          </div>
          <div class="gift_card">
            <h3>GIFT</h3>
            <div class="gift_card_info">
              <p id="gift_gift_card_info_receiver">PENERIMA:</p>
              <h5>NADINE</h5>
              <p class="gift_gift_card_info_an">4517 Washington Ave. Manchester, Kentucky 39495</p>
            </div>
            <button class="variant_1_button" type="button"><img src="<?= base_url('public/AssetsGuest/image/copy.svg'); ?>" width="12" /> SALIN ALAMAT</button>
          </div>
        </div>
      </section>

      <section id="rsvp">
        <img id="rsvp_ornament" src="<?= base_url('public/AssetsGuest/image/Frame.svg'); ?>" width="243" />
        <h3 id="rsvp_title">RSVP</h3>
        <img class="rsvp_divider" src="<?= base_url('public/AssetsGuest/image/divider.svg'); ?>" width="48" />
        <p id="rsvp_information">Our wedding will be a small, intimate ceremony. and only those who are closest to us will be in attendance</p>
        <form id="rsvp_form">
          <input name="transaction_id" value="2" hidden>
          <div class="rsvp_input_group">
            <label class="rsvp_label"> NAMA <span>*</span> </label>
            <input class="rsvp_input" placeholder="NAMA" id="name" name="name" type="text" required />
          </div>
          <div class="rsvp_input_group">
            <label class="rsvp_label"> Konfirmasi Kehadiran <span>*</span> </label>
            <select class="rsvp_select_input" id="confirmation" name="confirmation" required>
              <option style="display: none"></option>
              <option value="Hadir">Hadir</option>
              <option value="Tidak Hadir">Tidak Hadir</option>
            </select>
          </div>
          <div class="rsvp_input_group">
            <label class="rsvp_label"> JUMLAH KEHADIRAN <span>*</span> </label>
            <input class="rsvp_input" id="amount" name="amount" type="number" required />
          </div>
          <div class="rsvp_input_group">
            <label class="rsvp_label"> MAKE A WISH <span>*</span> </label>
            <textarea max-word="500" id="rsvp_text_area_input" class="rsvp_text_area_input" name="wish" rows="4" placeholder="WRITE A WISH" required></textarea>
            <div id="rsvp_the_count">
              <span id="rsvp_the_count_current">0</span>
              <span id="rsvp_the_count_maximum">/ 500</span>
            </div>
          </div>
          <button type="button" id="rsvp_submit" onclick="submitRSVP()">SEND RSVP</button>
        </form>
        <div id="rsvp_wishes_container">
          <div class="rsvp_wish_container">
            <p class="rsvp_wish_container_name">JOHNY DEEP</p>
            <p class="rsvp_wish_container_wishes">happy wedding broowwww</p>
            <p class="rsvp_wish_container_date"><span>Aug, 9th 2023</span><span>•</span><span>9.41 PM</span></p>
          </div>
          <div class="rsvp_wish_container">
            <p class="rsvp_wish_container_name">JOHNY DEEP</p>
            <p class="rsvp_wish_container_wishes">happy wedding broowwww</p>
            <p class="rsvp_wish_container_date"><span>Aug, 9th 2023</span><span>•</span><span>9.41 PM</span></p>
          </div>
          <div class="rsvp_wish_container">
            <p class="rsvp_wish_container_name">JOHNY DEEP</p>
            <p class="rsvp_wish_container_wishes">happy wedding broowwww</p>
            <p class="rsvp_wish_container_date"><span>Aug, 9th 2023</span><span>•</span><span>9.41 PM</span></p>
          </div>
          <button id="rsvp_show_more">SHOW MORE WISHES</button>
        </div>
      </section>

      <section id="gallery">
            <img id="gallery_top" src="<?= base_url('public/AssetsGuest/image/top.svg')?>" width="100%">
            <h3 id="gallery_title">OUR GALLERY</h3>
            <!-- <div class="grid">
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" />
                </div>
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/submerged.jpg" />
                </div>
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/one-world-trade.jpg" />
                </div>
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" />
                </div>
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" />
                </div>
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/contrail.jpg" />
                </div>
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
                </div>
                <div class="grid-item">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/flight-formation.jpg" />
                </div>
            </div>
             -->

             
             <!-- <div class="gallery_images_container">
                <div class="gallery_images_container_two_collumn">
                    <img class="gallery_images_var_1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
                <div class="gallery_images_container_one_collumn">
                    <img class="gallery_images_var_2" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
                </div>
             </div> -->

             <!-- <div class="gallery_images_container">
                <div class="gallery_images_container_two_collumn">
                    <img class="gallery_images_var_1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
                <div class="gallery_images_container_two_collumn">
                    <img class="gallery_images_var_1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
             </div> -->

             <!-- <div class="gallery_images_container">
                <div class="gallery_images_container_four_collumn">
                    <img class="gallery_images_var_1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_3 mt-1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_3" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_1 mt-1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
                <div class="gallery_images_container_one_collumn">
                    <img class="gallery_images_var_2" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
                </div>
                <div class="gallery_images_container_two_collumn">
                    <img class="gallery_images_var_3" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_3" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
             </div> -->
  
             <div class="gallery_images_container">
                <div class="gallery_images_container_four_collumn">
                    <img class="gallery_images_var_3" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_1 mt-1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_3 mt-1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_4 mt-1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_5 mt-1" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
                <div class="gallery_images_container_one_collumn">
                    <img class="gallery_images_var_2" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
                </div>
                <div class="gallery_images_container_two_collumn">
                    <img class="gallery_images_var_3" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                    <img class="gallery_images_var_3" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
                <div class="gallery_images_container_one_collumn">
                    <img class="gallery_images_var_2" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
                </div>
             </div>

            <img id="galery_buttom" src="<?= base_url('public/AssetsGuest/image/buttom.svg')?>" width="100%">

        </section>

      <section id="clossingMessage">
        <img id="clossingMessage_ornament_top" src="<?= base_url('public/AssetsGuest/image/closing_ornament.svg'); ?>" width="124" />
        <p id="clossingMessage_info">Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do'a restu kepada kedua mempelai.</p>
        <img class="date_divider" src="<?= base_url('public/AssetsGuest/image/divider.svg'); ?>" width="48" />
        <h4 id="clossingMessage_couples">Rian & Jaka</h4>
        <img id="clossingMessage_ornament_buttom" src="<?= base_url('public/AssetsGuest/image/bawah.svg'); ?>" width="193" />
      </section>
    </main>
    <footer>
      <p>
        crafted by <span><img src="<?= base_url('public/AssetsGuest/image/watermark.svg'); ?>" width="15" /></span>digieplan © 2023
      </p>
    </footer>
    <div id="musicPlayer">
        <img id="musicPlayer_paused" src="<?= base_url('public/AssetsGuest/image/music-disc.svg')?>" height="48">
        <img id="musicPlayer_played" src="<?= base_url('public/AssetsGuest/image/music-disc-played.svg')?>" height="48">
        <audio autoplay loop>
          <source src="<?= base_url('public/AssetsGuest/music/Christina Perri - A Thousand Years.mp3')?>" type="audio/mpeg">
          Your browser does not support the audio element.
        </audio>
    </div>
    <nav id="navbar">
      <ul>
        <li class="nav" id="bride_button">
          <img src="<?= base_url('public/AssetsGuest/image/bride.svg'); ?>" height="24" />
          <div>BRIDE</div>
        </li>
        <li class="nav" id="date_button">
          <img src="<?= base_url('public/AssetsGuest/image/date.svg'); ?>" height="24" />
          <div>DATE</div>
        </li>
        <li class="nav" id="rsvp_button">
          <img src="<?= base_url('public/AssetsGuest/image/rsvp.svg'); ?>" height="24" />
          <div>RSVP</div>
        </li>
        <li class="nav" id="gift_button">
          <img src="<?= base_url('public/AssetsGuest/image/gift.svg'); ?>" height="24" />
          <div>GIFT</div>
        </li>
      </ul>
    </nav>
    <script src="<?= base_url('public/AssetsGuest/js/index.js')?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DB INTEGRATION -->
    <script>
    function addUser() {
        var name          = document.getElementById('name').value;
        var confirmation  = document.getElementById('confirmation').value;
        var amount        = document.getElementById('amount').value;
        var wish          = document.getElementById('rsvp_text_area_input').value;

        var formData = new FormData();
        formData.append('name', name);
        formData.append('status', confirmation);
        formData.append('total_guest', amount);
        formData.append('wishes', wish);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= base_url('guest/submit-rsvp'); ?>', true);
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log(response);
                // Handle success, e.g., show a success message
            } else if (xhr.readyState === 4) {
                console.error('Error:', xhr.status);
                // Handle error, e.g., show an error message
            }
        };
        xhr.send(formData);
    }

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

                  // Modify the URL without triggering a page reload
                  window.history.pushState({}, document.title, '<?php echo base_url("/guest"); ?>');
              },
              error: function(error) {
                  // Handle error response
                  console.log(error);
              }
          });
        }
    }
    </script>
  </body>
</html>

