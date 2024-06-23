<script>
    // Ensure jQuery is loaded
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded. Please include jQuery library.');
    } else {
        function setupCreateGiftModal(modalId) {
            //CREATE GIFT
            // show and hide while changing radio button add gift
            const modal = document.getElementById(modalId);
            if (!modal) {
                console.error('Modal with ID ' + modalId + ' not found.');
                return;
            }

            const bankContent = modal.querySelector('[id^="bank-content-"]');
            const eWalletContent = modal.querySelector('[id^="e-wallet-content-"]');
            const addressContent = modal.querySelector('[id^="address-content-"]');
            const bankAccountNoInput = modal.querySelector('[id^="bank-account-no-"]');
            const eWalletAccountNoInput = modal.querySelector('[id^="e-wallet-account-no-"]');
            const receiverNameBankInput = modal.querySelector('[id^="receiver-name-bank-"]');
            const receiverNameEWalletInput = modal.querySelector('[id^="receiver-name-e-wallet-"]');
            const receiverNameAddressInput = modal.querySelector('[id^="receiver-name-address-"]');
            const receiverAddressInput = modal.querySelector('[id^="receiver-address-"]');
            const selectBank = modal.querySelector('[id^="select-bank-"]');
            const bankNameField = modal.querySelector('[id^="bank-name-field-"]');
            const radioButtons = modal.querySelectorAll('[id^="bank-type-"], [id^="e-wallet-type-"], [id^="address-type-"]');


            // Function to show/hide content based on the selected radio button
            function toggleContent() {
                if (radioButtons[0].checked) {
                    bankContent.style.display = 'block';
                    eWalletContent.style.display = 'none';
                    addressContent.style.display = 'none';

                    jQuery(bankAccountNoInput).attr('required', '');
                    jQuery(receiverNameBankInput).attr('required', '');

                    jQuery(eWalletAccountNoInput).removeAttr('required');
                    jQuery(receiverNameEWalletInput).removeAttr('required');
                    jQuery(receiverNameAddressInput).removeAttr('required');
                    jQuery(receiverAddressInput).removeAttr('required');
                } else if (radioButtons[1].checked) {
                    bankContent.style.display = 'none';
                    eWalletContent.style.display = 'block';
                    addressContent.style.display = 'none';

                    jQuery(eWalletAccountNoInput).attr('required', '');
                    jQuery(receiverNameEWalletInput).attr('required', '');

                    jQuery(bankAccountNoInput).removeAttr('required');
                    jQuery(receiverAddressInput).removeAttr('required');
                    jQuery(receiverNameBankInput).removeAttr('required');
                    jQuery(receiverNameAddressInput).removeAttr('required');
                } else if (radioButtons[2].checked) {
                    bankContent.style.display = 'none';
                    eWalletContent.style.display = 'none';
                    addressContent.style.display = 'block';

                    jQuery(receiverNameAddressInput).attr('required', '');
                    jQuery(receiverAddressInput).attr('required', '');

                    jQuery(bankAccountNoInput).removeAttr('required');
                    jQuery(eWalletAccountNoInput).removeAttr('required');
                    jQuery(receiverNameBankInput).removeAttr('required');
                    jQuery(receiverNameEWalletInput).removeAttr('required');
                }
            }

            // Attach event listeners to radio buttons
            radioButtons.forEach(radio => radio.addEventListener('change', toggleContent));

            // Initial call to set the initial state based on the default selection
            toggleContent();

            // Function to show/hide bank name field based on the selected bank
            function toggleBankNameField() {
                if (selectBank.value == '99') {
                    bankNameField.style.display = 'block';
                    jQuery('#bank-name').attr('required', '');
                } else {
                    bankNameField.style.display = 'none';
                    jQuery('#bank-name').removeAttr('required');
                }
            }

            // Attach event listeners to radio buttons and select bank
            selectBank.addEventListener('change', toggleBankNameField);

            toggleBankNameField();
        }
        // Call setup function for each update gift modal
        <?php for ($i = 1; $i < $no; $i++) { ?>
            setupCreateGiftModal('<?= $modalNameCreate ?>-<?= $i ?>');
        <?php } ?>
    }
</script>

<script>
    // Ensure jQuery is loaded
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded. Please include jQuery library.');
    } else {
        function setupUpdateGiftModal(modalId) {
            const modal = document.getElementById(modalId);
            if (!modal) {
                console.error('Modal with ID ' + modalId + ' not found.');
                return;
            }

            const updateBankContent = modal.querySelector('[id^="update-bank-content-"]');
            const updateEWalletContent = modal.querySelector('[id^="update-e-wallet-content-"]');
            const updateAddressContent = modal.querySelector('[id^="update-address-content-"]');
            const updateBankAccountNoInput = modal.querySelector('[id^="update-bank-account-no-"]');
            const updateEWalletAccountNoInput = modal.querySelector('[id^="update-e-wallet-no-"]');
            const updateReceiverNameBankInput = modal.querySelector('[id^="update-receiver-name-bank-"]');
            const updateReceiverNameEWalletInput = modal.querySelector('[id^="update-receiver-name-e-wallet-"]');
            const updateReceiverNameAddressInput = modal.querySelector('[id^="update-receiver-name-address-"]');
            const updateReceiverAddressInput = modal.querySelector('[id^="update-receiver-address-"]');
            const updateSelectBank = modal.querySelector('[id^="update-select-bank-"]');
            const updateBankNameField = modal.querySelector('[id^="update-bank-name-field-"]');
            const updateRadioButtons = modal.querySelectorAll('[id^="update-bank-type-"], [id^="update-e-wallet-type-"], [id^="update-address-type-"]');

            // Function to show/hide bank name field based on the selected bank for update gift
            function toggleUpdateBankNameField() {
                if (updateSelectBank.value == '999') {
                    updateBankNameField.style.display = 'block';
                    jQuery('#update-bank-name').attr('required', '');
                } else {
                    updateBankNameField.style.display = 'none';
                    jQuery('#update-bank-name').removeAttr('required');
                }
            }

            // Attach event listeners to select bank for update gift
            updateSelectBank.addEventListener('change', toggleUpdateBankNameField);

            // Initial call to set the initial state based on the default selection for update gift
            toggleUpdateBankNameField();
        }

        <?php
        if (count($giftList) > 0) {
            foreach ($giftList as $updateData) {
        ?>
                setupUpdateGiftModal('modal-gift-update-<?= $updateData['id'] ?>');
        <?php
            }
        }
        ?>
    }
</script>