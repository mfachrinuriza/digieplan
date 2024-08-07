<section id="welcomePage_2" class="welcomePage">
    <div id="welcomaPage_2_content_top_image"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_2_top.svg') ?>"></div>
    <div id="welcomaPage_2_content_side_image"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_2_left.svg') ?>"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_2_right.svg') ?>"></div>
    <div id="welcomaPage_2_content">
        <h1 id="welcomaPage_2_content_first_h1">Wedding of</h1>
        <h1 id="welcomaPage_2_content_second_h1"><?= $groomData['nickname'] . ' & ' . $brideData['nickname'] ?></h1>
        <p id="welcomaPage_2_content_date"><?= date_format(date_create($primaryEventData['date']), "d.m.Y"); ?></p>
        <p id="welcomaPage_2_content_dear">dear</p>
        <h3><?= $invited_to ?></h3>
        <button class="variant_1_button animate__animated" id="welcomaPage_content_button" type="button">Buka Undangan</button>
    </div>
    <div id="welcomaPage_2_content_bottom_image"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_4_bottom.svg') ?>" width="100%"></div>
</section>