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
                  <button id="copy_rekening" rek-number=' . $gift['account_number'] . ' class="variant_1_button" type="button"><img src="' . base_url('/AssetsGuest/image/copy.svg') . '" width="12" />SALIN NO. REK</button>
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
                  <button id="copy_rekening" rek-number=' . $gift['account_number'] . ' class="variant_1_button" type="button"><img src="' . base_url('/AssetsGuest/image/copy.svg') . '" width="12" />SALIN NO. REK</button>
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
                  <button id="copy_adrress" class="variant_1_button" type="button"><img src="' . base_url('/AssetsGuest/image/copy.svg') . '" width="12" /> SALIN ALAMAT</button>
                </div>
                ';
      }
    }
    ?>
  </div>
</section>