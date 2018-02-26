<!DOCTYPE html>
<?php require(APP."/Views/includes/watermark.txt"); ?>
<html lang="fr">
<head>
    <?php require(APP."/Views/includes/default-meta.php"); ?>
    <title>SCS MEMBER REGISTER</title>
    <?php require(APP."/Views/includes/default-style.php"); ?>
    <link rel="stylesheet" href="/assets/js/zoombox/zoombox.css">
</head>
<body>
    <?php require(APP."/Views/includes/mobile-menu.php"); ?>
    <?php require(APP."/Views/includes/menu.php");?>
    <?php require(APP."/Views/includes/flash.php"); ?>
    <main>
        <?= $page_content ?>
    </main>
    <?php require(APP."/Views/includes/default-script.php"); ?>

    <script src="/assets/js/zoombox/zoombox.js"></script>
    <script> $("a.zoombox").zoombox(); </script>
    <?php require(APP."/Views/includes/footer.php"); ?>
</body>
</html>
