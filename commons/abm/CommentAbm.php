<?php

include_once 'persistence/CommentDB.php';
include_once 'commons/class/Comment.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * My native language is Spanish but i try use english because i think
 * it is a standar.
 * Exito¡¡¡¡¡¡ XD
 * esojphaeton.
 */

class CommentAbm {

//    public static function addComment($comment) {
//
//        $name = (string)$comment->getName();
//        $subject =(string) $comment->getSubject();
//        $img = (string)$comment->getImg();
//        $comment = (string)$comment->getComment();
//        $idTopic = (int)$comment->getIdTopic();
//        $idComment = (int) $comment->getIdComment();
//
//        $parameters = array(
//            'name' => $name,
//            'subject' => $subject,
//            'img' => $img,
//            'comment' => $comment,
//            'idTopic' => $idTopic,
//            'idComment' => $idComment
//        );
//        
//        
    public static function addComment($parameters){
        $id=CommentDB::insertComment($parameters);
        return $id;
    }

    //public static function removeTopic($topic, $topics);
    //public static function modifyTopic($topic); */

    public static function numComments($parameters) {
        $row = CommentDB::countComments($parameters);
        return $row['total'];
    }
    
//    public static function countAllCommentsPerAllTopics() {
//        $listComments=  CommentDB::countAllCommentsPerAllTopics();
//        $array= array();        
//        
//        }

    public static function listComments($parameters) {


        $rows = CommentDB::selectComment($parameters);

        if (isset($parameters['id'])) {
            $row = $rows;
            $comment = new Comment($row->id, $row->subject, $row->name, $row->comment,
                            $row->img, $row->li_ke, $row->unlike, $row->dateTime, $row->idTopic, $row->idComment);
            return $comment;
        }

        $comments = array();
        /*         * *******i`m not sure if this is necesary******* */
        foreach ($rows as $row) {
            $comment = new Comment($row->id, $row->subject, $row->name, $row->comment,
                            $row->img, $row->li_ke, $row->unlike, $row->dateTime, $row->idTopic, $row->idComment);
            array_push($comments, $comment);
        }
        return $comments;
    }

}

?>
