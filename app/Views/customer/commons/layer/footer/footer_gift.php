<script>
    //CREATE GIFT
    // show and hide while changing radio button add gift
    const bankContent           = document.getElementById('bank-content');
    const eWalletContent        = document.getElementById('e-wallet-content');
    const addressContent        = document.getElementById('address-content');
    const bankAccountNoInput    = document.getElementById('bank-account-no');
    const eWaleltAccountNoInput = document.getElementById('e-wallet-account-no');
    const receiverNameInput     = document.getElementById('receiver-name');
    const receiverAddressInput  = document.getElementById('receiver-address');

    const radioButtons = document.querySelectorAll('input[type="radio"][name="gift_type"]');

    // Function to show/hide content based on the selected radio button
    function toggleContent() {
        if (radioButtons[0].checked) {
            bankContent.style.display = 'block';
            eWalletContent.style.display = 'none';
            addressContent.style.display = 'none';

            jQuery(bankAccountNoInput).attr('required', '');

            jQuery(eWaleltAccountNoInput).removeAttr('required');
            jQuery(receiverNameInput).removeAttr('required');
            jQuery(receiverAddressInput).removeAttr('required');
        } else if (radioButtons[1].checked) {
            bankContent.style.display = 'none';
            eWalletContent.style.display = 'block';
            addressContent.style.display = 'none';

            jQuery(eWaleltAccountNoInput).attr('required', '');

            jQuery(bankAccountNoInput).removeAttr('required');
            jQuery(receiverNameInput).removeAttr('required');
            jQuery(receiverAddressInput).removeAttr('required');
        } else if (radioButtons[2].checked) {
            bankContent.style.display = 'none';
            eWalletContent.style.display = 'none';
            addressContent.style.display = 'block';

            jQuery(receiverNameInput).attr('required', '');
            jQuery(receiverAddressInput).attr('required', '');

            jQuery(bankAccountNoInput).removeAttr('required');
            jQuery(eWaleltAccountNoInput).removeAttr('required');
        }
    }

    // Attach event listeners to radio buttons
    radioButtons.forEach(radio => radio.addEventListener('change', toggleContent));

    // Initial call to set the initial state based on the default selection
    toggleContent();
    </script>

    <script>
    // Create GIFT
    // Provide bank name field while choose another bank
    const selectBank = document.getElementById('select-bank');
    const optionsbank = document.querySelectorAll('.option-bank');
    const bankNameField = document.getElementById('bank-name-field');

    // Get the index of the selected option
    const selectedIndex = selectBank.selectedIndex;

    // Get the selected option element using the index
    const selectedOption = selectBank.options[selectedIndex];

    // Get the value and text of the selected option
    const selectedBankValue = selectedOption.value;

    // first condition
    if (selectedBankValue == 0) {
        bankNameField.style.display = 'block';
    } else {
        bankNameField.style.display = 'none';
    }

    function changeOptionBank() {
        const selectedOption = selectBank.value;
        console.log(selectedOption);
        if (selectedOption == 99) {
            bankNameField.style.display = 'block'; // Change to the appropriate value, e.g., 'inline' if needed
        } else {
            bankNameField.style.display = 'none';
        }
    }

    // Attach event listener to the select element
    selectBank.addEventListener('change', changeOptionBank);

    // Initial call to set the initial state based on the default selection
    changeOptionBank();
    </script>