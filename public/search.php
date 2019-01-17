<?php
require_once("../src/core.php");
require_once(ROOT . "/src/database.php");

$query = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : false;
$adults = search($query, 'adults');
$children = search($query, 'children');

if (empty($children) && empty($adults)) {
  setFlash('warning', getMsg('search_failed'));
}


?>
<?php include(ROOT . "src/include/menu.php"); ?>
<section class="row">
<?php if (!$query) : ?>
  <div class="card-panel">
    <h3 class="ui header">formulaire de recherche</h3>
    <section class="section">
    <p><?= getText('form.search'); ?></p>
    </section>
    <div class="row">
      <form action="" method="GET">
        <div class="input-field">
          <span class="col l12 m12 s12" style="display: block;" >
            <input name="q" placeholder="recherches..." type="search" class="validate">
          </span>
        </div>
        <br><br><br>
        <div class="col s12">
          <button class="btn blue" type="submit">Rechercher</button>
        </div>
      </form>
    </div>
  </div>
<?php endif; ?>
  
<?php if ($query) : ?>
  <?php if (isset($adults) && !empty($adults) || isset($children) && !empty($children)) : ?>
    <div class="col s12" style="margin-top: 2em;">
      <div class="row col s12 white-text">
        <h1 class="ui header">Résultat pour : " <?= $query ?> "</h1>
      </div>

      <?php if (isset($adults) && !empty($adults)) : ?>
        <div class="row">
          <div class="col s12">
            <h3 class="ui header">Adultes</h3>
          </div>
          <div class="divider"></div>
          <?php foreach ($adults as $adult) : ?>
            <div class="col s12 m3">
              <div class="card" style="text-align: center;">
                <div class="card-image">
                  <img src="<?= $adult->imageUrl ?>" alt="">
                </div>
                <div class="card-content">
                  <span class="card-title" style="text-transform: capitalize;">
                    <?= "{$adult->nom} {$adult->postnom}" ?>
                  </span>
                  <div style="margin-top: -13px;">
                    <?= "{$adult->prenom}" ?>
                  </div>
                </div>
                <div class="card-action">
                  <center>
                    <a href="dashboard.php?id=<?= $adult->id ?>&list=adult">Voir</a>
                    <a href="dashboard.php?id=<?= $adult->id ?>&list=adult&action=edit">Editer</a>
                  </center>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    
      <?php if (isset($children) && !empty($children)) : ?>
        <div class="row">
          <div class="col s12">
            <h3 class="ui header">Enfants</h3>
          </div>
          <div class="divider"></div>
          <?php foreach ($children as $child) : ?>
            <div class="col s12 m3">
              <div class="card" style="text-align: center;">
                <div class="card-image">
                  <img src="<?= $child->imageUrl ?>" alt="">
                </div>
                <div class="card-content">
                  <span class="card-title" style="text-transform: capitalize;">
                    <?= "{$child->nom} {$child->postnom}" ?>
                  </span>
                  <div style="margin-top: -13px;">
                    <?= "{$child->prenom}" ?>
                  </div>
                </div>
                <div class="card-action">
                  <center>
                    <a href="dashboard.php?id=<?= $child->id ?>&list=children">Voir</a>
                    <a href="dashboard.php?id=<?= $child->id ?>&list=children&action=edit">Editer</a>
                  </center>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php else : ?>
    <div class="card">
      <div class="card-content">
        <span class="card-title ui header">Aucun Résultat</span>
        <p> Aucun résultat pour : <strong>&quot; <?= $query ?> &quot;</strong> ,verifiez l'orthographe puis réessayez.
        <br>les mots de moins de 3 caractères sont ignorés par la recherche.</p>
        <div class="divider"></div>
        <a href="?q=" class="btn blue">Nouvelle recherche</a>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
</section>
<?php include(ROOT . "src/include/footer.php"); ?>
