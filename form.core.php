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
$isLogged = isset($_SESSION['isLogged']) ? boolval($_SESSION['isLogged']) : false;


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
    'login' => 'Vous êtes maintenant connecté',
    'logout' => 'vous êtes maintent déconnecté',

    'delete_success' => 'Suppression effectuée',
    'delete_failed' => 'Echec de la suppression',
    'update_success' => 'Données mises à jour',
    'update_failed' => 'Echec de la mise à jour',
    'search_failed' => 'Aucun enregistrement ne correspond à votre recherche'
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


// définition des fonctions importantes

/**
 * make a query to the database
 *
 * @param string $statement
 * @param array $data
 * @param boolean $fetchAll
 * @return void
 */
function query($statement, $data = [], $fetchAll = true)
{
    global $db;

    try {
        $req = $db->query($statement);

        if ($data) {
            $req->execute($data);
        }

        if (strpos($statement, "INSERT") === 0 ||
            strpos($statement, "DELETE") === 0 ||
            strpos($statement, "UPDATE") === 0
        ) {
            return $req;
        }

        $req->setFetchMode(PDO::FETCH_OBJ);
        $fetchAll ? $req->fetch() : $req->fetchAll();
        return $res;
    } catch (PDOException $e) {
        return null;
    }
}


/**
 * create or save data into the database
 *
 * @param array $data
 * @param string $table
 * @return void
 */
function create($data, $table)
{
    $fields = [];
    $values = [];
    foreach ($data as $k => $v) {
        $fields[] = "{$k} = ?";
        $values[] = $v;
    }
    $fields = implode(', ', $fields);
    return query("INSERT INTO {$table} SET {$fields} ", $values);
}


/**
 * update data in the database
 *
 * @param array $data
 * @param string $table
 * @return void
 */
function update($data, $table)
{
    $fields = [];
    $values = [];
    foreach ($data as $k => $v) {
        $fields[] = "{$k} = ?";
        $values[] = "{$v}";
    }
    $fields = implode(', ', $fields);
    $values[] = $id;
    return query("UPDATE {$table} SET {$fields} WHERE id = ? ", $values);
}


/**
 * delete a data form the database
 *
 * @param int $id
 * @return void
 */
function delete($id)
{
    query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
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
        header("location: form.login.php");
    }
}