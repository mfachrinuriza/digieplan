<script>
    var prayCheckbox = document.getElementById("pray-checkbox");
    var prayContent = document.getElementById("pray-content");
    
    updateUIPrayOption();
    
    prayCheckbox.addEventListener('change', function() {
        updateUIPrayOption() 
    })

    function updateUIPrayOption() {
        prayContent.hidden = prayCheckbox.checked ? false : true;
    }

    // Pray Dynamic Data
    var selectPray = document.getElementById('select-pray');
    var prayCard = document.getElementById('pray-card');
    var surahContentTxt = document.getElementById('surah_content');
    var prayDivider = document.getElementById('pray_divider');
    var subContentTxt = document.getElementById('sub_content');
    var surahNameTxt = document.getElementById('surah_name');

    var praysData = <?= json_encode($praysData); ?>;
    var selectedId = selectPray.value;
    var isChanged = false;
    
    if (!isChanged) {
        updateUIPray(selectedId);
    }

    selectPray.addEventListener('change', function() {
        // Get the selected value
        selectedId = selectPray.value;
        isChanged = true;
        updateUIPray(selectedId);
    });

    function updateUIPray(selectedId) {
        if (selectedId == 0) {
            prayCard.style.display = 'none';
        } else {
            prayCard.style.display = 'block';
            
            praysData.forEach(function(pray) {
                if (selectedId == pray['id']) {
                    if (pray['surah_content'] == '') {
                        surahContentTxt.hidden = true;
                        prayDivider.hidden = true;
                    } else {
                        surahContentTxt.hidden = false;
                        prayDivider.hidden = false;
                        surahContentTxt.textContent = pray['surah_content'];
                    }

                    subContentTxt.textContent = pray['sub_content'];

                    if (pray['surah_name'] == '') {
                        subContentTxt.classList.replace('mb-3', 'mb-2');
                        surahNameTxt.hidden = true;
                    } else {
                        subContentTxt.classList.replace('mb-2', 'mb-3');
                        surahNameTxt.hidden = false;
                        surahNameTxt.textContent = "( " + pray['surah_name'] + " )";
                    }
                }
            });
        }
    }

</script>