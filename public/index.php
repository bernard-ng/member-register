<?php require_once('../src/form.process.php'); ?>
<?php include("../src/include/menu.php"); ?>


<?php if(!$selectedForm): ?>
  <div class="card-panel">
    <h3 class="ui header">Choix du formulaire</h3>
    <section class="section">
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
    Optio repudiandae incidunt dolorem expedita fugit quos! Rerum maxime, aliquid reiciendis fuga 
    ipsam eum excepturi animi cupiditate adipisci rem aliquam obcaecati eos.</p>
    </section>
    <div class="divider"></div>
    <div class="row">
      <a href="?type=membre" class="col s5 btn grey darken-3 white-text">Adultes</a>
      <div class="col s2"></div>
      <a href="?type=enfant" class="col s5 btn grey darken-3 white-text">Enfants</a>
    </div>
  </div>
<?php endif; ?>

<?php if ($selectedForm): ?>
  <div class="card-panel">
    <?php if ($selectedForm === 'membre') : ?>
      <h3 class="ui header">Formulaire d'indentification des membres de l'église la borne lushi</h3>
      <div>
        <form action="" method="post" id="member" enctype="multipart/form-data">
          <div class="row">
            <fieldset>

            <div class="file-field input-field col s12">
              <span class="btn blue-grey darken-1 waves-effect waves-light col s4 m4 l4" style="display: inline-block;">
                  <span>Choisier une Photo</span>
                  <input type="file" name="image" accept="image">
              </span>
              <span class="file-path-wrapper col s8 l8 m8" style="display: inline-block;" >
                  <input class="file-path" placeholder="..." type="text">
              </span>
              <span class="helper-text red-text">
                <?= e('image'); ?>
              </span>
            </div>

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
              <?= input('nombreEnfant', 'Nombre d\'enfant', 's12'); ?>
            </fieldset>
          </div>

          <div class="row">
            <button class="btn blue white-text darken-3 waves-effect" style="display: block; width: 100%">
              Envoyer
            </button>
          </div>
        </form>
      </div>
    <?php endif; ?>

    <?php if ($selectedForm === 'enfant') : ?>
    <h3 class="ui header">Formulaire d'indentification des enfants de l'église la borne lushi</h3>
      <div>
        <form action="" method="post" id="child" enctype="multipart/form-data">
          <div class="row">

            <div class="file-field input-field col s12">
              <span class="btn blue-grey darken-1 waves-effect waves-light col s4 m4 l4" style="display: inline-block;">
                  <span>Choisier une Photo</span>
                  <input type="file" name="image">
              </span>
              <span class="file-path-wrapper col s8 l8 m8" style="display: inline-block;" >
                  <input class="file-path" placeholder="..." type="text">
              </span>
              <div data-action="show-uploaded-file"></div>
            </div>

            <?= input('matricule', 'Matricule du père'); ?>
            <?= input('numeroCarte', 'N<sup>0</sup> Carte de membre'); ?>
            <?= input('nomsPere', 'Nom / Prénom / Postnom du Père', 's12'); ?>
            <?= input('nomsMere', 'Nom / Prénom / Postnom du Mère', 's12'); ?>

            <?= input('nom', 'Nom de l\'enfant', 'm4 s12'); ?>
            <?= input('prenom', 'Prénom de l\'enfant', 'm4 s12'); ?>
            <?= input('postnom', 'Postnom de l\'enfant', 'm4 s12'); ?>

            <?= input('lieuNaissance', 'Lieu de naissance'); ?>
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
                <textarea 
                  name="remarque" 
                  id="remarque" 
                  class="materialize-textarea validate <?= (empty(e('remarque'))) ? (empty('remarque'))? '' : 'valid' : 'invalid' ?>"
                  ><?= v('remarque'); ?></textarea>
                <span class="helper-text red-text">
                  <?= e('remarque'); ?>
                </span>
            </div>
          </div>

          <div class="row">
            <button class="btn blue white-text darken-3 waves-effect" style="display: block; width: 100%">
              Envoyer
            </button>
          </div>
        </form>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
<?php include("../src/include/footer.php"); ?>