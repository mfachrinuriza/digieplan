<script>
    window.injectFileValue = function() {
        var tempFileInput = document.getElementById('image_cover_temp');
        var realFileInput = document.getElementById('image_cover');

        // Copy the value from the temporary input to the real input
        realFileInput.value = tempFileInput.value;
    };

    function submitImage() {
        document.getElementById('button-submit').click();
    }

    function buttonSelectImage() {
        document.getElementById('input-image').click();
    }

    function requestSubmitImage() {
        submitImage();
    }

    function requestChangeImageProfile(id) {
        if (!id && id != 0) {
            document.getElementById('input-image').click();
        } else {
            document.getElementById('input-image-' + id).click();
        }
    }

    function updatePreviewImage(input, id) {
        var reader = new FileReader();
        if (id === null || id === undefined) {
            if (input.files && input.files[0]) {
                reader.onload = function(e) {
                    document.getElementById('image-profile-0').style.backgroundImage = 'url(' + e.target.result + ')';
                };
                reader.readAsDataURL(input.files[0]);
            }
        } else {
            if (input.files && input.files[0]) {
                reader.onload = function(e) {
                    document.getElementById('image-profile-' + id).style.backgroundImage = 'url(' + e.target.result + ')';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
</script>