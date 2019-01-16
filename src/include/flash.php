<?php if (hasFlashes()): ?>
    <?php foreach(getFlashes() as $type => $message): ?>
        <script>
            Materialize.toast("<?= $message ?>", 4000, "<?= $type ?>");
        </script>
    <?php endforeach; ?>
    <?php unsetFlash(); ?>
<?php endif; ?>