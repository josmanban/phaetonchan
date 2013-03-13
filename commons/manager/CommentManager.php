<?php

require_once 'commons/abm/CommentAbm.php';

class CommentManager {

    public static function addComment($name, $subject, $img, $comment, $idTopic, $idComment) {

        //php 5.2+ T.T T.T
//        $comment= new Comment();
//        $comment->setName($name);
//        $comment->setSubject($subject);
//        $comment->setImg($img);       
//        $comment->setComment($comment);
//        $comment->setIdTopic($idTopic);
//        $comment->setIdComment($idComment);
        $parameters = array(
            'name' => $name,
            'subject' => $subject,
            'img' => $img,
            'comment' => $comment,
            'idTopic' => $idTopic,
            'idComment' => $idComment
        );
        $id=CommentAbm::addComment($parameters);
        return $id;
    }

    /* public static function removeComment();

      public static function getComments(); */

    public static function getCommentById($id) {
        $topic = CommentAbm::listComments(array('id' => $id));
        return $topic;
    }

    public static function getCommentsByTopicId($idTopic) {

        $parameters = array('idTopic' => $idTopic, 'idComment' => -1);
        $fatherComments = CommentAbm::listComments($parameters);
        $allComments = array();
        foreach ($fatherComments as $fatherComment) {
            $family = array();
            $sons = CommentAbm::listComments(array('idTopic' => $idTopic, 'idComment' => $fatherComment->getId()));

            array_push($family, $fatherComment);
            array_push($family, $sons);
            array_push($allComments, $family);
        }
        return $allComments;
    }

    public static function getCommentsByTopicIdPaginated($idTopic, $offset, $limit) {

        $parameters = array('idTopic' => $idTopic, 'idComment' => -1, 'offset' => $offset, 'limit' => $limit);
        $fatherComments = CommentAbm::listComments($parameters);
        
        $allComments = array();
        foreach ($fatherComments as $fatherComment) {
            $family = array();
            $sons = CommentAbm::listComments(array('idTopic' => $idTopic, 'idComment' => $fatherComment->getId()));

            array_push($family, $fatherComment);
            array_push($family, $sons);
            array_push($allComments, $family);
        }
        $numComments = CommentAbm::numComments(array('idTopic' => $idTopic));
        

        return array($allComments, $numComments);
    }

    public static function getCommentsByFatherComment($idComment) {
        return CommentAbm::listComments(array('idComment' => $idComment));
    }

    public static function getAllComments() {
        return CommentAbm::listComments(array());
    }
    
    
    public static function countCommentsPerIdTopic($idTopic){
        return CommentAbm::numComments(array('idTopic'=>$idTopic));
        
    }
    
    public static function countAllComments(){
        return CommentAbm::numComments(array());
    }

}

?>
