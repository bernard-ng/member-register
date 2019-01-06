<?php
require_once("form.core.php");
require_once("form.process.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulaire d'enregistrement <?= (isset($selectedForm)) ? $selectedForm : '' ?> | www.labornelushi.net </title>
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
    <div class="card-panel row" style="max-width: 500px; margin: 0 auto;">
      <h3 class="ui header">formulaire de connexion</h3>
      <form action="" method="post">
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
    <div class="center-align" style="margin-top: 25px; margin-bottom: 25px;">
      <strong>Developped by <a href="https://github.com/bernard-ng">bernard-ng</a></strong>
    </div>
  </main>
</body>
</html>
