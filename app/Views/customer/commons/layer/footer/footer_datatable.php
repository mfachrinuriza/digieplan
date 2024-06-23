  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- Tabler Core -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" defer></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" defer></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js" defer></script>
  <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js" defer></script>

  <script>
    <?php if ($title == getenv('TITLE_GUEST_BOOK')) { ?>
      $(document).ready(function() {
        $('#myTable').DataTable({
          dom: 'Bfrtip',
          buttons: [
            ''
          ]
        });
      });
    <?php } else { ?>
      $(document).ready(function() {
        $('#myTable').DataTable({
          dom: 'Bfrtip',
          buttons: [
            ''
          ]
        });
      });
    <?php } ?>
  </script>

  <!--using sweetalert via CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    $(document).ready(function() {
      // Initialize the DataTable
      var table = $('#myTable').DataTable();

      // Handle the button click event within the DataTable
      $('#myTable tbody').on('click', 'button.getURLData', function() {
        var url = $(this).data('url');
        url = url.split(" ").join("%20");

        var isValid = $(this).data('validation');;

        if (isValid) {
          navigator.clipboard.writeText(url).then(() => {
            alert("Salin link, berhasil!")
            /* Resolved - text copied to clipboard successfully */
          }, () => {
            alert("Salin link, gagal!")
            /* Rejected - text failed to copy to the clipboard */
          });
        } else {
          alert("Mohon Lengkapi Data Profile Anda!");
          location.replace("<?= base_url('/customer/kelola-konten-undangan/profil') ?>")
        }

      });
    });
  </script>

  <script>
    function copyElement($link) {
      console.log("coppy tapped");
      // Get the original element
      var originalElement = $link;

      // Create a new element
      var copiedElement = originalElement.cloneNode(true);

      // Modify the copied element (e.g., change its content)
      copiedElement.innerHTML = 'Link undangan berhasil disalin.';

      // Add the copied element to the document
      document.body.appendChild(copiedElement);
    }
  </script>