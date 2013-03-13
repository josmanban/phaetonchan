<?php

require_once 'DbConnection.php';

class CategoryDB {

    public static function selectCategory($parameters) {
        $db = new DbConnection();
        if (isset($parameters['id'])) {
            $sql = 'SELECT * FROM category WHERE id=:id';
            $values = array('id' => $parameters['id']);
            $parameters = array('sql' => $sql, 'array' => $values);
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
            } else {
                $row = array();
            }
            return $row;
        } elseif (isset($parameters['name'])) {
            $sql = 'SELECT * FROM category WHERE UPPER(name) LIKE UPPER(:name) ORDER BY name';
            $values = array('name' => $parameters['name']);
            $parameters = array('sql' => $sql, 'array' => $values);
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                $rows = array();
            }
            return $rows;
        } elseif (isset($parameters['idFatherCategory'])) {
            $sql = 'SELECT * FROM category WHERE idFatherCategory=:idFatherCategory ORDER BY name';
            $values = array('idFatherCategory' => $parameters['idFatherCategory']);
            $parameters = array('sql' => $sql, 'array' => $values);
            $stmt = $db->execute($parameters);

            if ($stmt) {
                $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
               
            } else {
                $rows = array();
            }
            return $rows;
        } else {
            $sql = "SELECT * FROM category ORDER BY idFatherCategory,name";
            $parameters = array('sql' => $sql);
            $stmt = $db->execute($parameters);
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $rows;
        }
    }

}

?>
