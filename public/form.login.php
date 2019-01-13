<?php
require_once("../src/form.core.php");
require_once("../src/form.process.php");

?>
<?php include("../src/include/menu.php"); ?>
<div class="card-panel row" style="max-width: 500px; margin: 0.5rem auto;">
  <h3 class="ui header">formulaire de connexion</h3>
  <form action="?action=login" method="post">
    <?= input('nom', 'Nom', 's12'); ?>
    <?= input('password', 'Mot de passe', 's12', 'password'); ?>

    <div class="row">
      <button class="btn blue white-text darken-4 waves-effect" style="display: block; width: 100%">
        Envoyer
      </button>
    </div>
  </form>
</div>
</div>
<?php include("../src/include/footer.php"); ?>
