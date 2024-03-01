<div class="page-wrapper">
    <!-- Page header -->
    <?php include_once './app/Views/customer/wedding/components/header_page.php' ;?>

    
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <!-- Page title actions -->
                        <?php 
                            if (count($giftList) > 0 && count($giftList) < 3) {
                                echo '
                                <div class="col-auto ms-auto d-print-none">
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#'.$modalNameCreate.'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" />
                                                <path d="M16 3v4" />
                                                <path d="M8 3v4" />
                                                <path d="M4 11h16" />
                                                <path d="M16 19h6" />
                                                <path d="M19 16v6" />
                                            </svg>
                                            Tambah 
                                        </a>
                                    </div>
                                </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <?php
                    if (count($giftList) > 0) {
                        foreach($giftList as $updateData) {
                            require "./app/Views/customer/wedding/components/card/gift_cart.php";
                            include "./app/Views/customer/wedding/components/modals/gift/update_gift_modal.php";
                        }
                    } else {
                        require "./app/Views/customer/wedding/components/card/empty_state_card.php";
                    }
                ?>
            </div>
        </div>
    </div>
    <?php 
    include_once "./app/Views/customer/wedding/components/modals/gift/create_gift_modal.php";
    include_once "./app/Views/customer/commons/layer/footer_page.php" 
    ?>
</div>
