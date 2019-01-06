<?php
  require_once("form.core.php");

  $query = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : false;
  $results = [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulaire d'enregistrement <?= (isset($selectedForm))? $selectedForm : '' ?> | www.labornelushi.net </title>
  <link rel="stylesheet" href="http://localhost/local-ressources/materializecss/css/style.css">
  <script src="http://localhost/local-ressources/materializecss/js/bin/materialize.min.js"></script>
  <style>
    .ui.header {
        border: none;
        padding: 0em 0em;
        font-weight: 700;
        line-height: 1.28571429em;
        text-transform: none;
        font-family: Raleway, Roboto, Sans-serif;
    }
    .ui.header:first-child {
        margin-top: -0.14285714em;
    }
    .ui.header:last-child {
        margin-bottom: 0em;
    }
    h1.ui.header {
        font-size: 2rem;
    }
    h2.ui.header {
        font-size: 1.71428571rem;
    }
    h3.ui.header {
        font-size: 1.28571429rem;
    }
    .ui.header:not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) {
        font-size: 1.28571429em;
    }
    main.page-content {
    -webkit-box-flex: 1;
        -ms-flex: 1 0 auto;
        -moz-flex: 1 0 auto;
            flex: 1 0 auto;
    }
    fieldset {
      border: 1px solid transparent; 
      padding: 0; 
      margin: 0;
    }
    .input-field label {
      color: rgba(0,0,0, 0.8);
      opacity: 0.8;
    }
    .input-field.r label {
      color: rgba(0,0,0, 0.8);
      opacity: 0.8;
      font-weight: bold;
    }
  </style>
</head>
<body class="grey lighten-2">
  <header>
    <nav class="grey darken-3 z-depth-1" style="margin-bottom: 65px;">
      <div class="nav-wrapper container " id="menu">
        <a href="http://www.labornelushi.net" class="brand-logo">
          La Borne
        </a>
      </div>
    </nav>
  </header>  

  <main class="container page-content">
    <div class="container row" style="margin-top: 64px;">

    <?php if(!$query): ?>
      <div class="card-panel grey lighten-4">
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
        <a href="?q=" class="btn blue darken-4">rechercher</a>
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
    <div class="center-align" style="margin-top: 25px; margin-bottom: 25px;">
      <strong>Developped by <a href="https://github.com/bernard-ng">bernard-ng</a></strong>
    </div>
  </main>
</body>
</html>
