<?php

include_once 'commons/class/Topic.class.php';
include_once 'persistence/TopicDB.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * My native language is Spanish but i try use english because i think
 * it is a standar.
 * Exito¡¡¡¡¡¡ XD
 * esojphaeton.
 */

class TopicAbm {

    public static function addTopic($parameters) {
         $id= TopicDB::insertTopic($parameters);
         return $id;
        
    }

    /* public static function removeTopic($topic, $topics);

      public static function modifyTopic($topic); */

    public static function countTopic($parameters){
            $row=TopicDB::countTopic($parameters)        ;;
        return $row['total'];
    }
    
    public static function listTopics($parameters) {

               
        $rows = TopicDB::selectTopic($parameters);
        

        if (isset($parameters['idTopic'])) {
            $row = $rows;
            $topic = new Topic($row->id, $row->subject, $row->name, $row->comment,
                            $row->img, $row->li_ke, $row->unlike, $row->dateTime, $row->idCategory);
            return $topic;
        }

        $topics = array();
        /*         * *******i`m not sure if this is necesary******* */
        foreach ($rows as $row) {
            $topic = new Topic($row->id, $row->subject, $row->name, $row->comment,
                            $row->img, $row->li_ke, $row->unlike, $row->dateTime, $row->idCategory);            
            
            array_push($topics, $topic);
        }
        return $topics;
    }

}

?>
