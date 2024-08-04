<div class="page-wrapper">
    <!-- Page header -->
    <?= view('customer/wedding/components/header_page') ?>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <form action="<?= base_url('/customer/kelola-konten-undangan/love-story/create_photo') ?>" method="POST" enctype="multipart/form-data">
                                                <a class="p-0 m-0 border-0 bg-transparent" onclick="buttonSelectImage()">
                                                    <input type="text" name="transaction_id" id="transaction_id" value="<?= $transactionSelected['id'] ?>" hidden>
                                                    <input type="text" name="type" id="type" value="love_story" hidden>
                                                    <input type="file" name="image" id="input-image" onchange="requestSubmitImage()" accept="image/*" hidden>
                                                    <img src="<?= $url_image != null ? base_url('/assets/images/album/' . $url_image) : base_url('/assets/images/icon/default-upload.png') ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                                </a>
                                                <button id="button-submit" hidden></button>
                                            </form>
                                        </div>
                                        <div class="col-md-7">
                                            <form action="<?= base_url('/customer/kelola-konten-undangan/love-story/create') ?>" method="POST" autocomplete="off">
                                                <input type="text" value="<?= $transactionSelected['id'] ?>" name="transcation_id" hidden>
                                                <?php
                                                $required = "";
                                                for ($i = 0; $i < 3; $i++) {
                                                    $number = $i + 1;
                                                    $number == 1 ? $required = "required" : $required = "";
                                                    echo '
                                                        <div class="mb-3">
                                                            <label class="form-label ' . $required . '" for="akad_nikah">Love Story ' . $number . '</label>
                                                            <small class="text-muted form-label" for="title' . $number . '">Judul</small>';
                                                    if (isset($loveStoryList[$i])) {
                                                        $id = $loveStoryList[$i]['id'];
                                                        echo '
                                                            <input type="text" name="id' . $number . '" value="' . $id . '" hidden>
                                                            <input type="text" class="form-control" id="title' . $number . '" name="title' . $number . '" value="' . $loveStoryList[$i]['title'] . '" placeholder="Contoh: Pertemuan pertama kita" ' . $required . ' maxlength="25">
                                                            <small class="text-muted text-red text-end form-label required" for="title' . $number . '">Maksimal 25 Karakter</small>';
                                                    } else {
                                                        echo '
                                                            <input type="text" class="form-control" id="title' . $number . '" name="title' . $number . '" value="" placeholder="Contoh: Pertemuan pertama kita" ' . $required . ' maxlength="25">
                                                            <small class="text-muted text-red text-end form-label required" for="title' . $number . '">Maksimal 25 Karakter</small>';
                                                    }
                                                    echo '
                                                        </div>
                                                        <div class="mb-3">
                                                            <small class="text-muted form-label" for="story' . $number . '">Story </small>';

                                                    $storyPlaceholder = 'Contoh: Setelah cukup mengenal satu sama lain. Amri pun melamar saya pada hari Jumat, 28 Agustus 2020. And asked me `will you marry me?` and I said `Yes`';

                                                    if (isset($loveStoryList[$i])) {
                                                        echo '
                                                            <textarea class="form-control" id="story' . $number . '" rows="4" name="story' . $number . '" placeholder="' . $storyPlaceholder . '" ' . $required . ' maxlength="200">' . $loveStoryList[$i]['story'] . '</textarea>
                                                            <small class="text-muted text-red text-end form-label required" for="title' . $number . '">Maksimal 200 Karakter</small>';
                                                    } else {
                                                        echo '
                                                            <textarea class="form-control" id="story' . $number . '" rows="4" name="story' . $number . '" value="" placeholder="' . $storyPlaceholder . '" ' . $required . ' maxlength="200"></textarea>
                                                            <small class="text-muted text-red text-end form-label required" for="title' . $number . '">Maksimal 200 Karakter</small>';
                                                    }
                                                    echo '
                                                        </div>
                                                        ';
                                                }
                                                ?>
                                                <div class="row">
                                                    <div class="col"></div>
                                                    <div class="col-auto align-self-center">
                                                        <!-- Page title actions -->
                                                        <div class="col-auto ms-auto d-print-none">
                                                            <div class="d-flex">
                                                                <button type="submit" href="<?= base_url('/customer/kelola-konten-undangan/love-story/create') ?>" class="btn btn-outline-primary w-100 m-1">Simpan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= view('customer/commons/layer/footer_page') ?>
</div>