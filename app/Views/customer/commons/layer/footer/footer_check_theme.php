<script> 
    //request sidebar
    document.addEventListener("DOMContentLoaded", function() {
        const sidebarMainPage = document.getElementById("sidebarMainPage");
        const sidebarLoveStory = document.getElementById("sidebarLoveStory");
        const sidebarProfile = document.getElementById("sidebarProfile");
        const sidebarGallery = document.getElementById("sidebarGallery");
        const sidebarGift = document.getElementById("sidebarGift");

        sidebarMainPage.addEventListener("click", function() {
            var hasThemeSelected = <?= $hasThemeSelected ?>

            if (hasThemeSelected) {
                window.location.href = <?= base_url('customer/kelola-konten-undangan/halaman-utama'); ?>;
            } else {
                
            }
        })
    })
</script>