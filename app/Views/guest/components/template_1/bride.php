<section id="bride">
    <div id="first_bride">
        <div class="bride_image">
            <img class="bride_image_frame" src="<?= base_url('/AssetsGuest/image/frame_1.svg'); ?>" />
            <img class="bride_image_bride" src="<?= base_url('/assets/images/album/' . $groomData['photo']); ?>" />
        </div>

        <h4><?= $groomData['nickname'] ?></h4>
        <h2><?= $groomData['fullname'] ?></h2>
        <hr />
        <p class="bride_parent">PUTRA PERTAMA BAPAK <?= $groomData['father_name'] ?> DAN IBU <?= $groomData['mother_name'] ?></p>
        <a href="https://www.instagram.com/<?= str_replace('@', '', $groomData['social_media']) ?>" target="_blank">
            <div class="bride_instagram"><img class="bride_image_frame" src="<?= base_url('/AssetsGuest/image/instagram.svg'); ?>" height="13" />
                <p><?= $groomData['social_media'] ?></p>
            </div>
        </a>
    </div>
    <div id="second_bride">
        <div class="bride_image">
            <img class="bride_image_frame" src="<?= base_url('/AssetsGuest/image/frame_1.svg'); ?>" />
            <img class="bride_image_bride" src="<?= base_url('/assets/images/album/' . $brideData['photo']); ?>" />
        </div>
        <h4><?= $brideData['nickname'] ?></h4>
        <h2><?= $brideData['fullname'] ?></h2>
        <hr />
        <p class="bride_parent">PUTRI PERTAMA BAPAK <?= $brideData['father_name'] ?> DAN IBU <?= $brideData['mother_name'] ?></p>
        <a href="https://www.instagram.com/<?= str_replace('@', '', $brideData['social_media']) ?>" target="_blank">
            <div class="bride_instagram">
                <img class="bride_image_frame" src="<?= base_url('/AssetsGuest/image/instagram.svg'); ?>" height="13" />
                <p><?= $brideData['social_media'] ?></p>
            </div>
        </a>
    </div>
</section>