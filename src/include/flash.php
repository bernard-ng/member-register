<?php if (hasFlashes()): ?>
    <?php foreach(getFlashes() as $type => $message): ?>
        <script>
            Materialize.toast("<?= $message ?>", 5000, "<?= $type ?>");
        </script>
    <?php endforeach; ?>
    <?php unsetFlash(); ?>
<?php endif; ?>