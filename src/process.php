<?php

use Awurth\SlimValidation\Validator;

require_once("../vendor/autoload.php");
require_once("core.php");
require_once("validation.php");


/**
 * form helpers function
 */
form_helpers : {

  /**
   * print validation errors
   *
   * @param string $key
   * @return string|null
   */
  function e($key)
  {
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
  function v($key)
  {
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
    $validate = (empty($error)) ? (empty($value)) ? '' : 'valid' : 'invalid';

    $input ="<div class='input-field col {$class}'>
      <label for='{$name}'>{$label}</label>
      <input type='{$type}' name='{$name}' id='{$name}' value='{$value}' class='validate {$validate}'>
      <span class='helper-text red-text'>
          {$error}
      </span>
    </div>";

    return $input;
  }


  /**
   * genereate input for update
   *
   * @param string $name
   * @param string $label
   * @param string $class
   * @param string $type
   * @return string
   */
  function inputUpdate($value, $name, $label, $class = 'l6 m6 s12', $type = 'text')
  {
    $error = e($name);
    $value = (v($name)) ? v($name) : $value;
    $validate = (empty($error)) ? (empty($value)) ? '' : 'valid' : 'invalid';

    $input = "<div class='input-field col {$class}'>
      <label for='{$name}'>{$label}</label>
      <input type='{$type}' name='{$name}' id='{$name}' value='{$value}' class='validate {$validate}'>
      <span class='helper-text red-text'>
          {$error}
      </span>
    </div>";

    return $input;
  }
}


/**
 * Main part of the app, the registration block
 */
form_registration_process : {

  // Selection du formulaire et definition de la table d'enregistrement
  $type = isset($_GET['type']) ? htmlspecialchars(strval($_GET['type'])) : false;
  $types = ['adult', 'children'];
  $selectedForm = ($type && in_array($type, $types)) ? $type : false;
  $selectedFormType = ($selectedForm) ? "des {$selectedForm}s" : '';
  $errors = [];

  if ($selectedForm) {
    switch ($selectedForm) {
      case 'adult':
        $table = 'adults';
        $rules = $adultsDataValidationRules;
        break;

      case 'children':
        $table = 'children';
        $rules = $childrenValidationRules;
        break;
    }

    if (isPosted()) {
      global $db;
      require_once("image.php");
      require_once("database.php");

      $v = (new Validator(false))->validate($_POST, $rules);

      if ($v->isValid()) {
        $data = function ($post) {
          $data = [];
          foreach ($post as $k => $v) {
            $data[$k] = (empty($v)) ? null : htmlspecialchars(strval($v));
          }
          return $data;
        };

        // file upload process
        if (hasUpload('image')) {
          $imageName = uniqid('laborne_');
          $imageUrl = "images/{$table}/{$imageName}.jpg";
          create(array_merge($data($_POST), compact('imageUrl')), $table);
          $id = $db()->lastInsertId();

          $isUploaded = upload($_FILES['image'], $table, $imageName);

          if ($isUploaded) {
            setFlash('success', getMsg('registration_success'));
            redirect();
          } else {
            delete($id, $table);
            $errors = ['image' => getMsg('image_upload_failed')];
          }
        } else {
          $errors = ['image' => getMsg('image_required')];
        }
      } else {
        $errors = $v->getErrors();
        setFlash('danger', getMsg('registration_failed'));
      }
    }
  }
}


/**
 * Main application f
 */
app_process : {

  // Action to process and predefined action
  $action = (isset($_GET['action'])) ? strval($_GET['action']) : false;
  $actions = ['login', 'logout', 'delete', 'update', 'edit'];


  if ($action && in_array($action, $actions)) {
    switch ($action) {
      case 'login':
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
          setFlash('danger', getMsg('login_failed'));
        } else {
          $errors = $v->getErrors();
          setFlash('danger', getMsg('login_failed'));
        }
        break;

      case 'logout':
        unset($_SESSION['isLogged']);
        setFlash('success', getMsg('logout'));
        redirect('login');
        break;

      case 'delete':
        if (isPosted()) {
          $id = (isset($_POST['id'])) ? intval($_POST['id']) : false;
          $type = (isset($_POST['type'])) ? strval($_POST['type']) : false;

          if ($id && $type && in_array($type, ['adults', 'children'])) {
            $exist = find($id, $type);

            if ($exist) {
              delete($id, $type);
              setFlash('success', getMsg('delete_success'));
            }

            setFlash('danger', getMsg('delete_failed'));
          }
        }
        break;

      case 'edit':
        $_SESSION['data'] = [
          'type' => (isset($_GET['list'])) ? strval($_GET['list']) : false,
          'id' => (isset($_GET['id'])) ? intval($_GET['id']) : false
        ];
        redirect('edit');
        break;

      case 'update':
        if (isPosted()) {

        }
        break;
    }
  }
}
