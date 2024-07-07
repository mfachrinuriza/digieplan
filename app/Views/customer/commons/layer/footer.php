    </div>
    <!-- Libs JS -->
    <script src="<?= base_url(''); ?>/dist/libs/apexcharts/dist/apexcharts.min.js?1674944402" defer></script>
    <script src="<?= base_url(''); ?>/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402" defer></script>
    <script src="<?= base_url(''); ?>/dist/libs/jsvectormap/dist/maps/world.js?1674944402" defer></script>
    <script src="<?= base_url(''); ?>/dist/libs/jsvectormap/dist/maps/world-merc.js?1674944402" defer></script>
    <script src="<?= base_url(''); ?>/dist/libs/dropzone/dist/dropzone-min.js?1689676810" defer></script>
    <!-- Tabler Core -->
    <script src="<?= base_url(''); ?>/dist/js/tabler.min.js" defer></script>
    <script src="<?= base_url(''); ?>/dist/js/demo.min.js" defer></script>
    <script src="<?= base_url(''); ?>/dist/js/ui-logic.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?= base_url(''); ?>/dist/js/demo-theme.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script>
    </script>
    <?php
    if ($title == getenv('TITLE_GUEST_BOOK') || $title == getenv('TITLE_GUEST')) {
      echo view('customer/commons/layer/footer/footer_datatable');
      echo view('customer/commons/layer/footer/footer_guest_filter');
    } else if ($sub_title == getenv('SUBTITLE_GENERAL')) {
      echo view('customer/commons/layer/footer/footer_music');
      echo view('customer/commons/layer/footer/footer_prays');
    } else if ($sub_title == getenv('SUBTITLE_GIFT')) {
      echo view('customer/commons/layer/footer/footer_gift');
    } else if ($sub_title == getenv('SUBTITLE_STORY')) {
      echo view('customer/commons/layer/footer/footer_story');
    } else if ($sub_title == getenv('SUBTITLE_MAIN_PAGE') || $sub_title == getenv('SUBTITLE_LOVE_STORY')) {
      echo view('customer/commons/layer/footer/footer_dropzone');
    } else if ($sub_title == getenv('SUBTITLE_GALLERY') || $title == getenv('TITLE_THEME')) {
      echo view('customer/commons/layer/footer/footer_dropzone');
      echo view('customer/commons/layer/footer/footer_gallery');
    } else if ($sub_title == getenv('SUBTITLE_PROFILE')) {
      echo view('customer/commons/layer/footer/footer_dropzone');
    }
    ?>
    </body>

    </html>

    <?php if (isset(session()->success)) : ?>
      <script>
        Swal.fire({
          title: 'Berhasil',
          text: "<?= session()->success ?>",
          icon: 'success'
        });
      </script>
    <?php endif; ?>

    <?php if (isset(session()->warning)) : ?>
      <script>
        Swal.fire({
          title: 'Perhatian!',
          text: "<?= session()->warning ?>",
          icon: 'warning'
        });
      </script>
    <?php endif; ?>

    <?php if (isset(session()->error)) : ?>
      <script>
        Swal.fire({
          title: 'Gagal!',
          text: "<?= session()->error ?>",
          icon: 'error'
        });
      </script>
    <?php endif; ?>
    <script>
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('.tooltiptext'))
      var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    </script>