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
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulaire d'enregistrement <?= $selectedForm ?> | www.laborne.com </title>
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
  </style>
</head>
<body class="grey lighten-1">
  <header>
    <nav class="grey darken-3 z-depth-1" style="margin-bottom: 65px;">
      <div class="nav-wrapper container " id="menu">
        <a href="http://www.labornelushi.net" class="brand-logo">
          La Borne
        </a>
        <a href="#" data-activates="mobile-menu" class="button-collapse left">
          <i class="icon icon icon-menu"></i>
        </a>

        <ul class="right hide-on-med-and-down">
          <li class="waves-effect <?= ($selectedForm === 'member') ? 'active' : '' ?>  "><a href="?type=member">Indentification Membre</a></li>
          <li class="waves-effect <?= ($selectedForm === 'child') ? 'active' : '' ?> "><a href="?type=child">Indentification Enfant</a></li>
        </ul>
      </div>
    </nav>
  </header>  

  <main class="container page-content">
    <h1 class="ui header dividing grey-text text-darken-4">
      <strong>Indentification des <?= ($selectedForm == 'member') ? 'membres' : 'enfants' ?></strong>
    </h1>

    <div class="card-panel">
      <?php if ($selectedForm === 'member') : ?>
        <!-- ///////////////// FORMULAIRE D'ENREGISTREMENT DES MEMBRES   ///////////////////// -->
        <div>
          <form action="" method="post" id="member">
            <input type="hidden" name="type" value="member">
            <div class="row">
              <fieldset>
                <legend class="ui header">Informations de base</legend>
                <?= input('matricule', 'Matricule', []); ?>
                <?= input('numeroCarte', 'N<sup>o</sup> carte de Membre', []); ?>

                <?= input('prenom', 'Prénom membre', ['c' => 'm4 s12']) ?>
                <?= input('Nom', 'Nom membre', ['c' => 'm4 s12']) ?>
                <?= input('Postnom', 'Postnom', ['c' => 'm4 s12']) ?>

                <?= input('telephone1', 'Téléphone (1)', []) ?>
                <?= input('telephone2', 'Téléphone (2)', []) ?>

                <?= input('email', 'Adresse Email', ['c' => 's12', 't' => 'email']) ?>
                
                <div class="col l12 m12 s12">
                  <select name="sexe">
                      <option disabled="disabled" selected="selected">choisissez votre sexe</option>
                      <option value="M"><span>M</span></option>
                      <option value="F"><span>F</span></option>
                  </select>
                  <span class="helper-text red-txt"></span>
                </div>

                <?= input('lieuNaissance', 'Lieu de naissance', []); ?>
                <?= input('dateNaissance', 'Date de naissance', []); ?>

                <?= input('lieuBapteme', 'Lieu de bapteme', []); ?>
                <?= input('dateBapteme', 'Date de bapteme', []); ?>
                <?= input('dateAdhesion', "Date d'adhesion", ['c' => 's12']); ?>
                <?= input('niveauEtude', "Niveau d'études", ['c' => 's12']); ?>

                <?= input('adresse', "Adresse Physique", ['c' => 's12']); ?>
                <?= input('ville', "Ville", ['c' => 'm4 s12']); ?>
                <?= input('commune', "Commune", ['c' => 'm4 s12']); ?>
                <?= input('quartier', "Quartier", ['c' => 'm4 s12']); ?>
              </fieldset>

              
              <fieldset>
                <legend class="ui header">Information suplémentaires</legend>

                <?= input('departement1', 'Departement (1)', ['c' => 'm4 s12']); ?>
                <?= input('fonction1', 'Fonction (1)', ['c' => 'm4 s12']); ?>
                <?= input('depuis1', 'Depuis le (1)', ['c' => 'm4 s12']); ?>

                <?= input('departement2', 'Departement (2)', ['c' => 'm4 s12']); ?>
                <?= input('fonction2', 'Fonction (2)', ['c' => 'm4 s12']); ?>
                <?= input('depuis2', 'Depuis le (2)', ['c' => 'm4 s12']); ?>

                <?= input('formationEglise', 'Formation à l\'église', ['c' => 's12']); ?>
                <?= input('autresSavoir', 'Autres savoir-faire', ['c' => 's12']); ?>
                <?= input('nomConjoint', 'Nom conjoint(e)', ['c' => 's12']); ?>
                <?= input('formationEglise', 'Formation à l\'église', ['c' => 's12']); ?>
                <?= input('nombreEnfant', 'Nombre d\'enfant', ['c' => 's12']); ?>
              </fieldset>
            </div>

            <div class="row">
              <button class="btn blue white-text darken-4 waves-effect" style="display: block; width: 100%">
                Envoyer
              </button>
            </div>
          </form>
        </div>
      <?php endif; ?>

      <?php if ($selectedForm === 'child') : ?>
        <!-- ///////////////// FORMULAIRE D'ENREGISTREMENT DES ENFANTS   ///////////////////// -->
        <div>
          <form action="" method="post" id="child">
            <input type="hidden" name="type" value="child">
            <div class="row">
              
              <?= input('matricule', 'Matricule du père'); ?>
              <?= input('numeroCarte', 'N<sup>0</sup> Carte de membre'); ?>
              <?= input('nomsPere', 'Nom / Prénom / Postnom du Père', ['c' => 's12']); ?>
              <?= input('nomsMere', 'Nom / Prénom / Postnom du Mère', ['c' => 's12']); ?>

              <?= input('nom', 'Nom de l\'enfant', ['c' => 'm4 s12']); ?>
              <?= input('prenom', 'Prénom de l\'enfant', ['c' => 'm4 s12']); ?>
              <?= input('postnom', 'Postnom de l\'enfant', ['c' => 'm4 s12']); ?>

              <?= input('lieuNaissace', 'Lieu de naissance'); ?>
              <?= input('dateNaissance', 'Date de naissance'); ?>
              <?= input('adresse', 'Adresse complète', ['c' => 's12']); ?>
              <?= input('commune', 'Commune', ['c' => 'm6 s12']); ?>
              <?= input('quartier', 'Quartier', ['c' => 'm6 s12']); ?>

              <?= input('nomEcole', 'Nom de l\'école'); ?>
              <?= input('classe', 'Classe'); ?>
              <?= input('activiteEcole', 'Activité de l\'Ecole'); ?>
              <?= input('activiteEglise', 'Activité à l\'Eglise'); ?>

              <div class="input-field col s12">
                  <label for="remarque">Remarque</label>
                  <textarea name="remarque" id="remarque" class="materialize-textarea"></textarea>
                  <span class="helper-text red-txt"></span>
              </div>
            </div>

            <div class="row">
              <button class="btn blue white-text darken-4 waves-effect" style="display: block; width: 100%">
                Envoyer
              </button>
            </div>
          </form>
        </div>
      <?php endif; ?>
    </div>
  </main>
  <footer class="page-footer grey darken-3 shadow-2" style="padding-top: 0px;">
      <div class="footer-copyright grey darken-4">
          <div class="container row">
              <span class="right">Copyrights &copy; <?= date("Y") ?></span>
              <span >
                Powered by <a href="https://github.com/bernard-ng" target="_blank">bernard-ng</a>
              </span>
          </div>
      </div>
  </footer>
</body>
</html>
