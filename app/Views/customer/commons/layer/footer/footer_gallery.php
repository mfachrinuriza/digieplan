<script>
    var grid = document.querySelector('.grid');
    var msnry;

    imagesLoaded(grid, function() {
        // init Isotope after all images have loaded
        msnry = new Masonry(grid, {
            itemSelector: '.grid-item',
            gutter: 4
        });
    });

    // Pray Dynamic Data
    var selectGalleryType = document.getElementById('select-gallery-type');
    var threeImages = document.getElementById('three-images');
    var fourImages = document.getElementById('four-images');
    var sevenImages = document.getElementById('seven-images');
    var tenImages = document.getElementById('ten-images');
    var galleryOptionId = document.getElementById('gallery-option-id');

    var selectedId = selectGalleryType.value;
    var isChanged = false;

    if (!isChanged) {
        updateUIGallery(selectedId);
    }

    selectGalleryType.addEventListener('change', function() {
        // Get the selected value
        selectedId = selectGalleryType.value;
        isChanged = true;
        updateUIGallery(selectedId);
    });

    function updateUIGallery(selectedId) {
        if (selectedId == 1) {
            // 3 images
            threeImages.hidden = false;
            fourImages.hidden = true;
            sevenImages.hidden = true;
            tenImages.hidden = true;

            console.log(selectedId, 'id');
        } else if (selectedId == 2) {
            // 4 images
            threeImages.hidden = true;
            fourImages.hidden = false;
            sevenImages.hidden = true;
            tenImages.hidden = true;

            console.log(selectedId, 'id');
        } else if (selectedId == 3) {
            // 7 images
            threeImages.hidden = true;
            fourImages.hidden = true;
            sevenImages.hidden = false;
            tenImages.hidden = true;

            console.log(selectedId, 'id');
        } else if (selectedId == 4) {
            // 10 images
            threeImages.hidden = true;
            fourImages.hidden = true;
            sevenImages.hidden = true;
            tenImages.hidden = false;

            console.log(selectedId, 'id');
        }
        galleryOptionId.value = selectedId
    }

    function buttonSelectImages(elementId, id) {
        document.getElementById('image-id').value = id
        document.getElementById('image-sequence').value = elementId
        document.getElementById('input-image').click();
    }

    function requestSubmitImage() {
        submitCoverImage();
    }

    function submitCoverImage() {
        document.getElementById('button-submit').click();
    }

    function requestChangeGalleryOption() {
        document.getElementById('button-change-type').click();
    }
</script>