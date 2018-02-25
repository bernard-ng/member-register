<!DOCTYPE html>
<?php require(APP."/Views/includes/watermark.txt"); ?>
<html lang="fr">
<head>
    <?php require(APP."/Views/includes/default-meta.php"); ?>
    <title>SCS MEMBER REGISTER</title>
    <?php require(APP."/Views/includes/default-style.php"); ?>
</head>
<body>
    <?php require(APP."/Views/includes/mobile-menu.php"); ?>
    <?php require(APP."/Views/includes/menu.php");?>
    <?php require(APP."/Views/includes/flash.php"); ?>

    <main>
        <?= $page_content ?>
    </main>

    <?php require(APP."/Views/includes/default-script.php"); ?>
    <script type="text/javascript" src="/assets/js/tinymce/tinymce.min.js"></script>
    <script  type="text/javascript">
    if (tinymce !== undefined) {
        tinymce.init({
            selector:"textarea#content",
            theme: "modern",
            skin: "lightgray",
            width: "100%",
            height: 300,
            statusbar: true,
            relative_urls: false,
            menubar: false,
            toolbar: "styleselect |  bold italic  alignleft aligncenter alignright alignjustify | preview ",
            plugins: [ "link image lists preview inlinepopups" ],
            style_formats: [
                {title : "Titre", items: [
                    {title : "Niveau 1", format: "h2"},
                    {title : "Niveau 2", format: "h3"},
                    {title : "Niveau 3", format: "h4"}
                ]},
                {title: "Inline", items: [
                    {title: "Gras", icon: "bold", format: "bold"},
                    {title: "Italique", icon: "italic", format: "italic"},
                    {title: "Code", icon: "code", format: "code"}
                ]},
                {title: "Blocks", items: [
                    {title: "Paragraphe", format: "p"},
                    {title: "Citation", format: "blockquote"},
                    {title: "Div", format: "div"}
                ]}
            ]
        });
    }
    </script>

<?php require(APP."/Views/includes/footer.php"); ?>
</body>
</html>
