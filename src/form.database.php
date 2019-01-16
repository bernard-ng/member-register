<?php


/**
 * database connexion and main query function
 */
database_connexion : {
    // Connexion a la base de donnée
    $db = function () {
        $db_user = "root";
        $db_password = "";
        $db_host = "localhost";
        $db_name = "church_members";

        try {
            return new PDO("mysql:Host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } catch (Exception $e) {
            die('Connexion impossible, pour l\'instant');
        }
    };


    /**
     * make a query to the database
     *
     * @param string $statement
     * @param array $data
     * @param boolean $fetchAll
     * @return mixed
     */
    function query($statement, $data = [], $fetchAll = true)
    {
        global $db;

        try {
            if (!empty($data)) {
                $req = $db()->prepare($statement);
                $req->execute($data);
            } else {
                $req = $db()->query($statement);
            }

            if (strpos($statement, "INSERT") === 0 ||
                strpos($statement, "DELETE") === 0 ||
                strpos($statement, "UPDATE") === 0) {
                return $req;
            }

            $req->setFetchMode(PDO::FETCH_OBJ);
            $res = $fetchAll ? $req->fetchAll() : $req->fetch();
            return $res;
        } catch (PDOException $e) {
            die('Oups une erreur est survenu, veuillez réessayer');
            return null;
        }
    }
}


/**
 * query functions, CRUD and search
 */
database_query_func : {
    /**
     * create or save data into the database
     *
     * @param array $data
     * @param string $table
     * @return mixed
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
     * @return mixed
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
     * @return mixed
     */
    function delete($id, $table)
    {
        return query("DELETE FROM {$table} WHERE id = ?", [$id]);
    }


    /**
     * get the last inserted data
     *
     * @param integer $limit
     * @return mixed
     */
    function getLast($table, $limit = 4)
    {
        return query("SELECT * FROM {$table} ORDER BY id DESC LIMIT {$limit}");
    }


    /**
     * get all inserted data
     *
     * @param string $table
     * @return mixed
     */
    function all($table)
    {
        return query("SELECT * FROM {$table} ORDER BY id DESC");
    }


    /**
     * find a data
     *
     * @param int $id
     * @param string $table
     * @return mixed
     */
    function find($id, $table)
    {
        return query("SELECT * FROM {$table} WHERE id = ?", [$id], false);
    }


    /**
     * make a search
     *
     * @param string $query
     * @param string $table
     * @return mixed
     */
    function search($query, $table) {
        $sql = '';
        $data = [];
        $words = explode(' ', $query);
        foreach ($words as $key => $word) {
            if (mb_strlen($word) < 3) {
                unset($words[$key]);
            }
        }

        if (!empty($words)) {
            foreach ($words as $key => $word) {
                $data[] = "%{$word}%";
                $sql .= ($key === 0) ?
                    "CONCAT({$table}.nom, {$table}.postnom, {$table}.prenom) LIKE ? " :
                    " OR CONCAT({$table}.nom, {$table}.postnom, {$table}.prenom) LIKE ?";
            }
        
            return query("SELECT {$table}.* FROM {$table} WHERE ({$sql}) ", $data);
        }
        return null;
    }
}
