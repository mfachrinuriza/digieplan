<section id="countDown">
    <div id="countDown_top_image"><img src="<?= base_url('/AssetsGuest/image/countDown_top.svg') ?>" width="70%"></div>
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

        <h3 class="mb-3" id="surah_content"></h3>
        <img class="mb-4" id="pray_divider" src="<?= base_url('/AssetsGuest/image/divider.svg'); ?>" width="15%" />
        <h4 class="mb-3" id="sub_content"></h4>
        <p class="mb-1" id="surah_name"></p>
    </div>
</section>