<?php

require_once 'commons/abm/TopicAbm.php';

class TopicManager {

    public static function addTopic($name, $subject, $img, $comment, $idCategory) {
       
        $parameters = array(
            'name' => $name,
            'subject' => $subject,
            'img' => $img,
            'comment' => $comment,
            'idCategory' => $idCategory
        );
        $id = TopicAbm::addTopic($parameters);
        return $id;
    }

    /* public static function removeTopic();

      public static function getTopics(); */

    public static function getTopicById($id) {
        $topic = TopicAbm::listTopics(array('idTopic' => $id));
        return $topic;
    }

    public static function getTopicsByCategory($idCategory, $offset, $limit) {
        return TopicAbm::listTopics(array('idCategory' => $idCategory, 'colOrderBy' => 'dateTime', 'orderType' => 'DESC', 'offset' => $offset, 'limit' => $limit));
    }

    public static function getTopicsByFatherCategory($idFatherCategory) {
        return TopicAbm::listTopics(array('idFatherCategory' => $idFatherCategory, 'offset' => $offset, 'limit' => $limit));
    }

    public static function getAllRecentTopics($offset, $limit) {

        return TopicAbm::listTopics(array('colOrderBy' => 'dateTime', 'orderType' => 'DESC', 'offset' => $offset, 'limit' => $limit));
    }

    public static function getAllPopularTopics($offset, $limit) {
        return TopicAbm::listTopics(array('colOrderBy' => 'numcomments', 'orderType' => 'DESC', 'offset' => $offset, 'limit' => $limit,'popular'=>1));
    }

    public static function countTopic($parameters) {
        return TopicAbm::countTopic($parameters);
    }

}

?>
