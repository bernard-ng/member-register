<?php

use Respect\Validation\Validator as v;

// validation rules for members indentification
$membersDataValidationRules = [
    'matricule'         => v::notEmpty()->numeric()->setName('Le Matricule'),
    'numeroCarte'       => v::notEmpty()->numeric()->setName('Le Numéro de carte'),

    'prenom'            => v::notEmpty()->setName('Le Prénom'),
    'nom'               => v::notEmpty()->setName('Le nom'),
    'postnom'           => v::notEmpty()->setName('Le postenom'),
    'telephone1'        => v::optional(v::phone())->setName('Le Téléphone1'),
    'telephone2'        => v::optional(v::phone())->setName('Le Téléphone2'),
    'sexe'              => v::notEmpty()->setName('Le sexe'),
    'email'             => v::optional(v::email())->setName('L\'Email'),
    'lieuNaissance'     => v::notEmpty()->notBlank()->setName('Le lieu de naissance'),
    'dateNaissance'     => v::notEmpty()->date()->setName('La date de naissance'),
    'lieuBapteme'       => v::optional(v::notBlank())->setName('Le lieu de bapteme'),
    'dateBapteme'       => v::optional(v::date())->setName('La date de bapteme'),
    'dateAdhesion'      => v::notEmpty()->date()->setName('La date d\'adhesion'),
    'niveauEtude'       => v::notEmpty()->notBlank()->setName('le niveau d\'étude'),
    'adresse'           => v::notEmpty()->notBlank()->setName('L\'adresse'),
    'ville'             => v::notEmpty()->notBlank()->setName('La ville'),
    'commune'           => v::notEmpty()->notBlank()->setName('La commune'),
    'quartier'          => v::notEmpty()->notBlank()->setName('Le quartier'),

    'departement1'      => v::optional(v::notBlank())->setName('Le departement (1)'),
    'departement2'      => v::optional(v::notBlank())->setName('Le departement (2)'),
    'fonction1'         => v::optional(v::notBlank())->setName('La fonction (1)'),
    'fonction2'         => v::optional(v::notBlank())->setName('La fonction (2)'),
    'depuis1'           => v::optional(v::date())->setName('Depuis le (1)'),
    'depuis2'           => v::optional(v::date())->setName('Depuis le (2)'),

    'formationEglise'   => v::optional(v::notBlank())->setName('Formation à l\'église'),
    'autresSavoir'      => v::optional(v::notBlank())->setName('Autres savoir-faire'),
    'nomConjoint'       => v::optional(v::notBlank())->setName('Nom conjoint(e)'),
    'nombreEnfant'      => v::optional(v::numeric())->setName('Nombre d\'enfant')
];


// Validation rules for children indentification
$childrenValidationRules = [
    'matricule'         => $membersDataValidationRules['matricule'],
    'numeroCarte'       => $membersDataValidationRules['numeroCarte'],
    'nomsPere'          => v::notEmpty()->setName('Noms du père'),
    'nomsMere'          => v::notEmpty()->setName('Noms de la Mère'),
    'nom'               => $membersDataValidationRules['nom'],
    'prenom'            => $membersDataValidationRules['prenom'],
    'postnom'           => $membersDataValidationRules['postnom'],
    'lieuNaissace'      => $membersDataValidationRules['lieuNaissance'],
    'dateNaissance'     => $membersDataValidationRules['dateNaissance'],
    'adresse'           => $membersDataValidationRules['adresse'],
    'commune'           => $membersDataValidationRules['commune'],
    'quartier'          => $membersDataValidationRules['quartier'],
    'nomEcole'          => v::optional(v::notBlank())->setName('Nom de l\'école'),
    'classe'            => v::optional(v::notBlank())->setName('classe'),
    'activiteEcole'     => v::optional(v::notBlank())->setName('activités à l\'école'),
    'activiteEglise'    => v::optional(v::notBlank())->setName('activités à l\'église'),
    'remarque'          => v::notEmpty()->setName('la remarque')
];


$messages = [

];