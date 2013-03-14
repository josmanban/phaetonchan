<?php

require_once 'DbConnection.php';

class CommentDB {

    public static function insertComment($parameters) {
        $db = new DbConnection();
        $sql = "INSERT INTO comment (name,subject,img,comment,idTopic,idComment,dateTime) values (:name,:subject,:img,:comment,:idTopic,:idComment,NOW())";


        $array = array('sql' => $sql, 'array' => $parameters);
        $stmt = $db->execute($array);
        return $db->lastInsertId();
    }

    //public static function deleteTopic($idTopic);
    //public static function updateTopic($topic); */
//    public static function paged($sql,$offset,$limit){
//        $sql=
//    }

    public static function countAllCommentsPerAllTopics() {
        $db = new DbConnection();
        $sql = 'SELECT t.id as ID, COUNT(1) as NUMCOMM FROM topic t INNER JOIN COMMENT c ON t.id = c.idTopic GROUP BY t.id';
        $stmt = $db->execute(array('sql' => $sql));

        if ($stmt) {
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $rows = array();
        }
        return $rows;
    }

    public static function countComments($parameters) {
        $db = new DbConnection();
        if (isset($parameters['idComment']) && isset($parameters['idTopic'])) {

            $sql = "SELECT COUNT(1) AS total FROM comment WHERE idTopic=:idTopic AND idComment=:idComment ORDER BY dateTime DESC";
            $array = array(':idTopic' => $parameters['idTopic'], ':idComment' => $parameters['idComment']);
            $parameters = array('sql' => $sql, 'array' => $array);
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $row = array();
            }
            return $row;
        } elseif (isset($parameters['idTopic'])) {
            $sql = "SELECT COUNT(1) AS total FROM comment WHERE idTopic=:idTopic ORDER BY dateTime DESC";
            $array = array(':idTopic' => $parameters['idTopic']);
            $parameters = array('sql' => $sql, 'array' => $array);
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $row = array();
            }
            return $row;
        } elseif (isset($parameters['idComment'])) {
            $sql = "SELECT COUNT(1) AS total FROM comment WHERE idComment=:idComment ORDER BY dateTime DESC";
            $array = array(':idComment' => $parameters['idComment']);

            $parameters = array('sql' => $sql, 'array' => $array);
            $stmt = $db->execute($parameters);
            if ($stmt) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $row = array();
            }
            return $row;
        } elseif (isset($parameters['id'])) {
            $sql = "SELECT COUNT(1) AS total * FROM comment WHERE id=:id ORDER BY dateTime DESC";
            $array = array(':id' => $parameters['id']);

            $parameters = array('sql' => $sql, 'array' => $array);

            $stmt = $db->execute($parameters);
            if ($stmt) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                $row = array();
            }
            return $row;
        } else {
            $sql = "SELECT COUNT(1) AS total FROM comment";
            $parameters = array('sql' => $sql);
            $stmt = $db->execute($parameters);
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rows;
        }
    }

    public static function selectComment($parameters) {
        $db = new DbConnection();


        if (isset($parameters['idComment']) && isset($parameters['idTopic'])) {

            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM comment WHERE idTopic=:idTopic AND idComment=:idComment ORDER BY dateTime DESC";
            $array = array(':idTopic' => $parameters['idTopic'], ':idComment' => $parameters['idComment']);

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
                $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                $rows = array();
            }
            return $rows;
        } elseif (isset($parameters['idTopic'])) {

            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM comment WHERE idTopic=:idTopic ORDER BY dateTime DESC";
            $array = array(':idTopic' => $parameters['idTopic']);
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
                $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                $rows = array();
            }
            return $rows;
        } elseif (isset($parameters['idComment'])) {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM comment WHERE idComment=:idComment ORDER BY dateTime DESC";
            $array = array(':idComment' => $parameters['idComment']);
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
                $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                $rows = array();
            }
            return $rows;
        } elseif (isset($parameters['id'])) {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM comment WHERE id=:id ORDER BY dateTime DESC";
            $array = array(':id' => $parameters['id']);
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
        } else {
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM comment ORDER BY dateTime DESC";
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

?>
