<?php

use Respect\Validation\Validator as v;

// Validation des données et message d'erreur

$membersDataValidationRules = [
    'name' => v::notEmpty()->min(3)
];


$childrenValidationRules = [

];


$messages = [

];