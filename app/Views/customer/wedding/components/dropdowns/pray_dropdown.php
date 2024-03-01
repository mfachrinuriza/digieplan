<!-- Open -->
<!-- Page title actions -->
<div class="col-4 d-print-none">
    <div class="d-flex">
        <?php 
            if (count($praysData) > 0 ) {
                echo '
                <select class="form-select" id="select-pray" name="pray_selected">';
                    if(isset($praySelected)) {
                        echo '<option value="'.$praySelected['id'].'" class="update-option-bank">'.$praySelected['religion'].($praySelected['surah_name'] != null ? " (".$praySelected['surah_name'].")" : "").'</option>';
                    }
                    foreach($praysData as $pray) {
                        if (isset($praySelected)) {
                            if($praySelected['id'] != $pray['id']) {
                                echo '<option value="'.$pray['id'].'" class="update-option-bank">'.$pray['religion'].($pray['surah_name'] != null ? " (".$pray['surah_name'].")" : "").'</option>';
                            }
                        } else {
                            echo '<option value="'.$pray['id'].'" class="update-option-bank">'.$pray['religion'].($pray['surah_name'] != null ? " (".$pray['surah_name'].")" : "").'</option>';
                        }
                    }
                echo '
                </select>
                ';
            } 
        ?>
    </div>
</div>
<!-- Close -->