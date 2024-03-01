<div class="page-wrapper">
    <!-- Page header -->
    <?php

use function PHPUnit\Framework\isEmpty;

 include_once './app/Views/customer/wedding/components/header_page.php' ?>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row">
            <br/>
            
            <?php
                if (isset($profileGroom)) {
                    $profiles = $profileGroom;
                    require "./app/Views/customer/wedding/components/card/profile_card.php";
                    require "./app/Views/customer/wedding/components/modals/profile/update_profile_modal.php";
                } else {
                    $profiles = null;
                    $gender = null;
                    $gender = "Laki-Laki";
                    $title  = "Data pengantin $gender kosong";
                    $body   = "Isi data pengantin $gender";
                    require './app/Views/customer/wedding/components/card/empty_data_card.php';
                    require "./app/Views/customer/wedding/components/modals/profile/create_profile_modal.php";
                }

                if (isset($profileBride)) {
                    $profiles = $profileBride;
                    require "./app/Views/customer/wedding/components/card/profile_card.php";
                    require "./app/Views/customer/wedding/components/modals/profile/update_profile_modal.php";
                } else {
                    $profiles = null;
                    $gender = null;
                    $gender = "Perempuan";
                    $title  = "Data pengantin $gender kosong";
                    $body   = "Isi data pengantin $gender";
                    require './app/Views/customer/wedding/components/card/empty_data_card.php';
                    require "./app/Views/customer/wedding/components/modals/profile/create_profile_modal.php";
                }
            ?>
            </div>
        </div>
    </div>
    <?php include_once "./app/Views/customer/commons/layer/footer_page.php" ?>
</div>