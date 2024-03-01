<!-- Open -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="d-flex">
                    <?php 
                        if (count($transactionsData) > 0 ) {
                            foreach ($transactionsData as $data) {
                                if ($data['isPrimary']) {
                    ?>
                                    <a class="btn btn-outline-primary w-100 dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <?= $data['title'] ?></a>
                            <?php 
                                }
                            }
                            echo '<div class="dropdown-menu">';
                            foreach ($transactionsData as $data) { 
                                echo '<a class="dropdown-item" href="'.base_url('/customer/event_selected/'.$data['id'].'/'.$url_path) .'" rel="noopener">'. $data['title'].'</a>';
                            }
                            echo '</div>';
                        } else {
                            echo '<a class="btn btn-outline-primary w-100" role="button">Tidak ada undangan</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Close -->