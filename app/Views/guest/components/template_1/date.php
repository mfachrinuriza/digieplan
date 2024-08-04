<section id="date">
  <?php
  if (isset($primaryEventData)) {
    echo '
            <img id="date_top" src="' . base_url('/AssetsGuest/image/top.svg') . '" width="100%" />
            <h3 class="date_title">' . $primaryEventData['title'] . '</h3>
            <img class="date_divider" src="' . base_url('/AssetsGuest/image/divider.svg') . '" width="48" />
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
            <img class="date_divider" src="' . base_url('/AssetsGuest/image/divider.svg') . '" width="48" />
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

  <img id="date_pointer" src="<?= base_url('/AssetsGuest/image/pointer.svg'); ?>" width="24" />
  <h5 id="date_location"><?= $eventData['place_name'] ?></h5>
  <p id="date_adress"><?= $eventData['address'] ?></p>
  <a href="<?= $eventData['link_address'] ?>" target="_blank">
    <button id="date_map" class="variant_1_button" type="button">VIEW ON MAPS</button>
  </a>
  <div id="date_left_line"></div>
  <div id="date_right_line"></div>
  <img id="date_buttom" src="<?= base_url('/AssetsGuest/image/buttom.svg'); ?>" width="100%" />
</section>