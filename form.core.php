<?php

// Information de connexion à la base de donnée
$db_user = "root";
$db_password = "";
$db_host = "localhost";
$db_name = "church_members";


// Demarrage de la session
if (session_status() === PHP_SESSION_NONE) {
    session_name('ng_member_register');
    session_start();
}


// Connexion à la base de donnée
$db = new PDO("mysql:Host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);


// Message de validation d'information
$errorMsg = [
    'required' => 'Ce champ est obligatoire'
];


// définition des fonctions importantes

/**
 * get a msg in the messages array thanks
 * to a key
 *
 * @param string $key
 * @return string
 */
function getMsg($key)
{
    global $errorMsg;
    if (array_key_exists($key, $errorMsg)) {
        return $errorMsg[$key];
    } else {
        return "Ce champ a été mal complété";
    }
}


/**
 * HTML form helper
 *
 * @param string $name
 * @param string $label
 * @param array $params
 * @return string
 */
function input($name, $label, $params = [])
{
    $type = isset($params['t']) ? $params['t'] : 'text';
    $class = isset($params['c']) ? $params['c'] : 'l6 m6 s12';
    $error = isset($params['e']) ? $params['e'] : '';
    $value = htmlspecialchars(isset($params['v']) ? $params['v'] : '');

    $form = <<< FORM
<div class="input-field col {$class}">
    <label for="{$name}">{$label}</label>
    <input type="{$type}" name="{$name}" id="{$name}" value="{$value}">
    <span class="helper-text red-text">
        {$error}
    </span>
</div>
FORM;

    return $form;
}