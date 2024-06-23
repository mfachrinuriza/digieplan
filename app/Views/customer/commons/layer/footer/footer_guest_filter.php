<script>
    const radioButtons = document.querySelectorAll('input[type="radio"][name="guest_status"]');
    const dataTable = document.getElementById('myTable');
    const rows = dataTable.getElementsByTagName('tr');
    const lastRow = rows[rows.length - 1];

    const urlParams = new URLSearchParams(window.location.search);
    const status = urlParams.get('status');

    var guestList = <?php echo json_encode($guestList); ?>;

    // Memperbarui nilai input berdasarkan status dari query parameter
    if (status) {
        document.querySelectorAll('input[name="guest_status"]').forEach(input => {
            if (input.value.toLowerCase() === status) {
                input.checked = true;
            } else {
                input.checked = false;
            }

            const url = window.location.href.split('?')[0];
            // Replace the current URL with the URL without the query parameters
            window.history.replaceState({}, document.title, url);
        });
    }

    // Function to show/hide content based on the selected radio button
    function toggleContent() {
        if (radioButtons[0].checked) {
            // Loop through rows to show/hide based on the selected category
            for (let i = 1; i < rows.length; i++) { // Start from index 1 to skip the header row
                const row = rows[i];
                const cells = row.getElementsByTagName('td');

                // Show or hide the row based on the selected category
                row.hidden = false;
                cells[0].textContent = i;
            }
        } else if (radioButtons[1].checked) {
            var number = 0;
            // Loop through rows to show/hide based on the selected category
            for (let i = 1; i < rows.length; i++) { // Start from index 1 to skip the header row
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                const numberText = cells[0].textContent;
                const rowCategory = cells[1].textContent.toLowerCase(); // Assuming category is in the second column

                // Show or hide the row based on the selected category
                row.hidden = rowCategory === 'hadir' ? false : true;
                if (rowCategory === 'hadir') {
                    number++;
                }

                cells[0].textContent = number;
            }
            if (number === 0) {
                rows[number].hidden = false;
                cells[0].colSpan = 5
                cells[0].textContent = "hadir"
            }
        } else if (radioButtons[2].checked) {
            var number = 0;
            // Loop through rows to show/hide based on the selected category
            for (let i = 1; i < rows.length; i++) { // Start from index 1 to skip the header row
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                const numberText = cells[0].textContent;
                const rowCategory = cells[1].textContent.toLowerCase(); // Assuming category is in the second column

                // Show or hide the row based on the selected category
                row.hidden = rowCategory === 'diundang' ? false : true;
                if (rowCategory === 'diundang') {
                    number++;
                }

                cells[0].textContent = number;
            }
            if (number === 0) {
                rows[number].hidden = false;
                cells[0].colSpan = 5
                cells[0].textContent = "hadir"
            }
        } else if (radioButtons[3].checked) {
            var number = 0;
            // Loop through rows to show/hide based on the selected category
            for (let i = 1; i < rows.length; i++) { // Start from index 1 to skip the header row
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                const numberText = cells[0].textContent;
                const rowCategory = cells[1].textContent.toLowerCase(); // Assuming category is in the second column

                // Show or hide the row based on the selected category
                row.hidden = rowCategory === 'tidak hadir' ? false : true;
                if (rowCategory === 'tidak hadir') {
                    number++;
                }

                cells[0].textContent = number;

            }

            if (number === 0) {
                const newRow = dataTable.insertRow(-1);

                // if (row.cells.length > 0) {
                //     // Delete the first cell from the first row
                //     for ($i = 0; $i<row.cells.length; $i++) {
                //         const cell = row.cells[$i];
                //         cell.innerHTML = '';
                //     }
                // }

                // Create and append three cells to the new row
                for (let i = 0; i < 4; i++) {
                    newRow.insertCell(i);
                }
                const retrievedCell = newRow.cells[1];

                newRow.colSpan = 4;
                retrievedCell.innerHTML = 'Data is Empty';

                cells[0].textContent = "hadir";
            }
        }
    }

    // Attach event listeners to radio buttons
    radioButtons.forEach(radio => radio.addEventListener('change', toggleContent));

    // Initial call to set the initial state based on the default selection
    toggleContent();
</script>