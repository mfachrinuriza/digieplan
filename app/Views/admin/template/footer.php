<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="<?= base_url('') ?>/dist/js/tabler.min.js" defer></script>
<script src="<?= base_url('') ?>/dist/js/demo.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (isset(session()->success)) : ?>
    <script>
        Swal.fire({
            title: 'Berhasil',
            text: "<?= session()->success ?>",
            icon: 'success'
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