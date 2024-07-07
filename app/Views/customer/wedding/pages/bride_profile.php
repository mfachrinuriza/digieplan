<div class="page-wrapper">
    <!-- Page header -->
    <?php

    use function PHPUnit\Framework\isEmpty;

    echo view('customer/wedding/components/header_page');
    ?>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
                <br />

                <?php
                if (isset($profileGroom)) {
                    $profiles = $profileGroom;
                    echo view('customer/wedding/components/card/profile_card', ['profiles' => $profiles]);
                    echo view('customer/wedding/components/modals/profile/update_profile_modal');
                } else {
                    $profiles = null;
                    $gender = "Laki-Laki";
                    $title  = "Data pengantin $gender kosong";
                    $body   = "Isi data pengantin $gender";
                    echo view('customer/wedding/components/card/empty_data_card', ['title' => $title, 'body' => $body]);
                    echo view('customer/wedding/components/modals/profile/create_profile_modal');
                }

                if (isset($profileBride)) {
                    $profiles = $profileBride;
                    echo view('customer/wedding/components/card/profile_card', ['profiles' => $profiles]);
                    echo view('customer/wedding/components/modals/profile/update_profile_modal');
                } else {
                    $profiles = null;
                    $gender = "Perempuan";
                    $title  = "Data pengantin $gender kosong";
                    $body   = "Isi data pengantin $gender";
                    echo view('customer/wedding/components/card/empty_data_card', ['title' => $title, 'body' => $body]);
                    echo view('customer/wedding/components/modals/profile/create_profile_modal');
                }
                ?>

            </div>
        </div>
    </div>
    <?= view('customer/commons/layer/footer_page') ?>
</div>