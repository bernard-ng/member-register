<?php

use Awurth\SlimValidation\Validator;

require_once("../vendor/autoload.php");
require_once("form.core.php");
require_once("form.validation.php");


// Helper functions

/**
 * print validation errors
 *
 * @param string $key
 * @return string|null
 */
function e ($key) {
  global $errors;
  if (array_key_exists($key, $errors)) {
    return htmlspecialchars(
      (is_array($errors[$key])) ? implode(", ", $errors[$key]) : $errors[$key]
    );
  }
  return null;
};


/**
 * get old set value
 *
 * @param string $key
 * @return string|null
 */
function v ($key) {
  if (isset($_POST[$key]) && !empty($_POST[$key])) {
    return htmlentities($_POST[$key]);
  }
  return null;
};


/**
 * HTML form helper
 *
 * @param string $name
 * @param string $label
 * @param array $params
 * @return string
 */
function input($name, $label, $class = 'l6 m6 s12', $type = 'text')
{
    $error = e($name);
    $value = v($name);
    $validate = (empty($error)) ? (empty($value))? '' : 'valid' : 'invalid'  ;

    $input = <<< INPUT
<div class="input-field col {$class}">
  <label for="{$name}">{$label}</label>
  <input type="{$type}" name="{$name}" id="{$name}" value="{$value}" class="validate {$validate}">
  <span class="helper-text red-text">
      {$error}
  </span>
</div>
INPUT;

  return $input;
}



// Selection du formulaire et definition de la table d'enregistrement
$selectedForm = (isset($_GET['type'])) ? strval($_GET['type']) : false;
$selectedFormType = ($selectedForm) ? "des {$selectedForm}s" : '';
$errors = [];

if ($selectedForm) {
  switch ($selectedForm) {
    case 'membre':
      $tableName = 'id_members';
      $rules = $membersDataValidationRules;
      break;
  
    case 'enfant':
      $tableName = 'id_children';
      $rules = $childrenValidationRules;
      break;
  }

  if (isPosted()) {
    $v = (new Validator(false))->validate($_POST, $rules);

    if ($v->isValid()) {
      die('ok');
    } else {
      $errors = $v->getErrors();
      setFlash('error', getMsg('registration_failed'));
    }
  }
}



// Action to process and predefined action
$action = (isset($_GET['action'])) ? strval($_GET['action']) : false;
$actions = [
  'login',
  'logout',
  'search',
  'delete',
  'update'
];


if ($action && in_array($action, $actions)) {
  switch ($action) {
    case 'login' :
      $v = (new Validator(false))->validate($_POST, $loginDataValidationRules);
      
      if ($v->isValid()) {
        $name = strval($_POST['nom']);
        $password = strval($_POST['password']);
        $isAuthentified = checkAuth($_POST['nom'], $_POST['password']);

        if ($isAuthentified) {
          $_SESSION['isLogged'] = compact('name', 'password');
          setFlash('success', getMsg('login_success'));
          redirect('dashboard');
        }

        $errors = [
          'nom' => 'Identifiant incorrecte',
          'password' => 'Identifiant incorrecte'
        ];
        setFlash('error', getMsg('login_failed'));
      } else {
        $errors = $v->getErrors();
        setFlash('error', getMsg('login_failed'));
      }
    break;

    case 'logout' :
      unset($_SESSION['isLogged']);
      redirect('login');
      break;
  }
}