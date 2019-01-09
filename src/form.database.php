<?php
require_once('form.core.php');


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
        if ($data) {
            $req = $db->prepare($statement);
            $req->execute($data);
        } else {
            $req = $db->query($statement);
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
        echo "<pre>";
        var_dump($e); die();
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
 * @param int $id
 * @param string $table
 * @return void
 */
function update($data, $id, $table)
{
    $fields = [];
    $values = [];
    foreach ($data as $k => $v) {
        $fields[] = "{$k} = ? ";
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
function delete($id, $table)
{
    query("DELETE FROM {$table} WHERE id = ?", [$id]);
}
