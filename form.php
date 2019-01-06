<?php require_once('form.process.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulaire d'enregistrement <?= $selectedForm ?> | www.labornelushi.net </title>
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
    <?php if ($selectedForm): ?>
      <div style="margin-bottom: 20px;">
        <a href="?type=" class="btn blue darken-4 white-text">Choix du formulaire</a>
      </div>
    <?php endif; ?>

    <?php if(!$selectedForm): ?>
      <div class="card-panel white grey lighten-4">
        <h3 class="ui header">Choix du formulaire</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
        Optio repudiandae incidunt dolorem expedita fugit quos! Rerum maxime, aliquid reiciendis fuga 
        ipsam eum excepturi animi cupiditate adipisci rem aliquam obcaecati eos.</p>
        <div class="row">
          <a href="?type=membre" class="col s5 btn blue darken-4 white-text">Membres</a>
          <div class="col s2"></div>
          <a href="?type=enfant" class="col s5 btn blue darken-4 white-text">Enfants</a>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($selectedForm): ?>
      <div class="card-panel white grey lighten-4">
        <?php if ($selectedForm === 'membre') : ?>
          <h3 class="ui header">Formulaire d'indentification des membres de l'église la borne lushi</h3>
          <div>
            <form action="" method="post" id="member">
              <input type="hidden" name="type" value="member">
              <div class="row">
                <fieldset>
                  <?= input('matricule', '* Matricule', 'm6 s12 r'); ?>
                  <?= input('numeroCarte', '* N<sup>o</sup> carte de Membre', 'm6 s12 r'); ?>
                  <?= input('prenom', '* Prénom membre', 'm4 s12 r'); ?>
                  <?= input('nom', '* Nom membre', 'm4 s12 r'); ?>
                  <?= input('postnom', '* Postnom', 'm4 s12 r'); ?>
                  <?= input('telephone1', 'Téléphone (1)'); ?>
                  <?= input('telephone2', 'Téléphone (2)'); ?>
                  <?= input('email', 'Adresse Email', 's12', 'email') ?>
                  
                  <?= input('sexe', '* sexe (M ou F)', 's12 r') ?>
                  <?= input('lieuNaissance', '* Lieu de naissance', 'm6 s12 r'); ?>
                  <?= input('dateNaissance', '* Date de naissance', 'm6 s12 r'); ?>

                  <?= input('lieuBapteme', 'Lieu de bapteme', 'm6 s12'); ?>
                  <?= input('dateBapteme', 'Date de bapteme', 'm6 s12'); ?>
                  <?= input('dateAdhesion', "* Date d'adhesion", 's12 r'); ?>
                  <?= input('niveauEtude', "* Niveau d'études", 's12 r'); ?>

                  <?= input('adresse', "* Adresse Physique", 's12 r'); ?>
                  <?= input('ville', "* Ville", 'm4 s12 r'); ?>
                  <?= input('commune', "* Commune", 'm4 s12 r'); ?>
                  <?= input('quartier', "* Quartier", 'm4 s12 r'); ?>
                </fieldset>

                
                <fieldset>
                  <?= input('departement1', 'Departement (1)', 'm4 s12'); ?>
                  <?= input('fonction1', 'Fonction (1)', 'm4 s12'); ?>
                  <?= input('depuis1', 'Depuis le (1)', 'm4 s12'); ?>

                  <?= input('departement2', 'Departement (2)', 'm4 s12'); ?>
                  <?= input('fonction2', 'Fonction (2)', 'm4 s12'); ?>
                  <?= input('depuis2', 'Depuis le (2)', 'm4 s12'); ?>

                  <?= input('formationEglise', 'Formation à l\'église', 's12'); ?>
                  <?= input('autresSavoir', 'Autres savoir-faire', 's12'); ?>
                  <?= input('nomConjoint', 'Nom conjoint(e)', 's12'); ?>
                  <?= input('formationEglise', 'Formation à l\'église', 's12'); ?>
                  <?= input('nombreEnfant', 'Nombre d\'enfant', 's12'); ?>
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

        <?php if ($selectedForm === 'enfant') : ?>
        <h3 class="ui header">Formulaire d'indentification des enfants de l'église la borne lushi</h3>
          <div>
            <form action="" method="post" id="child">
              <input type="hidden" name="type" value="child">
              <div class="row">
                <?= input('matricule', 'Matricule du père'); ?>
                <?= input('numeroCarte', 'N<sup>0</sup> Carte de membre'); ?>
                <?= input('nomsPere', 'Nom / Prénom / Postnom du Père', 's12'); ?>
                <?= input('nomsMere', 'Nom / Prénom / Postnom du Mère', 's12'); ?>

                <?= input('nom', 'Nom de l\'enfant', 'm4 s12'); ?>
                <?= input('prenom', 'Prénom de l\'enfant', 'm4 s12'); ?>
                <?= input('postnom', 'Postnom de l\'enfant', 'm4 s12'); ?>

                <?= input('lieuNaissace', 'Lieu de naissance'); ?>
                <?= input('dateNaissance', 'Date de naissance'); ?>
                <?= input('adresse', 'Adresse complète', 's12'); ?>
                <?= input('commune', 'Commune', 'm6 s12'); ?>
                <?= input('quartier', 'Quartier', 'm6 s12'); ?>

                <?= input('nomEcole', 'Nom de l\'école'); ?>
                <?= input('classe', 'Classe'); ?>
                <?= input('activiteEcole', 'Activité de l\'Ecole'); ?>
                <?= input('activiteEglise', 'Activité à l\'Eglise'); ?>

                <div class="input-field col s12">
                    <label for="remarque">Remarque</label>
                    <textarea name="remarque" id="remarque" class="materialize-textarea"><?= v('remarque'); ?></textarea>
                    <span class="helper-text red-text">
                      <?= e('remarque'); ?>
                    </span>
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
    <?php endif; ?>
    <div class="center-align" style="margin-top: 25px; margin-bottom: 25px;">
      <strong>Developped by <a href="https://github.com/bernard-ng">bernard-ng</a></strong>
    </div>
  </main>
</body>
</html>
