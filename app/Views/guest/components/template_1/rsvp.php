<section id="rsvp">
    <img id="rsvp_ornament" src="<?= base_url('/AssetsGuest/image/Frame.svg'); ?>" width="243" />
    <h3 id="rsvp_title">RSVP</h3>
    <img class="rsvp_divider" src="<?= base_url('/AssetsGuest/image/divider.svg'); ?>" width="48" />
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