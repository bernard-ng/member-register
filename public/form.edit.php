<?php
require_once("../src/form.core.php");
require_once("../src/form.database.php");
require_once("../src/form.process.php");

loggedOnly();

if (isset($_SESSION['data']) && !empty($_SESSION['data'])) {
    $id = $_SESSION['data']['id'];
    $type = $_SESSION['data']['type'];

    switch ($type) {
        case 'membre':
        $table = 'members';
        break;
    
        case 'enfant':
        $table = 'children';
        break;
    }

    $r = find($id, $table);
} else {
    setFlash('error', getMsg('failed'));
    redirect('dashboard');
}
?>
<?php include('../src/inc/menu.php') ?>
    <div class="row">
        <div class="col l4">
            <div class="card-panel">
                <h3 class="ui header"><?= $r->nom ?></h3>
                <ul class="collection">
                    <?php foreach($r as $k => $v): ?>
                        <li class="collection-item"><strong><?= $k ?></strong> : <?= $v ?></li>
                    <?php endforeach; ?>
                </ul>
                <button class="btn blue darken-4">Télécharger (.csv)</button>
            </div>
        </div>

        <div class="col l8">
            <div class="card-panel">
                <h3 class="ui header">Formulaire d'édition</h3>

                <form action="" method="post" id="member" enctype="multipart/form-data">
                <div class="row">
                    <fieldset>
                        <?= inputUpdate($r->matricule, 'matricule', '* Matricule', 'm6 s12 r'); ?>
                        <?= inputUpdate($r->numeroCarte, 'numeroCarte', '* N<sup>o</sup> carte de Membre', 'm6 s12 r'); ?>
                        <?= inputUpdate($r->prenom, 'prenom', '* Prénom membre', 'm4 s12 r'); ?>
                        <?= inputUpdate($r->nom,'nom', '* Nom membre', 'm4 s12 r'); ?>
                        <?= inputUpdate($r->postnom, 'postnom', '* Postnom', 'm4 s12 r'); ?>
                        <?= inputUpdate($r->telephone1, 'telephone1', 'Téléphone (1)'); ?>
                        <?= inputUpdate($r->telephone2, 'telephone2', 'Téléphone (2)'); ?>
                        <?= inputUpdate($r->email, 'email', 'Adresse Email', 's12', 'email') ?>
                        
                        <?= inputUpdate($r->sexe, 'sexe', '* sexe (M ou F)', 's12 r') ?>
                        <?= inputUpdate($r->lieuNaissance, 'lieuNaissance', '* Lieu de naissance', 'm6 s12 r'); ?>
                        <?= inputUpdate($r->dateNaissance, 'dateNaissance', '* Date de naissance', 'm6 s12 r'); ?>

                        <?= inputUpdate($r->lieuBapteme, 'lieuBapteme', 'Lieu de bapteme', 'm6 s12'); ?>
                        <?= inputUpdate($r->dateBapteme, 'dateBapteme', 'Date de bapteme', 'm6 s12'); ?>
                        <?= inputUpdate($r->dateAdhesion,'dateAdhesion', "* Date d'adhesion", 's12 r'); ?>
                        <?= inputUpdate($r->niveauEtude, 'niveauEtude', "* Niveau d'études", 's12 r'); ?>

                        <?= inputUpdate($r->adresse, 'adresse', "* Adresse Physique", 's12 r'); ?>
                        <?= inputUpdate($r->ville, 'ville', "* Ville", 'm4 s12 r'); ?>
                        <?= inputUpdate($r->commune, 'commune', "* Commune", 'm4 s12 r'); ?>
                        <?= inputUpdate($r->quartier, 'quartier', "* Quartier", 'm4 s12 r'); ?>
                    </fieldset>

                    <fieldset>
                        <?= inputUpdate($r->departement1, 'departement1', 'Departement (1)', 'm4 s12'); ?>
                        <?= inputUpdate($r->fonction1, 'fonction1', 'Fonction (1)', 'm4 s12'); ?>
                        <?= inputUpdate($r->depuis1, 'depuis1', 'Depuis le (1)', 'm4 s12'); ?>

                        <?= inputUpdate($r->departement2, 'departement2', 'Departement (2)', 'm4 s12'); ?>
                        <?= inputUpdate($r->fonction2, 'fonction2', 'Fonction (2)', 'm4 s12'); ?>
                        <?= inputUpdate($r->depuis2, 'depuis2', 'Depuis le (2)', 'm4 s12'); ?>

                        <?= inputUpdate($r->formationEglise, 'formationEglise', 'Formation à l\'église', 's12'); ?>
                        <?= inputUpdate($r->autresSavoir, 'autresSavoir', 'Autres savoir-faire', 's12'); ?>
                        <?= inputUpdate($r->nomConjoint, 'nomConjoint', 'Nom conjoint(e)', 's12'); ?>
                        <?= inputUpdate($r->nombreEnfant, 'nombreEnfant', 'Nombre d\'enfant', 's12'); ?>
                    </fieldset>
                </div>

                <div class="row">
                    <button class="btn blue white-text darken-4 waves-effect" style="display: block; width: 100%">
                    Envoyer
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php include('../src/inc/footer.php'); ?>