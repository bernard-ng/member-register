<?php
  require_once("../src/form.core.php");

  $query = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : false;
  $results = [];
?>
<?php include("../src/include/menu.php"); ?>
<div class="container row" style="margin-top: 64px;">
  <?php if(!$query): ?>
    <div class="card-panel">
      <h3 class="ui header">formulaire de recherche</h3>
      <div class="row">
        <form action="" method="GET">
          <div class="input-field">
            <span class="col l12 m12 s12" style="display: block;" >
              <input name="q" placeholder="recherches..." type="search" class="validate">
            </span>
          </div>
          <br><br><br>
          <div class="col s12">
            <button class="btn blue darken-4" type="submit">Rechercher</button>
          </div>
        </form>
      </div>
    </div>
  <?php endif; ?>
  
  <?php if($query): ?>
    <div class="row col s12">
      <h1 class="ui header">Résultat pour : <?= $query ?></h1>
      <a href="?q=" class="btn blue darken-4">Nouvelle recherche</a>
    </div>
    <?php if (isset($results) && !empty($results)) : ?>
      <?php foreach ($results as $result) : ?>
        <div class="col s12 m3">
          <div class="card grey ligth-2" style="text-align: center;">
            <div class="card-content">
              <span class="card-title" style="text-transform: capitalize;">
                <?= "{$result->nom} {$result->postnom}" ?>
              </span>
              <div style="margin-top: -13px;">
                <?= "{$result->prenom}" ?>
              </div>
            </div>
            <div class="card-action">
              <center>
                <a href="form.dashboard.php?id=3">Voir</a>
                <a href="form.dashboard.php?id=3&action=edit">Editer</a>
              </center>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="col s12 m12">
        <div class="card">
          <div class="card-content">
            <span class="card-title ui header">Aucun Résultat</span>
            <p> Aucun résultat pour : <strong>&quot; <?= $query ?> &quot;</strong> ,
            verifiez l'orthographe puis réessayez.</p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div>
<?php include("../src/include/footer.php"); ?>
