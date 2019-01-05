<?php
require_once("form.core.php");
require_once("vendor/autoload.php");


// Selection du formulaire
$selectedForm = $_GET['type'] ?? 'member';

switch ($selectedForm) {
    case 'member':
    break;


    case 'child':
    break;    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire d'enregistrement <?= $selectedForm ?> | www.laborne.com </title>
</head>
<body>
    <main>
        <?php if ($selectedForm === 'member'): ?>
            <!-- ///////////////// FORMULAIRE D'ENREGISTREMENT DES MEMBRES   ///////////////////// -->
            <div>
                <form action="" method="post">
                
                </form>
            </div>
        <?php endif; ?>



        <?php if ($selectedForm === 'child'): ?>
            <!-- ///////////////// FORMULAIRE D'ENREGISTREMENT DES ENFANTS   ///////////////////// -->
            <div>
                <form action="" method="post">

                </form>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
