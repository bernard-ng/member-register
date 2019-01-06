<?php require_once('form.process.php'); ?>
<?php include("inc/menu.php"); ?>
<?php if ($selectedForm): ?>
  <div style="margin-bottom: 20px;">
    <a href="?type=" class="btn blue darken-4 white-text">Choix du formulaire</a>
  </div>
<?php endif; ?>

<?php if(!$selectedForm): ?>
  <div class="card-panel">
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
  <div class="card-panel">
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
<?php include("inc/footer.php"); ?>