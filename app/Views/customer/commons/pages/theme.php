<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col-10">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        <?= TITLE_COMPANY ?>
                    </div>
                    <h2 class="page-title">
                        <?= $title ?>
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none" style="padding-bottom: 20px">
                    <?= view('customer/commons/components/dropdown/event_list_dropdown') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <?php foreach ($themeList as $theme) : ?>
                    <?= view('customer/commons/components/card/theme_card', ['theme' => $theme]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?= view('customer/commons/layer/footer_page') ?>
</div>