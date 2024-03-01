<script>
    // @formatter:off

    var dropzoneCover = document.getElementById('dropzone-cover');
    var dropzoneLoveStory = document.getElementById('dropzone-love-story');
    var dropzoneProfileCreate = document.getElementById('dropzone-profile-create');
    var dropzoneProfileUpdate = document.getElementById('dropzone-profile-update');
    
    var url;
    var height;
    var width;
    var maxFile;
    var maxSize;
    var paramNameImage;
    
    if(dropzoneCover) {
        url = <?= json_encode(base_url('customer/kelola-konten-undangan/halaman-utama/create')) ?>;
        height = 3000;
        width = 2000;
        maxFile = 1;
        maxSize = 5;
        paramNameImage = "image_cover";
    } else if (dropzoneLoveStory) {
        url = <?= json_encode(base_url('customer/kelola-konten-undangan/halaman-utama/create')) ?>;
        height = 500;
        width = 500;
        maxFile = 1;
        maxSize = 5;
        paramNameImage = "image_cover";
    } else if (dropzoneProfileCreate || dropzoneProfileUpdate) {
        url = <?= json_encode(base_url('customer/kelola-konten-undangan/halaman-utama/create')) ?>;
        height = 300;
        width = 300;
        maxFile = 1;
        maxSize = 5;
        paramNameImage = "image_cover";
    }

    document.addEventListener("DOMContentLoaded", function() {
        Dropzone.autoDiscover = false;
        
        var myDropzone = new Dropzone("#dropzone-default", {
            url: url, // Update the URL
            paramName: paramNameImage, // The name that will be used to transfer the file
            maxFilesize: maxSize, // Maximum file size in megabytes
            acceptedFiles: 'image/*', // Specify accepted file types
            addRemoveLinks: true, // Add remove links to preview elements
            dictDefaultMessage: "Drop files here or click to upload", // Default message shown on the dropzone
            thumbnailWidth: width, // Set the width of the thumbnail preview
            thumbnailHeight: height, // Set the height of the thumbnail preview
            maxFiles: maxFile,
            
            
            init: function () {
                this.on("addedfile", function () {
                    // Check if the number of files exceeds the limit
                    if (this.files.length > maxFile) {
                        // Remove the first file (existing file)
                        this.removeFile(this.files[0]);
                    }
                });

                this.on("sending", function (file, xhr, formData) {
                    // Append additional form data before sending
                    if(dropzoneCover) {
                        formData.append('transaction_id', document.getElementById('transaction_id').value);
                        formData.append('type', document.getElementById('type').value);
                    } 
                });

                this.on("success", function (file, response) {
                    // Handle success response from the server
                    console.log(response);
                });
            }
        });
    })

    function submitMainCoverImage() {
        // Get form data
        console.log("request");
        var formData = $('#dropzone-default').serialize();
        if (formData.length > 0) {
          // Send AJAX request
          $.ajax({
              type: 'POST',
              url: '<?= base_url("/customer/kelola-konten-undangan/halaman-utama/create"); ?>',
              data: formData,
              dataType: 'json',
              success: function(response) {
                  // Handle success response
                  console.log(response);
                  
                  // You can update the UI or perform other actions here

                  // Modify the URL without triggering a page reload
                  window.history.pushState({}, document.title, '<?php echo base_url("/customer/kelola-konten-undangan/halaman-utama"); ?>');
              },
              error: function(error) {
                  // Handle error response
                  console.log(error);
              }
          });
        }
    }

    window.injectFileValue = function() {
        var tempFileInput = document.getElementById('image_cover_temp');
        var realFileInput = document.getElementById('image_cover');

        // Copy the value from the temporary input to the real input
        realFileInput.value = tempFileInput.value;
    };

    function submitCoverImage() {
        document.getElementById('button-submit-cover').click();
    }

    function buttonSelectCoverImage() {
        document.getElementById('input-cover-image').click();
    }

    function requestSubmitCoverImage() {
        submitCoverImage();
    }
</script>