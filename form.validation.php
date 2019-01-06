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
    'email'             => v::optional(v::email())->setName('l\'Email'),
    'lieuNaissance'     => v::notEmpty()->notBlank()->setName('Le lieu de naissance'),
    'dateNaissance'     => v::notEmpty()->date()->setName('La date de naissance'),
    'lieuBapteme'       => v::optional(v::notBlank())->setName('Le lieu de bapteme'),
    'dateBapteme'       => v::optional(v::date())->setName('La date de bapteme'),
    'dateAdhesion'      => v::notEmpty()->date()->setName('La date d\'adhesion'),
    'niveauEtude'       => v::notEmpty()->notBlank(),
    'adresse'           => v::notEmpty()->notBlank(),
    'ville'             => v::notEmpty()->notBlank(),
    'commune'           => v::notEmpty()->notBlank(),
    'quartier'          => v::notEmpty()->notBlank(),
    'departement1'      => v::notBlank(),
    'departement2'      => v::notBlank(),
    'fonction1'         => v::notBlank(),
    'fonction2'         => v::notBlank(),
    'depuis1'           => v::date(),
    'depuis2'           => v::date(),
    'formationEglise'   => v::notBlank(),
    'autresSavoir'      => v::notBlank(),
    'nomConjoint'       => v::notBlank(),
    'nombreEnfant'      => v::numeric()
];


// Validation rules for children indentification
$childrenValidationRules = [
    'matricule'         => $membersDataValidationRules['matricule'],
    'numeroCarte'       => $membersDataValidationRules['numeroCarte'],
    'nomsPere'          => v::notEmpty()->notBlank(),
    'nom'               => $membersDataValidationRules['nom'],
    'prenom'            => $membersDataValidationRules['prenom'],
    'postnom'           => $membersDataValidationRules['postnom'],
    'lieuNaissace'      => $membersDataValidationRules['lieuNaissance'],
    'dateNaissance'     => $membersDataValidationRules['dateNaissance'],
    'adresse'           => $membersDataValidationRules['adresse'],
    'commune'           => $membersDataValidationRules['commune'],
    'quartier'          => $membersDataValidationRules['quartier'],
    'nomEcole'          => v::notBlank(),
    'classe'            => v::notBlank(),
    'activiteEcole'     => v::notBlank(),
    'activiteEglise'    => v::notBlank(),
    'remarque'          => v::notEmpty()->notBlank()->min(10)
];


$messages = [

];