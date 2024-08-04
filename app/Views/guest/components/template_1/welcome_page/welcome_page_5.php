<section id="welcomePage_5" class="welcomePage">
    <div id="welcomaPage_5_content_top_image"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_4_5_top_left.svg') ?>"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_4_5_top_right.svg') ?>"></div>
    <div id="welcomaPage_5_content_side_image"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_5_left.svg') ?>"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_5_right.svg') ?>"></div>
    <div id="welcomaPage_5_content">
        <h1 id="welcomaPage_5_content_first_h1">Wedding of</h1>
        <h1 id="welcomaPage_5_content_second_h1"><?= $groomData['nickname'] . ' & ' . $brideData['nickname'] ?></h1>
        <div class="first_frame">
            <div class="first_frame_image_clipped five">
                <img src="<?= $imageCoverPath ?>" alt="Couples">
            </div>
            <img class="first_frame_frame" src="<?= base_url('/AssetsGuest/image/template_a/welcome_5_frame.svg') ?>" alt="Frame">
        </div>
        <p id="welcomaPage_5_content_dear">dear</p>
        <h3><?= $invited_to ?></h3>
        <button class="variant_1_button animate__animated" id="welcomaPage_content_button" type="button">Buka Undangan</button>
    </div>
    <div id="welcomaPage_5_content_bottom_image"><img src="<?= base_url('/AssetsGuest/image/template_a/welcome_5_bottom.svg') ?>" width="100%"></div>
</section>