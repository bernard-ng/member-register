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


// Si un administrateur est connecté
$isLogged = isset($_SESSION['isLogged']) ? $_SESSION['isLogged'] : false;


// Connexion à la base de donnée
$db = new PDO("mysql:Host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_password, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);


// Message de validation d'information
$flashMsg = [
    'registration_success' => 'Vos informations ont ...',
    'registration_failed' => 'Oups, une erreur',
    'registration_existe' => 'Ces informations ont été déjà enregistrées',
    'login_success' => 'Vous êtes maintenant connecté',
    'login_failed' => 'Une erreur est survenue lors de la tentive de connexion',
    'logout' => 'vous êtes maintent déconnecté',

    'delete_success' => 'Suppression effectuée',
    'delete_failed' => 'Echec de la suppression',
    'update_success' => 'Données mises à jour',
    'update_failed' => 'Echec de la mise à jour',
    'search_failed' => 'Aucun enregistrement ne correspond à votre recherche',
    'image_upload_failed' => "Votre photo n'a pu être téléchargée, veuillez vérifier
    que c'est bien une image, qu'elle pèse moins de 15mo, si cela se repoduit, 
    essayez avec une autre photo."
];


/**
 * get a msg in the messages array thanks
 * to a key
 *
 * @param string $key
 * @return string|null
 */
function getMsg($key)
{
    global $flashMsg;
    if (array_key_exists($key, $flashMsg)) {
        return $flashMsg[$key];
    } 
    return null;
}



/**
 * redirect to a view file
 *
 * @param string $file
 * @return void
 */
function redirect($file = '') {
    if (empty($file)) {
        header("Location: index.php");
        exit();
    }
    header("Location: form.{$file}.php");
    exit();
}


// Defintion des fonction pour le traitement du formulaire

/**
 * whether data are posted
 *
 * @return boolean
 */
function isPosted()
{
    return isset($_POST) && !empty($_POST);
}


// Definition des fonction pour les message flash


/**
 * set a flash in the session
 *
 * @param string $type
 * @param string $message
 * @return void
 */
function setFlash($type, $message)
{
    $_SESSION['flash'][$type] = $message;
}


/**
 * whether the session has flashes
 *
 * @return boolean
 */
function hasFlashes()
{
    return array_key_exists('flash', $_SESSION);
}


/**
 * unset a flashes in the session
 *
 * @return void
 */
function unsetFlash() {
    unset($_SESSION['flash']);
}


/**
 * redirecte if the user is not 
 * connected
 *
 * @return void
 */
function loggedOnly() {
    global $isLogged;
    if (!$isLogged) {
        redirect("login");
    }
}


/**
 * check if login are correct
 *
 * @param string $name
 * @param string $password
 * @return bool
 */
function checkAuth($name, $password)
{
    $logins = require('auth/logins.php');

    if (in_array($name, $logins['name'])) {
       if (password_verify($password, $logins['password'][$name])) {
           return true;
       }
       return false;
    }
    return false;
}