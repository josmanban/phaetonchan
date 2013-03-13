<?php

require_once 'DbConnection.php';

class TopicDB {

    public static function insertTopic($parameters) {
        $db = new DbConnection();
        $sql = 'INSERT INTO topic (name,subject,img,comment,idCategory,dateTime) values (:name,:subject,:img,:comment,:idCategory,NOW())';


        $array = array('sql' => $sql, 'array' => $parameters);
        $stmt = $db->execute($array);
        return $db->lastInsertId();
    }

    /* public static function deleteTopic($idTopic);

      public static function updateTopic($topic); */

    public static function countTopic($parameters) {
        $db = new DbConnection();
        //header('location: error.php?errorMessage='. implode(',', $parameters));

        if (isset($parameters['idCategory'])) {

            $sql = 'SELECT COUNT(1) AS total FROM topic WHERE idCategory=:idCategory ';
            $array = array(':idCategory' => $parameters['idCategory']);
            $parameters = array('sql' => $sql, 'array' => $array);
            //  header('location: error.php?errorMessage='. implode(',', $parameters));
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                //header('location: error.php?errorMessage='.  count($rows));
            } else {
                $rows = array();
            }
            return $rows;
        } elseif (isset($parameters['idTopic'])) {
            $sql = 'SELECT COUNT(1) AS total FROM topic WHERE id=:id ';
            $array = array(':id' => $parameters['idTopic']);
            $parameters = array('sql' => $sql, 'array' => $array);
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return $row;
            } else {
                return array();
            }
        } elseif (isset($parameters['idFatherCategory'])) {
            $sql = 'SELECT COUNT(1) ';
            $sql = $sql + ' FROM topic WHERE idCategory IN (select id from category where idFatherCategory=:idFatherCategory)';
            $array = array(':idFatherCategory', $parameters['idFatherCategory']);
            $parameters = array('sql' => $sql, 'array' => $array);
            $stmt = $db->execute($parameters);

            if ($stmt)
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            else {
                return array();
            }
        } else {
            $sql = 'SELECT COUNT(1) AS total FROM topic ';
            $parameters = array('sql' => $sql);
            $stmt = $db->execute($parameters);
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rows;
        }
    }

    public static function selectTopic($parameters) {
        $db = new DbConnection();
        //header('location: error.php?errorMessage='. implode(',', $parameters));
        //var_dump($parameters);

        if (isset($parameters['idCategory'])) {

            $sql = 'SELECT * FROM topic WHERE idCategory=:idCategory ORDER BY ' . $parameters['colOrderBy'] . ' ' . $parameters['orderType'];

            $array = array(':idCategory' => $parameters['idCategory']);

            /*             * *****for pagination************* */
            if (isset($parameters['offset']) && $parameters['limit']) {

                $array['offset'] = $parameters['offset'];
                $array['limit'] = $parameters['limit'];
                $sql = $sql . ' LIMIT :offset,:limit';
            }

            /*             * ********************************* */


            $parameters = array('sql' => $sql, 'array' => $array);
            //header('location: error.php?errorMessage='. implode(',', $parameters));
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
                //header('location: error.php?errorMessage='.  count($rows));
            } else {
                $rows = array();
            }
            return $rows;
        } elseif (isset($parameters['idTopic'])) {
            $sql = 'SELECT * FROM topic WHERE id=:id ';
            $array = array(':id' => $parameters['idTopic']);

            /*             * *****for pagination************* */
            if (isset($parameters['offset']) && $parameters['limit']) {

                $array['offset'] = $parameters['offset'];
                $array['limit'] = $parameters['limit'];
                $sql = $sql . ' LIMIT :offset,:limit';
            }

            /*             * ********************************* */

            $parameters = array('sql' => $sql, 'array' => $array);
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $row = $stmt->fetch(PDO::FETCH_OBJ);
                return $row;
            } else {
                return array();
            }
        } elseif (isset($parameters['idFatherCategory'])) {
            $sql = 'SELECT * FROM topic WHERE idCategory IN (select id from category where idFatherCategory=:idFatherCategory) ORDER BY ' . $parameters['colOrderBy'] . ' ' . $parameters['orderType'];
            $array = array(':idFatherCategory', $parameters['idFatherCategory']);

            /*             * *****for pagination************* */
            if (isset($parameters['offset']) && $parameters['limit']) {

                $array['offset'] = $parameters['offset'];
                $array['limit'] = $parameters['limit'];
                $sql = $sql . ' LIMIT :offset,:limit';
            }

            /*             * ********************************* */

            $parameters = array('sql' => $sql, 'array' => $array);
            $stmt = $db->execute($parameters);

            if ($stmt)
                $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            else {
                return array();
            }
        } else {
            //var_dump($parameters);

            if (isset($parameters['popular'])) {
                $sql = 'SELECT t.id,t.subject,t.comment,t.img,t.name,t.li_ke,t.unlike,t.idCategory,t.dateTime, COUNT( 1 ) as numcomments FROM topic t LEFT JOIN comment c ON t.id = c.idTopic GROUP BY t.id ORDER BY ' . $parameters['colOrderBy'] . ' ' . $parameters['orderType'];
            } else {
                $sql = 'SELECT * FROM topic ORDER BY ' . $parameters['colOrderBy'] . ' ' . $parameters['orderType'];
            }

            /*             * *****for pagination************* */
            if (isset($parameters['offset']) && $parameters['limit']) {

                $array = array();
                $array['offset'] = $parameters['offset'];
                $array['limit'] = $parameters['limit'];
                $sql = $sql . ' LIMIT :offset,:limit';
                $parameters = array('sql' => $sql, 'array' => $array);
                $stmt = $db->execute($parameters);
                $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

                return $rows;
            }
            /*             * ********************************* */



            $parameters = array('sql' => $sql);
            $stmt = $db->execute($parameters);
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $rows;
        }
    }

}

